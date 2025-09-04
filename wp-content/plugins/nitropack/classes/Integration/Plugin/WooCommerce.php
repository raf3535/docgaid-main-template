<?php

namespace NitroPack\Integration\Plugin;

class WooCommerce {
	const STAGE = "late";

	public static function isActive() {
		if ( class_exists( 'WooCommerce' ) ) {
			return true;
		}
		return false;
	}

	public function init( $stage ) {
		if ( ! self::isActive() )
			return;

		add_action( 'init', [ $this, 'cache_sale_products' ] );
		add_action( 'updated_post_meta', [ $this, 'update_cached_sale_products' ], 10, 4 );
		add_action( 'added_post_meta', [ $this, 'update_cached_sale_products' ], 10, 4 );
		add_action( 'deleted_post_meta', [ $this, 'update_cached_sale_products' ], 10, 4 );
		//update transient on post status change
		add_action( 'transition_post_status', [ $this, 'update_product_from_transient' ], 10, 3 );
		//delete transient on post delete
		add_action( 'delete_post', [ $this, 'remove_deleted_product_from_transient' ] );
		if ( nitropack_is_optimizer_request() ) {
			add_action( 'template_redirect', [ $this, 'purge_site_cache_on_sale_start_and_end' ] );
		}
		add_filter( 'wc_product_post_type_link_product_cat', [ $this, 'uppercase_product_cat_links' ] );

	}

	/**
	 * Convert %product_cat% links to uppercase due to https://github.com/woocommerce/woocommerce/pull/51637 
	 *
	 * This function checks if the category slug starts with a '%' character.
	 * If it does, the slug is converted to uppercase.
	 *
	 * @param object $cat The product category object.
	 * @return object The modified product category object.
	 */
	public function uppercase_product_cat_links( $cat ) {
		if ( $cat->slug && strpos( $cat->slug, '%' ) === 0 ) {
			$cat->slug = strtoupper( $cat->slug );
		}
		return $cat;
	}
	/**
	 * Retrieves the sale dates for a given WooCommerce product.
	 *
	 * @param \WC_Product $product The WooCommerce product object.
	 * @return array An associative array containing the start and end dates of the sale.
	 */
	private function get_sale_dates( $product ) {
		$sale_start = $product->get_date_on_sale_from();
		$sale_end = $product->get_date_on_sale_to();
		$result = [];

		if ( $sale_start ) {
			$sale_start = strtotime( date( 'Y-m-d', $sale_start->getTimestamp() ) );
			$result['from'] = $sale_start;
		}
		if ( $sale_end ) {
			$sale_end = strtotime( date( 'Y-m-d', $sale_end->getTimestamp() ) );
			$result['to'] = $sale_end;
		}

		return $result;
	}
	/**
	 * This method sets the expiration date for the cache.
	 *
	 * @param int $date The expiration date as a timestamp.
	 * @return void
	 */
	private function add_cache_expiration( $date ) {
		global $np_customExpirationTimes;

		$np_customExpirationTimes[] = $date;
		nitropack_set_custom_expiration();
	}
	/**
	 * Update cached products when post meta is updated, deleted, or added.
	 *
	 * This function updates the cached sale product dates when the post meta
	 * keys '_sale_price_dates_from' or '_sale_price_dates_to' are modified.
	 * It ensures that the cached products are updated accordingly and removes
	 * the product from the cache if both dates are empty.
	 *
	 * @param int $meta_id The ID of the meta entry being updated.
	 * @param int $post_id The ID of the post being updated.
	 * @param string $meta_key The meta key being updated.
	 * @param string $meta_value The new value of the meta key.
	 * @return void
	 */
	public function update_cached_sale_products( $meta_id, $post_id, $meta_key, $meta_value ) {
		//bail if we dont update future sale dates
		if ( $meta_key != '_sale_price_dates_from' && $meta_key != '_sale_price_dates_to' )
			return;

		$cached_products = get_transient( 'nitropack_sale_product_dates' );
		// If $cached_products is empty, initialize it as an array
		if ( empty( $cached_products ) ) {
			$cached_products = [];
		}

		// Ensure that the $post_id key exists in the $cached_products array
		if ( ! isset( $cached_products[ $post_id ] ) ) {
			$cached_products[ $post_id ] = [];
		}
		//update
		if ( $meta_key === '_sale_price_dates_from' ) {
			$cached_products[ $post_id ]['from'] = $meta_value;
		}
		if ( $meta_key === '_sale_price_dates_to' ) {
			$cached_products[ $post_id ]['to'] = $meta_value;
		}
		//delete product
		if ( empty( $cached_products[ $post_id ]['from'] ) && empty( $cached_products[ $post_id ]['to'] ) ) {
			unset( $cached_products[ $post_id ] );
		}
		set_transient( 'nitropack_sale_product_dates', $cached_products );
	}
	/**
	 * Cache all products with sale dates.
	 *
	 * This method identifies all products that have sale dates and caches them
	 * to improve performance and reduce load times for users viewing sale items.
	 *
	 * @return void
	 */
	public function cache_sale_products() {
		$cached_products = get_transient( 'nitropack_sale_product_dates' );
		if ( $cached_products !== false )
			return;

		$scheduled_sale_products = $this->get_products_with_sale();
		$sale_dates = array();
		if ( ! empty( $scheduled_sale_products ) ) {

			foreach ( $scheduled_sale_products as $scheduled_sale_product_id ) {
				$current_product_sale_dates = $this->get_sale_dates( wc_get_product( $scheduled_sale_product_id ) );
				$sale_dates[ $scheduled_sale_product_id ] = $current_product_sale_dates;
			}
		}
		/* 
		 * If there are no products with sale dates, set the transient to false
		 * to avoid unnecessary queries in the future.
		 */
		set_transient( 'nitropack_sale_product_dates', $sale_dates );
	}

	/**
	 * Purges the site cache when a sale starts or ends.
	 * 
	 * This function sets the X-Nitro-Expire header to the earliest future date 
	 * based on the sale start or end date. It ensures that the cache is 
	 * appropriately purged to reflect the changes in sale status.
	 */
	public function purge_site_cache_on_sale_start_and_end() {
		$sale_dates = get_transient( 'nitropack_sale_product_dates' );
		if ( $sale_dates === false )
			return;

		$current_time = time();
		$valid_timestamps = [];
		foreach ( $sale_dates as $product_id => $dates ) {
			$timestamps = [];

			if ( isset( $dates['from'] ) && $dates['from'] >= $current_time ) {
				$timestamps[] = $dates['from'];
			}

			if ( isset( $dates['to'] ) && $dates['to'] >= $current_time ) {
				$timestamps[] = $dates['to'];
			}

			if ( ! empty( $timestamps ) ) {
				// Use the earliest timestamp that is greater than or equal to the current time
				$valid_timestamps[ $product_id ] = min( $timestamps );
			}
		}

		// Find the earliest date from the valid timestamps
		if ( ! empty( $valid_timestamps ) ) {
			$earliest_key = array_search( min( $valid_timestamps ), $valid_timestamps );
			$earliest_date = $valid_timestamps[ $earliest_key ];


			$this->add_cache_expiration( $earliest_date );
		}
	}
	/**
	 * Retrieves all products that have sale dates.
	 *
	 * @return array An array of products that are currently on sale.
	 */
	public function get_products_with_sale() {

		$product_ids = [];
		$args = array(
			'post_type' => array( 'product', 'product_variation' ),
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => '_sale_price_dates_from',
					'value' => time(),
					'compare' => '>=',
					'type' => 'NUMERIC',
				),
				array(
					'key' => '_sale_price_dates_to',
					'value' => time(),
					'compare' => '>=',
					'type' => 'NUMERIC',
				),
			),
		);

		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				global $post;
				$query->the_post();
				$product_ids[] = $post->ID;
			}
		}
		wp_reset_postdata();

		return $product_ids;
	}
	/**
	 * Updates the product in the transient cache when its status changes.
	 *
	 * This function updates the cached sale product dates when the product's
	 * status changes. It ensures that the cached products are updated accordingly
	 * and removes the product from the cache if it is moved to trash.
	 *
	 * @param string $new The new status of the post.
	 * @param string $old The old status of the post.
	 * @param \WP_Post $post The post object being updated.
	 * @return void
	 */
	public function update_product_from_transient( $new, $old, $post ) {
		if ( $new === "auto-draft" || ( $new === "draft" && $old === "auto-draft" ) || ( $new === "draft" && $old != "publish" ) || $new === "inherit" ) { // Creating a new post or draft, don't do anything for now. 
			return;
		}
		$post_id = $post->ID;
		$cached_products = get_transient( 'nitropack_sale_product_dates' );

		if ( $new === "trash" && ! empty( $cached_products[ $post_id ] ) ) {
			unset( $cached_products[ $post_id ] );
			set_transient( 'nitropack_sale_product_dates', $cached_products );
		}
		if ( $new === "publish" ) {
			$meta = get_post_meta( $post_id );
			if ( ! empty( $meta['_sale_price_dates_from'] ) ) {
				$cached_products[ $post_id ]['from'] = $meta['_sale_price_dates_from'][0];
			}
			if ( ! empty( $meta['_sale_price_dates_to'] ) ) {
				$cached_products[ $post_id ]['to'] = $meta['_sale_price_dates_to'][0];
			}
			set_transient( 'nitropack_sale_product_dates', $cached_products );
		}
	}
	/**
	 * Deletes the product from the transient cache when it is force/fully deleted.
	 * @param int $post_id The ID of the post being deleted.
	 * @return void
	 */
	public function remove_deleted_product_from_transient( $post_id ) {
		$cached_products = get_transient( 'nitropack_sale_product_dates' );
		if ( empty( $cached_products[ $post_id ] ) ) {
			return;
		}
		unset( $cached_products[ $post_id ] );
		set_transient( 'nitropack_sale_product_dates', $cached_products );
	}
}
<?php

// Adds widget: Practice Areas
class Practiceareas_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'practiceareas_widget',
            esc_html__( 'Practice Areas', 'textdomain' )
        );
    }

    private $widget_fields = array(
    );

    public function widget( $args, $instance ) {

        global $hc_settings;
        global $post;
        // before and after widget arguments are defined by themes
        $nowtit = get_post_meta( $post->ID, $hc_settings['location_widget_title'], true );

        if(empty($nowtit) || strtolower($nowtit) == "-- none --"){
            return;
        }


        $locationCurrentPost = $post->ID;

        /*
        Get Current Location Taxonomy On Page
        */
        $postTerms =  wp_get_object_terms($post->ID, $hc_settings['location_taxonomy']);
        $categoryFilterSlug = '';

        $taxonomyToUse = $hc_settings['location_taxonomy'];

        if ( ! empty( $postTerms ) && ! is_wp_error( $postTerms ) ){
            foreach ( $postTerms as $term ) {
                $categoryFilterSlug .= '' . $term->slug;
            }
        }

        if(empty($categoryFilterSlug)){
            //if no city do not display anything
            return;
        }

        //Widget Toggle
        if($postTerms) :

            //BEGIN FRONTEND OUTPUT
            ?>


            <div class="widget location-widget-outer">
                <div class="location-widget-inner">
                    <?php //Get Pretty Location Name
                    $postTerms =  wp_get_object_terms($post->ID, $taxonomyToUse);
                    //Atlanta Args

                    $args = array(
                        'posts_per_page' => 30,
                        'post_type' => 'page',
                        'tax_query' => array(
                            array(
                                'taxonomy' => $taxonomyToUse,
                                'field' => 'slug',
                                'terms' => $categoryFilterSlug
                            ),
                        ),
                        'meta_query' => [
                            'relation'    => 'AND',
                            [
                                'key'   => $hc_settings['location_widget_title'],
                                'compare' => 'EXISTS',
                            ],
                            [
                                'key'   => $hc_settings['parent_location_widget_title'],
                                'value' => $nowtit,
                                'compare' => '=',
                            ]
                        ],
                        'orderby'    => 'meta_value',
                        'order'      => 'ASC',
                        'post__not_in' => array($locationCurrentPost)
                    );


                    $curtit = get_post_meta( $post->ID, $hc_settings['location_widget_title'], true );

                    if(!count(get_posts($args))) {
                        $curtit = get_post_meta( $post->ID, $hc_settings['parent_location_widget_title'], true );
                        $args['meta_query'] = [
                            'relation'    => 'AND',
                            [
                                'key'   => $hc_settings['location_widget_title'],
                                'compare' => 'EXISTS',
                            ],
                            [
                                'key'   => $hc_settings['parent_location_widget_title'],
                                'value' => $curtit,
                                'compare' => '=',
                            ]
                        ];


                        // if(!count(get_posts($args))) {
                        //     $args['meta_query'] =
                        //         [
                        //             'key'   => $hc_settings['location_widget_title'],
                        //             'compare' => 'EXISTS',
                        //         ];
                        //     $curtit = "";
                        // }

                    }



                    ?>

                    <?php
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) : ?>

                    <h4 class="widget-title widgettitle"><?php echo $postTerms[0]->name; ?> <br><?=$curtit?> <span>
                                 Practice Areas
                            </span></h4>

                    <ul class="location-widget-links location-listing">

                        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                            $practice_area = get_post_meta( $post->ID, $hc_settings['location_widget_title'], true );
                            if ( !$practice_area ){
                                continue;
                            }
                            $words = ['FRSA', 'FELA', 'PTSD'];
                            $pattern = '/\b(' . implode('|', $words) . ')\b/i';
                            $callback = function ($matches) {
                                return strtoupper($matches[0]);
                            }; 
                            $practice_area = preg_replace_callback($pattern, $callback, $practice_area);
                            ?>
                            <li class="single-location-link">
                                <a href="<?php the_permalink(); ?>" title="<?php echo $practice_area; ?>"><?php if( $city ) { echo $city .' '; } echo $practice_area; ?></a>
                            </li>

                        <?php endwhile; else : ?>

                        <?php endif; ?>
                        <?php wp_reset_query(); ?>

                    </ul>
                </div>
            </div>

        <?php
        endif;
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
                    $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

function register_practiceareas_widget() {
    register_widget( 'Practiceareas_Widget' );
}
add_action( 'widgets_init', 'register_practiceareas_widget' );

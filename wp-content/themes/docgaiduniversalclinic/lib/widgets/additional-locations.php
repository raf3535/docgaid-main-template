<?php

// Adds widget: Practice Areas
class AdditionalLocations_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'additional_locations_widget',
            esc_html__('Additional Locations', 'textdomain')
        );
    }

    private $widget_fields = array();

    public function widget($args, $instance)
    {

        global $hc_settings;
        global $post;

        $location_widget_title = get_field($hc_settings['location_widget_title'], $post->ID);

        if(empty($location_widget_title) || strtolower($location_widget_title) == "-- none --"){
            return;
        }

        //Widget Toggle
        if ($location_widget_title && !is_search() && !is_404()):
            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'page',
                'meta_query' => array(
                    array(
                        'key' => $hc_settings['location_widget_title'],
                        'value' => get_field($hc_settings['location_widget_title'], $post->ID),
                        'compare' => '=',
                    ),
                ),
                'orderby' => 'rand',
                'order' => 'asc',
                'post__not_in' => array($post->ID)
            );

            $posts = get_posts($args);

            if (!empty($hc_settings['priority_locations'])) {
                foreach (array_reverse($hc_settings['priority_locations']) as $loc) {
                    foreach ($posts as $pk => $p) {
                        $city_terms = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                        if ($city_terms) {
                            $city = current($city_terms);

                            if ($city->name === $loc) {
                                unset($posts[$pk]);
                                array_unshift($posts, $p);
                            }
                        }
                    }
                }
            }

            $posts = array_slice($posts, 0, 15);

            if ($posts) { ?>
                <div class="widget location-widget-outer">
                    <h3 class="widget-title widgettitle">Additional Locations</h3>
                    <ul class="location-widget-links">

                        <?php foreach ($posts as $p) { ?>
                            <li class="single-location-link">
                                <a class="menu-item-<?=$p->ID?>" title="<?= get_the_title($p->ID) ?>" href="<?= get_permalink($p->ID); ?>"><?= get_the_title($p->ID) ?></a>
                            </li>

                        <?php } ?>

                    </ul>
                </div>
            <?php }

        endif;

//        echo $args['after_widget'];
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'textdomain');
            switch ($widget_field['type']) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'textdomain') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_additional_locations_widget()
{
    register_widget('AdditionalLocations_widget');
}

add_action('widgets_init', 'register_additional_locations_widget');

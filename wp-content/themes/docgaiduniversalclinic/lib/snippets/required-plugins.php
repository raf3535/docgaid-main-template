<?php

if (is_admin()):
    require_once dirname(__DIR__).'/../plugin-activator/class-tgm-plugin-activation.php';
    add_action('tgmpa_register', 'my_theme_register_required_plugins');
    add_action('tgmpa_register', 'my_theme_register_required_plugins');

    /**
     * Register the required plugins for this theme.
     *
     *  <snip />
     *
     * This function is hooked into tgmpa_init, which is fired within the
     * TGM_Plugin_Activation class constructor.
     */
    function my_theme_register_required_plugins()
    {

        $plugins = array(

            array(
                'name' => 'Advanced Custom Fields PRO',
                'slug' => 'advanced-custom-fields-pro-master',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'Typing Effect',
                'slug' => 'animated-typing-effect',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'FluentSMTP',
                'slug' => 'fluent-smtp',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'Formidable',
                'slug' => 'formidable',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'Local Google Fonts',
                'slug' => 'local-google-fonts',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'Classic Editor',
                'slug' => 'classic-editor',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'Widgets for Google Reviews',
                'slug' => 'wp-reviews-plugin-for-google',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
            array(
                'name' => 'Yoast SEO',
                'slug' => 'wordpress-seo',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
        );

        $config = array(
            'id' => 'tgmpa',
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'parent_slug' => 'themes.php',
            'capability' => 'edit_theme_options',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => true,
            'message' => '',
        );
        tgmpa($plugins, $config);
    }
endif;
<?php
function wallstreet_header_option($wp_customize) {

    /* ========== Site identity Tabs =========== */
    $wp_customize->add_setting(
        'wallstreet_site_identity_tabs', array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(new Wallstreet_Customize_Control_Tabs($wp_customize, 'wallstreet_site_identity_tabs', array(
        'section' => 'title_tagline',
        'tabs'    => array(
            'general'    => array(
                'nicename' => esc_html__( 'General', 'wallstreet' ),
                'controls' => array(
                    'custom_logo',
                    'blogname',
                    'blogdescription',
                    'header_text',
                    'display_site_title',
                    'wallstreet_pro_options-display_site_title',
                    'wallstreet_pro_options-display_site_tagline',
                    'wallstreet_logo_length',
                    'logo_layout',
                    'site_icon'
                ),
            ),
            'style' => array(
                'nicename' => esc_html__( 'Style', 'wallstreet' ),
                'controls' => array(
                    'wallstreet_site_title_size',
                    'wallstreet_site_tagline_size',
                    'site_title_style',
                    'site_title_text_color',
                    'site_title_size',
                    'site_tagline_style',
                    'site_tagline_text_color',
                    'site_tagline_size',
                    
                ),
            ),
        ),
    )));


     /******************** Logo Length *******************************/
    
    $wp_customize->register_control_type('Wallstreet_Toggle_Control');

    $wp_customize->add_setting( 'wallstreet_logo_length',
            array(
                'default' => 154,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'wallstreet_logo_length',
        array(
            'label' => esc_html__( 'Logo Width', 'wallstreet'  ),
            'priority' => 50,
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )
    ) );


    $wp_customize->add_setting('wallstreet_pro_options[display_site_title]',
        array(
            'default' => true,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            'type' => 'option',
            )
    );

    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'wallstreet_pro_options[display_site_title]',
        array(
            'label'    => esc_html__( 'Display Site Title', 'wallstreet'  ),
            'section'  => 'title_tagline',
            'type'     => 'toggle',
            'priority' => 45,
            'active_callback' => 'wallstreet_header_text_choice',
        )
    ));

    $wp_customize->add_setting('wallstreet_pro_options[display_site_tagline]',
        array(
            'default' => true,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            'type' => 'option',
            )
    );

    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'wallstreet_pro_options[display_site_tagline]',
        array(
            'label'    => esc_html__( 'Display Site Tagline', 'wallstreet'  ),
            'section'  => 'title_tagline',
            'type'     => 'toggle',
            'priority' => 45,
            'active_callback' => 'wallstreet_header_text_choice',
        )
    ));

    $theme_name = wp_get_theme();
    if($theme_name == 'Bluestreet' || $theme_name == 'Wallstreet Agency' ) {
        $default_layout = 'top-logo-title-tagline';
    }
    else{
        $default_layout = 'logo-title-tagline';
    }

    $wp_customize->add_setting( 'logo_layout',
    array(
        'default'           => $default_layout,
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'wallstreet_sanitize_select'
    )
    );

    $wp_customize->add_control( new Wallstreet_Image_Radio_Button_Custom_Control( $wp_customize, 'logo_layout',
        array(
            'label' => esc_html__( 'Logo Layout', 'wallstreet'  ),
            'section' => 'title_tagline',
            'priority'  => 50,
            'choices' => array(
                'logo-title-tagline' => array( 
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/logo-title-tagline.png',
                ),
                'title-tagline-logo' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/title-tagline-logo.png',
                ),
                'top-logo-title-tagline' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/top logo-title-tagline.png',
                ),
                'top-title-tagline-logo' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/top title-tagline-logo.png',
                )
            )
        )
    ) );


  /******************** Site identity style control *******************************/

    class Wallstreet_WP_Sitetitle_Customize_Control extends WP_Customize_Control {

    public $type = 'new_menu';

        /**
         * Render the control's content.
         */
        public function render_content() {
            ?>
            <h3><?php esc_html_e('Site Title', 'wallstreet'); ?></h3>
            <?php
        }

    }

    $wp_customize->add_setting(
            'site_title_style',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );

    $wp_customize->add_control(new Wallstreet_WP_Sitetitle_Customize_Control($wp_customize, 'site_title_style', array(
                'section' => 'title_tagline',
                'setting' => 'site_title_style',
                'priority' => 30,
                    ))
    );



    if($theme_name == 'Leo') {
        $default_color = '#2a2c33';
    }
    else{
        $default_color = '#ffffff';
    }


    //Site title text color
    $wp_customize->add_setting('site_title_text_color', array(
        'default' => $default_color,
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_title_text_color', array(
                'label' => esc_html__('Color', 'wallstreet'),
                'section' => 'title_tagline',
                'settings' => 'site_title_text_color',
                'priority' => 30,
            )
    ));



    $wp_customize->add_setting( 'site_title_size',
        array(
            'default' => 38,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'site_title_size',
        array(
            'label' => esc_html__('Font Size (px)', 'wallstreet'),
            'priority' => 30,
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 8,
                'max' => 100,
                'step' => 1,
            ),
        )
    ) );




    /*for tagline*/

       
    class Wallstreet_WP_Sitetagline_Customize_Control extends WP_Customize_Control {

    public $type = 'new_menu';

        /**
         * Render the control's content.
         */
        public function render_content() {
            ?>
            <h3><?php esc_html_e('Site Tagline', 'wallstreet'); ?></h3>
            <?php
        }

    }

    $wp_customize->add_setting(
            'site_tagline_style',
            array(
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            )
    );

    $wp_customize->add_control(new Wallstreet_WP_Sitetagline_Customize_Control($wp_customize, 'site_tagline_style', array(
                'section' => 'title_tagline',
                'setting' => 'site_tagline_style',
                'priority' => 50,
                    ))
    );


    //Site tagline text color
    $wp_customize->add_setting('site_tagline_text_color', array(
        'default' => $default_color,
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_tagline_text_color', array(
                'label' => esc_html__('Color', 'wallstreet'),
                'section' => 'title_tagline',
                'settings' => 'site_tagline_text_color',
                'priority' => 50,
            )
    ));



    $wp_customize->add_setting( 'site_tagline_size',
        array(
            'default' => 14,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'site_tagline_size',
        array(
            'label' => esc_html__('Font Size (px)', 'wallstreet'),
            'priority' => 50,
            'section' => 'title_tagline',
            'input_attrs' => array(
                'min' => 5,
                'max' => 100,
                'step' => 1,
            ),
        )
    ) );

}
add_action('customize_register', 'wallstreet_header_option');

// callback function for the site title & tagline setting
function wallstreet_header_text_choice($control) {
            if (false == $control->manager->get_setting('header_text')->value()) {
                return false;
            } else {
                return true;
            }
}
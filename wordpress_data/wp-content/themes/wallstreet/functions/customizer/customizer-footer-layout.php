<?php
function wallstreet_footer_layout($wp_customize) {

     /* ========== Footer setting Tabs =========== */
    $theme_name = wp_get_theme();

    $wp_customize->add_setting(
        'wallstreet_footer_identity_tabs', array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(new Wallstreet_Customize_Control_Tabs($wp_customize, 'wallstreet_footer_identity_tabs', array(
        'section' => 'wallstreet_footer_section',
        'tabs'    => array(
            'general'    => array(
                'nicename' => esc_html__( 'General', 'wallstreet' ),
                'controls' => array(
                    'footer_layout',
                    'footer_container_width',

                ),
            ),
            'style' => array(
                'nicename' => esc_html__( 'Style', 'wallstreet' ),
                'controls' => array(
                    'footer_background_color',
                    'footer_widget_title_color',
                    'footer_widget_text_color',
                    'footer_link_color',
                    'footer_link_hover_color',
                    'footer_social_icon_color',
                    'footer_social_icon_hover_color',
                    'footer_top_divider',
                    'footer_top_divider_size',
                    'footer_top_divider_color',
                    'footer_divider',
                    'footer_divider_size',
                    'footer_divider_color',
                    'footer_copyright_text_color',
                    'footer_copyright_link_color',

                ),
            ),
        ),
    )));

    $wp_customize->add_section('wallstreet_footer_section',
        array(
            'title'     => esc_html__('Footer layout settings','wallstreet'),
            'panel' => 'wallstreet_copyright_setting',
        )
    );

    $wp_customize->add_setting( 'footer_layout',
        array(
            'default'           => '4',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'wallstreet_sanitize_select'
        )
    );

    $wp_customize->add_control( new Wallstreet_Image_Radio_Button_Custom_Control( $wp_customize, 'footer_layout',
        array(
            'label' => esc_html__( 'Footer widget Layout', 'wallstreet'  ),
             'priority' => 1,
            'section' => 'wallstreet_footer_section',
            'choices' => array(
                '1' => array( 
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/1.png',
                ),
                '2' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/2.png',
                ),
                '3' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/3.png',
                ),
                '4' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/4.png',
                )
            )
        )
    ) );

    //Container width
     $wp_customize->add_setting( 'footer_container_width',
        array(
            'default' => 1170,
            'transport' => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_container_width',
        array(
            'label'    => __( 'Footer Container Width', 'wallstreet' ),
            'priority' => 2,
            'section' => 'wallstreet_footer_section',
            'input_attrs' => array(
                'min' => 600,
                'max' => 1600,
                'step' => 1,),)
    ));
    
    if($theme_name == 'Leo' ) {
        $back_colr='#222222';
    }else{
        $back_colr='#373941';
    }

    //Footer background color
    $wp_customize->add_setting('footer_background_color', array(
        'default' => $back_colr,
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
        'label' => esc_html__('Footer Background Color', 'wallstreet'),
        'section' => 'wallstreet_footer_section',
        'priority' => 10,
            )
    ));

    //Widget title color
    $wp_customize->add_setting('footer_widget_title_color', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_title_color', array(
        'label'      => esc_html__('Widget Title Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
        )
    ) );

    $wp_customize->add_setting('footer_widget_text_color', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_widget_text_color', array(
        'label'      => esc_html__('Widget Text Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
        )
    ) );

    //link  color
    $wp_customize->add_setting('footer_link_color', array(
    'default' => '#e5e5e5',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_link_color', array(
        'label'      => esc_html__('Widget Link  Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
       )
    ) );

    if($theme_name == 'Leo' ) {
        $link_colr='#88be4c';
    }
    elseif($theme_name == 'Bluestreet' ) {
        $link_colr='#22a1c4';
    }elseif($theme_name == 'Wallstreet Agency' ) {
        $link_colr='#FF8A00';
    }
    else{
         $link_colr='#00c2a9';
    }

    //link hover color
    $wp_customize->add_setting('footer_link_hover_color', array(
    'default' => $link_colr,
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_link_hover_color', array(
        'label'      => esc_html__('Widget Link Hover Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
       )
    ) );

    //Social icon  color
    $wp_customize->add_setting('footer_social_icon_color', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_social_icon_color', array(
        'label'      => esc_html__('Social Icon Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
       )
    ) );

    // Social icon hover color
    $wp_customize->add_setting('footer_social_icon_hover_color', array(
    'default' => '#cbcbcb',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_social_icon_hover_color', array(
        'label'      => esc_html__('Social Icon Hover Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
       )
    ) );

    $wp_customize->add_setting('footer_top_divider',
        array(
            'default' => true,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            )
    );

    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'footer_top_divider',
        array(
            'label' => __('Enable/Disable Top Divider','wallstreet'),
            'section'  => 'wallstreet_footer_section',
            'type'     => 'toggle',
        )
    ));

     $wp_customize->add_setting( 'footer_top_divider_size',
        array(
            'default' => 1,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_top_divider_size',
        array(
            'label' => esc_html__('Top Divider Size (px)', 'wallstreet'),
            'section' => 'wallstreet_footer_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 50,
                'step' => 1,
            ),
        )
    ) );

    $wp_customize->add_setting('footer_top_divider_color', array(
    'default' => '#575963',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_top_divider_color', array(
        'label'      => esc_html__('Top Divider Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
       )
    ) );


     $wp_customize->add_setting('footer_divider',
        array(
            'default' => true,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            )
    );

    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'footer_divider',
        array(
            'label' => __('Enable/Disable Bottom Divider','wallstreet'),
            'section'  => 'wallstreet_footer_section',
            'type'     => 'toggle',
        )
    ));

     $wp_customize->add_setting( 'footer_divider_size',
        array(
            'default' => 1,
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'footer_divider_size',
        array(
            'label' => esc_html__('Bottom Divider Size (px)', 'wallstreet'),
            'section' => 'wallstreet_footer_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 50,
                'step' => 1,
            ),
        )
    ) );

    $wp_customize->add_setting('footer_divider_color', array(
    'default' => '#575963',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_divider_color', array(
        'label'      => esc_html__('Bottom Divider Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
       )
    ) );

    $wp_customize->add_setting('footer_copyright_text_color', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_copyright_text_color', array(
        'label'      => esc_html__('Copyright Text Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
        )
    ) );

    $wp_customize->add_setting('footer_copyright_link_color', array(
        'default' => $link_colr,
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'footer_copyright_link_color', array(
        'label'      => esc_html__('Copyright Link Color', 'wallstreet' ),
        'section'    => 'wallstreet_footer_section',
        )
    ) );
    
}
add_action('customize_register', 'wallstreet_footer_layout');
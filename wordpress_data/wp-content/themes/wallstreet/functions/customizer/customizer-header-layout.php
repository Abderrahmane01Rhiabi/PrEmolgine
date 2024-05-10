<?php
function wallstreet_header_layout($wp_customize) {
     /* ========== Header setting Tabs =========== */
    $wp_customize->add_setting(
        'wallstreet_header_identity_tabs', array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(new Wallstreet_Customize_Control_Tabs($wp_customize, 'wallstreet_header_identity_tabs', array(
        'section' => 'wallstreet_header_section',
        'tabs'    => array(
            'general'    => array(
                'nicename' => esc_html__( 'General', 'wallstreet' ),
                'controls' => array(
                    'header_layout',
                    'header_container_width',
                    'wallstreet_pro_options-enable_search_btn',
                    'wallstreet_pro_options-enable_cart_btn'
                ),
            ),
            'style' => array(
                'nicename' => esc_html__( 'Style', 'wallstreet' ),
                'controls' => array(
                    'header_background_color',
                    'menus_color',
                    'menus_link_color',
                    'menus_link_hover_color',
                    'menus_link_active_color',
                    'submenus_color',
                    'submenus_background_color',
                    'submenus_link_color',
                    'submenus_link_hover_color',
                ),
            ),
        ),
    )));
    $wp_customize->add_section('wallstreet_header_section',
        array(
            'title'     => esc_html__('Header Settings','wallstreet'),
            'priority'  => 21
        )
    );
    $wp_customize->add_setting( 'header_layout',
        array(
            'default'           => 'default',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'wallstreet_sanitize_select'
        )
    );
    $wp_customize->add_control( new Wallstreet_Image_Radio_Button_Custom_Control( $wp_customize, 'header_layout',
        array(
            'label' => esc_html__( 'Header Layout', 'wallstreet'  ),
             'priority' => 1,
            'section' => 'wallstreet_header_section',
            'choices' => array(
                'default' => array( 
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/default.png',
                ),
                'standard' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/standard.png',
                ),
                'center' => array(
                    'image' => trailingslashit( get_template_directory_uri() ) . 'images/center.png',
                )
            )
        )
    ) );
    //Container width
     $wp_customize->add_setting( 'header_container_width',
        array(
            'default' => 1170,
            'transport' => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Wallstreet_Slider_Custom_Control( $wp_customize, 'header_container_width',
        array(
            'label'    => __( 'Header Container Width', 'wallstreet' ),
            'priority' => 2,
            'section' => 'wallstreet_header_section',
            'input_attrs' => array(
                'min' => 600,
                'max' => 1600,
                'step' => 1,),)
    ));
    $wp_customize->add_setting('wallstreet_pro_options[enable_search_btn]',
        array(
            'default' => false,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            'type' => 'option',
            )
    );
    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'wallstreet_pro_options[enable_search_btn]',
        array(
            'label' => __('Enable/Disable Search Icon','wallstreet'),
            'section'  => 'wallstreet_header_section',
            'type'     => 'toggle',
            'priority' => 45,
        )
    ));
    $wp_customize->add_setting('wallstreet_pro_options[enable_cart_btn]',
        array(
            'default' => true,
            'sanitize_callback' => 'wallstreet_sanitize_checkbox',
            'type' => 'option',
            )
    );
    $wp_customize->add_control(new Wallstreet_Toggle_Control( $wp_customize, 'wallstreet_pro_options[enable_cart_btn]',
        array(
            'label' => __('Enable/Disable Cart Icon','wallstreet'),
            'section'  => 'wallstreet_header_section',
            'type'     => 'toggle',
            'priority' => 45,
        )
    ));
    //Header background color
    $wp_customize->add_setting('header_background_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label' => esc_html__('Header Background Color', 'wallstreet'),
        'description' => esc_html__('This setting does not work in the default header overlay layout.', 'wallstreet'),
        'section' => 'wallstreet_header_section',
        'priority' => 10,
            )
    ));

    class Wallstreet_Menus_Color_Customize_Control extends WP_Customize_Control {
        public $type = 'pri_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
         <h3><?php esc_html_e('Menus','wallstreet'); ?></h3>
        <?php
        }
    }

    $wp_customize->add_setting(
        'menus_color',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( new Wallstreet_Menus_Color_Customize_Control( $wp_customize, 'menus_color', array(
            'section' => 'wallstreet_header_section',
            'setting' => 'menus_color',
        ))
    );

    //Menus text/link color
    $wp_customize->add_setting('menus_link_color', array(
    'default' => '#fff',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_color', array(
        'label'      => esc_html__('Text/Link Color', 'wallstreet' ),
        'section'    => 'wallstreet_header_section',
        'settings'   => 'menus_link_color',)
    ) );

    //Menus text/link hover color
    $wp_customize->add_setting('menus_link_hover_color', array(
    'default' => '#00c2a9',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_hover_color', array(
        'label'      => esc_html__('Hover Color', 'wallstreet' ),
        'section'    => 'wallstreet_header_section',
        'settings'   => 'menus_link_hover_color',)
    ) );

    //Menus text/link active color
    $wp_customize->add_setting('menus_link_active_color', array(
    'default' => '#fff',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'menus_link_active_color', array(
        'label'      => esc_html__('Active Link Color', 'wallstreet' ),
        'section'    => 'wallstreet_header_section',
        'settings'   => 'menus_link_active_color',)
    ) );


    class Wallstreet_Submenus_Color_Customize_Control extends WP_Customize_Control {
        public $type = 'pri_sub_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
         <h3><?php esc_html_e('Submenus','wallstreet'); ?></h3>
        <?php
        }
    }

    $wp_customize->add_setting(
        'submenus_color',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( new Wallstreet_Submenus_Color_Customize_Control( $wp_customize, 'submenus_color', array(
            'section' => 'wallstreet_header_section',
            'setting' => 'submenus_color',
        ))
    );

    //Submenus Background color
    $wp_customize->add_setting('submenus_background_color', array(
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_background_color', array(
        'label'      => esc_html__('Background Color', 'wallstreet' ),
        'section'    => 'wallstreet_header_section',
        'settings'   => 'submenus_background_color',)
    ) );

    //Submenus text/link color
    $wp_customize->add_setting('submenus_link_color', array(
    'default' => '#fff',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_link_color', array(
        'label'      => esc_html__('Text/Link Color', 'wallstreet' ),
        'section'    => 'wallstreet_header_section',
        'settings'   => 'submenus_link_color',)
    ) );

    //Submenus text/link hover color
    $wp_customize->add_setting('submenus_link_hover_color', array(
    'default' => '#00c2a9',
    'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'submenus_link_hover_color', array(
        'label'      => esc_html__('Link Hover Color', 'wallstreet' ),
        'section'    => 'wallstreet_header_section',
        'settings'   => 'submenus_link_hover_color',)
    ) );
    
}
add_action('customize_register', 'wallstreet_header_layout');
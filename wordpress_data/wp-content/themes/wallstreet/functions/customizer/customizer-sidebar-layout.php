<?php
function wallstreet_sidebar_layout($wp_customize) {

/******************** Sidebar Layouts *******************************/
	$wp_customize->add_section('sidebar_layout_setting_section',
        array(
            'title' =>esc_html__('Sidebar Layout Settings','wallstreet' ),
             'priority'  => 120
		)
    );
    // Blog/Archive sidebar layout
    $wp_customize->add_setting( 'blog_sidebar_layout',
		array(
			'default'           => 'right',
	        'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wallstreet_sanitize_select'
		)
	);
	$wp_customize->add_control( new wallstreet_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_sidebar_layout',
		array(
			'label' => esc_html__( 'Blog/Archives', 'wallstreet'  ),
			'section' => 'sidebar_layout_setting_section',
			'priority'  => 1,
			'choices' => array(
				'right' => array( 
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/right.jpg',
				),
				'left' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/left.jpg',
				),
				'full' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/full.jpg',
				),
				'stretched' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/stretched.jpg',
				)
			)
		)
	) );

	// Single post sidebar layout
    $wp_customize->add_setting( 'single_post_sidebar_layout',
		array(
			'default'           => 'right',
	        'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wallstreet_sanitize_select'
		)
	);
	$wp_customize->add_control( new wallstreet_Image_Radio_Button_Custom_Control( $wp_customize, 'single_post_sidebar_layout',
		array(
			'label' => esc_html__( 'Single Post', 'wallstreet' ),
			'section' => 'sidebar_layout_setting_section',
			'priority'  => 2,
			'choices' => array(
				'right' => array( 
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/right.jpg',
				),
				'left' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/left.jpg',
				),
				'full' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/full.jpg',
				),
				'stretched' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/stretched.jpg',
				)
			)
		)
	) );

	// Page sidebar layout
    $wp_customize->add_setting( 'page_sidebar_layout',
		array(
			'default'           => 'right',
	        'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wallstreet_sanitize_select'
		)
	);
	$wp_customize->add_control( new wallstreet_Image_Radio_Button_Custom_Control( $wp_customize, 'page_sidebar_layout',
		array(
			'label' => esc_html__( 'Page', 'wallstreet'  ),
			'section' => 'sidebar_layout_setting_section',
			'priority'  => 3,
			'choices' => array(
				'right' => array( 
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/right.jpg',
				),
				'left' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/left.jpg',
				),
				'full' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/full.jpg',
				),
				'stretched' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'images/stretched.jpg',
				)
			)
		)
	) );

}
add_action('customize_register', 'wallstreet_sidebar_layout');
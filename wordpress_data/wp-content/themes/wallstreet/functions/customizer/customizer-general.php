<?php
function wallstreet_general_customizer($wp_customize) {
    /* General Section */
$wp_customize->add_section('bredcrumb_section',
		array(
			'title'     =>  esc_html__('Breadcrumb Settings','wallstreet'),
			'priority'  =>  22  
		)
	);
	//Breadcrumbs Type 
	$wp_customize->add_setting(
	'wallstreet_breadcrumb_type',
	array(
	'default'           =>  'default',
	'capability'        =>  'edit_theme_options',
	'sanitize_callback' =>  'wallstreet_sanitize_select',
	));
	$wp_customize->add_control('wallstreet_breadcrumb_type', array(
	'label' => esc_html__('Breadcrumb type','wallstreet'),
	'description' => esc_html__( 'If you use other than "default" one you will need to install and activate respective plugins','wallstreet') . '<b> Breadcrumb NavXT, Yoast SEO </b>' . __('and','wallstreet') . '<b> Rank Math SEO</b>',
	'section' => 'bredcrumb_section',
	'setting' => 'wallstreet_breadcrumb_type',
	'type'    =>  'select',
	'priority' => 1,
	'choices' =>  array(
		'default' => __('Default', 'wallstreet'),
		'yoast'  => 'Yoast SEO',
		'rankmath'  => 'Rank Math',
		'navxt'  => 'NavXT'
		)
	));
}
add_action('customize_register', 'wallstreet_general_customizer');
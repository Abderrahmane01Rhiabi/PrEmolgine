<?php

// Template Name: Home Page

get_header();
$wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() );?>
<div tabindex = "0" id="content"></div>
	<?php
	$wallstreet_theme = wp_get_theme();
	if( ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child') && (get_theme_mod('wallstreet_theme_mode','advance_mode') == 'advance_mode') && (get_option('wallstreet_user', 'new_user') == 'new_user') ) {
		get_template_part('index');
	}
	elseif( ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child') && (get_theme_mod('wallstreet_theme_mode','legacy_mode') == 'legacy_mode') && (get_option('wallstreet_user', 'new_user') == 'new_user') ) {
		do_action('wallstreet_sections', false);

			//****** get index blog  ********
			if ($wallstreet_current_options['blog_section_enabled'] ==true) {
			    get_template_part('index', 'blog');
			}
	}
	elseif( ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child') && (get_theme_mod('wallstreet_theme_mode','legacy_mode') == 'legacy_mode') && (get_option('wallstreet_user', 'new') == 'new') ) {
		do_action('wallstreet_sections', false);

			//****** get index blog  ********
			if ($wallstreet_current_options['blog_section_enabled'] ==true) {
			    get_template_part('index', 'blog');
			}
	}
	elseif( ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child') && (get_theme_mod('wallstreet_theme_mode','legacy_mode') == 'legacy_mode') && (get_option('wallstreet_user', 'old') == 'old') ) {
		do_action('wallstreet_sections', false);

			//****** get index blog  ********
			if ($wallstreet_current_options['blog_section_enabled'] ==true) {
			    get_template_part('index', 'blog');
			}
	}
	elseif( ($wallstreet_theme->name == 'Bluestreet') || ($wallstreet_theme->name == 'Leo') || ($wallstreet_theme->name == 'Wallstreet Agency') ) {
		do_action('wallstreet_sections', false);

			//****** get index blog  ********
			if ($wallstreet_current_options['blog_section_enabled'] ==true) {
			    get_template_part('index', 'blog');
			}
	}
	else
	{
		get_template_part('index');
	}
get_footer();
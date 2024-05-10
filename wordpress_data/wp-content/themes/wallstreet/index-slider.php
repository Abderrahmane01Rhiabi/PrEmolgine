<?php
/**
 * Static banner section for the frontpage.
 */

$wallstreet_pro_options=wallstreet_theme_data_setup();
$wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), $wallstreet_pro_options );
$wallstreet_theme = wp_get_theme();
if($wallstreet_current_options['slider_image']=='slider' &&  $wallstreet_theme->name == 'Wallstreet' || $wallstreet_current_options['slider_image']=='slider' &&  $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_current_options['slider_image']=='slider' &&  $wallstreet_theme->name == 'Wallstreet Child'){
	$wallstreet_current_options['slider_image']= WC__PLUGIN_URL .'/inc/wallstreet/images/slider/slider.jpg';
}

if( ($wallstreet_current_options['home_banner_enabled'] == true) && ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet Child' || $wallstreet_theme->name == 'Wallstreet child') ) {

	if(get_theme_mod('wallstree_front_header_type', 'banner') == 'banner'){ ?>

	<div class="homepage_mycarousel">
		<div class="static-banner" style="background-image:url(<?php echo esc_url($wallstreet_current_options['slider_image']); ?>);width: 100%; height: 90vh; background-position: center center; background-size: cover; z-index: 0;">
			<div class="flex-slider-center">
			<?php if($wallstreet_current_options['slider_title_one']){ ?>
				<div class="slide-text-bg1"><h2><?php echo esc_html($wallstreet_current_options['slider_title_one']); ?></h2></div>
				<?php } ?>
				<?php if($wallstreet_current_options['slider_title_two']){ ?>
				<div class="slide-text-bg2"><h1><?php echo esc_html($wallstreet_current_options['slider_title_two']); ?></h1></div>
				<?php } ?>
				<?php if($wallstreet_current_options['slider_description']) { ?>
				<div class="slide-text-bg3"><p><?php echo esc_html($wallstreet_current_options['slider_description']); ?></p></div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php
}                       
elseif(get_theme_mod('wallstree_front_header_type', 'image') == 'slider'){ 
	$wallstreet_slider_shortcode= get_theme_mod('wallstreet_post_slider_shortcode' );?>
<div class="homepage_mycarousel">
	<?php
 echo do_shortcode($wallstreet_slider_shortcode);  ?>
</div>
<?php
}
else{ ?>
<div class="homepage_mycarousel"></div>
<?php }
}
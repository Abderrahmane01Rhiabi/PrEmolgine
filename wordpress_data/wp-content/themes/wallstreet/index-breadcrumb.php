<?php 
if( get_theme_mod('wallstree_site_header_type', 'image') == 'image'){
?>
<div class="page-mycarousel">
	<img src="<?php echo esc_url(WALLSTREET_TEMPLATE_DIR_URI);?>/images/page-header-bg.jpg"  class="img-responsive">
	<div class="container page-title-col">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<?php
			 if ( class_exists( 'WooCommerce' ) ) {
			  if ( is_shop() || is_product_category() || is_product_tag() )  { ?>
					<h1><?php  echo esc_html(woocommerce_page_title() ); ?></h1>	
					<?php } else { ?>
					<h1><?php the_title(); ?></h1>
					<?php	
					}
			} else { ?>
				<h1><?php the_title(); ?></h1>	
			<?php } ?>	
			</div>	
		</div>
	</div>
	<div class="page-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumbs">
						<?php if (function_exists('wallstreet_custom_breadcrumbs')) wallstreet_custom_breadcrumbs();?>
					</ol>
				</div>
			</div>	
		</div>
	</div>
</div>
<?php }
else if(get_theme_mod('wallstree_site_header_type', 'image') == 'slider'){ 
$wallstreet_slider_shortcode= get_theme_mod('wallstreet_post_slider_shortcode' ); ?>
<div class="page-mycarousel">
	<?php
 echo do_shortcode($wallstreet_slider_shortcode);  ?>
</div>
<?php } 
else{ ?>
<div class="pageMycarousel"></div>
<?php }
?>
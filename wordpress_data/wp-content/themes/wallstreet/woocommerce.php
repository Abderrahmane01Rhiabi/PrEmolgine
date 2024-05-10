<?php get_header(); ?>
<!-- Page Title Section -->
<?php get_template_part('index', 'breadcrumb'); ?>
<!-- /Page Title Section -->
<!-- Blog & Sidebar Section -->

<?php
if((get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true )=='wallstreet_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) {
    $wallstreet_page_class='stretched';   
}
else {
    $wallstreet_page_class='';
}
if(get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true ) =='') {
    if((get_theme_mod('page_sidebar_layout','right')=='right') || get_theme_mod('page_sidebar_layout','right')=='left')
    {
        $page_column = '<div class="col-lg-8 col-md-8 col-sm-12">';
    }
    else
    {
        $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
    }
}
else if(get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_left') {  
    $page_column = '<div class="col-lg-8 col-md-8 col-sm-12">';
}
else if(get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_right') {
    $page_column = '<div class="col-lg-8 col-md-8 col-sm-12">';
}
else if(get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_without_sidebar') {
    $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
}
else {
    $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
}
?>
<div class="container <?php echo esc_attr($wallstreet_page_class);?>" id="content">
	<div class="row">		
		<!--Blog Area-->
		<?php
		if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true )== '') || get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true )=='wallstreet_site_layout_left') {
                if (is_active_sidebar('woocommerce')) {
                    get_sidebar('woocommerce');
                }
            }
            echo  $page_column; ?>
				<div id="post-<?php the_ID(); ?>">
					<?php woocommerce_content(); ?>
				</div>	
			</div>
			<!--/End of Blog Detail-->

			<?php
            if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true )=='') || get_post_meta(wc_get_page_id('shop'),'wallstreet_site_layout', true )=='wallstreet_site_layout_right') {
                if (is_active_sidebar('woocommerce')) {
                    get_sidebar('woocommerce');
                }
            }
            ?>
		
	</div>	
</div>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer();
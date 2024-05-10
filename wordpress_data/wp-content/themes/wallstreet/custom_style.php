<?php
// Typography
$wallstreet_enable_header_typography        = get_theme_mod('enable_header_typography',false);
$wallstreet_enable_banner_typography        = get_theme_mod('enable_banner_typography',false);
$wallstreet_enable_slider_typography        = get_theme_mod('enable_slider_typography',false);
$wallstreet_enable_homepage_typography      = get_theme_mod('enable_homepage_typography',false);
$wallstreet_enable_content_typography       = get_theme_mod('enable_content_typography',false);
$wallstreet_enable_post_typography          = get_theme_mod('enable_post_typography',false);
$wallstreet_enable_shop_page_typography     = get_theme_mod('enable_shop_page_typography',false);
$wallstreet_enable_sidebar_typography       = get_theme_mod('enable_sidebar_typography',false);
$wallstreet_enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography',false);


/* Site title and tagline */
if($wallstreet_enable_header_typography == true) { ?>
		<style>
		body .navbar-header .wallstreet_title_head {
				font-size: <?php echo intval( get_theme_mod('site_title_size', '38') ) . 'px'; ?> ;
				font-family:<?php echo esc_attr(get_theme_mod('site_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('site_title_line_height','25')).'px'; ?>;
		}
		body .navbar-header .site-description {
				font-size: <?php echo intval( get_theme_mod('site_tagline_size', '14') ) . 'px'; ?> ;
				font-family:<?php echo esc_attr(get_theme_mod('site_tagline_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('tagline_line_height','25')).'px'; ?>;
		}
		body .navbar .navbar-nav > li > a {
				font-size: <?php echo intval( get_theme_mod('menus_size', '16') ) . 'px'; ?> ;
				font-family:<?php echo esc_attr(get_theme_mod('menu_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('menu_line_height','20')).'px'; ?>;
		}
		body .dropdown-menu > li > a{
				font-size: <?php echo intval( get_theme_mod('submenus_size', '15') ) . 'px'; ?> ;
				font-family:<?php echo esc_attr(get_theme_mod('submenu_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('submenu_line_height','20')).'px'; ?>;
		}
		</style>
<?php }
/* Breadcrumb Section */
if($wallstreet_enable_banner_typography == true) { ?>
		<style>
		body .page-title-col h1 {
				font-size:<?php echo intval(get_theme_mod('banner_title_fontsize','50')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('banner_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('banner_line_height','65')).'px'; ?>;
		}
		body .breadcrumbs > li, body .breadcrumbs, body ol.breadcrumbs   {
				font-size:<?php echo intval(get_theme_mod('breadcrumb_title_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('breadcrumb_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('breadcrumb_line_height','20')).'px'; ?>;
		}
		</style>
<?php }
/* Slider Section */
if($wallstreet_enable_slider_typography == true) { ?>
		<style>
		body .slide-text-bg1 h2 {
				font-size:<?php echo intval(get_theme_mod('slider_title_fontsize','60')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('slider_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('slider_line_height','65')).'px'; ?>;
		}
		body .slide-text-bg2 h1 {
				font-size:<?php echo intval(get_theme_mod('slider_subtitle_fontsize','80')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('slider_subtitle_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('slider_subtitle_line_height','80')).'px'; ?>;
		}
		</style>
<?php }
/* Homepage Sections title and description */
if($wallstreet_enable_homepage_typography == true) { ?>
		<style>
		body .section_heading_title h1 {
				font-size:<?php echo intval(get_theme_mod('homepage_title_fontsize','36')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('homepage_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('homepage_title_line_height','42')).'px'; ?>;
		}
		body .section_heading_title p {
				font-size:<?php echo intval(get_theme_mod('homepage_description_fontsize','20')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('homepage_description_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('homepage_description_line_height','25')).'px'; ?>;
		}
		</style>
<?php }
/* Headings (h1,h2, h3, h4,h5, h6), paragraph and button */
if($wallstreet_enable_content_typography == true) { ?>
		<style>
		/* Heading H1 */
		body .blog-post-title > .blog-post-title-wrapper > h1, h1.page-title {
				font-size:<?php echo intval(get_theme_mod('h1_typography_fontsize','36')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('h1_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('h1_line_height','40')).'px'; ?>;
		}
		/* Heading H2 */
		body .blog-post-title > .blog-post-title-wrapper > h2, body .service-area h2, body .home-blog-area .home-blog-info h2  {
				font-size:<?php echo intval(get_theme_mod('h2_typography_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('h2_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('h2_line_height','30')).'px'; ?>;
		}
		/* Heading H3 */
		body .blog-post-title > .blog-post-title-wrapper > h3, body .comment-title h3{
				font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('h3_line_height','30')).'px'; ?>;
		}
		/* Heading H4 */
		body .blog-post-title > .blog-post-title-wrapper > h4, body .comment_box h4, body .home-portfolio-showcase .home-portfolio-showcase-detail h4 {
				font-size:<?php echo intval(get_theme_mod('h4_typography_fontsize','20')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('h4_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('h4_line_height','25')).'px'; ?>;
		}
		/* Heading H5 */
		body .blog-post-title > .blog-post-title-wrapper > h5 {
				font-size:<?php echo intval(get_theme_mod('h5_typography_fontsize','16')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('h5_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('h5_line_height','20')).'px'; ?>;
		}
		/* Heading H6 */
		body .blog-post-title > .blog-post-title-wrapper > h6,body .blog-author h6{
				font-size:<?php echo intval(get_theme_mod('h6_typography_fontsize','14')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('h6_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('h6_line_height','20')).'px'; ?>;
		}
		/* Paragraph */
		body .slide-text-bg3 p, body .service-area p, body .home-blog-description p, body .blog-post-title-wrapper p, body .comment-detail p, body .comment-form-section p, body .blog-post-title-wrapper-full p,body.woocommerce p:not(.footer_section p,.sidebar-widget p), body .home-portfolio-showcase .home-portfolio-showcase-detail p {
				font-size:<?php echo intval(get_theme_mod('p_typography_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('p_line_height','25')).'px'; ?>;
		}
		/* Button text */
		body .home-blog-btn a, body .blog-post-title .wp-block-button__link, .woocommerce a.button.add_to_cart_button, body a.more-link, body input[type="submit"],body a.blog-btn,body #blogdetail_btn{
				font-size:<?php echo intval(get_theme_mod('button_text_typography_fontsize','16')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('button_text_typography_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('button_line_height','25')).'px'; ?>;
		}
		</style>
<?php }
/* Blog Page/Archive/Single Post */
if($wallstreet_enable_post_typography == true) { ?>
		<style>
		body.blog .blog-post-title .blog-post-title-wrapper h2, body.archive .blog-post-title .blog-post-title-wrapper h2, body.single-post .blog-post-title .blog-post-title-wrapper h2 {
				font-size:<?php echo intval(get_theme_mod('post_title_fontsize','27')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('post_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('post_title_line_height','25')).'px'; ?>;
		}
		</style>
<?php }
/* Shop Page */
if($wallstreet_enable_shop_page_typography == true) { ?>
		<style>
		/* Shop Page H1 */
		body.woocommerce div.product .product_title{
			font-size:<?php echo intval(get_theme_mod('shop_h1_typography_fontsize','30')).'px'; ?>;
			font-family:<?php echo esc_attr(get_theme_mod('shop_h1_typography_fontfamily','Open Sans')); ?>;
		    line-height:<?php echo intval(get_theme_mod('shop_h1_line_height','36')).'px'; ?>;
		}

		/* Shop Page H2 */
		.woocommerce .products h2, .woocommerce .cart_totals h2, .woocommerce-Tabs-panel h2, .woocommerce .cross-sells h2, body #wrapper .cross-sells h2.woocommerce-loop-product__title,body .woocommerce-Tabs-panel h2{
			font-size:<?php echo intval(get_theme_mod('shop_h2_typography_fontsize','18')).'px'; ?> !important;
			font-family:<?php echo esc_attr(get_theme_mod('shop_h2_typography_fontfamily','Open Sans')); ?> !important;
		    line-height:<?php echo intval(get_theme_mod('shop_h2_line_height','30')).'px'; ?> !important;
		}

		/* Shop Page H3 */
		 .woocommerce .checkout h3 {
			font-size:<?php echo intval(get_theme_mod('shop_h3_typography_fontsize','34')).'px'; ?> !important;
			font-family:<?php echo esc_attr(get_theme_mod('shop_h3_typography_fontfamily','Open Sans')); ?> !important;
		    line-height:<?php echo intval(get_theme_mod('shop_h3_line_height','42')).'px'; ?> !important;
		}
		</style>
<?php }
/* Blog Page/Archive/Single Post */
if($wallstreet_enable_sidebar_typography == true) { ?>
		<style>
		body .sidebar-widget-title h3, body .sidebar-widget .wp-block-search .wp-block-search__label,
		body .sidebar-widget .wc-block-product-search .wc-block-product-search__label, body .sidebar-widget h1, body .sidebar-widget h2, body .sidebar-widget h3, body .sidebar-widget h4, body .sidebar-widget h5, body .sidebar-widget h6  {
				font-size:<?php echo intval(get_theme_mod('sidebar_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('sidebar_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('sidebar_line_height','25')).'px'; ?>;
		}
		body .sidebar-widget p, body .sidebar-widget ul li, body .sidebar-widget ol li, body .sidebar-widget a,body .sidebar-widget .search_widget_input, body .sidebar-widget .wp-calendar-table, body .sidebar-widget > ul > li > a, body .sidebar-widget address, body .sidebar-widget ul li a:not(.sidebar-widget .wp-block-latest-posts__post-excerpt .slide-btn-area-sm a), body .sidebar-widget  .wp-block-latest-posts__post-excerpt .slide-text-bg2 span  {
				font-size:<?php echo intval(get_theme_mod('sidebar_widget_content_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('sidebar_widget_content_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('sidebar_widget_content_line_height','25')).'px'; ?>;
		}
		</style>
<?php }
/* Blog Page/Archive/Single Post */
if($wallstreet_enable_footer_widget_typography == true) { ?>
		<style>
		body .footer-widget-title, body .footer-widget-section .wp-block-search .wp-block-search__label,body .footer-widget-section .wc-block-product-search .wc-block-product-search__label, body .footer-widget-section h1, body .footer-widget-section h2, body .footer-widget-section h3, body .footer-widget-section h4, body .footer-widget-section h5, body .footer-widget-section h6  {
				font-size:<?php echo intval(get_theme_mod('footer_widget_title_fontsize','24')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('footer_widget_title_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('footer_widget_title_line_height','25')).'px'; ?>;
		}
		body .footer_section p:not(.footer-copyright p), body .footer_section ul li, body .footer_section ol li, body .footer_section a:not(.footer_section .wp-block-latest-posts__post-excerpt .slide-btn-area-sm a,.footer-copyright a), body .footer_section .footer-section, body .footer_section .wp-calendar-table, body .footer_section address, body .footer_section  .wp-block-latest-posts__post-excerpt .slide-text-bg2 span  {
				font-size:<?php echo intval(get_theme_mod('footer_widget_content_fontsize','15')).'px'; ?>;
				font-family:<?php echo esc_attr(get_theme_mod('footer_widget_content_fontfamily','Roboto')); ?>;
				line-height: <?php echo intval(get_theme_mod('footer_widget_content_line_height','25')).'px'; ?>;
		}
		</style>
<?php }?>

<style>
.custom-logo{width: <?php echo intval(get_theme_mod('wallstreet_logo_length',154));?>px; height: auto;}

body .navbar-header .wallstreet_title_head{
 	color: <?php echo esc_attr( get_theme_mod('site_title_text_color', '#ffffff') ); ?>;
}

body .navbar-header .site-description {
    color: <?php echo esc_attr( get_theme_mod('site_tagline_text_color', '#ffffff') ); ?>;
}
</style>
<?php
$wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() ); 
$wallstreet_theme_name = wp_get_theme();
if($wallstreet_theme_name == 'Wallstreet' || $wallstreet_theme_name == 'Wallstreet Child' || $wallstreet_theme_name == 'Wallstreet child' ) {

if(get_theme_mod('logo_layout','logo-title-tagline')=='logo-title-tagline' && get_theme_mod('header_layout','default')!='center' ) { ?>

<style>	
.logo-link-url { display: inline-block;padding:15px 15px 12px 15px;}
body .navbar-brand{margin-right: 0px;}
@media only screen and (min-width: 1100px){
	.navbar-header{
	display: flex;
	align-items: center;
	}
}
</style>
<?php } 

if(get_theme_mod('logo_layout','logo-title-tagline')=='title-tagline-logo' && get_theme_mod('header_layout','default')!='center') { ?>
<style>
.navbar-brand{ display: inline-block; }
.logo-link-url { display: inline-block;padding:15px 15px 12px 0px; float: left;}
.navbar > .container .navbar-brand {
    margin-right: 0px;
}
@media only screen and (min-width: 1100px){
	.navbar-header{
	display: flex;
	align-items: center;
}
}
@media only screen and (min-width: 200px) and (max-width: 480px){
.logo-link-url{
	float: none;
}
}
</style>
<?php } 
if(get_theme_mod('logo_layout','logo-title-tagline')=='top-logo-title-tagline' && get_theme_mod('header_layout','default')!='center' ) { ?>

<style>
.navbar .logo-link-url {display: block;clear: both;float: left;padding:4px 0px 8px 15px;}
.navbar .navbar-brand { display: inline-block;}
@media only screen and (max-width: 480px) and (min-width: 200px){
 .navbar .logo-link-url { float: none; text-align: center; }
}
</style>
<?php } 
if(get_theme_mod('logo_layout','logo-title-tagline')=='top-title-tagline-logo' && get_theme_mod('header_layout','default')!='center' ) {
	if(  (get_theme_mod('header_text')==true) && ( ( ($wallstreet_current_options['display_site_title'] ==true) || ($wallstreet_current_options['display_site_tagline'] == true) ))  ){ ?>

	<style>
	@media only screen and (min-width: 1023px){
	    body .navbar-brand {padding: 0 15px 25px 0;}
	}
	</style>
	<?php } ?>
	<style>
	@media only screen and (min-width: 1023px){
		.navbar .logo-link-url {
		   padding: 11px 0px;
		}
	}
	</style>
	<?php 
} 
if( get_theme_mod('header_layout','default')=='standard' ) { ?>
<style>
	body .navbar-wrapper { position: relative; }
	body .navbar.navbar-inverse{
	background-color: <?php echo esc_attr( get_theme_mod('header_background_color', '#000') ); ?>;	
}
</style>
<?php 
}

if( get_theme_mod('header_layout','default')=='center' ) { ?>
<style>
	.navbar.navbar5{
	background-color: <?php echo esc_attr( get_theme_mod('header_background_color', '#000') ); ?>;	
	}
	body .navbar .header-module{
		padding: 12px 0px;
	}
</style>
<?php 
 if( get_theme_mod('logo_layout','top-logo-title-tagline')=='logo-title-tagline' || get_theme_mod('logo_layout','top-logo-title-tagline')=='title-tagline-logo' ) { ?>
<style>
	body .index3 .logo-link-url {
		display: inline-block;
	}
	@media only screen and (min-width: 768px){
		body .navbar-header.index3{
			display: flex;
			align-items: center;
			justify-content: center;

		}
	}
</style>
<?php } 
if(get_theme_mod('logo_layout','top-logo-title-tagline')=='logo-title-tagline' ) { ?>
<style>
	@media only screen and (min-width: 768px){
		body .navbar-header.index3 .navbar-brand {
			margin-right: 20px;
		}
	}
</style>
<?php }

if(get_theme_mod('logo_layout','top-logo-title-tagline')=='title-tagline-logo' ) { ?>
<style>
	@media only screen and (min-width: 768px){
		body .navbar-header.index3 .navbar-brand {
			margin-left: 20px;
		}
	}
</style>
<?php }
}
?>
<style>
@media only screen and (min-width: 1200px){
.navbar .container{ width: <?php echo intval( get_theme_mod('header_container_width',1170));?>px; }
}
body .navbar .navbar-nav > li > a, body .navbar .navbar-nav > li > a:hover,body .navbar .navbar-nav > li > a:focus,
body .navbar .navbar-nav > .open > a, body .navbar .navbar-nav > .open > a:hover,body .navbar .navbar-nav > .open > a:focus,body .nav .active.open > a, body .nav .active.open > a:hover, body .nav .active.open > a:focus,body .search-box-outer a {
 	color: <?php echo esc_attr( get_theme_mod('menus_link_color', '#ffffff') ); ?>;
}
body .cart-header > a.cart-icon, body .cart-header > a.cart-total{
 	color: <?php echo esc_attr( get_theme_mod('menus_link_color', '#ffffff') ); ?>;
}
body .cart-header{
 	border-left-color: <?php echo esc_attr( get_theme_mod('menus_link_color', '#ffffff') ); ?>;
}
body .navbar .navbar-nav > li > a:hover, body .navbar .navbar-nav > li > a:focus, body .navbar .navbar-nav > .active > a:hover, body .navbar .navbar-nav > .active > a:focus, body .navbar .navbar-nav > .active > a, body .navbar .navbar-nav > .open > a, body .navbar .navbar-nav > .open > a:hover,body .navbar .navbar-nav > .open > a:focus, body .dropdown-menu > .active > a, body .dropdown-menu > .active > a:hover, body .dropdown-menu > .active > a:focus,
body .nav .active.open > a, body .nav .active.open > a:hover, body .nav .active.open > a:focus {
	background-color: <?php echo esc_attr( get_theme_mod('menus_link_hover_color', '#00c2a9') ); ?>;
}
body .navbar .navbar-nav > .active > a, body .navbar .navbar-nav > .active > a:hover, body .navbar .navbar-nav > .active > a:focus, body .dropdown-menu > .active > a, body .dropdown-menu > .active > a:hover, body .dropdown-menu > .active > a:focus {
	color: <?php echo esc_attr( get_theme_mod('menus_link_active_color', '#ffffff') ); ?>;
}
body .dropdown-menu > li > a{
	color: <?php echo esc_attr( get_theme_mod('submenus_link_color', '#ffffff') ); ?>;
}
body .dropdown-menu > li > a:hover,body .dropdown-menu > li > a:focus{
	color: <?php echo esc_attr( get_theme_mod('submenus_link_hover_color', '#00c2a9') ); ?>;
}
body .dropdown-menu{
	background-color: <?php echo esc_attr( get_theme_mod('submenus_background_color') ); ?>;
}

</style>
<?php
}
?>
<style>
@media only screen and (min-width: 1200px){
.footer_section .container{ width: <?php echo intval( get_theme_mod('footer_container_width',1170));?>px; }
}
body .footer_section {
    background-color:<?php echo esc_attr( get_theme_mod('footer_background_color') ); ?>;
}
body .footer-widget-section .wp-block-search .wp-block-search__label, body .footer-widget-section h1, body .footer-widget-section h2, body .footer-widget-section h3, body .footer-widget-section h4, body .footer-widget-section h5, body .footer-widget-section h6{
	color: <?php echo esc_attr( get_theme_mod('footer_widget_title_color', '#ffffff') ); ?>;
}
body .footer_section p {
    color:<?php echo esc_attr( get_theme_mod('footer_widget_text_color', '#ffffff') ); ?>;
}
body .footer-widget-section li a{
	color:<?php echo esc_attr( get_theme_mod('footer_link_color', '#e5e5e5') ); ?>;
}

body .footer_section .footer-copyright p{
	color:<?php echo esc_attr( get_theme_mod('footer_copyright_text_color', '#ffffff') ); ?>;
}

body .footer-social-icons li > a > i{
	color:<?php echo esc_attr( get_theme_mod('footer_social_icon_color', '#ffffff') ); ?>;
}
body .footer-social-icons li > a > i:hover{
	color:<?php echo esc_attr( get_theme_mod('footer_social_icon_hover_color', '#cbcbcb') ); ?>;
}
body .footer-widget-section li a:hover{
	color:<?php echo esc_attr( get_theme_mod('footer_link_hover_color') ); ?>;
}
body .footer-copyright p a{
	color:<?php echo esc_attr( get_theme_mod('footer_copyright_link_color') ); ?>;
}
</style>
<?php
if(get_theme_mod('footer_divider',true)==true ) { ?>
<style>
	.footer-copyright {
	 border-top: 1px solid;
	 border-top-color:<?php echo esc_attr( get_theme_mod('footer_divider_color', '#575963') ); ?>;
	 border-top-width:<?php echo intval( get_theme_mod('footer_divider_size', '1') ) . 'px'; ?> ;
	 }
</style>
<?php }
if(get_theme_mod('footer_top_divider',true)==true ) { ?>
<style>
	.footer-social-area { box-shadow: 0 7px 2px -6px #2A2C33; }
	.footer-social-icons {
	 	border-bottom: 1px solid; 
		border-bottom-color:<?php echo esc_attr( get_theme_mod('footer_top_divider_color', '#575963') ); ?>;
		border-bottom-width:<?php echo intval( get_theme_mod('footer_top_divider_size', '1') ) . 'px'; ?> ;
	 }
</style>
<?php } 


if(((get_theme_mod('blog_sidebar_layout','right')=='stretched')  && get_post_meta(get_option('page_for_posts', true),'wallstreet_site_layout', true ) == '') || (get_post_meta(get_option('page_for_posts', true),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_stretched')) { ?>
    <style>
        body.blog .container.stretched:not(.single-post .container.stretched) {
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
<?php 
}
if(get_theme_mod('blog_sidebar_layout','right')=='stretched' ) { ?>
    <style>
        body.archive .container.archive{
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
<?php }
if(((get_theme_mod('single_post_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == '') || ( get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) =='wallstreet_site_layout_stretched')) { ?>
    <style>
        body.single-post .container.stretched {
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
<?php }
if(((get_theme_mod('page_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='') || ( get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_stretched')) { ?>
    <style>
        body.page .container.stretched, body.woocommerce-page .container.stretched{
            width: 100%;
            padding: 0;
            margin: 0;
        }
    </style>
<?php } ?>
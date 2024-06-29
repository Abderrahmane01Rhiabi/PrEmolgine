<!DOCTYPE html>
<html xmlns="<?php echo esc_url('http://www.w3.org/1999/xhtml')?>" <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php $wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() ); ?>
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
        <a class="skip-link wallstreet-screen-reader" href="#content"><?php esc_html_e( 'Skip to content', 'wallstreet' ); ?></a>
 <?php do_action('wallstreet_custom_header', false); ?>
        
<!--Header Logo & Menus-->
	<?php if( get_theme_mod('header_layout','default') =='center' ) { ?>
<div class="navbar navbar5 navbar-wrapper navbar-inverse navbar-static-top" role="navigation">
<?php } else{ ?>
	<div class="navbar navbar-wrapper navbar-inverse navbar-static-top" role="navigation">
<?php } ?>
    <div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<?php if( get_theme_mod('header_layout','default') =='center' ) { ?>
		<div class="navbar-header index3">
		<?php } else { ?>
		<div class="navbar-header">
		<?php } ?>
		<!-- logo -->
			<?php 
	        if($wallstreet_current_options['text_title'] ==false && $wallstreet_current_options['upload_image_logo']!='' && !(has_custom_logo()) )
	        { ?> 
	        	<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
	            	<img src="<?php echo esc_url($wallstreet_current_options['upload_image_logo']); ?>" style="height:<?php if($wallstreet_current_options['height']!='') { echo esc_attr($wallstreet_current_options['height']); }  else { "80"; } ?>px; width:<?php if($wallstreet_current_options['width']!='') { echo esc_attr($wallstreet_current_options['width']); }  else { "200"; } ?>px;" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
	            </a>
	            <?php
	        }   
			elseif(has_custom_logo() )
			{ 

				if( (get_theme_mod('logo_layout','logo-title-tagline') =='logo-title-tagline') || (get_theme_mod('logo_layout','logo-title-tagline') =='top-logo-title-tagline' ))

				{
				?>
				<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
					<?php
		            if ( has_custom_logo() ) 
		            {	
		            	$wallstreet_custom_logo_id = get_theme_mod( 'custom_logo' );
						$wallstreet_post_status=get_post_status ( $wallstreet_custom_logo_id );
						$wallstreet_logo_options = get_option('wallstreet_pro_options');
				        $wallstreet_logo_options['upload_image_logo'] = '';
				        update_option('wallstreet_pro_options', $wallstreet_logo_options);
						$wallstreet_image = wp_get_attachment_image_src( $wallstreet_custom_logo_id , 'full' );
						  
						 ?>
						 
				<img src="<?php echo esc_url($wallstreet_image[0]); ?>" class=" img-responsive custom-logo">
				
							
						<?php	}?>
						</a>
					<?php
				}
	        }
			if( get_theme_mod('header_text')==''|| get_theme_mod('header_text')=='1')
			{

				if( ( (get_option('blogname')!='') || (get_option('blogdescription')!='' ) ) && ( ($wallstreet_current_options['display_site_title'] ==true) || ($wallstreet_current_options['display_site_tagline'] == true) ))        
				{ ?>
	    			<div class="logo-link-url">
					<?php
	        		if(get_option('blogname')!='' && $wallstreet_current_options['display_site_title'] ==true ) {?>
	        			
	                    <h2 style="margin: 0px;"><a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="wallstreet_title_head">Emolgine (Version Dev 0.5)</div>
	        			</a></h2>

	            	<?php }

	            		$wallstreet_description = get_bloginfo( 'description', 'display' );
		            	if(get_option('blogdescription')!='' && $wallstreet_current_options['display_site_tagline'] ==true)
		            	{
		            		if ( $wallstreet_description || is_customize_preview() )
			                { ?>

		                	<p class="site-description"><?php echo $wallstreet_description; ?></p>
		                	<?php
		                	}
		                }
	         		?>
	        		</div>
	        		<?php
	        	} 
	    	}
	    	 
			if( (get_theme_mod('logo_layout','logo-title-tagline')=='title-tagline-logo') || (get_theme_mod('logo_layout','logo-title-tagline')=='top-title-tagline-logo') )
			{
			?>
				<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>">
					<?php
		            if ( has_custom_logo() ) 
		            {	
		            	$wallstreet_custom_logo_id = get_theme_mod( 'custom_logo' );
						$wallstreet_post_status=get_post_status ( $wallstreet_custom_logo_id );
						$wallstreet_logo_options = get_option('wallstreet_pro_options');
				        $wallstreet_logo_options['upload_image_logo'] = '';
				        update_option('wallstreet_pro_options', $wallstreet_logo_options);
						$wallstreet_image = wp_get_attachment_image_src( $wallstreet_custom_logo_id , 'full' );
						  
						 ?>
						 
					<img src="<?php echo esc_url($wallstreet_image[0]); ?>" class=" img-responsive custom-logo">
		
					<?php } ?>
				</a>
			<?php
			} 
			if( get_theme_mod('header_layout','default') =='center' ) { ?>
			</div>
		    <?php } ?>
			<!-- /logo -->
		  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php echo esc_html_e('Toggle navigation','wallstreet'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		  	</button>
		  <?php if( get_theme_mod('header_layout','default') !='center' ) { ?>
		</div>
		<?php } ?>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <?php 
         get_template_part('menu-search'); 
	
		
		?>
		</div><!-- /.navbar-collapse -->	 		
	</div>
</div>
<?php
if (function_exists('webriti_companion_activate') && is_front_page() && !is_page_template('template-homepage.php')) {require_once('index-slider.php');
}
?>
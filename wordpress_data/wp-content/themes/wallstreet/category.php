<?php get_header(); 
if( get_theme_mod('wallstree_site_header_type', 'image') == 'image'){ ?>
<!-- Page Title Section -->
<div class="page-mycarousel">
	<img src="<?php echo esc_url(WALLSTREET_TEMPLATE_DIR_URI);?>/images/page-header-bg.jpg"  class="img-responsive">
	<div class="container page-title-col">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1><?php echo single_cat_title("Category Archive ", false); ?></h1>		
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
elseif(get_theme_mod('wallstree_site_header_type', 'image') == 'slider'){ 
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
<!-- /Page Title Section -->

<!-- Blog & Sidebar Section -->
<div class="container category" id="content">
	<div class="row">

		<?php
		$wallstreet_page_sidebar = get_post_meta(get_option('page_for_posts', true),'wallstreet_page_sidebar', true );
		if($wallstreet_page_sidebar =='') { 
		    $wallstreet_page_sidebar = 'sidebar_primary';
		}

		 if(get_theme_mod('blog_sidebar_layout','right')=='left'):
                echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                    dynamic_sidebar($wallstreet_page_sidebar); 
                echo '</div></div>';
                endif; 
        
         if(get_theme_mod('blog_sidebar_layout','right')=='right'|| get_theme_mod('blog_sidebar_layout','right')=='left'):        
                echo '<div class="col-lg-8 col-md-8 col-sm-12">';
            else:
                echo '<div class="col-lg-12 col-md-12 col-sm-12">';   
            endif; ?>
            
			<?php if ( have_posts() ) { 
			while(have_posts()){ the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('blog-section-right'); ?>>
				<?php if(has_post_thumbnail()){ ?>
				<?php $wallstreet_defalt_arg =array('class' => "img-responsive"); ?>
				<div class="blog-post-img">
					<?php the_post_thumbnail('', $wallstreet_defalt_arg); ?>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="blog-post-title">
					<div class="blog-post-date"><span class="date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><?php echo esc_html(get_the_date());?></a></span>
						<span class="comment"><i class="fa fa-comment"></i><?php comments_number('0', '1','%'); ?></span>
					</div>
					<div class="blog-post-title-wrapper">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content( __('Read More' ,'wallstreet' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__('Page', 'wallstreet' ), 'after' => '</div>' ) ); ?>
						<div class="blog-post-meta">
							<a id="blog-author" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
							<?php 	$wallstreet_tag_list = get_the_tag_list();
							if(!empty($wallstreet_tag_list)) { ?>
							<div class="blog-tags">
								<i class="fa fa-tags"></i><?php the_tags('', ', ', ''); ?>
							</div>
							<?php } ?>
							<?php 	$wallstreet_cat_list = get_the_category_list();
							if(!empty($wallstreet_cat_list)) { ?>
							<div class="blog-tags">
								<i class="fa fa-star"></i><?php the_category(', '); ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>	
			</div>
			<?php } } ?>
			<div class="blog-pagination">					
				<?php if(get_previous_posts_link() ): ?>
				<?php previous_posts_link(); ?>
				<?php endif; ?>					
				<?php if ( get_next_posts_link() ): ?>
				<?php next_posts_link(); ?>
				<?php endif; ?>
			</div>
		</div><!--/Blog Area-->
		<?php 
            if(get_theme_mod('blog_sidebar_layout','right')=='right'):
                echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                   dynamic_sidebar($wallstreet_page_sidebar); 
                echo '</div></div>';
            endif; ?>
	</div>
</div>
<?php get_footer();
//Blog & Sidebar Section
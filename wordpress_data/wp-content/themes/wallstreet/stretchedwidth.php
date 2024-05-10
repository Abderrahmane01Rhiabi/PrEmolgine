<?php 
/*
Template Name: Stretched Width Page
*/
get_header(); ?>
<!-- Page Title Section -->
<?php if(!is_front_page()){ get_template_part('index', 'breadcrumb');} ?>
<!-- /Page Title Section -->

<?php the_post(); ?>
	<div class="stretched-page-section">
		<?php if(has_post_thumbnail()) { 
			$wallstreet_defalt_arg =array('class' => "img-responsive"); 
		?>
		<div class="blog-post-img">
			<?php the_post_thumbnail('', $wallstreet_defalt_arg); ?>
		</div>
		<?php } ?>
		<div class="clear"></div>
		<div class="blog-post-title">
			<div class="blog-post-title-wrapper" style="width:100%";>
				<?php the_content(); ?>
			</div>
		</div>	
	</div>
<?php comments_template('',true); 
get_footer();
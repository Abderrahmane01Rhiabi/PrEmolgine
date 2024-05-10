<?php get_header(); ?>
<!-- Page Title Section -->
<?php if(!is_front_page()){ get_template_part('index', 'breadcrumb'); }?>
<!-- /Page Title Section -->
<!-- Blog & Sidebar Section -->
<?php
if((get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='wallstreet_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) {
    $wallstreet_page_class='stretched';   
}
else {
    $wallstreet_page_class='';
}

$wallstreet_page_sidebar = get_post_meta(get_the_ID(),'wallstreet_page_sidebar', true );
if($wallstreet_page_sidebar == '') { 
    $wallstreet_page_sidebar = 'sidebar_primary';
}
?>
<div class="container <?php echo esc_attr($wallstreet_page_class);?>" id="content">
    <div class="row">	
         <?php 
         if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(get_the_ID(),'wallstreet_site_layout', true )== '') || get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='wallstreet_site_layout_left'):
                echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                    dynamic_sidebar($wallstreet_page_sidebar); 
                echo '</div></div>';
            endif;	
       
            if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) =='') {
                if(get_theme_mod('page_sidebar_layout','right')=='right'|| get_theme_mod('page_sidebar_layout','right')=='left'):        
                     echo '<div class="col-lg-8 col-md-8 col-sm-12">';
                else:
                     echo '<div class="col-lg-12 col-md-12 col-sm-12">';   
                endif;
            }
            else if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_left')
            {
                 echo '<div class="col-lg-8 col-md-8 col-sm-12">';
            }
            else if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_right')
            {
                 echo'<div class="col-lg-8 col-md-8 col-sm-12">';
            }
            else if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_without_sidebar') {
                echo '<div class="col-lg-12 col-md-12 col-sm-12">'; 
            }
            else
            {
                 echo '<div class="col-lg-12 col-md-12 col-sm-12">';
            }

            the_post(); ?>
            <div class="blog-detail-section">
                <?php if (has_post_thumbnail()) { ?>
                    <?php $wallstreet_defalt_arg = array('class' => "img-responsive"); ?>
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
            <?php comments_template('', true); ?>
        </div>
        <?php
         if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='') || get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='wallstreet_site_layout_right') {
                echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                    dynamic_sidebar($wallstreet_page_sidebar); 
                echo '</div></div>';
            }
        ?>
        <!--/Blog Area-->
    </div>
</div>
<?php
get_footer();

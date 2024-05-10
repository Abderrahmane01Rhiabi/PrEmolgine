<?php get_header(); ?>
<!-- Page Title Section -->
<?php get_template_part('index', 'breadcrumb'); ?>
<!-- /Page Title Section -->
<!-- Blog & Sidebar Section -->
<?php
if((get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_stretched') || (get_theme_mod('single_post_sidebar_layout','right')=='stretched')) {
    $wallstreet_page_class='stretched';   
}
else {
    $wallstreet_page_class='';
}

$wallstreet_page_sidebar = get_post_meta(get_the_ID(),'wallstreet_page_sidebar', true );
if($wallstreet_page_sidebar =='') { 
    $wallstreet_page_sidebar = 'sidebar_primary'; 
}  
?>
<div class="container <?php echo esc_attr($wallstreet_page_class);?>" id="content">
    <div class="row">
        <?php
         if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == '' )
            {
                if(get_theme_mod('single_post_sidebar_layout','right')=='left'):
                    echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                        dynamic_sidebar($wallstreet_page_sidebar); 
                    echo '</div></div>';
                    endif;
                if(get_theme_mod('single_post_sidebar_layout','right')=='right'|| get_theme_mod('single_post_sidebar_layout','right')=='left'):        
                    echo '<div class="col-lg-8 col-md-4 col-sm-12">';
                else:
                    echo '<div class="col-lg-12 col-md-12 col-sm-12">';   
                endif;
            }
            else if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_left')
            {
                echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                    dynamic_sidebar($wallstreet_page_sidebar); 
                echo '</div></div>';
                echo '<div class="col-lg-8 col-md-4 col-sm-12">';
            }
            else if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_right')
            {
                echo '<div class="col-lg-8 col-md-8 col-sm-12">';
            }
            else if(get_post_meta(get_the_ID(),'wallstreet_site_layout', true ) == 'wallstreet_site_layout_without_sidebar')
            {
                echo '<div class="col-lg-12 col-md-12 col-sm-12">'; 
            }
            else
            {
                echo '<div class="col-lg-12 col-md-12 col-sm-12">';
            }

            if (have_posts()) {
                 while (have_posts()) {
                         the_post();
                         ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('blog-detail-section'); ?>>
                        <?php if (has_post_thumbnail()) { ?>
                            <?php $wallstreet_defalt_arg = array('class' => "img-responsive"); ?>
                            <div class="blog-post-img">
                                <?php the_post_thumbnail('', $wallstreet_defalt_arg); ?>
                            </div>
                        <?php } ?>
                        <div class="clear"></div>
                        <div class="blog-post-title">
                            <div class="blog-post-date"><span class="date"><a href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>"><?php echo esc_html(get_the_date()); ?></a></span>
                                <span class="comment"><i class="fa fa-comment"></i><?php comments_number('0', '1', '%'); ?></span>
                            </div>
                            <div class="blog-post-title-wrapper">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                                <?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Page', 'wallstreet'), 'after' => '</div>')); ?>
                                <div class="blog-post-meta">
                                    <a id="blog-author" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user"></i> <?php the_author(); ?></a>
                                    <?php
                                    $wallstreet_tag_list = get_the_tag_list();
                                    if (!empty($wallstreet_tag_list)) {
                                        ?>
                                        <div class="blog-tags">
                                            <i class="fa fa-tags"></i><?php the_tags('',', ', ''); ?>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    $wallstreet_cat_list = get_the_category_list();
                                    if (!empty($wallstreet_cat_list)) {
                                        ?>
                                        <div class="blog-tags">
                                            <i class="fa fa-star"></i><?php the_category(','); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>	
                    </div>

                    <!--Blog Author-->
                    <div class="blog-author">
                        <div class="media">
                            <div class="pull-left">
                                <?php echo get_avatar(get_the_author_meta('ID'), 94); ?>
                            </div>
                            <div class="media-body">
                                <h6><?php the_author(); ?></h6>
                                <p> <?php the_author_meta('description'); ?> </p>

                            </div>
                        </div>	
                    </div>
                    <!--/Blog Author-->
                <?php } ?>
                <?php comments_template('', true); ?>
            <?php } ?>
        </div>
        <?php
        if(((get_theme_mod('single_post_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='') ||  get_post_meta(get_the_ID(),'wallstreet_site_layout', true )=='wallstreet_site_layout_right'):
                echo '<div class="col-lg-4 col-md-4 col-sm-12"><div class="sidebar-section">';
                   dynamic_sidebar($wallstreet_page_sidebar); 
                echo '</div></div>';
            endif;
        ?>
        <!--/Blog Area-->
    </div>
</div>
<?php
get_footer();

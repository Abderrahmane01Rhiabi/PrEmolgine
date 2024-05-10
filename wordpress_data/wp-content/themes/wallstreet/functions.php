<?php
/* * Theme Name	: wallstreet
 * Theme Core Functions and Codes
 */
$wallstreet_theme = wp_get_theme();
if( $wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child' ) {
    if ( ! function_exists( 'wal_fs' ) ) {
        if ( function_exists( 'webriti_companion_activate' ) && defined( 'WC__PLUGIN_DIR' ) && file_exists(WC__PLUGIN_DIR . '/freemius/start.php') ) {
            // Create a helper function for easy SDK access.
            function wal_fs() {
                global $wal_fs;

                if ( ! isset( $wal_fs ) ) {
                    // Include Freemius SDK.
                    require_once WC__PLUGIN_DIR . '/freemius/start.php';

                    $wal_fs = fs_dynamic_init( array(
                        'id'                  => '11205',
                        'slug'                => 'wallstreet',
                        'type'                => 'theme',
                        'public_key'          => 'pk_d137ec37b3cb9ac46b97eba73ac6a',
                        'is_premium'          => false,                        
                        // If your theme is a serviceware, set this option to false.
                        'has_addons'          => false,
                        'has_paid_plans'      => true,
                        'menu'                => array(
                            'slug'           => 'wallstreet-welcome',
                            'account' => true,
							              'contact' => true,
							              'support' => false,
                        ),
                        'navigation'                     => 'menu',
						            'is_org_compliant'               => true,
                      
                    ) );
                }

                return $wal_fs;
            }

            // Init Freemius.
            wal_fs();
            // Signal that SDK was initiated.
            do_action( 'wal_fs_loaded' );
        }
    }
}
// Global variables define
if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}
/* * Includes reqired resources here* */
define('WALLSTREET_TEMPLATE_DIR_URI', get_template_directory_uri());
define('WALLSTREET_TEMPLATE_DIR', get_template_directory());
define('WALLSTREET_THEME_FUNCTIONS_PATH', WALLSTREET_TEMPLATE_DIR . '/functions');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/menu/wallstreet_nav_walker.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
//Customizer
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-general.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro-feature.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-social.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-blog.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');
require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-header-option.php' ); // adding width slider for site identity 
// Meta boxes.
require(WALLSTREET_TEMPLATE_DIR . '/functions/meta-boxes/meta-box.php'); 
//Range Slider Control added in Site Indentity tab 
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/customizer-slider/customizer-slider.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/toggle/class-toggle-control.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/customizer-image-radio/customizer-image-radio.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/customizer-tabs/class/class-wallstreet-customize-control-tabs.php');
require( WALLSTREET_TEMPLATE_DIR . '/inc/customizer/upsell/class-customize.php');
require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-footer-layout.php' );
require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-sidebar-layout.php' );
require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/fonts.php' );
require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-typography.php' );
if( $wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child' ) {
    require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-theme-mode.php');
    require ( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-header-layout.php' ); 
}
// add detect button
add_action('admin_init', 'wallstreet_detect_button');

function wallstreet_detect_button() {
    wp_enqueue_style('wallstreet-info-button', WALLSTREET_TEMPLATE_DIR_URI . '/css/import-button.css');
}
if ( ! function_exists( 'wallstreet_customizer_preview_scripts' ) ) {
    function wallstreet_customizer_preview_scripts() {
        wp_enqueue_script( 'wallstreet-customizer-preview', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
    }
}
add_action( 'customize_preview_init', 'wallstreet_customizer_preview_scripts' ); 
// add style
function wallstreet_custom_enqueue_css() {
    wp_enqueue_style('wallstreet-drag-drop', WALLSTREET_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}
add_action('admin_print_styles', 'wallstreet_custom_enqueue_css', 10);
//wp title tag starts here
function wallstreet_head($title, $sep) {
    global $paged, $page;
    if (is_feed())
        return $title;
// Add the site name.
    $title .= get_bloginfo('name', 'display');
// Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";
// Add a page number if necessary.
    if (( $paged >= 2 || $page >= 2 ) && !is_404())
        $title = "$title $sep " . sprintf(esc_html__('Page', 'wallstreet'), max($paged, $page));

    return $title;
}
add_filter('wp_title', 'wallstreet_head', 10, 2);
require_once('wallstreet_theme_setup_data.php');
add_action('after_setup_theme', 'wallstreet_setup');
function wallstreet_setup() {
    global $content_width;
    if (!isset($content_width))
        $content_width = 600; //In PX
// Load text domain for translation-ready
    load_theme_textdomain('wallstreet', WALLSTREET_TEMPLATE_DIR . '/language');
    add_theme_support('post-thumbnails'); //supports featured image
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', esc_html__('Primary Menu', 'wallstreet')); //Navigation
    // theme support
    $args = array('default-color' => '000000',);
    add_theme_support('custom-background', $args);
    add_theme_support('automatic-feed-links');
    // woocommerce support
    add_theme_support('woocommerce');
    //Added Woocommerce Galllery Support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    //Add theme Support Title Tag
    add_theme_support('title-tag');
    //Custom logo
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 250,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    add_editor_style();
    add_action('wp_enqueue_scripts', 'wallstreet_scripts');
    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }
    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Wallstreet' == $theme->name || 'Wallstreet child' == $theme->name || 'Wallstreet Child' == $theme->name) {
        if (is_admin()) {
            require get_template_directory() . '/admin/admin-init.php';
        }
    }
}
// Read more tag to formatting in blog page
function wallstreet_new_content_more($more) {
    global $post;
    return '<div class=\"blog-btn-col\"><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"blog-btn\">" . esc_html__('Read More', 'wallstreet') . '</a></div>';
}
add_filter('the_content_more_link', 'wallstreet_new_content_more');
/* sidebar */
add_action('widgets_init', 'wallstreet_widgets_init');
add_action('customize_preview_init', 'wallstreet_widgets_init');
function wallstreet_widgets_init() {

    if(get_theme_mod('footer_layout','4')=='1'){
        $class='col-md-12 col-sm-12 footer_widget_column';
    }
    elseif(get_theme_mod('footer_layout','4')=='2'){
        $class='col-md-6 col-sm-6 footer_widget_column';
    }
    elseif(get_theme_mod('footer_layout','4')=='3'){
        $class='col-md-4 col-sm-6 footer_widget_column';
    }else{
        $class='col-md-3 col-sm-6 footer_widget_column';
    }
      
    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'wallstreet'),
        'id' => 'sidebar_primary',
        'description' => esc_html__('Sidebar widget area', 'wallstreet'),
        'before_widget' => '<div class="sidebar-widget" >',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget area', 'wallstreet'),
        'id' => 'footer-widget-area',
        'description' => esc_html__('Footer widget area', 'wallstreet'),
        'before_widget' => '<div class="'.$class.'">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer_widget_title">',
        'after_title' => '</h2>',
    ));
 
    register_sidebar(array(
        'name' => esc_html__('WooCommerce sidebar widget area', 'wallstreet'),
        'id' => 'woocommerce',
        'description' => esc_html__('WooCommerce sidebar widget area', 'wallstreet'),
        'before_widget' => '<div class="sidebar-widget" >',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
function wallstreet_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive comment-img img-circle", $class);
    return $class;
}
add_filter('get_avatar', 'wallstreet_add_gravatar_class');
function wallstreet_scripts() {
    $current_options = get_option('wallstreet_pro_options');
    wp_enqueue_style('wallstreet-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', WALLSTREET_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_enqueue_style('wallstreet-default', WALLSTREET_TEMPLATE_DIR_URI . '/css/default.css');
    wp_enqueue_style('wallstreet-theme-menu', WALLSTREET_TEMPLATE_DIR_URI . '/css/theme-menu.css');
    wp_enqueue_style('wallstreet-media-responsive', WALLSTREET_TEMPLATE_DIR_URI . '/css/media-responsive.css');
    wp_enqueue_style('wallstreet-font-awesome-min', WALLSTREET_TEMPLATE_DIR_URI . '/css/font-awesome/css/all.min.css');
    wp_enqueue_style('wallstreet-tool-tip', WALLSTREET_TEMPLATE_DIR_URI . '/css/css-tooltips.css');
    wp_enqueue_script('wallstreet-menu', WALLSTREET_TEMPLATE_DIR_URI . '/js/menu/menu.js', array('jquery'));
    wp_enqueue_script('wallstreet-bootstrap', WALLSTREET_TEMPLATE_DIR_URI . '/js/bootstrap.min.js');
    require_once('custom_style.php');
}
add_action('admin_init', 'wallstreet_customizer_css');
function wallstreet_customizer_css() {
    wp_enqueue_style('wallstreet-customizer-info', WALLSTREET_TEMPLATE_DIR_URI . '/css/pro-feature.css');
}
// code for comment
if (!function_exists('wallstreet_comment')) {

    function wallstreet_comment($comment, $args, $depth) {
        global $comment_data;
//translations
        $leave_reply = isset($comment_data['translation_reply_to_coment']) ? $comment_data['translation_reply_to_coment'] : esc_html__('Reply', 'wallstreet');
        ?>
        <div <?php comment_class('media comment_box'); ?> id="comment-<?php comment_ID(); ?>">
            <a class="pull-left-comment" href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar($comment, 70); ?></a>
            <div class="media-body">
                <div class="comment-detail">
                    <h4 class="comment-detail-title"><?php comment_author(); ?><span class="comment-date"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php esc_html_e('Posted on &nbsp;', 'wallstreet'); ?><?php echo esc_html(comment_time('g:i a')); ?><?php echo " - ";
                echo esc_html(comment_date('M j, Y')); ?></a></span></h4>
                    <?php comment_text(); ?>
        <?php edit_comment_link(esc_html__('Edit', 'wallstreet'), '<p class="edit-link">', '</p>'); ?>
                    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('reply_text' => $leave_reply, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
                    </div>
        <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'wallstreet'); ?></em>
                        <br/>
        <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
    }

}
// end of wallstreet_comment function
add_action('wp_head', 'wallstreet_head_enqueue_custom_css');
function wallstreet_head_enqueue_custom_css() {
    $current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
    if ($current_options['webrit_custom_css'] != '') {
        ?>
        <style>
        <?php echo esc_html($current_options['webrit_custom_css']); ?>
        </style>
    <?php }
    if(get_theme_mod('footer_layout','4')=='3'){ ?>
    <style>
        .footer-widget-section .col-md-4:nth-child(3n+1) {
            clear: both;
        }
    </style>
    <?php }
    if(get_theme_mod('footer_layout','4')=='2'){ ?>
    <style>
      .footer-widget-section .col-md-6:nth-child(2n+1) {
            clear: both;
        }
    </style>
    <?php }
}
function wallstreet_custmizer_style() {

    wp_enqueue_style('wallstreet-customizer-css', WALLSTREET_TEMPLATE_DIR_URI . '/css/cust-style.css');
}
add_action('customize_controls_print_styles', 'wallstreet_custmizer_style');
require_once get_template_directory() . '/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'wallstreet_register_required_plugins');
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function wallstreet_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => esc_html__('Webriti Companion','wallstreet'),
            'slug' => 'webriti-companion',
            'required' => false,
        )
    );
    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'wallstreet', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

// add css on activate webriti-companion plugin

$wallstreet_pluginList = get_option('active_plugins');
$wallstreet_webriti_companion_plugin = 'webriti-companion/webriti-companion.php';
if (!in_array($wallstreet_webriti_companion_plugin, $wallstreet_pluginList)) :
    add_action('wp_head', 'wallstreet_homepage_blog_css');

    function wallstreet_homepage_blog_css() {
        echo '<style type="text/css">
			.home-blog-section {
			    padding: 140px 0 20px!important;
			}
	  	 </style>';
    }
endif;
//Set for old user
if (!get_option('wallstreet_user', false)) {
     //detect old user and set value
    $wallstreet_green_user = get_option('wallstreet_pro_options', array());
    if ((isset($wallstreet_green_user['service_title']) || isset($wallstreet_green_user['service_description']) || isset($wallstreet_green_user['home_blog_heading']) || isset($wallstreet_green_user['home_blog_description']))) {
        add_option('wallstreet_user', 'old');
    }
    else{
        if ( version_compare(wp_get_theme()->get('Version'), '2.1') <= 0 ) {
            add_option('wallstreet_user', 'new');
        }
        else {
            add_option('wallstreet_user', 'new_user');
        }
    }
}

//Custom CSS compatibility
$wallstreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
if ($wallstreet_current_options['webrit_custom_css'] != '' && $wallstreet_current_options['webrit_custom_css'] != 'nomorenow') {
    $wallstreet_css = '';
    $wallstreet_css .= $wallstreet_current_options['webrit_custom_css'];
    $wallstreet_css .= (string) wp_get_custom_css(get_stylesheet());
    $wallstreet_current_options['webrit_custom_css'] = 'nomorenow';
    update_option('wallstreet_pro_options', $wallstreet_current_options);
    wp_update_custom_css_post($wallstreet_css, array());
}
if( $wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child' ) {
    // Notice to add required plugin
    function wallstreet_admin_plugin_notice_warn() {
        $theme_name = wp_get_theme();
        if ( get_option( 'dismissed-wallstreet_comanion_plugin', false ) ) {
           return;
        }
        if ( function_exists('webriti_companion_activate')) {
            return;
        }?>

        <div class="updated notice is-dismissible wallstreet-theme-notice">

            <div class="owc-header">
                <h2 class="theme-owc-title">               
                    <svg height="60" width="60" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"><defs><style>.cls-1{font-size:33px;font-family:Verdana-Bold, Verdana;font-weight:700;}</style></defs><title>Artboard 1</title><text class="cls-1" transform="translate(-0.56 51.25)">WC</text></svg>
                    <?php echo esc_html('Webriti Companion','wallstreet');?>
                </h2>
            </div>

            <div class="wallstreet-theme-content">
                <h3><?php printf (esc_html__('Thank you for installing the %1$s theme.', 'wallstreet'), esc_html($theme_name)); ?></h3>

                <p><?php esc_html_e( 'We highly recommend you to install and activate the', 'wallstreet' ); ?>
                    <b><?php esc_html_e( 'Webriti Companion', 'wallstreet' ); ?></b> plugin.
                    <br>
                    <?php esc_html_e( 'This plugin will unlock enhanced features to build a beautiful website.', 'wallstreet' ); ?>
                </p>
                <?php
                $wallstreet_companion_about_page = Wallstreet_About_Page();            
                $wallstreet_actions = $wallstreet_companion_about_page->recommended_actions;
                $wallstreet_actions_todo = get_option( 'recommended_actions', false );
                if($wallstreet_actions): 
                    foreach ($wallstreet_actions as $key => $wallstreet_val):
                        if($wallstreet_val['id']=='install_webriti-companion'):
                            /* translators: %s: theme name */
                            echo '<p>'.wp_kses_post($wallstreet_val['link']).'</p>';
                        endif;
                    endforeach;
                endif;?>
            </div>
        </div>
        
        <script type="text/javascript">
            jQuery(function($) {
            $( document ).on( 'click', '.wallstreet-theme-notice .notice-dismiss', function () {
                var type = $( this ).closest( '.wallstreet-theme-notice' ).data( 'notice' );
                $.ajax( ajaxurl,
                  {
                    type: 'POST',
                    data: {
                      action: 'dismissed_notice_handler',
                      type: type,
                    }
                  } );
              } );
          });
        </script>
    <?php

    }
    add_action( 'admin_notices', 'wallstreet_admin_plugin_notice_warn' );
    add_action( 'wp_ajax_dismissed_notice_handler', 'wallstreet_ajax_notice_handler');

    function wallstreet_ajax_notice_handler() {
        update_option( 'dismissed-wallstreet_comanion_plugin', TRUE );
    }
    function wallstreet_notice_style(){?>
        <style type="text/css">
            label.tg-label.breadcrumbs img {
                width: 6%;
                padding: 0;
            }
            .wallstreet-theme-notice .theme-owc-title{
                display: flex;
                align-items: center;
                height: 100%;
                margin: 0;
                font-size: 1.5em;
            }
            .wallstreet-theme-notice p{
                font-size: 14px;
            }
            .updated.notice.wallstreet-theme-notice h3{
                margin: 0;
            }
            div.wallstreet-theme-notice.updated {
                border-left-color: #00c2a9;
            }
            .wallstreet-theme-content{
                padding: 0 0 1.2rem 3.57rem;
            }
        </style>
    <?php
    }
    add_action('admin_enqueue_scripts','wallstreet_notice_style');
}
if ( ($wallstreet_theme->name == 'Wallstreet' || $wallstreet_theme->name == 'Wallstreet child' || $wallstreet_theme->name == 'Wallstreet Child') && (get_option('wallstreet_user', 'new') == 'new')) {
    if ( ! function_exists( 'wallstreet_customizer_custom_styles' ) ) {
        function wallstreet_customizer_custom_styles() {
            wp_enqueue_style( 'wallstreet-customizer-custom-css', WALLSTREET_TEMPLATE_DIR_URI . '/css/customize.css' );
        }
    }
    add_action( 'customize_controls_enqueue_scripts', 'wallstreet_customizer_custom_styles' );
}

//Load font from google api.
function wallstreet_google_fonts_url() {
    $fonts_url = '';
    $font_families = array();
    $font_families = wallstreet_typo_fonts();
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    return $fonts_url;
}
function wallstreet_google_font_scripts_styles() {
    wp_enqueue_style( 'wallstreet-google-fonts', wallstreet_google_fonts_url(), array(), null );
    wp_enqueue_style('wallstreet-font','https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700','900','italic');
}
 if(get_theme_mod('wallstreet_enable_local_google_font',true) ==false){
add_action( 'wp_enqueue_scripts', 'wallstreet_google_font_scripts_styles');
 }

/**
* Enqueue theme fonts.
*/
//Load locally font.
 if(get_theme_mod('wallstreet_enable_local_google_font',true) ==true){
add_action( 'wp_enqueue_scripts', 'wallstreet_theme_fonts',1 );
add_action( 'enqueue_block_editor_assets', 'wallstreet_theme_fonts',1 );
add_action( 'customize_preview_init', 'wallstreet_theme_fonts', 1 );

function wallstreet_theme_fonts() {
    $fonts_url = wallstreet_get_fonts_url();
    // Load Fonts if necessary.
    if ( $fonts_url ) {
        require_once get_theme_file_path( 'wptt-webfont-loader.php' );
        wp_enqueue_style( 'wallstreet-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), '20201110' );
    }
}
}
/**
 * Retrieve webfont URL to load fonts locally.
 */
function wallstreet_get_fonts_url() {
        $st_font                    = get_theme_mod('site_title_fontfamily','Roboto');
        $tag_font                   = get_theme_mod('site_tagline_fontfamily','Roboto');
        $menu_font                  = get_theme_mod('menu_title_fontfamily','Roboto');
        $submenu_font               = get_theme_mod('submenu_title_fontfamily','Roboto');
        $banner_font                = get_theme_mod('banner_title_fontfamily','Roboto');
        $bread_font                 = get_theme_mod('breadcrumb_title_fontfamily','Roboto');
        $slider_title               = get_theme_mod('slider_title_fontfamily','Roboto');
        $slider_subtitle            = get_theme_mod('slider_subtitle_fontfamily','Roboto');
        $homepage_title             = get_theme_mod('homepage_title_fontfamily','Roboto');
        $homepage_description       = get_theme_mod('homepage_description_fontfamily','Roboto');
        $h1_font                    = get_theme_mod('h1_typography_fontfamily','Roboto');
        $h2_font                    = get_theme_mod('h2_typography_fontfamily','Roboto');
        $h3_font                    = get_theme_mod('h3_typography_fontfamily','Roboto');
        $h4_font                    = get_theme_mod('h4_typography_fontfamily','Roboto');
        $h5_font                    = get_theme_mod('h5_typography_fontfamily','Roboto');
        $h6_font                    = get_theme_mod('h6_typography_fontfamily','Roboto');
        $p_font                     = get_theme_mod('p_typography_fontfamily','Roboto');
        $btn_font                   = get_theme_mod('button_text_typography_fontfamily','Roboto');
        $post_title_font            = get_theme_mod('post_title_fontfamily','Roboto');
        $shop_h1_font               = get_theme_mod('shop_h1_typography_fontfamily','Roboto');
        $shop_h2_font               = get_theme_mod('shop_h2_typography_fontfamily','Roboto');
        $shop_h3_font               = get_theme_mod('shop_h3_typography_fontfamily','Roboto'); 
        $side_font                  = get_theme_mod('sidebar_fontfamily','Roboto');
        $side_content_font          = get_theme_mod('sidebar_widget_content_fontfamily','Roboto');
        $footer_widget_font         = get_theme_mod('footer_widget_title_fontfamily','Roboto');
        $footer_widget_content_font = get_theme_mod('footer_widget_content_fontfamily','Roboto');
     
    $font_families = array(
       $st_font .':100', $st_font .':100italic', $st_font .':200', $st_font .':200italic', $st_font .':300', $st_font .':300italic', $st_font .':400', $st_font .':400italic', $st_font .':500', $st_font .':500italic', $st_font .':600', $st_font .':600italic', $st_font .':700', $st_font .':700italic', $st_font .':800', $st_font .':800italic', $st_font .':900', $st_font .':900italic',
        $tag_font .':100', $tag_font .':100italic', $tag_font .':200', $tag_font .':200italic', $tag_font .':300', $tag_font .':300italic', $tag_font .':400', $tag_font .':400italic', $tag_font .':500', $tag_font .':500italic', $tag_font .':600', $tag_font .':600italic', $tag_font .':700', $tag_font .':700italic', $tag_font .':800', $tag_font .':800italic', $tag_font .':900', $tag_font .':900italic',
        $menu_font .':100', $menu_font .':100italic', $menu_font .':200', $menu_font .':200italic', $menu_font .':300', $menu_font .':300italic', $menu_font .':400', $menu_font .':400italic', $menu_font .':500', $menu_font .':500italic', $menu_font .':600', $menu_font .':600italic', $menu_font .':700', $menu_font .':700italic', $menu_font .':800', $menu_font .':800italic', $menu_font .':900', $menu_font .':900italic',
        $submenu_font .':100', $submenu_font .':100italic', $submenu_font .':200', $submenu_font .':200italic', $submenu_font .':300', $submenu_font .':300italic', $submenu_font .':400', $submenu_font .':400italic', $submenu_font .':500', $submenu_font .':500italic', $submenu_font .':600', $submenu_font .':600italic', $submenu_font .':700', $submenu_font .':700italic', $submenu_font .':800', $submenu_font .':800italic', $submenu_font .':900', $submenu_font .':900italic',
        $banner_font .':100', $banner_font .':100italic', $banner_font .':200', $banner_font .':200italic', $banner_font .':300', $banner_font .':300italic', $banner_font .':400', $banner_font .':400italic', $banner_font .':500', $banner_font .':500italic', $banner_font .':600', $banner_font .':600italic', $banner_font .':700', $banner_font .':700italic', $banner_font .':800', $banner_font .':800italic', $banner_font .':900', $banner_font .':900italic',
        $bread_font .':100', $bread_font .':100italic', $bread_font .':200', $bread_font .':200italic', $bread_font .':300', $bread_font .':300italic', $bread_font .':400', $bread_font .':400italic', $bread_font .':500', $bread_font .':500italic', $bread_font .':600', $bread_font .':600italic', $bread_font .':700', $bread_font .':700italic', $bread_font .':800', $bread_font .':800italic', $bread_font .':900', $bread_font .':900italic',
        $slider_title .':100', $slider_title .':100italic', $slider_title .':200', $slider_title .':200italic', $slider_title .':300', $slider_title .':300italic', $slider_title .':400', $slider_title .':400italic', $slider_title .':500', $slider_title .':500italic', $slider_title .':600', $slider_title .':600italic', $slider_title .':700', $slider_title .':700italic', $slider_title .':800', $slider_title .':800italic', $slider_title .':900', $slider_title .':900italic',
        $slider_subtitle .':100', $slider_subtitle .':100italic', $slider_subtitle .':200', $slider_subtitle .':200italic', $slider_subtitle .':300', $slider_subtitle .':300italic', $slider_subtitle .':400', $slider_subtitle .':400italic', $slider_subtitle .':500', $slider_subtitle .':500italic', $slider_subtitle .':600', $slider_subtitle .':600italic', $slider_subtitle .':700', $slider_subtitle .':700italic', $slider_subtitle .':800', $slider_subtitle .':800italic', $slider_subtitle .':900', $slider_subtitle .':900italic',
        $homepage_title .':100', $homepage_title .':100italic', $homepage_title .':200', $homepage_title .':200italic', $homepage_title .':300', $homepage_title .':300italic', $homepage_title .':400', $homepage_title .':400italic', $homepage_title .':500', $homepage_title .':500italic', $homepage_title .':600', $homepage_title .':600italic', $homepage_title .':700', $homepage_title .':700italic', $homepage_title .':800', $homepage_title .':800italic', $homepage_title .':900', $homepage_title .':900italic',
        $homepage_description .':100', $homepage_description .':100italic', $homepage_description .':200', $homepage_description .':200italic', $homepage_description .':300', $homepage_description .':300italic', $homepage_description .':400', $homepage_description .':400italic', $homepage_description .':500', $homepage_description .':500italic', $homepage_description .':600', $homepage_description .':600italic', $homepage_description .':700', $homepage_description .':700italic', $homepage_description .':800', $homepage_description .':800italic', $homepage_description .':900', $homepage_description .':900italic',
        $post_title_font .':100', $post_title_font .':100italic', $post_title_font .':200', $post_title_font .':200italic', $post_title_font .':300', $post_title_font .':300italic', $post_title_font .':400', $post_title_font .':400italic', $post_title_font .':500', $post_title_font .':500italic', $post_title_font .':600', $post_title_font .':600italic', $post_title_font .':700', $post_title_font .':700italic', $post_title_font .':800', $post_title_font .':800italic', $post_title_font .':900', $post_title_font .':900italic',
        $side_font .':100', $side_font .':100italic', $side_font .':200', $side_font .':200italic', $side_font .':300', $side_font .':300italic', $side_font .':400', $side_font .':400italic', $side_font .':500', $side_font .':500italic', $side_font .':600', $side_font .':600italic', $side_font .':700', $side_font .':700italic', $side_font .':800', $side_font .':800italic', $side_font .':900', $side_font .':900italic',
        $side_content_font .':100', $side_content_font .':100italic', $side_content_font .':200', $side_content_font .':200italic', $side_content_font .':300', $side_content_font .':300italic', $side_content_font .':400', $side_content_font .':400italic', $side_content_font .':500', $side_content_font .':500italic', $side_content_font .':600', $side_content_font .':600italic', $side_content_font .':700', $side_content_font .':700italic', $side_content_font .':800', $side_content_font .':800italic', $side_content_font .':900', $side_content_font .':900italic',
        $footer_widget_font .':100', $footer_widget_font .':100italic', $footer_widget_font .':200', $footer_widget_font .':200italic', $footer_widget_font .':300', $footer_widget_font .':300italic', $footer_widget_font .':400', $footer_widget_font .':400italic', $footer_widget_font .':500', $footer_widget_font .':500italic', $footer_widget_font .':600', $footer_widget_font .':600italic', $footer_widget_font .':700', $footer_widget_font .':700italic', $footer_widget_font .':800', $footer_widget_font .':800italic', $footer_widget_font .':900', $footer_widget_font .':900italic',
        $footer_widget_content_font .':100', $footer_widget_content_font .':100italic', $footer_widget_content_font .':200', $footer_widget_content_font .':200italic', $footer_widget_content_font .':300', $footer_widget_content_font .':300italic', $footer_widget_content_font .':400', $footer_widget_content_font .':400italic', $footer_widget_content_font .':500', $footer_widget_content_font .':500italic', $footer_widget_content_font .':600', $footer_widget_content_font .':600italic', $footer_widget_content_font .':700', $footer_widget_content_font .':700italic', $footer_widget_content_font .':800', $footer_widget_content_font .':800italic', $footer_widget_content_font .':900', $footer_widget_content_font .':900italic',
        $h1_font .':100', $h1_font .':100italic', $h1_font .':200', $h1_font .':200italic', $h1_font .':300', $h1_font .':300italic', $h1_font .':400', $h1_font .':400italic', $h1_font .':500', $h1_font .':500italic', $h1_font .':600', $h1_font .':600italic', $h1_font .':700', $h1_font .':700italic', $h1_font .':800', $h1_font .':800italic', $h1_font .':900', $h1_font .':900italic',
        $h2_font .':100', $h2_font .':100italic', $h2_font .':200', $h2_font .':200italic', $h2_font .':300', $h2_font .':300italic', $h2_font .':400', $h2_font .':400italic', $h2_font .':500', $h2_font .':500italic', $h2_font .':600', $h2_font .':600italic', $h2_font .':700', $h2_font .':700italic', $h2_font .':800', $h2_font .':800italic', $h2_font .':900', $h2_font .':900italic',
        $h3_font .':100', $h3_font .':100italic', $h3_font .':200', $h3_font .':200italic', $h3_font .':300', $h3_font .':300italic', $h3_font .':400', $h3_font .':400italic', $h3_font .':500', $h3_font .':500italic', $h3_font .':600', $h3_font .':600italic', $h3_font .':700', $h3_font .':700italic', $h3_font .':800', $h3_font .':800italic', $h3_font .':900', $h3_font .':900italic',
        $h4_font .':100', $h4_font .':100italic', $h4_font .':200', $h4_font .':200italic', $h4_font .':300', $h4_font .':300italic', $h4_font .':400', $h4_font .':400italic', $h4_font .':500', $h4_font .':500italic', $h4_font .':600', $h4_font .':600italic', $h4_font .':700', $h4_font .':700italic', $h4_font .':800', $h4_font .':800italic', $h4_font .':900', $h4_font .':900italic',
        $h5_font .':100', $h5_font .':100italic', $h5_font .':200', $h5_font .':200italic', $h5_font .':300', $h5_font .':300italic', $h5_font .':400', $h5_font .':400italic', $h5_font .':500', $h5_font .':500italic', $h5_font .':600', $h5_font .':600italic', $h5_font .':700', $h5_font .':700italic', $h5_font .':800', $h5_font .':800italic', $h5_font .':900', $h5_font .':900italic',
        $h6_font .':100', $h6_font .':100italic', $h6_font .':200', $h6_font .':200italic', $h6_font .':300', $h6_font .':300italic', $h6_font .':400', $h6_font .':400italic', $h6_font .':500', $h6_font .':500italic', $h6_font .':600', $h6_font .':600italic', $h6_font .':700', $h6_font .':700italic', $h6_font .':800', $h6_font .':800italic', $h6_font .':900', $h6_font .':900italic',
        $p_font .':100', $p_font .':100italic', $p_font .':200', $p_font .':200italic', $p_font .':300', $p_font .':300italic', $p_font .':400', $p_font .':400italic', $p_font .':500', $p_font .':500italic', $p_font .':600', $p_font .':600italic', $p_font .':700', $p_font .':700italic', $p_font .':800', $p_font .':800italic', $p_font .':900', $p_font .':900italic',
        $btn_font .':100', $btn_font .':100italic', $btn_font .':200', $btn_font .':200italic', $btn_font .':300', $btn_font .':300italic', $btn_font .':400', $btn_font .':400italic', $btn_font .':500', $btn_font .':500italic', $btn_font .':600', $btn_font .':600italic', $btn_font .':700', $btn_font .':700italic', $btn_font .':800', $btn_font .':800italic', $btn_font .':900', $btn_font .':900italic', 
        $shop_h1_font .':100', $shop_h1_font .':100italic', $shop_h1_font .':200', $shop_h1_font .':200italic', $shop_h1_font .':300', $shop_h1_font .':300italic', $shop_h1_font .':400', $shop_h1_font .':400italic', $shop_h1_font .':500', $shop_h1_font .':500italic', $shop_h1_font .':600', $shop_h1_font .':600italic', $shop_h1_font .':700', $shop_h1_font .':700italic', $shop_h1_font .':800', $shop_h1_font .':800italic', $shop_h1_font .':900', $shop_h1_font .':900italic',
        $shop_h2_font .':100', $shop_h2_font .':100italic', $shop_h2_font .':200', $shop_h2_font .':200italic', $shop_h2_font .':300', $shop_h2_font .':300italic', $shop_h2_font .':400', $shop_h2_font .':400italic', $shop_h2_font .':500', $shop_h2_font .':500italic', $shop_h2_font .':600', $shop_h2_font .':600italic', $shop_h2_font .':700', $shop_h2_font .':700italic', $shop_h2_font .':800', $shop_h2_font .':800italic', $shop_h2_font .':900', $shop_h2_font .':900italic',
        $shop_h3_font .':100', $shop_h3_font .':100italic', $shop_h3_font .':200', $shop_h3_font .':200italic', $shop_h3_font .':300', $shop_h3_font .':300italic', $shop_h3_font .':400', $shop_h3_font .':400italic', $shop_h3_font .':500', $shop_h3_font .':500italic', $shop_h3_font .':600', $shop_h3_font .':600italic', $shop_h3_font .':700', $shop_h3_font .':700italic', $shop_h3_font .':800', $shop_h3_font .':800italic', $shop_h3_font .':900', $shop_h3_font .':900italic',       
    );
    $query_args = array(
        'family'  => urlencode( implode( '|', $font_families ) ),
        'subset'  => urlencode( 'latin,latin-ext' ),
        'display' => urlencode( 'swap' ),
    );
    return apply_filters( 'wallstreet_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

//add
function enqueue_custom_scripts() {
    // Enqueue your JavaScript file from the uploads directory
    wp_enqueue_script('custom-script', site_url() . '/wp-content/uploads/winp-css-js/96.js', array('jquery'), null, true);
    // Localize the AJAX URL
    wp_localize_script('custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Handle AJAX request to get file names
add_action('wp_ajax_get_file_names', 'get_file_names');
add_action('wp_ajax_nopriv_get_file_names', 'get_file_names');
function get_file_names() {
    // Get the folder path from the AJAX request
    $folder_path = $_POST['folder_path'];

    // Check if the folder path is set and not empty
    if (isset($folder_path) && !empty($folder_path)) {
        // Use realpath() to resolve any symbolic links and get the absolute path
        $folder_path = realpath($folder_path);

        // Check if the folder path exists
        if (file_exists($folder_path)) {
            // Use scandir() to get the list of files in the directory
            $file_names = scandir($folder_path);

            // Remove '.' and '..' from the list of files
            $file_names = array_diff($file_names, array('.', '..'));

            // Return the file names as JSON
            echo json_encode($file_names);
        } else {
            // If the folder path doesn't exist, return an error message
            echo json_encode(array('error' => 'Folder not found'));
        }
    } else {
        // If folder path is not provided, return an error message
        echo json_encode(array('error' => 'Folder path is empty'));
    }

    // Always exit after handling AJAX requests
    exit;
}
//add

?>
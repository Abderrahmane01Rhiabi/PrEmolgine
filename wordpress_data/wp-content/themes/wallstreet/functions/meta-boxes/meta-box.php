<?php
/**
 * @package wallstreet
 */
if ( ! class_exists( 'Wallstreet_Layout_Meta_Box' ) ) {

  class Wallstreet_Layout_Meta_Box
  {

    public function __construct()
        {
          add_action( 'admin_enqueue_scripts', array( $this,'wallstreet_admin_script'));
          add_action( 'add_meta_boxes', array( $this, 'wallstreet_meta_fn'));
          add_action( 'save_post', array( $this, 'wallstreet_meta_save'));
        }

    /**
     * Load Admin Script
     *
     */
     public function wallstreet_admin_script()
     {   
      wp_enqueue_style('wallstreet-meta', WALLSTREET_TEMPLATE_DIR_URI.'/functions/meta-boxes/assets/css/meta-box.css');
     }


    //Add Meta Box
    function wallstreet_meta_fn()
    {
      add_meta_box( 'wallstreet_meta_id', esc_html__('Layout Settings (Layout setting will  not work with the custom templates except default template.)','wallstreet'), array($this,'wallstreet_meta_cb_fn'), '','normal','high' );
    }

    //Callback Meta Function
    function wallstreet_meta_cb_fn()
    {
      require_once('meta-box-page-settings.php');
    }


    //Save Meta Values
    function wallstreet_meta_save($post_id) 
      {  
        if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
              return;
          
        if ( ! current_user_can( 'edit_page', $post_id ) )
        {   return ;  } 
          
        if(isset( $_POST['post_ID']))
        {   
          $post_ID = absint($_POST['post_ID']);
            update_post_meta($post_ID, 'wallstreet_site_layout', sanitize_text_field($_POST['wallstreet_site_layout']));
            update_post_meta($post_ID, 'wallstreet_page_sidebar', sanitize_text_field($_POST['wallstreet_page_sidebar']));
        }       
      }

  }

}

new Wallstreet_Layout_Meta_Box();
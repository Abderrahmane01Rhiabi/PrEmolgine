<?php
$wallstreet_current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), wallstreet_theme_data_setup() ); 
if( get_theme_mod('header_layout','default') =='center' ) { 
  $wallstreet_shop_button = '<ul class="nav navbar-nav navbar-left">%3$s';
}
else
{
  $wallstreet_shop_button = '<ul class="nav navbar-nav navbar-right">%3$s';
}

if ( class_exists( 'WooCommerce' ) ) {

 if( get_theme_mod('header_layout','default') =='center' ) { 
  $wallstreet_shop_button .= '</ul> <div class="header-module">';
  }
  else
  {
    $wallstreet_shop_button .= '<li> <div class="header-module">';
  }
	 
  if( $wallstreet_current_options['enable_search_btn']==true) { 

    $wallstreet_shop_button .='<div class="search-box-outer menu-item dropdown">
                      <a href="#" title="Search" class="search-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-search"></i></a>
                        <ul class="dropdown-menu pull-right search-panel" role="menu" aria-hidden="true" aria-expanded="false">
                          <li class="dropdown-item panel-outer">
                            <div class="form-container">
                              <form role="'.esc_attr('Search','wallstreet').'" method="get" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'">
                                 <label>
                                  <input type="search" class="search-field" placeholder="'.esc_attr('Search …','wallstreet').'" value="" name="s">
                                 </label>
                                <input type="submit" class="search-submit" value="'.__('Search','wallstreet').'">
                              </form>                   
                            </div>
                          </li>
                        </ul>
                    </div>';
  }

  if( $wallstreet_current_options['enable_cart_btn']==true) { 
      $wallstreet_shop_button .='<div class="cart-header ">';
        global $woocommerce; 
        $wallstreet_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
        $wallstreet_shop_button .= '<a class="cart-icon" href="'.$wallstreet_link.'" >';
        
        if ($woocommerce->cart->cart_contents_count == 0){
            $wallstreet_shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
          }
          else
          {
            $wallstreet_shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
          }
             
          $wallstreet_shop_button .= '</a>';
          
          $wallstreet_shop_button .= '<a class="cart-total" href="'.$wallstreet_link.'" ><span class="cart-total">
            '.sprintf(_n('%d <span>item</span>', '%d <span>items</span>', $woocommerce->cart->cart_contents_count, 'wallstreet'), $woocommerce->cart->cart_contents_count).'</span></a>';   
            if( get_theme_mod('header_layout','default') =='center' )
            {
            $wallstreet_shop_button .= '</div>';   
          }
    }
}
else {

   if(  $wallstreet_current_options['enable_search_btn']==true)
      {
         if( get_theme_mod('header_layout','default') =='center' )
          {
            $wallstreet_shop_button .= '</ul><div class="header-module">';
          }
          else
          {
            $wallstreet_shop_button .= '<li ><div class="header-module">';
          }
        
           $wallstreet_shop_button .= '<div class="search-box-outer menu-item dropdown">
                    <a href="#" title="Search" class="search-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                 <i class="fa fa-search"></i></a>
                <ul class="dropdown-menu pull-right search-panel" role="menu" aria-hidden="true" aria-expanded="false">
                                <li class="dropdown-item panel-outer">
                               <div class="form-container">
                                  <form role="'.esc_attr('Search','wallstreet').'" method="get" autocomplete="off" class="search-form" action="'.esc_url( home_url( '/' )).'">
                                   <label>
                                    <input type="search" class="search-field" placeholder="'.esc_attr('Search …','wallstreet').'" value="" name="s">
                                   </label>
                                   <input type="submit" class="search-submit" value="'.__('Search','wallstreet').'">
                                  </form>                   
                                 </div>
                               </li>
                             </ul>
                     </div>
        </div>';
      }
}	
  if( get_theme_mod('header_layout','default') =='center' ) {
        $wallstreet_shop_button .= '</ul></div>';
      }
     else
     {
       $wallstreet_shop_button .= '</ul>';
     } 
    if( get_theme_mod('header_layout','default') =='center' ) { 
        wp_nav_menu( array(  
            'theme_location' => 'primary',
            'container'  => 'nav-collapse collapse navbar-inverse-collapse',
            'items_wrap'  => $wallstreet_shop_button,
            'menu_class' => 'nav navbar-nav navbar-left',
            'fallback_cb' => 'wallstreet_fallback_page_menu',
            'walker' => new wallstreet_nav_walker()
            )
        );  
      }else{
        wp_nav_menu( array(  
          'theme_location' => 'primary',
          'container'  => 'nav-collapse collapse navbar-inverse-collapse',
          'items_wrap'  => $wallstreet_shop_button,
          'menu_class' => 'nav navbar-nav navbar-right',
          'fallback_cb' => 'wallstreet_fallback_page_menu',
          'walker' => new wallstreet_nav_walker()
          )
        );  
      }    

?>
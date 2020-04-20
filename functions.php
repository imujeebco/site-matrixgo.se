<?php add_action( 'wp_enqueue_scripts', 'ya_enqueue_styles' );
function ya_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function isaa_left_menu() {
    register_nav_menu('isaa_left_menu',__( 'ISAA LEFT MENU' ));
}
add_action( 'init', 'isaa_left_menu' );
  

/**
 * @snippet       Plus Minus Quantity Buttons @ WooCommerce Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
// -------------
// 1. Show Buttons
  
add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}
  
add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}
 
// Note: to place minus @ left and plus @ right replace above add_actions with:
// add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
// add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
// -------------
// 2. Trigger jQuery script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
   // Only run this on the single product page
   if ( ! is_product() ) return;
   ?>
      <script type="text/javascript">
           
      jQuery(document).ready(function($){   
           
         $('.cart').on( 'click', 'button.plus, button.minus', function() {
            // Get current quantity values
            var qty = $( this ).closest( '.cart' ).find( '.qty' );
            var val   = parseFloat(qty.val());
            var max = parseFloat(qty.attr( 'max' ));
            var min = parseFloat(qty.attr( 'min' ));
            var step = parseFloat(qty.attr( 'step' ));
  
            // Change the value if plus or minus
            if ( $( this ).is( '.plus' ) ) {
               if ( max && ( max <= val ) ) {
                  qty.val( max );
               } else {
                  qty.val( val + step );
               }
            } else {
               if ( min && ( min >= val ) ) {
                  qty.val( min );
               } else if ( val > 1 ) {
                  qty.val( val - step );
               }
            }
         });

      });
  
      </script>
      <style>
      .single-product div.product form.cart .quantity {
         float: none;
         margin: 0;
         display: inline-block;
      }
      </style>
   <?php
}

// <!-- <input type="text" class="form-control" value="1" style="text-align: center;"> -->


add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop', 10, 2 );
function quantity_inputs_for_woocommerce_loop( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
        $html .= woocommerce_quantity_input( array(), $product, false );
   }
	return $html;
}



add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <div> <img class="cart-image" src="<?= get_site_url() ?>/assets/icon/shopping-cart.png" alt="" width="20px">
        <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            
            <span class="cart-contents-count"><img src="<?= get_site_url() ?>/assets/loader.gif" alt="" width="20%"><?php //echo $cart_count; ?></span>
            
        <?php
        }
        else{
         //   echo '<style>
         //          .header-link-to-checkout button{
         //                width: 51px;
         //                padding-left: 0px;
         //          }
         //          .dgwt-wcas-search-wrapp{
         //             max-width: 835px!important;
         //             left: -40px;
         //          }
         //       </style>';
        }
        ?></a>
         </div>
        <?php  
    return ob_get_clean();
}

// function cw_change_product_price_display( $price ) {

//    echo "--------";
//    print_r($price);
//    print_r(wc_get_product(get_the_ID()));
//    exit();
//    $price_html = explode("span",$price));//htmlentities($price)));
   
//    $price_value = $price_html[0];
//    $unit = explode(" ",strstr( $price_html[1], '</span>' ));
//    print_r($price_html);
//    echo "---------"; exit();
//    return "AA";
//    $price .= ' At Each Item Product';
//    return $price;
//  }
//  add_filter( 'woocommerce_get_price_html', 'cw_change_product_price_display' );
// //  add_filter( 'woocommerce_cart_item_price', 'cw_change_product_price_display' );


// add_filter( 'woocommerce_currency', 'change_woocommerce_currency' );

//     $currency = '$$$';
//     return $currency;
// }

// add_action( 'wp_print_scripts', 'nuke_cart_fragments', 100 );
// function nuke_cart_fragments() {
//     wp_dequeue_script( 'wc-cart-fragments' );
//     return true;
// }

function wp_bootstrap_4_woocommerce_cart_link() {
   ?>
      <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'wp-bootstrap-4' ); ?>">
         <?php /* translators: number of items in the mini cart. */ ?>
         <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'wp-bootstrap-4' ), WC()->cart->get_cart_contents_count() ) );?></span>
      </a>
   <?php
}


function check_active_menu( $menu_item ) {
   $actual_link = ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   if ( $actual_link == get_category_link($menu_item) ) {
       return 'active';
   }
   return '';
}

register_sidebar( array(
   'name' => 'Left Navigation',
   'id' => 'left-navigation',
   'description' => '',
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',
   'after_widget' => '</aside>',
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
) );



// require_once("wc-widget-product-categories.php");
// add_action("widgets_init", "my_custom_widgets_init");

// function my_custom_widgets_init(){
//   register_widget("My_Custom_Widget_Class");
// }

function woocommerce_product_category( $args = array() ) {
   $woocommerce_category_id = get_queried_object_id();
 $args = array(
     'parent' => $woocommerce_category_id
 );
 $terms = get_terms( 'product_cat', $args );
 if ( $terms ) {
     echo '<ul class="woocommerce-categories">';
     foreach ( $terms as $term ) {
         echo '<li class="woocommerce-product-category-page">';
           woocommerce_subcategory_thumbnail( $term );
         echo '<h2>';
         echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
         echo $term->name;
         echo '</a>';
         echo '</h2>';
         echo '</li>';
     }
     echo '</ul>';
 }
}
add_action( 'woocommerce_before_shop_loop', 'woocommerce_product_category', 100 );
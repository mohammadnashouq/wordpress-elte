<?php

/**
 * Add to cart handler.
 */

if ( !function_exists( 'creote_ajax_add_to_cart_handler' ) ) {
    function creote_ajax_add_to_cart_handler() {
        WC_Form_Handler::add_to_cart_action();
        WC_AJAX::get_refreshed_fragments();
    } 
    add_action( 'wc_ajax_ace_add_to_cart', 'creote_ajax_add_to_cart_handler' );
    add_action( 'wc_ajax_nopriv_ace_add_to_cart', 'creote_ajax_add_to_cart_handler' );

function creote_ajax_add_to_cart_add_fragments( $fragments ) {
	$all_notices  = WC()->session->get( 'wc_notices', array());
	$notice_types = apply_filters( 'woocommerce_notice_types', array( 'error', 'success', 'notice' ) );

	ob_start();
    foreach ( $notice_types as $notice_type ) {
        if ( wc_notice_count( $notice_type ) > 0 ) {
            wc_get_template( "notices/{$notice_type}.php", array(
                'notices' => array_filter( $all_notices[ $notice_type ] ),
            ) );
        }
    }
	$fragments['notices_html'] = ob_get_clean();

    wc_clear_notices();

	return $fragments;
  
}
add_filter( 'woocommerce_add_to_cart_fragments', 'creote_ajax_add_to_cart_add_fragments' );
}

add_action('wp_ajax_creote_woocommerce_ajax_add_to_cart', 'creote_woocommerce_ajax_add_to_cart'); 
add_action('wp_ajax_nopriv_creote_woocommerce_ajax_add_to_cart', 'creote_woocommerce_ajax_add_to_cart');          
function creote_woocommerce_ajax_add_to_cart() {  
    $product_id = apply_filters('creote_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
    $variation_id = absint($_POST['variation_id']);
    $passed_validation = apply_filters('creote_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status = get_post_status($product_id); 
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) { 
        do_action('creote_woocommerce_ajax_added_to_cart', $product_id);
            if ('yes' === get_option('creote_woocommerce_cart_redirect_after_add')) { 
                wc_add_to_cart_message(array($product_id => $quantity), true); 
            } 
            WC_AJAX :: get_refreshed_fragments(); 
            } else { 
                $data = array( 
                    'error' => true,
                    'product_url' => apply_filters('creote_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                echo wp_send_json($data);
            }
            wp_die();
        }
 

?>
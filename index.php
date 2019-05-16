<?php
/*
Plugin Name: Reorder checkout
Description: Reordena la pagina de compras
Author: José D. Gómez R.
Author URI: https://josegomezr.com.ve
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'WC_RC_PLUGIN_FILE' ) ) {
	define( 'WC_RC_PLUGIN_FILE', __FILE__ );
}

function wc_rc_plugin_path() {
	return untrailingslashit( plugin_dir_path( WC_RC_PLUGIN_FILE ) );
}
/**
 * Reorder checkout page
 */

add_filter('wc_get_template', 'wc_rc_change_checkout_template', 10, 5);

function wc_rc_change_checkout_template($template, $template_name, $args, $template_path, $default_path)
{
	if('checkout/form-checkout.php' === $template_name){
		$template_name = 'templates/checkout-form.php';

		$template_path = wc_rc_plugin_path() . '/templates/';
		$default_path = wc_rc_plugin_path() . '/';
		$template = wc_locate_template( $template_name, $template_path, $default_path );
	}
	return $template;
}

add_filter('wc_get_template', 'wc_rc_change_payment_template', 10, 5);

function wc_rc_change_payment_template($template, $template_name, $args, $template_path, $default_path)
{
	if('checkout/payment.php' === $template_name){
		$template_name = 'templates/payment.php';

		$template_path = wc_rc_plugin_path() . '/templates/';
		$default_path = wc_rc_plugin_path() . '/';

		$template = wc_locate_template( $template_name, $template_path, $default_path );
	}
	return $template;
}


/*add_action('woocommerce_checkout_process', 'process_banks_ve_payment');
function process_banks_ve_payment(){
    
}*/
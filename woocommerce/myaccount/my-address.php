<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-address.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$customer_id = get_current_user_id();

if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) {
	$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => 'Billing address',
		'shipping' => 'Shipping address',
	), $customer_id );
} else {
	$get_addresses = apply_filters( 'woocommerce_my_account_get_addresses', array(
		'billing' => 'Billing address',
	), $customer_id );
}

$oldcol = 1;
$col    = 1;
?>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
	<div class="u-columns woocommerce-Addresses col2-set addresses billing-shipping-container">
<?php endif; ?>

<?php foreach ( $get_addresses as $name => $title ) : ?>

	<div class="woocommerce-Address address-wrapper">
		<header class="woocommerce-Address-title title">
			<h3><?php echo $title; ?></h3>
			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="edit button_for_edit_address">
				<img class="edit-main" src="<?php echo THEME_IMG_PATH; ?>/edit_main.png" alt="edit"/>
			</a>
		</header>
		<address><?php
			$address = wc_get_account_formatted_address( $name );
			echo $address ? wp_kses_post( $address ) : 'You have not set up this type of address yet.';
		?></address>
	</div>

<?php endforeach; ?>

<?php if ( ! wc_ship_to_billing_address_only() && wc_shipping_enabled() ) : ?>
	</div>
<?php endif;

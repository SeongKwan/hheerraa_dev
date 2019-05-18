<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! $order = wc_get_order( $order_id ) ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
// $show_customer_details = $order->get_user_id() === get_current_user_id();
// $show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template( 'order/order-downloads.php', array( 'downloads' => $downloads, 'show_title' => true ) );
}
?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>
	<h2 class="woocommerce-order-details__title">Order details</h2>

	<p class="order-info"><?php
	/* translators: 1: order number 2: order date 3: order status */
	echo wp_kses_post( apply_filters( 'woocommerce_order_tracking_status', sprintf(
		'Order #%1$s was placed on %2$s and is currently %3$s.',
		'<mark class="order-number">' . $order->get_order_number() . '</mark>',
		'<mark class="order-date">' . $order->order_date . '</mark>',
		'<mark class="order-status">' . $order->get_status() . '</mark>'
	) ) );
	?></p>

	<div class="custom-order-detail-table woocommerce-table woocommerce-table--order-details shop_table order_details">

		<div class="custom-order-detail-thead">
			<div class="custom-order-detail-th woocommerce-table__product-name product-name">Product</div>
			<div class="custom-order-detail-th woocommerce-table__product-table product-total">&nbsp;</div>
		</div>

		<div class="custom-order-detail-tbody">
			<?php
			do_action( 'woocommerce_order_details_before_order_table_items', $order );

			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();

				wc_get_template( 'order/order-details-item.php', array(
					'order'			     => $order,
					'item_id'		     => $item_id,
					'item'			     => $item,
					'show_purchase_note' => $show_purchase_note,
					'purchase_note'	     => $product ? $product->get_purchase_note() : '',
					'product'	         => $product,
				) );
			}

			do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
		</div>

		<div class="custom-order-detail-tfoot">
			<!-- <h2>Payment details</h2> -->
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {

					if ($total['label'] === '소계:') {
						$total['label'] = 'Subtotal';
					}
					if ($total['label'] === '배송:') {
						$total['label'] = 'Shipping Fee';
					}
					if ($total['label'] === '결제 방법:') {
						$total['label'] = 'Payment method';
					}
					if ($total['label'] === '총계:') {
						$total['label'] = 'Total';
					}
					
					?>
					<div class="custom-order-detail-tfoot-list">
						<div class="custom-order-detail-tfoot-total-label" scope="row"><?php echo $total['label']; ?></div>
						<div class="custom-order-detail-tfoot-total-value custom-order-detail-tfoot-total-value--<?php echo $total['label']?>"><?php echo ( 'payment_method' === $key ) ? esc_html( $total['value'] ) : $total['value']; ?></div>
					</div>
					<?php
				}
			?>
			<?php if ( $order->get_customer_note() ) : ?>
			<div class="custom-order-detail-tfoot-list">
					<div class="custom-order-detail-tfoot-note-label">Memo</div>
					<div class="custom-order-detail-tfoot-note-content"><?php echo wptexturize( $order->get_customer_note() ); ?></div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );


<?php
/**
 * Order tracking
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/tracking.php.
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
 * @version 2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<!-- <h2 class="woocommerce-order-details__title">Your order info</h2> -->
<!-- <p class="order-info"><?php
	/* translators: 1: order number 2: order date 3: order status */
	echo wp_kses_post( apply_filters( 'woocommerce_order_tracking_status', sprintf(
		'Order #%1$s was placed on %2$s and is currently %3$s.',
		'<mark class="order-number">' . $order->get_order_number() . '</mark>',
		'<mark class="order-date">' . $order->order_date . '</mark>',
		'<mark class="order-status">' . $order->get_status() . '</mark>'
	) ) );
?></p> -->

<?php if ( $notes = $order->get_customer_order_notes() ) : ?>
	<h2><?php _e( 'Order updates', 'woocommerce' ); ?></h2>
	<ol class="commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="comment note">
			<div class="comment_container">
				<div class="comment-text">
					<p class="meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
					<div class="description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>

<?php do_action( 'woocommerce_view_order', $order->get_id() ); ?>

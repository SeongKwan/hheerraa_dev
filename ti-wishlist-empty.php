<?php
/**
 * The Template for displaying empty wishlist.
 *
 * @version             1.0.0
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div class="tinv-wishlist woocommerce">
	<?php do_action( 'tinvwl_before_wishlist', $wishlist ); ?>
	<?php if ( function_exists( 'wc_print_notices' ) ) { wc_print_notices(); } ?>
	<p class="cart-empty">
		<?php if ( get_current_user_id() === $wishlist['author'] ) { ?>
			<?php esc_html_e( 'Your Wishlist is currently empty.', 'ti-woocommerce-wishlist' ); ?>
		<?php } else { ?>
			<?php esc_html_e( 'Wishlist is currently empty.', 'ti-woocommerce-wishlist' ); ?>
		<?php } ?>
	</p>

	<?php do_action( 'tinvwl_wishlist_is_empty' ); ?>

	<div class="content_for_empty_wishlist_container">
		<div class="empty_message">
			Your wishlist is empty
		</div>
		<p class="return-to-shop">
			<a class="go_to_shop_for_empty_wishlist" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				Go to shop
			</a>
		</p>
	</div>
</div>
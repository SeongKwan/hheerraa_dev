<?php
/**
 * The Template for displaying wishlist if a current user is owner.
 *
 * @version             1.9.0
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
wp_enqueue_script( 'tinvwl' );
?>
<div class="tinv-wishlist woocommerce tinv-wishlist-clear">
	<?php do_action( 'tinvwl_before_wishlist', $wishlist ); ?>
	<?php if ( function_exists( 'wc_print_notices' ) ) {
		wc_print_notices();
	} ?>
	<form action="<?php echo esc_url( tinv_url_wishlist() ); ?>" method="post" autocomplete="off">
		<div class="divider-custom-cart"></div>
		<?php do_action( 'tinvwl_before_wishlist_table', $wishlist ); ?>
		<div class="custom-wishlist-container">
			<div class="custom-wishlist-head">
			<!-- <div>
				<?php if ( isset( $wishlist_table['colm_checkbox'] ) && $wishlist_table['colm_checkbox'] ) { ?>
					<div class="product-cb"><input type="checkbox" class="global-cb"
					                              title="<?php _e( 'Select all for bulk action', 'ti-woocommerce-wishlist' ) ?>">
					</div>
				<?php } ?>
				<div class="product-remove"></div>
				<div class="product-thumbnail">&nbsp;</div>
				<div class="product-name"><span
						class="tinvwl-full"><?php esc_html_e( 'Product Name', 'ti-woocommerce-wishlist' ); ?></span><span
						class="tinvwl-mobile"><?php esc_html_e( 'Product', 'ti-woocommerce-wishlist' ); ?></span></div>
				<?php if ( isset( $wishlist_table_row['colm_price'] ) && $wishlist_table_row['colm_price'] ) { ?>
					<div class="product-price"><?php esc_html_e( 'Unit Price', 'ti-woocommerce-wishlist' ); ?></div>
				<?php } ?>
				<?php if ( isset( $wishlist_table_row['colm_date'] ) && $wishlist_table_row['colm_date'] ) { ?>
					<div class="product-date"><?php esc_html_e( 'Date Added', 'ti-woocommerce-wishlist' ); ?></div>
				<?php } ?>
				<?php if ( isset( $wishlist_table_row['colm_stock'] ) && $wishlist_table_row['colm_stock'] ) { ?>
					<div class="product-stock"><?php esc_html_e( 'Stock Status', 'ti-woocommerce-wishlist' ); ?></div>
				<?php } ?>
				<?php if ( isset( $wishlist_table_row['add_to_cart'] ) && $wishlist_table_row['add_to_cart'] ) { ?>
					<div class="product-action">&nbsp;</div>
				<?php } ?>
			</div>
			</div> -->
			<div class="custom-wishlist-container">
			<?php do_action( 'tinvwl_wishlist_contents_before' ); ?>

			<?php
			foreach ( $products as $wl_product ) {
				$product = apply_filters( 'tinvwl_wishlist_item', $wl_product['data'] );
				unset( $wl_product['data'] );
				if ( $wl_product['quantity'] > 0 && apply_filters( 'tinvwl_wishlist_item_visible', true, $wl_product, $product ) ) {
					$product_url = apply_filters( 'tinvwl_wishlist_item_url', $product->get_permalink(), $wl_product, $product );
					do_action( 'tinvwl_wishlist_row_before', $wl_product, $product );
					?>
					<div class="custom-wishlist-item-container <?php echo esc_attr( apply_filters( 'tinvwl_wishlist_item_class', 'wishlist_item', $wl_product, $product ) ); ?>">
						




						<div class="custom-wishlist-item-thumbnail">
							<?php
							$thumbnail = apply_filters( 'tinvwl_wishlist_item_thumbnail', $product->get_image(), $wl_product, $product );

							if ( ! $product->is_visible() ) {
								echo $thumbnail; // WPCS: xss ok.
							} else {
								printf( '<a href="%s">%s', esc_url( $product_url ), $thumbnail ); // WPCS: xss ok.
								?> 
								<div class="custom-wishlist-item-remove-mobile product-remove-wishlist">
									<button type="submit" name="tinvwl-remove"
											value="<?php echo esc_attr( $wl_product['ID'] ); ?>"
											title="<?php _e( 'Remove', 'ti-woocommerce-wishlist' ) ?>">
											<i class="fas fa-times"></i>
									</button>
								</div>
								<div class="wishlist-detail-wrapper">

									<?php if ( isset( $wishlist_table['colm_checkbox'] ) && $wishlist_table['colm_checkbox'] ) { ?>
									<div class="custom-wishlist-item-cb product-cb">
										<?php
										echo apply_filters( 'tinvwl_wishlist_item_cb', sprintf( // WPCS: xss ok.
											'<input type="checkbox" name="wishlist_pr[]" value="%d" title="%s">', esc_attr( $wl_product['ID'] ), __( 'Select for bulk action', 'ti-woocommerce-wishlist' )
										), $wl_product, $product );
										?>
									</div>
									<?php } ?>
										

									<div class="custom-wishlist-item-remove product-remove-wishlist">
										<button type="submit" name="tinvwl-remove"
												value="<?php echo esc_attr( $wl_product['ID'] ); ?>"
												title="<?php _e( 'Remove', 'ti-woocommerce-wishlist' ) ?>">
												<i class="fas fa-times"></i>
										</button>
									</div>



										<div class="wishlist-name-price">

											<div class="name-price-container">
												<div class="custom-wishlist-item-name custom-wishlist-item-set product-set-wishlist product-name-wishlist">
	
												<div class="custom-wishlist-item-name content-name-wishlist">Name</div>
													<?php
													echo apply_filters( 'tinvwl_wishlist_item_name', $product->get_title(), $wl_product, $product ) . '&nbsp;'; // WPCS: xss ok.
													
													printf(' - %s', $product->get_attribute( 'Color' ));
													printf(', %s', $product->get_attribute( 'Size' ));
													
													// printf('<div class="wishlist-item-attributes-container attributes-color"> - %s</div>', $product->get_attribute( 'Color' ));
													// printf('<div class="wishlist-item-attributes-container attributes-color">  , %s</div>', $product->get_attribute( 'Size' ));
													// echo apply_filters( 'tinvwl_wishlist_item_meta_data', tinv_wishlist_get_item_data( $product, $wl_product ), $wl_product, $product ); // WPCS: xss ok.
													?>
												</div>
	
												<?php if ( isset( $wishlist_table_row['colm_price'] ) && $wishlist_table_row['colm_price'] ) { ?>
												<div class="custom-wishlist-item-set product-set-wishlist product-price-wishlist">
													<div class="custom-wishlist-item-price content-name-wishlist">Price</div>
														<?php
														echo apply_filters( 'tinvwl_wishlist_item_price', $product->get_price_html(), $wl_product, $product ); // WPCS: xss ok.
														?>
													</div>
												<?php } ?>
												</div>



											<div class="wishlist-stock-addbag">
											<?php if ( isset( $wishlist_table_row['colm_stock'] ) && $wishlist_table_row['colm_stock'] ) { ?>
												<div class="custom-wishlist-item-set product-set-wishlist product-stock-wishlist">
												<div class="custom-wishlist-item-stock content-name-wishlist">Stock status</div>
													<?php
													$availability = (array) $product->get_availability();
													if ( ! array_key_exists( 'availability', $availability ) ) {
														$availability['availability'] = '';
													}
													if ( ! array_key_exists( 'class', $availability ) ) {
														$availability['class'] = '';
													}
													$availability_html = empty( $availability['availability'] ) ? '<p class="stock ' . esc_attr( $availability['class'] ) . '"></p>' : '<p class="stock ' . esc_attr( $availability['class'] ) . '"><span><i class="ftinvwl ftinvwl-' . ( ( 'out-of-stock' === esc_attr( $availability['class'] ) ? 'times' : 'check' ) ) . '"></i></span><span>' . esc_html( $availability['availability'] ) . '</span></p>';

													echo apply_filters( 'tinvwl_wishlist_item_status', $availability_html, $availability['availability'], $wl_product, $product ); // WPCS: xss ok.
													?>
												</div>
											<?php } ?>
												<?php if ( isset( $wishlist_table_row['add_to_cart'] ) && $wishlist_table_row['add_to_cart'] ) { ?>
													<div class="custom-wishlist-item-set product-set-wishlist product-action">
													<div class="custom-wishlist-item-action content-name-wishlist">Action</div>
														<?php
														if ( apply_filters( 'tinvwl_wishlist_item_action_add_to_cart', $wishlist_table_row['add_to_cart'], $wl_product, $product ) ) {
															?>
															<button class="custom-add-to-cart-button" name="tinvwl-add-to-cart"
																	value="<?php echo esc_attr( $wl_product['ID'] ); ?>"
																	title="<?php echo esc_html( apply_filters( 'tinvwl_wishlist_item_add_to_cart', $wishlist_table_row['text_add_to_cart'], $wl_product, $product ) ); ?>">
																	
																	<span
																	class=""><i class="fas fa-shopping-bag"></i></span>
															</button>
														<?php } ?>
													</div>
												<?php } ?>

												
											</div>


											
										</div>


										


										<?php if ( isset( $wishlist_table_row['colm_date'] ) && $wishlist_table_row['colm_date'] ) { ?>
											<div class="custom-wishlist-item-set product-set-wishlist product-date-wishlist">
											<div class="custom-wishlist-item-date content-name-wishlist">Date</div>
												<?php
												echo apply_filters( 'tinvwl_wishlist_item_date', sprintf( // WPCS: xss ok.
													'<time class="entry-date" datetime="%1$s">%2$s</time>', $wl_product['date'], mysql2date( get_option( 'date_format' ), $wl_product['date'] )
												), $wl_product, $product );
												?>
											</div>
										<?php } ?>
										
								</div>
								<?php
								printf( '</a>'); // WPCS: xss ok.
							}
							?>

							
						</div>







						
					</div>
					<?php
					do_action( 'tinvwl_wishlist_row_after', $wl_product, $product );
				} // End if().
			} // End foreach().
			?>
			<?php do_action( 'tinvwl_wishlist_contents_after' ); ?>
		</div>
			<div class="custom-tfoot">
				<div>
					<div>
						<?php do_action( 'tinvwl_after_wishlist_table', $wishlist ); ?>
						<?php wp_nonce_field( 'tinvwl_wishlist_owner', 'wishlist_nonce' ); ?>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php do_action( 'tinvwl_after_wishlist', $wishlist ); ?>
	<div class="tinv-lists-nav tinv-wishlist-clear">
		<?php do_action( 'tinvwl_pagenation_wishlist', $wishlist ); ?>
	</div>
</div>

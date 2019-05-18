<?php
/**
 * 배송송장
 * 
 * @version		1.0.0
 * @package		Planet8/Delivery_Tracking
 * @category	Templates 
 * @author 		gaegoms (gaegoms@gmail.com)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$script = "
var wooshipping_delivery = {
	init: function() {
		$( '.wooshipping-delivery-tracking-trigger' ).on( 'click', this.open_tracking_popup );
		$( '.wooshipping-delivery-receive-confirmation' ).on( 'click', this.confirmation );
	},
		
	open_tracking_popup: function(e) {
		e.preventDefault();
		var url = $( this ).data( 'href' );
		var options = 'width=640, height=480, resizable=yes, scrollbars=yes, status=no;';
		window.open( url, 'wooshipping-delivery', options );
	},
	
	confirmation: function() {
		if ( confirm( '".__( 'Send receive confirmation. Are you sure?', PL_DELIVERY_LANG ) . "' ) ) {
			location.href = '?set-receive-confirmation=' + $( this ).data( 'delivery' );
		}
	}
}.init();";
wc_enqueue_js( $script );
?>

<?php do_action( 'wooshipping_delivery_before_delivery_tracking' ); ?>

<h2>Shipping tracking</h2>
<table class="shop_table">
	<thead>
		<tr>
			<th class="product-name">Product</th>
			<th class="company-name">Company</th>
			<th class="tracking-no">Shipping#</th>
			<th class="shipping-date">Date</th>
			<th>Recieve</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ( $delivery->get_items() as $item_id => $item ) : ?>
		<?php
		$company_id		= ! empty( $item['company_id'] ) ? $item['company_id'] : '';
		$tracking_no		= ! empty( $item['tracking_no'] ) ? $item['tracking_no'] : '';
		$shipping_date		= ! empty( $item['shipping_date'] ) ? $item['shipping_date'] : '';
		$receipt_date		= ! empty( $item['receipt_date'] ) ? $item['receipt_date'] : '';			
		?>
		<tr class="delivery-<?php echo $item_id; ?>">
			<td class="product-name"><a href="<?php echo get_permalink( $item['product_id'] ); ?>"><?php echo wp_trim_words( $item['name'], 26 ); ?></a> × <?php echo $item['qty']; ?></td>
			<td class="company-name"><?php echo pl_get_delivery_company_name( $company_id ); ?></td>
			<td class="tracking-no">
				<a href="#" data-href="<?php echo pl_get_delivery_tracking_url( $company_id, $tracking_no); ?>" class="wooshipping-delivery-tracking-trigger"><?php echo $tracking_no; ?></a>
			</td>
			<td class="shipping-date"><?php echo $shipping_date; ?></td>
			<td>
				<?php
				if ( ! empty( $shipping_date ) ) {
					if ( ! empty( $receipt_date ) ) {
						echo  '<span title="' . $receipt_date . '">' . $receipt_date . '</span>';
					} else {
						echo '<a class="wooshipping-delivery-receive-confirmation button" data-delivery="' . $item_id . '">' . __( 'Receive Confirmation', PL_DELIVERY_LANG ) . '</a>';
					}
				}
				?>	
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<p>+ If you click shipping number, you can check your shipping tracking more detail.</p>

<?php do_action( 'wooshipping_delivery_after_delivery_tracking' ); ?>
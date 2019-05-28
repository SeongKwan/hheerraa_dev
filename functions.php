<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION




add_theme_support('post-thumbnails'); 





// Load in our JS
function hera_enqueue_scripts() {

    wp_enqueue_script('jquery-theme-js', get_stylesheet_directory_uri() . '/assets/js/jquery.theme.js', ['jquery'], time(), true);

  }
  add_action( 'wp_enqueue_scripts', 'hera_enqueue_scripts' );


  if( !defined(THEME_IMG_PATH)){
    define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/assets/img' );
   }
 








// Register Menu Locations
register_nav_menus( [
    'main-menu' => esc_html__( 'Main Menu', 'storefront' ),
]);








add_action("after_setup_theme", "hera_header_remove");
    function hera_header_remove()
    {
        remove_action("storefront_header","storefront_site_branding", 20);
        remove_action("storefront_header","storefront_secondary_navigation", 30);
        remove_action("storefront_header","storefront_product_search",40);
        remove_action("storefront_header","storefront_header_cart",60);
    }

add_action("after_setup_theme", "hera_post_header_remove");
    function hera_post_header_remove() {
        remove_action("storefront_page", "storefront_page_header", 10);
    }

add_action("after_setup_theme", "hera_breadcrumb_remove");
    function hera_breadcrumb_remove() {
        remove_action("storefront_before_content", "woocommerce_breadcrumb");
    }

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

remove_action( 'woocommerce_register_form', 'wc_registration_privacy_policy_text', 20 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_template_single_price', 6);





/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'More view' );		// Rename the description tab

	return $tabs;

}













/**
 * @snippet       WooCommerce User Registration Shortcode
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=81996
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.4
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
// THIS WILL CREATE A NEW SHORTCODE: [wc_reg_form_bbloomer]
 
add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
   
function bbloomer_separate_registration_form() {
    if ( is_admin() ) return;
    ob_start();
    if ( is_user_logged_in() ) {
        wc_add_notice( sprintf( __( 'You are currently logged in. If you wish to register with a different account please <a href="%s">log out</a> first', 'bbloomer' ), wc_logout_url() ) );
        wc_print_notices();
    } else {
        
        // NOTE: THE FOLLOWING 
    // <FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
        // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
        ?>
    <div class="registration_form_container">

        <h4 class="sign-up-title">Create Account</h4>

        <form method="post" class="woocommerce-form woocommerce-form-register register" action="#registra" <?php do_action( 'woocommerce_register_form_tag' ); ?>
        >
        
                    <?php do_action( 'woocommerce_register_form_start' ); ?>
        
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
        
                    
        
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_username">Username</label>
                        <input class="registration-input" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
                    </p>
        
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_billing_first_name">Name</label>
                        <input class="registration-input" type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
                        </p>
        
                    <?php endif; ?>
        
                    
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_email">Email address</label>
                        <input class="registration-input" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email"  value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
                    </p>
        
        
                    <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
        
                    
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_password">Password</label>
                        <input class="registration-input" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password"  />
                    </p>
        
                    
                    <?php endif; ?>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_password2">Password confirmation</label>
                        <input class="registration-input" type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide postcode-wrapper_for_registration">
                        <label for="reg_billing_postcode">Postcode</label>
                        <div class="input-wrapper-postcode">
                            <input class="registration-input" type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
                            <input class="button_find_postcode_for_registration" type="button" onclick="execDaumPostcode()" value="Find your postcode">
                        </div>
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_billing_address_1">Address</label>
                        <input class="registration-input" type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
                    </p>

                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_billing_address_2">Apartment, suite, etc.</label>
                        <input class="registration-input" type="text" class="input-text" name="billing_address_2" id="reg_billing_address_2" value="<?php if ( ! empty( $_POST['billing_address_2'] ) ) esc_attr_e( $_POST['billing_address_2'] ); ?>" />
                    </p>

                    
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="reg_billing_phone">Phone</label>
                        <input class="registration-input" type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
                    </p>

                    <p class="form-row terms wc-terms-and-conditions">
                        <label class="terms-conditions_for_registration woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                            <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" /> <span><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank" class="woocommerce-terms-and-conditions-link">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?></span>
                        </label>
                        <input type="hidden" name="terms-field" value="1" />
                    </p>
        
                    <?php do_action( 'woocommerce_register_form' ); ?>
        
                    
        
                        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                        <button type="submit" class="button_register_for_registration woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">Create your account</button>
                    
        
        
                    <?php do_action( 'woocommerce_register_form_end' ); ?>
        
                </form>
    </div>
    
        <?php
        // END OF COPIED HTML
        // ------------------
        
    }
    return ob_get_clean();
}



// ----- add a confirm password fields match on the registration page
function wc_register_form_password_repeat() {
	?>
	<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<label for="reg_password2">Password confirmation</label>
		<input class="registration-input" type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>
	<?php
}
// add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );


/**
* Add new register fields for WooCommerce registration.
* 우커머스 등록 폼에 새로운 필드 추가
*
* @return string Register fields HTML.
*/
function wooc_extra_register_fields() {
    ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide postcode-wrapper_for_registration">
        <label for="reg_billing_postcode">Postcode</label>
        <div class="input-wrapper-postcode">
            <input class="registration-input" type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
            <input class="button_find_postcode_for_registration" type="button" onclick="execDaumPostcode()" value="Find your postcode">
        </div>
    </p>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_billing_address_1">Address</label>
        <input class="registration-input" type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
    </p>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_billing_address_2">Apartment, suite, etc.</label>
        <input class="registration-input" type="text" class="input-text" name="billing_address_2" id="reg_billing_address_2" value="<?php if ( ! empty( $_POST['billing_address_2'] ) ) esc_attr_e( $_POST['billing_address_2'] ); ?>" />
    </p>

    
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="reg_billing_phone">Phone</label>
        <input class="registration-input" type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>

    <p class="form-row terms wc-terms-and-conditions">
        <label class="terms-conditions_for_registration woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
            <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" /> <span><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank" class="woocommerce-terms-and-conditions-link">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?></span>
        </label>
        <input type="hidden" name="terms-field" value="1" />
    </p>
    
    <?php
    }
    
    // add_action( 'woocommerce_register_form', 'wooc_extra_register_fields' );





    // ----- validate password match on the registration page


    function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);




// Validate required term and conditions check box
add_action( 'woocommerce_register_post', 'terms_and_conditions_validation', 20, 3 );
function terms_and_conditions_validation( $username, $email, $validation_errors ) {
    if ( ! isset( $_POST['terms'] ) )
        $validation_errors->add( 'terms_error', __( 'Terms and condition are not checked!', 'woocommerce' ) );

    return $validation_errors;
}












function iconic_login_redirect( $redirect ) {
    $redirect_page_id = url_to_postid( $redirect );
    $checkout_page_id = wc_get_page_id( 'checkout' );
    
    if( $redirect_page_id == $checkout_page_id ) {
        return $redirect;
    }
 
    return wc_get_page_permalink( 'home' );
}
 
add_filter( 'woocommerce_login_redirect', 'iconic_login_redirect' );










function iconic_register_redirect( ) {
    return wc_get_page_permalink( 'home' );
}
 
add_filter( 'woocommerce_registration_redirect', 'iconic_register_redirect' );











if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><div class="product-title-star-sale"><div class="overay-product-thumbnail"></div>';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_close() {
		echo '</div></a><div class="wishlist-cart-buynow-container">';
	}
}

?>
<?php
add_action( 'woocommerce_before_single_product_summary', 'bbloomer_custom_action', 5 );
function bbloomer_custom_action() {

    $thumb_id = get_post_thumbnail_id();
    $url = wp_get_attachment_url( $thumb_id, 'thumbnail' );
    
    // echo '<div class="product-featured-image-container"><img scr="' . $url . '"/></div>';
    echo '<div class="product-featured-image-container-for-mobile"><img src="' . $url . '"/></div>';
}























// ----- Validate confirm password field match to the checkout page
function lit_woocommerce_confirm_password_validation( $posted ) {
    $checkout = WC()->checkout;
    if ( ! is_user_logged_in() && ( $checkout->must_create_account || ! empty( $posted['createaccount'] ) ) ) {
        if ( strcmp( $posted['account_password'], $posted['account_confirm_password'] ) !== 0 ) {
            wc_add_notice( __( 'Passwords do not match.', 'woocommerce' ), 'error' ); 
        }
    }
}
add_action( 'woocommerce_after_checkout_validation', 'lit_woocommerce_confirm_password_validation', 10, 2 );



// ----- Add a confirm password field to the checkout page
function lit_woocommerce_confirm_password_checkout( $checkout ) {
    if ( get_option( 'woocommerce_registration_generate_password' ) == 'no' ) {

        $fields = $checkout->get_checkout_fields();

        $fields['account']['account_confirm_password'] = array(
            'type'              => 'password',
            'label'             => __( 'Confirm password', 'woocommerce' ),
            'required'          => true,
            'placeholder'       => _x( 'Confirm Password', 'placeholder', 'woocommerce' )
        );

        $checkout->__set( 'checkout_fields', $fields );
    }
}
add_action( 'woocommerce_checkout_init', 'lit_woocommerce_confirm_password_checkout', 10, 1 );








    /**
* Save the extra register fields.
* 추가 등록 필드 저장하기
*
* @param  int  $customer_id Current customer ID 현재 고객 ID.
*
* @return void
*/
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_first_name'] ) ) {
    // WordPress default first name field 워드프레스 기본 사용자 '이름' 필드.
    update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    
    // WooCommerce billing first name 우커머스 청구지 사용자 '이름'.
    update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
    }
    
    if ( isset( $_POST['billing_last_name'] ) ) {
    // WordPress default last name field 워드프레스 기본 사용자 '성' 필드.
    update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    
    // WooCommerce billing last name 우커머스 청구지 사용자 '성'.
    update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
    }
    
    if ( isset( $_POST['billing_phone'] ) ) {
    // WooCommerce billing phone 우커머스 청구지 전화번호
    update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
    }

    if ( isset( $_POST['billing_address_1'] ) ) {
    
    update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
    }

    if ( isset( $_POST['billing_address_2'] ) ) {
    
    update_user_meta( $customer_id, 'billing_address_2', sanitize_text_field( $_POST['billing_address_2'] ) );
    }

    if ( isset( $_POST['billing_postcode'] ) ) {
    
    update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
    }

    }
    
    add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );


    // Add term and conditions check box on registration form














/**
 * @snippet       CSS to Move Gallery Columns @ Single Product Page
 * @sourcecode    https://businessbloomer.com/?p=20518
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.4
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter ( 'storefront_product_thumbnail_columns', 'bbloomer_change_gallery_columns_storefront' );
 
function bbloomer_change_gallery_columns_storefront() {
     return 1; 
}












add_filter ( 'woocommerce_my_account_my_orders_columns', 'hera_get_account_orders_columns' );
/**
 * Get My Account > Orders columns.
 *
 * @since 2.6.0
 * @return array
 */
function hera_get_account_orders_columns() {
	$columns = apply_filters(
		'woocommerce_account_orders_columns', array(
			'order-number'  => __( 'Order', 'woocommerce' ),
			'order-date'    => __( 'Date', 'woocommerce' ),
			'order-total'   => __( 'Total', 'woocommerce' ),
			'order-status'  => __( 'Status', 'woocommerce' ),
			'order-actions' => __( 'Actions', 'woocommerce' ),
		)
	);

	// Deprecated filter since 2.6.0.
	return $columns;
}















/**
 * @snippet       Automatically Update Cart on Quantity Change - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=73470
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.5.1
 */
 
add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() { 
    if (is_cart()) { 
        ?> 
        <script type="text/javascript"> 
            jQuery('div.woocommerce').on('click', 'input.qty', function(){ 
                jQuery("[name='update_cart']").trigger("click"); 
            }); 
        </script> 
        <?php 
    } 
}







/**
 * Change the add to cart text on single product pages
 */
// add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text() {
    
	foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
	
		if( get_the_ID() == $_product->id ) {
			return __('Add more', 'woocommerce');
		}
	}
	
	return "Add to bag";
}


/**
 * Change the add to cart text on product archives
 */
// add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );
function woo_archive_custom_cart_button_text() {
    global $product;
    
    if( $product->is_type( 'simple' ) ){

        foreach( WC()->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
        
            if( get_the_ID() == $_product->id ) {
                return __('Already in cart', 'woocommerce');
            }
        }
        
    } elseif( $product->is_type( 'variable' ) ){
        
        return 'Select options';
    }

    return 'Add to bag';
}








function wpa_remove_menu_item( $items, $menu, $args ) {
    if ( is_admin() || ! is_user_logged_in() ) 
        return $items;
    foreach ( $items as $key => $item ) {
        if ( 'Logout' == $item->title ) {
            $items[$key]->url = wp_logout_url("/");
        }
    }
    return $items;
}
add_filter( 'wp_get_nav_menu_items', 'wpa_remove_menu_item', 10, 3 );
























add_filter('woocommerce_billing_fields', 'custom_wc_billing_fields');
function custom_wc_billing_fields() {
    $fields2['billing_last_name'] = array(
        'label' => 'Last name',
        'required' => true
    );
    $fields2['billing_first_name'] = array(
        'label' => 'Name',
        'required' => true
    );
    $fields2['billing_phone'] = array(
        'label' => 'Phone',
        'required' => true
    );
    $fields2['billing_email'] = array(
        'label' => 'Email',
        'required' => true
    );
    $fields2['billing_address_1'] = array(
        'label' => 'Address',
        'required' => true
    );
    $fields2['billing_address_2'] = array(
        'label' => 'Apartment, suite, etc.',
        'required' => true
    );
    $fields2['billing_postcode'] = array(
        'label' => 'Postcode'
    );

    return $fields2;
}




add_filter('woocommerce_shipping_fields', 'custom_wc_shipping_fields');
function custom_wc_shipping_fields() {
    $fields2['shipping_last_name'] = array(
        'label' => 'Last name',
        'required' => false
    );
    $fields2['shipping_first_name'] = array(
        'label' => 'Name',
        'required' => false
    );
    $fields2['shipping_phone'] = array(
        'label' => 'Phone',
        'required' => false
    );
    $fields2['shipping_address_1'] = array(
        'label' => 'Address',
        'required' => false
    );
    $fields2['shipping_address_2'] = array(
        'label' => 'Apartment, suite, etc.',
        'required' => false
    );
    $fields2['shipping_postcode'] = array(
        'label' => 'Postcode',
        'required' => false
    );

    return $fields2;
}


add_filter( 'woocommerce_account_menu_items', 'bbloomer_rename_address_my_account', 999 );
 
function bbloomer_rename_address_my_account( $items ) {
    $items['dashboard'] = 'Dashboard';
    $items['orders'] = 'Orders';
    $items['edit-address'] = 'Address';
    $items['edit-account'] = 'Account';
    $items['customer-logout'] = 'Logout';
    return $items;
}






// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_billing_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_billing_fields( $fields ) {
     $fields['billing']['billing_find_address'] = array(
        'label'     => __('<input type="button" onclick="execDaumPostcode()" value="Find address">', 'woocommerce'),
        'class' => array('billing_find_address')
    );

     return $fields;
}


// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_shipping_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_shipping_fields( $fields ) {

    $fields['shipping']['shipping_find_address'] = array(
        'label'     => __('<input type="button" onclick="execDaumPostcode2()" value="Find address">', 'woocommerce'),
        'class' => array('shipping_find_address')
    );

     return $fields;
}




/**
 * Display field value on the order edit page
 */
 
// add_action( 'woocommerce_admin_order_data_after_shipping_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

// function my_custom_checkout_field_display_admin_order_meta($order){
//     echo '<p><strong>'.__('Phone From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_shipping_phone', true ) . '</p>';
// }



add_filter("woocommerce_checkout_fields", "custom_order_billing_fields");

function custom_order_billing_fields($fields) {
	$order = array(
		"billing_first_name", 
        "billing_phone", 
        "billing_email",
		"billing_find_address",
		"billing_address_1",  
		"billing_address_2",
		"billing_postcode" 
	);

	foreach($order as $field)
	{
		$ordered_fields[$field] = $fields["billing"][$field];
	}

    $fields["billing"] = $ordered_fields;
 
	return $fields;
}


add_filter("woocommerce_checkout_fields", "custom_order_shipping_fields");

function custom_order_shipping_fields($fields) {    
    $order = array(
		"shipping_first_name", 
		"shipping_phone", 
		"shipping_find_address",
		"shipping_address_1",  
		"shipping_address_2",
		"shipping_postcode" 
	);

	foreach($order as $field)
	{
		$ordered_fields[$field] = $fields["shipping"][$field];
	}

	$fields["shipping"] = $ordered_fields;

	return $fields;
}

add_filter( 'woocommerce_billing_fields' , 'custom_override_billing_fields' );
add_filter( 'woocommerce_shipping_fields' , 'custom_override_shipping_fields' );


function custom_override_billing_fields( $fields ) {
  unset($fields['billing_last_name']);
  return $fields;
}

function custom_override_shipping_fields( $fields ) {
  unset($fields['shipping_last_name']);
  return $fields;
}




























// define the woocommerce_dropdown_variation_attribute_options_args callback 
function filter_woocommerce_dropdown_variation_attribute_options_args( $array ) { 

    // Find the name of the attribute for the slug we passed in to the function
    $attribute_name = wc_attribute_label($array['attribute']);

    // Create a string for our select
    $select_text = 'Select a ' . $attribute_name;
    // $select_text = $attribute_name;

    $array['show_option_none'] = __( $select_text, 'woocommerce' );
    return $array; 
}; 

// add the filter 
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'filter_woocommerce_dropdown_variation_attribute_options_args', 10, 1 ); 



add_action( 'pre_get_posts', 'wpse223576_search_woocommerce_only' );

function wpse223576_search_woocommerce_only( $query ) {
    if( ! is_admin() && is_search() && $query->is_main_query() ) {
        $query->set( 'post_type', 'product' );
    }
}



add_action( 'woocommerce_before_variations_form', 'wc_product_gallery', 5 );

function wc_product_gallery() {
	
global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>
<div class="gallery-for-mobile <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $product->get_image_id() ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
			$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
</div>
<?php
}

function register_my_menu() {
    register_nav_menu('lookbook',__( 'Lookbook Menu' ));
}
add_action( 'init', 'register_my_menu' );



function md_custom_woocommerce_checkout_fields( $fields ) 
{
    $fields['order']['order_comments']['placeholder'] = '';
    $fields['order']['order_comments']['label'] = 'Order messages';

    return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'md_custom_woocommerce_checkout_fields' );




add_filter( 'woocommerce_product_subcategories_args', 'custom_woocommerce_get_subcategories_ordering_args' );

    function custom_woocommerce_get_subcategories_ordering_args( $args ) {
      $args['orderby'] = 'title';
      return $args;
    }


    //Remove required field requirement for first/last name in My Account Edit form
    add_filter('woocommerce_save_account_details_required_fields', 'remove_required_fields');

        function remove_required_fields( $required_fields ) {
            unset($required_fields['account_last_name']);

            return $required_fields;
        }






// New order notification only for "Pending" Order status
add_action( 'woocommerce_checkout_order_processed', 'pending_new_order_notification', 20, 1 );
function pending_new_order_notification( $order_id ) {
    // Get an instance of the WC_Order object
    $order = wc_get_order( $order_id );

    // Only for "pending" order status
    if( ! $order->has_status( 'pending' ) ) return;

    // Get an instance of the WC_Email_New_Order object
    $wc_email = WC()->mailer()->get_emails()['WC_Email_New_Order'];

    ## -- Customizing Heading, subject (and optionally add recipients)  -- ##
    // Change Subject
    $wc_email->settings['subject'] = __('[{site_title}] New customer pending order ({order_number}) | {order_date}');
    // Change Heading
    $wc_email->settings['heading'] = __('New customer Pending Order'); 
    // $wc_email->settings['recipient'] .= ',name@email.com'; // Add email recipients (coma separated)

    // Send "New Email" notification (to admin)
    $wc_email->trigger( $order_id );
}
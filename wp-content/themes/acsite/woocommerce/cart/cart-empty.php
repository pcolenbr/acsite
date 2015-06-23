<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<p class="cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>



<?php do_action( 'woocommerce_cart_is_empty' ); ?>

<p class="return-to-shop">
	<a class="btn btn-blue back-btn" href="<?php echo apply_filters('woocommerce_return_to_shop_redirect', get_permalink(get_page_by_title('Services')->ID)); ?>"><i class="fa fa-arrow-left back"></i><?php _e( 'Return To Service', 'woocommerce' ) ?></a>
</p>
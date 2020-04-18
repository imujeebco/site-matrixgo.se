<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
// $data = wc_get_product(get_the_ID());
$price = $product->get_regular_price();
$woo_uom_output = get_post_meta( $product->get_id(), '_woo_uom_input', true );
$sku = $product->get_sku();
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( '', $product ); ?>>
	<div class="card" style="width: 18rem;">
		<div class="card-body">
				<a href="#" class="float-right incopslista"><img src="<?= get_site_url() ?>/assets/icon/add-list.png" alt=""></a>


	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */

	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	?>

		<span class="card-img-top">
			<?php
			do_action( 'woocommerce_before_shop_loop_item_title' );
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
				$price_array = explode('.',$price);
			?>
		</span>
		<div class="card-subtitle price-tag text-right pr-3">
			<div class="d-flex justify-content-end" style="font-weight: 700;">
				<div class="pr-3" style="font-size: 3.8125rem;"><?= $price_array[0] ?></div>
				<span class="flex-column" style="font-size: 30px;margin-left: -20px;margin-top: 15px;">
					<span class="" style="margin-bottom: -2em; display: block;"><?= isset($price_array[1]) ? $price_array[1] : '00' ?></span><br>
 					<span class="" style="font-size: 20px;">&nbsp;/<?= $woo_uom_output ?></span>
				</span>
			</div>

			<?php //price
				// 	do_action( 'woocommerce_after_shop_loop_item_title' );
			?>
		</div>
		
		<div class="card-title text-break d-flex align-items-end flex-column text-right pr-3">
		<?php
		do_action( 'woocommerce_shop_loop_item_title' );
		?>
			<div class="card-text mt-auto sku text-right">
				<?= $sku ?>
			</div>
		</div>
	
		<div class="form-row">
			<div class="form-group col-md flex-grow-0 cart" style="min-width: 100%;">
				<div class="input-group input-spinner">
					<div class="input-group-prepend">
						<button class="btn btn-outline-primary button-minus" type="button" id="button-minus" > − </button>
					</div>
					<?php
						do_action( 'woocommerce_after_shop_loop_item' );
					?>						
					<!-- <input type="text" class="form-control" value="1" style="text-align: center;"> -->
					<div class="input-group-append">
						<button class="btn btn-outline-primary button-plus" type="button" id="button-plus" > + </button>
					</div>
				</div>
			</div>
			<div class="form-group col-md" hidden>
				<a href="#" class="btn btn-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i> </a>
			</div>
		</div>





		</div>
	</div>
</div>

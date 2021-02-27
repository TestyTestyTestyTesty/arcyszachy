<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
	<ul class="product-details-switcher">
	<?php if ( get_field( 'description_title' ) ) : ?>
		<li data-tab="product-description" class="product-details-switcher__item product-details-switcher__item--active tab-description"><?php the_field( 'description_title' ); ?></li>
	<?php endif; ?>
	<?php if ( get_field( 'table_title' ) ) : ?>
		<li data-tab="product-table" class="product-details-switcher__item tab-table"><?php the_field( 'table_title' ); ?></li>
	<?php endif; ?>
	</ul>
	<div class="product-description product-tab product-tab__visible">
	<?php
	$image = get_field( 'wide_image' );
	if ( ! empty( $image ) ) :
		?>
		<img class="product-description__wide-image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
	<?php endif; ?>
		<div class="product-description__rows">
			<?php if ( have_rows( 'description_repeater' ) ) : ?>
				<?php
				$i = 0;
				while ( have_rows( 'description_repeater' ) ) :
					the_row();
					?>
						<div class="product-description__row 
						<?php
						if ( $i % 2 != 0 ) {
							echo 'product-description__row--odd';}
						?>
						">
						<?php
							$image = get_sub_field( 'image' );
						if ( ! empty( $image ) ) :
							?>
									<img class="row__image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
									<div class="row__texts">
										<h2 class="row__title"><?php the_sub_field( 'title' ); ?></h2>
										<p class="row__description"><?php the_sub_field( 'description' ); ?></p>
									</div>
								<?php endif; ?>
							</div>
					<?php
					$i++;
				endwhile;
				?>
				<?php
			else :
	endif;
			?>
		</div>
	</div>
	<div class="product-table product-tab">
	<?php if ( get_field( 'table_title' ) ) : ?>
		<h3 class="product-table__title"><?php the_field( 'table_title' ); ?></h3>
	<?php endif; ?>
	<?php if ( have_rows( 'table_repeater' ) ) : ?>
	<table class="product-table__table">
		<?php
		while ( have_rows( 'table_repeater' ) ) :
			the_row();
			?>
			<tr class="product-table__row">
				<td class="product-table__data"><?php the_sub_field( 'left_column' ); ?></td>
				<td class="product-table__data"><?php the_sub_field( 'right_column' ); ?></td>
			</tr>
			
		<?php endwhile; ?>
	</table>
		<?php
	else :
endif;
	?>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

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
	<div class="product-details-intro">
		<div class="product-shortcuts">
			<?php if ( have_rows( 'product__links' ) ) : ?>
				<?php
				while ( have_rows( 'product__links' ) ) :
					the_row();
					?>
					<?php
					$link = get_sub_field( 'link' );
					if ( $link ) :
						$link_url    = $link['url'];
						$link_title  = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="product-shortcuts__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
				<?php
			else :
endif;
			?>
		</div>
		<?php
		global $wp_query;
			global $wp;
		?>
		<a class="addToCart-white" href="<?php echo home_url( $wp->request ); ?>/?add-to-cart=<?php echo $wp_query->post->ID; ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/cart-grey.svg" alt="">	
			<span>dodaj do koszyka</span>
		</a>
	</div>
	<div class="product-description">
		<div class="product-description-aside">
			<div class="product-description-aside--wrapper">
				<?php if ( get_field( 'product__aside-title' ) ) : ?>
					<p class="product-description-aside__title"><?php the_field( 'product__aside-title' ); ?></p>
				<?php endif; ?>
				<?php if ( have_rows( 'product__aside' ) ) : ?>
					<?php
					while ( have_rows( 'product__aside' ) ) :
						the_row();
						?>
						<div class="aside-single">
							<?php
							$image = get_sub_field( 'icon' );
							if ( ! empty( $image ) ) :
								?>
								<img class="aside-single__icon" width="60px" height="60px" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
							<?php endif; ?>
							<?php if ( get_sub_field( 'title' ) ) : ?>
								<p class="aside-single__title"><?php the_sub_field( 'title' ); ?></p>
							<?php endif; ?>
							<?php if ( get_sub_field( 'description' ) ) : ?>
								<p class="aside-single__description"><?php the_sub_field( 'description' ); ?></p>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
					<?php
				else :
	endif;
				?>
			</div>
		</div>
		<?php if ( get_field( 'product__description' ) ) : ?>
			<div class="product-description-main"><?php the_field( 'product__description' ); ?></div>
		<?php endif; ?>
	</div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

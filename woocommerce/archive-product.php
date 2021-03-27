<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
	<div class="container">
		<div class="container--medium">
			<div class="archive-columns">
				<div class="archive-sidebar">
					<?php
					/**
					 * Hook: woocommerce_sidebar.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
					?>
				</div>
			<?php
			if ( woocommerce_product_loop() ) {
				/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
				do_action( 'woocommerce_before_shop_loop' );
				?>
			<div class="content-column">
				<?php
				global $wp_query;
				$cat          = $wp_query->get_queried_object();
				$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
				$image        = wp_get_attachment_url( $thumbnail_id );
				?>

				<?php
				if ( is_shop() ) {
					$post_id = get_option( 'woocommerce_shop_page_id' );
					if ( get_field( 'shop__image', $post_id ) ) :
						?>
						<div class="category-intro">
						<?php
						$image = get_field( 'shop__image', $post_id );
						if ( ! empty( $image ) ) :
							?>
							<img class="category-intro__image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						<?php endif; ?>
							<div class="category-intro__content">
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
									<h1 class="category-intro__title"><?php woocommerce_page_title(); ?></h1>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php
				} elseif ( is_product_category() ) {
					?>
			<div class="category-intro">
							<?php
							if ( $image ) {
								echo '<img class="category-intro__image"  src="' . $image . '" alt="' . $cat->name . '" />';
							}
							?>
					<div class="category-intro__content">
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h1 class="category-intro__title"><?php woocommerce_page_title(); ?></h1>
						<?php endif; ?>
					</div>
			</div>
				<?php }; ?>
				<header class="woocommerce-products-header">
					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h2 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h2>
					<?php endif; ?>
					<div class="woocoomerce-ordering-wrapper">
						<h2 class="woocommerce-ordering-description">Sortuj według:</h2>
						<?php do_action( 'woo_custom_catalog_ordering' ); ?>
					</div>
				</header>
				<?php
				woocommerce_product_loop_start();

				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action( 'woocommerce_shop_loop' );

						wc_get_template_part( 'content', 'product' );
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
			?>
			</div>
		</div>
		<?php
		if ( is_shop() ) {
			$post_id = get_option( 'woocommerce_shop_page_id' );
			if ( get_field( 'shop_seo-description', $post_id ) ) :
				?>
				<div class="archive-cat-seo">
					<?php the_field( 'shop_seo-description', $post_id ); ?>
				</div>
			<?php endif; ?>
			<?php
		} elseif ( is_product_category() ) {
			$queriedObject = get_queried_object();
			if ( get_field( 'product-cat-description', 'product_cat_' . $queriedObject->term_id ) ) :
				?>
				<div class="archive-cat-seo">
					<?php
					the_field( 'product-cat-description', 'product_cat_' . $queriedObject->term_id );
					?>
				</div>
				<?php
			endif;
		};
		?>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
		</div>
	</div>
<?php
get_footer( 'shop' );

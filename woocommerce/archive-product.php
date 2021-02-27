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
			<header class="woocommerce-products-header">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
				<?php endif; ?>
				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</header>
			<ul class="archive-menu">
			<?php
			foreach ( get_terms( array( 'taxonomy' => 'product_cat' ) ) as $category ) :
				$products_loop = new WP_Query(
					array(
						'post_type'  => 'product',
						'showposts'  => -1,
						'tax_query'  => array_merge(
							array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'terms'    => array( $category->term_id ),
									'field'    => 'term_id',
								),
							),
							WC()->query->get_tax_query()
						),
						'meta_query' => array_merge(
							array(),
							WC()->query->get_meta_query()
						),
					)
				);
				?>
				<li data-menu-category="<?php echo $category->slug; ?>" class="archive-menu__item archive-menu__item-<?php echo $category->slug; ?>"><?php echo $category->name; ?></li>
				<?php endforeach; ?>
			</ul>
			<?php
			foreach ( get_terms( array( 'taxonomy' => 'product_cat' ) ) as $category ) :
				$products_loop = new WP_Query(
					array(
						'post_type'  => 'product',
						'showposts'  => -1,
						'tax_query'  => array_merge(
							array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'terms'    => array( $category->term_id ),
									'field'    => 'term_id',
								),
							),
							WC()->query->get_tax_query()
						),

						'meta_query' => array_merge(
							array(

								// You can optionally add extra meta queries here

							),
							WC()->query->get_meta_query()
						),
					)
				);

				?>
					<h2 id="products-<?php echo $category->slug; ?>" class="category-title"><?php echo $category->name; ?></h2>
					<ul class="products">

					<?php
					while ( $products_loop->have_posts() ) {
						$products_loop->the_post();
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */

						wc_get_template_part( 'content', 'product' );
					}
					wp_reset_postdata();
					?>
					</ul>
					<?php endforeach; ?>
		</div>
	</div>

<?php
get_sidebar();
get_footer( 'shop' );

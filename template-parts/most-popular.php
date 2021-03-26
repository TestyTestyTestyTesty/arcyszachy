<section class="most-popular">
	<div class="container">
		<div class="container--medium">
			<?php if ( get_field( 'most-popular__title' ) ) : ?>
				<h3 class="most-popular__title"><?php the_field( 'most-popular__title' ); ?></h3>
			<?php endif; ?>
			<div class="most-popular-products">
				<?php
				$productsIds = get_field( 'most-popular__products' );
				$productsIds;
				?>
				<?php
				$args = array(
					'post_type'      => 'product',
					'orderby'        => 'post__in',
					'order'          => 'ASC',
					'posts_per_page' => '-1',
					'post__in'       => $productsIds,
				);
				$loop = new WP_Query( $args );
				woocommerce_product_loop_start();
				while ( $loop->have_posts() ) :
					$loop->the_post();
					do_action( 'woocommerce_shop_loop' );
					wc_get_template_part( 'content', 'product' );
				endwhile;
				woocommerce_product_loop_end();
				do_action( 'woocommerce_after_shop_loop' );
				wp_reset_query(); // Remember to reset
				?>
					
			</div>
		</div>
	</div>
</section>


<section class="hot-offers">
	<div class="container">
		<div class="container--medium">
			<?php if ( get_field( 'hot-offers__title' ) ) : ?>
				<h2 class="hot-offers__title"><?php the_field( 'hot-offers__title' ); ?></h2>
			<?php endif; ?>
			<div class="hot-offers__wrapper">
				<div class="featured-offer">
					<?php if ( get_field( 'featured-box__title' ) ) : ?>
						<h3 class="featured-offer__title"><?php the_field( 'featured-box__title' ); ?></h3>
					<?php endif; ?>
					<?php
					$image = get_field( 'featured-box__image' );
					if ( ! empty( $image ) ) :
						?>
						<img class="featured-offer__image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					<?php endif; ?>
					<?php if ( get_field( 'featured-box__text-small' ) ) : ?>
						<p class="featured-offer__text-small"><?php the_field( 'featured-box__text-small' ); ?></p>
					<?php endif; ?>
					<?php if ( get_field( 'featured-box__text-big' ) ) : ?>
						<p class="featured-offer__text-big"><?php the_field( 'featured-box__text-big' ); ?></p>
					<?php endif; ?>
					<?php
					$link = get_field( 'featured-box__link' );
					if ( $link ) :
						$link_url    = $link['url'];
						$link_title  = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<a class="featured-offer__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>
				</div>
				<div class="hot-offers-products">
				<?php
				$productsIds = get_field( 'hot-offers-products' );
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
					setup_postdata( $GLOBALS['post'] =& $post_object );
					wc_get_template_part( 'content', 'product' );
				endwhile;
				woocommerce_product_loop_end();
				do_action( 'woocommerce_after_shop_loop' );
				wp_reset_query(); // Remember to reset
				?>
				</div>
			</div>
			
		</div>
	</div>
</section>


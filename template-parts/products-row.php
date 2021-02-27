<div class="products-row-block woocommerce post-type-archive container">
		<div class="container--medium">
		<?php
		$args  = array(
			'posts_per_page' => '4',
			'product_cat'    => 'produkty-power-m',
			'post_type'      => 'product',
			'orderby'        => 'title',
			'order'          => 'ASC',
		);
		$query = new WP_Query( $args );?>
				<h2 class="category-title">Produkty Power M</h2>
				<ul class="products">
					<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						wc_get_template_part( 'content', 'product' );
					}
					wp_reset_postdata();
					?>
				</ul>
		</div>
	</div>

<?php
get_footer( 'shop' );

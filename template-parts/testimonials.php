<section class="testimonials">
	<div class="container">
		<div class="container--medium">
			<?php if ( get_field( 'testimonials__title','options' ) ) : ?>
				<h2 class="testimonials__title"><?php the_field( 'testimonials__title','options' ); ?></h2>
			<?php endif; ?>
			<?php if ( have_rows( 'testimonials__repeater','options' ) ) : ?>
				<div class="testimonials-slider">
					<div class="slider-arrow__wrapper slider-arrow__wrapper--left">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/slider-arrow.svg" alt="change slide" class="slider-arrow-left">
					</div>
					<div class="slider-arrow__wrapper slider-arrow__wrapper--right">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/slider-arrow.svg" alt="change slide" class="slider-arrow-right">
					</div>
					<div class="slider-wrapper">
						<?php
						while ( have_rows( 'testimonials__repeater','options' ) ) :
							the_row();
							?>
							<div class="slide">
								<?php
								$image = get_sub_field( 'image','options' );
								if ( ! empty( $image ) ) :
									?>
									<img class="slide__person" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" width="80px" height="80px"/>
								<?php endif; ?>
								<div class="slide__content">
									<img class="slide__quote-symbol" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/quote.svg" alt="">
									<?php if ( get_sub_field( 'text','options' ) ) : ?>
										<p class="slide__text"><?php the_sub_field( 'text','options' ); ?></p>
									<?php endif; ?>
									<?php if ( get_sub_field( 'person','options' ) ) : ?>
										<p class="slide__person"><?php the_sub_field( 'person','options' ); ?></p>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php
			else :
endif;
			?>
		</div>
	</div>
</section>


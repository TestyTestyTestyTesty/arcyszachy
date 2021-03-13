<section class="hero-slider">
	<div class="container">
		<div class="container--medium">
			<?php if ( have_rows( 'slide_repeater' ) ) : ?>
				<div class="slider">
					<div class="slider-arrow__wrapper slider-arrow__wrapper--left">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/slider-arrow.svg" alt="change slide" class="slider-arrow-left">
					</div>
					<div class="slider-arrow__wrapper slider-arrow__wrapper--right">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/slider-arrow.svg" alt="change slide" class="slider-arrow-right">
					</div>
					<div class="slider-wrapper">
						<?php
						while ( have_rows( 'slide_repeater' ) ) :
							the_row();
							?>
							<div class="slide">
								<?php
								$image = get_sub_field( 'image' );
								if ( ! empty( $image ) ) :
									?>
									<img class="slide__background" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
								<?php endif; ?>
								<div class="slide__content">
									<?php if ( get_sub_field( 'text_top' ) ) : ?>
										<h2 class="slide__text-top"><?php the_sub_field( 'text_top' ); ?></h2>
									<?php endif; ?>
									<?php if ( get_sub_field( 'text_middle' ) ) : ?>
										<h3 class="slide__text-middle"><?php the_sub_field( 'text_middle' ); ?></h3>
									<?php endif; ?>
									<?php if ( get_sub_field( 'text_bottom' ) ) : ?>
										<h3 class="slide__text-bottom"><?php the_sub_field( 'text_bottom' ); ?></h3>
									<?php endif; ?>
									<?php
									$link = get_sub_field( 'link' );
									if ( $link ) :
										$link_url    = $link['url'];
										$link_title  = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="slide__button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
					<?php $numOfSlides = count( get_field( 'slide_repeater' ) ); ?>
					<div data-slides="<?php echo $numOfSlides; ?>" class="numberOfSlides"></div>
					<div class="slider-titles">
						<?php
						while ( have_rows( 'slide_repeater' ) ) :
							the_row();
							?>
							<?php if ( get_sub_field( 'title' ) ) : ?>
								<h2 class="slider-titles-title"><?php the_sub_field( 'title' ); ?></h2>
							<?php endif; ?>
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


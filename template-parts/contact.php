<?php
	$form_title             = get_field( 'form_title' );
	$form                   = get_field( 'form' );
	$details_text_repeater  = get_field( 'details_texts_repeater' );
	$details_icons_repeater = get_field( 'details_icons_repeater' );
?>
<section class="contact">
	<div class="container">
		<div class="container--medium">
			<div class="contact__columns">
				<div class="contact__details">
					<div class="details">
					<?php if ( have_rows( 'details_texts_repeater' ) ) : ?>
						<?php
						while ( have_rows( 'details_texts_repeater' ) ) :
							the_row();
							?>
								<div class="details-block">
							<?php if ( get_sub_field( 'title' ) ) : ?>
									<h2 class="contact__subtitle"><?php the_sub_field( 'title' ); ?></h2>
								<?php endif; ?>
								<?php if ( get_sub_field( 'subtitle' ) ) : ?>
									<h3 class="details-block__title"><?php the_sub_field( 'subtitle' ); ?></h3>
								<?php endif; ?>
								<?php if ( have_rows( 'fields__repeater' ) ) : ?>
											<?php
											while ( have_rows( 'fields__repeater' ) ) :
												the_row();
												?>
												<div class="single">
													<span class="single__left"><?php the_sub_field( 'text_left' ); ?></span>
													<span class="single__right"><?php the_sub_field( 'text_right' ); ?></span>
												</div>
											<?php endwhile; ?>
										<?php
									else :
endif;
									?>
						</div>
							<?php endwhile; ?>
						<?php
					else :
endif;
					?>
					</div>
				</div>
				<div class="contact__form">
					<?php if ( $form_title ) : ?>
						<h2 class="contact__subtitle"><?php echo $form_title; ?></h2>
					<?php endif; ?>
					<?php if ( $form ) : ?>
						<?php echo do_shortcode( $form ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php get_template_part( 'template-parts/faq' ); ?>

</section>

<?php 
	$form_title = get_field( 'form_title' );
	$form = get_field( 'form' );
	$details_title = get_field( 'details_title' );
	$details_text_repeater = get_field( 'details_texts_repeater' );
	$details_icons_repeater = get_field( 'details_icons_repeater' );
?>
<section class="contact">
	<div class="container">
		<div class="container--medium">
			<h2 class="contact__title"><?php the_title(); ?></h2>
			<div class="contact__columns">
				<div class="contact__form">
					<?php if($form_title) : ?>
						<div class="contact__subtitle"><?php echo $form_title?></div>
					<?php endif;?>
					<?php if($form) : ?>
						<?php echo do_shortcode($form); ?>
					<?php endif;?>
				</div>
				<div class="contact__details">
					<?php if($details_title) : ?>
						<div class="contact__subtitle"><?php echo $details_title?></div>
					<?php endif;?>
					<div class="details">
					<?php if( have_rows('details_texts_repeater') ): ?>
						<div class="details-top">
							<?php while( have_rows('details_texts_repeater') ) : the_row();?>
								<div class="single">
									<span class="single__left"><?php the_sub_field('text_left');?></span>
									<span class="single__right"><?php the_sub_field('text_right');?></span>
								</div>
							<?php endwhile;?>
						</div>
					<?php else : endif; ?>
					<?php if( have_rows('details_icons_repeater') ): ?>
						<div class="details-bottom">
							<?php while( have_rows('details_icons_repeater') ) : the_row();?>
								<div class="single">
								<?php $image = get_sub_field('icon');
									if( !empty( $image ) ): ?>
										<img class="single__left" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
									<span class="single__right"><?php the_sub_field('text');?></span>
								</div>
							<?php endwhile;?>
						</div>
					<?php else : endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

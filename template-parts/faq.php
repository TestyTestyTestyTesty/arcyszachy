<section class="faq">
		<div class="container">
			<div class="container--medium">
				<?php if ( get_field( 'faq_title' ) ) : ?>
					<h2 class="faq__title"><?php the_field( 'faq_title' ); ?></h2>
				<?php endif; ?>

				<?php if ( have_rows( 'faq_repeater' ) ) : ?>
					<div class="faq-fields">
						<?php
						while ( have_rows( 'faq_repeater' ) ) :
							the_row();
							?>
							<div class="faq-fields__single">
								<div class="faq-fields__toggler"></div>
								<h3 class="faq-fields__title"><?php the_sub_field( 'title' ); ?></h3>
								<p class="faq-fields__description"><?php the_sub_field( 'description' ); ?></p>
							</div>
						<?php endwhile; ?>
					</div>
					<?php
				else :
endif;
				?>
			</div>
		</div>
	</section>
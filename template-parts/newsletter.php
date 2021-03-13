<section class="newsletter">
	<div class="container">
		<div class="container--medium">
		<?php
			$image = get_field( 'newsletter__image','options' );
			if ( ! empty( $image ) ) :
				?>
				<img class="newsletter__image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
		<?php endif; ?>
		<div class="newsletter__content">
			<?php if ( get_field( 'newsletter__title','options' ) ) : ?>
				<h2 class="newsletter__title"><?php the_field( 'newsletter__title','options' ); ?></h2>
			<?php endif; ?>
			<?php if ( get_field( 'newsletter__subtitle','options' ) ) : ?>
				<h3 class="newsletter__subtitle"><?php the_field( 'newsletter__subtitle','options' ); ?></h3>
			<?php endif; ?>
		</div>
		<!-- Begin Mailchimp Signup Form -->
		<div id="mc_embed_signup">
		<form action="https://projectpeople.us11.list-manage.com/subscribe/post?u=e4659be98a3d642eafd8818f5&amp;id=685ba46601" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div id="mc_embed_signup_scroll">
			
		<div class="mc-field-group">
			<label class="screen-reader-text" for="mce-EMAIL">Email Address </label>
			<input type="email" value="" name="EMAIL" class="required email" placeholder="Twój adres email..." id="mce-EMAIL">
			<input type="submit" value="Zapisz się" name="subscribe" id="mc-embedded-subscribe" class="button">
		</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e4659be98a3d642eafd8818f5_685ba46601" tabindex="-1" value=""></div>
			
		</form>
		</div>
		<!--End mc_embed_signup-->
		</div>
	</div>
</section>


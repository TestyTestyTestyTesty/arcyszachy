<div id="consent-popup" class="cookies hidden">
	<div class="cookies__content">
		<?php
		$image = get_field( 'cookies__icon', 'options' );
		if ( ! empty( $image ) ) : ?>
			<img class="cookies__icon" src="<?php echo esc_url( $image['url'] ); ?>" width="64px" height="53px" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
		<?php endif; ?>
		<p class="cookies__description"><?php the_field( 'cookies__text', 'options' ); ?></p>
	</div>
	<div class="cookies__link">
		<a id="cookie-box-accept" class="button-link" href="#cookie-box-accept"><?php the_field( 'cookies__button', 'options' ); ?></a>
	</div>
</div>

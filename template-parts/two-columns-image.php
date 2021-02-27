<?php
$TwoColumnsfile        = get_field( 'two_columns_image' );
$TwoColumnsTitle       = get_field( 'two_columns_title' );
$TwoColumnsSubtitle    = get_field( 'two_columns_subtitle' );
$TwoColumnsDescription = get_field( 'two_columns_description' );
?>
<section class="two-columns-image">
	<div class="container">
		<div class="container--medium">
			<div class="two-columns-image__wrapper">
				<div class="image__wrapper">
					<img class="image" src="<?php echo esc_url( $TwoColumnsfile['url'] ); ?>" alt="<?php echo esc_attr( $TwoColumnsfile['alt'] ); ?>">
				</div>
				<div class="content">
					<h2 class="two-columns-image__title"><?php echo $TwoColumnsTitle; ?></h2>
					<p class="two-columns-image__subtitle"><?php echo $TwoColumnsSubtitle; ?></p>
					<p class="two-columns-image__description"><?php echo $TwoColumnsDescription; ?></p>
					<?php
					$link = get_field( 'two_columns_link' );
					if ( $link ) :
						$link_url    = $link['url'];
						$link_title  = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="two-columns-video__link--wrapper">
							<a class="two-columns-video__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

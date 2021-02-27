<?php
$TwoColumnsfile        = get_field( 'two_columns_video' );
$TwoColumnsvideoUrl    = $TwoColumnsfile['url'];
$TwoColumnsPoster      = get_field( 'two_columns_video_poster' );
$TwoColumnsTitle       = get_field( 'two_columns_title' );
$TwoColumnsSubtitle    = get_field( 'two_columns_subtitle' );
$TwoColumnsDescription = get_field( 'two_columns_description' );
?>
<section id="how-it-works" class="two-columns-video">
	<div class="container">
		<div class="container--medium">
			<div class="two-columns-video__wrapper">
				<div class="video__wrapper">
					<div class="video__play--wrapper">
						<img class="video__play" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/play.svg" alt="play video">
					</div>
					<video class="video" muted loop poster="<?php echo $TwoColumnsPoster; ?>">
						<source src="<?php echo $TwoColumnsvideoUrl; ?>" type="video/mp4">
					</video>
				</div>
				<div class="content">
					<h2 class="two-columns-video__title"><?php echo $TwoColumnsTitle; ?></h2>
					<p class="two-columns-video__subtitle"><?php echo $TwoColumnsSubtitle; ?></p>
					<p class="two-columns-video__description"><?php echo $TwoColumnsDescription; ?></p>
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

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProjectPeople
 */

?>
	<?php get_template_part( 'template-parts/newsletter' ); ?>	
	<footer id="colophon" class="footer">
		<div class="container">
			<div class="container--medium">
				<div class="footer-menus">
					<div class="footer-menu">
						<?php if ( get_field( 'footer_menu-1-title', 'options' ) ) : ?>
							<h2 class="footer-menu__title"><?php the_field( 'footer_menu-1-title', 'options' ); ?></h2>
						<?php endif; ?>
						<?php if ( have_rows( 'footer_menu-1', 'options' ) ) : ?>
							<ul class="footer-menu__list">
								<?php
								while ( have_rows( 'footer_menu-1', 'options' ) ) :
									the_row();
									?>
								<li class="list-item">
									<?php
									$link = get_sub_field( 'link' );
									if ( $link ) :
										$link_url    = $link['url'];
										$link_title  = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
									<a class="list-item__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php
						else :
		endif;
						?>
					</div>
					<div class="footer-menu">
						<?php if ( get_field( 'footer_menu-2-title', 'options' ) ) : ?>
							<h2 class="footer-menu__title"><?php the_field( 'footer_menu-2-title', 'options' ); ?></h2>
						<?php endif; ?>
						<?php if ( have_rows( 'footer_menu-2', 'options' ) ) : ?>
							<ul class="footer-menu__list">
								<?php
								while ( have_rows( 'footer_menu-2', 'options' ) ) :
									the_row();
									?>
								<li class="list-item">
									<?php
									$link = get_sub_field( 'link' );
									if ( $link ) :
										$link_url    = $link['url'];
										$link_title  = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
									<a class="list-item__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php
						else :
		endif;
						?>
					</div>
					<div class="footer-menu">
						<?php if ( get_field( 'footer_menu-3-title', 'options' ) ) : ?>
							<h2 class="footer-menu__title"><?php the_field( 'footer_menu-3-title', 'options' ); ?></h2>
						<?php endif; ?>
						<?php if ( have_rows( 'footer_menu-3', 'options' ) ) : ?>
							<ul class="footer-menu__list">
								<?php
								while ( have_rows( 'footer_menu-3', 'options' ) ) :
									the_row();
									?>
								<li class="list-item">
									<?php
									$link = get_sub_field( 'link' );
									if ( $link ) :
										$link_url    = $link['url'];
										$link_title  = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
									<a class="list-item__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php
						else :
		endif;
						?>
					</div>
					<div class="footer-menu">
						<?php if ( get_field( 'footer_menu-4-title', 'options' ) ) : ?>
							<h2 class="footer-menu__title"><?php the_field( 'footer_menu-4-title', 'options' ); ?></h2>
						<?php endif; ?>
						<?php if ( have_rows( 'footer_menu-4', 'options' ) ) : ?>
							<ul class="footer-menu__list">
								<?php
								while ( have_rows( 'footer_menu-4', 'options' ) ) :
									the_row();
									?>
								<li class="list-item">
									<?php
									$link = get_sub_field( 'link' );
									if ( $link ) :
										$link_url    = $link['url'];
										$link_title  = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
									<a class="list-item__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php
						else :
		endif;
						?>
					</div>
				</div>
				<div class="footer-details">
					<?php
					$image = get_field( 'footer-logo', 'options' );
					if ( ! empty( $image ) ) :
						?>
						<img class="footer__logo" loading="lazy" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					<?php endif; ?>
					<?php if ( get_field( 'footer_copyright-text', 'options' ) ) : ?>
							<small class="footer__copyright"><?php the_field( 'footer_copyright-text', 'options' ); ?></small>
					<?php endif; ?>
					<?php if ( have_rows( 'footer_icons-repeater', 'options' ) ) : ?>
						<ul class="footer__icons">
							<?php
							while ( have_rows( 'footer_icons-repeater', 'options' ) ) :
								the_row();
								?>
							<li class="list-item">
								<?php
								$link = get_sub_field( 'link' );
								if ( $link ) :
									$link_url    = $link['url'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
								<a class="list-item__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<?php
									$image = get_sub_field( 'icon', 'options' );
									if ( ! empty( $image ) ) :
										?>
										<img class="list-item__icon" loading="lazy" width="24px" height="24px" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
									<?php endif; ?>
								</a>
								<?php endif; ?>
							</li>
							<?php endwhile; ?>
						</ul>
						<?php
					else :
	endif;
					?>
				</div>
		</div>
	</footer>
</div>
<?php get_template_part( 'template-parts/cookies' ); ?>
<?php wp_footer(); ?>

</body>
</html>

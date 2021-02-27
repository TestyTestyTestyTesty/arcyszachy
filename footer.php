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

	<footer id="colophon" class="footer">
		<div class="container">
			<div class="container--medium footer__top">
				<a href="<?php echo get_home_url(); ?>" class="logo logo--footer">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/logo-white.svg" alt="inDevice logo - home" />
				</a>
				<div class="navigation">
					<nav class="navigation__left">
						<?php wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_class'     => 'footer__menu--left',
								)
							); ?>
					</nav>
					<nav class="navigation__right">
							<?php wp_nav_menu(
								array(
									'theme_location' => 'officials-menu',
									'menu_class'     => 'footer__menu--right',
								)
							); ?>
						
					</nav>
				</div>
			</div>
			<div class="container--medium footer__bottom">
				<span class="footer__copyright">&copy; Copyright <?php echo date("Y"); ?> Agencja Reklamowa Brandbay.pl</span>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>

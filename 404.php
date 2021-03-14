<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ProjectPeople
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<p class="error-404__text-top">Ups</p>
			<h2 class="error-404__text-bottom">Strona o podanym adresie nie istnieje</h2>
			<h3 class="error-404__number">404</h3>
			<div class="error-404__link--wrapper">
				<a class="error-404__link"href="<?php echo get_home_url(); ?>">Strona główna</a>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ProjectPeople
 */

get_header();
?>

	<main class="site-main">
		<?php get_template_part( 'template-parts/hero-slider' ); ?>
		<?php get_template_part( 'template-parts/hot-offers' ); ?>
		<?php get_template_part( 'template-parts/most-popular' ); ?>
		<?php get_template_part( 'template-parts/testimonials' ); ?>
	</main><!-- #main -->

<?php
get_footer();

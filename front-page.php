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
		<?php get_template_part( 'template-parts/hero' ); ?>
		<?php get_template_part( 'template-parts/features' ); ?>
		<?php get_template_part( 'template-parts/two-columns-image' ); ?>
		<?php get_template_part( 'template-parts/profits' ); ?>
		<?php get_template_part( 'template-parts/products-row' ); ?>
	</main><!-- #main -->

<?php
get_footer();

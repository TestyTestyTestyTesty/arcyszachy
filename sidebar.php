<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProjectPeople
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<p class="widget-area__title">Kategorie i filtry</p>
	<div class="close-filter">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/slider-arrow.svg" alt="change slide" class="close-filter-arrow">
	</div>
	<div class="widget-area__wrapper">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside><!-- #secondary -->

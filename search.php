<?php
get_header();
global $wp_query;
?>
<div class="search-results-custom">
	<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
  <div class="container">
	<div class="container--medium">
		  <h2 class="search-results-custom__title"><?php _e( 'Wyniki wyszukiwania', 'locale' ); ?><span class="search-results-custom__number"> (<?php echo $wp_query->found_posts; ?>)</span></h2>
		<?php
		if ( have_posts() ) {
			woocommerce_product_loop_start();
			?>
			<?php
			while ( have_posts() ) {
				the_post();
				?>
				<?php
				do_action( 'woocommerce_shop_loop' );
				wc_get_template_part( 'content', 'product' );
				?>
			<?php } ?>    
			<?php paginate_links(); ?>  
			<?php
			woocommerce_product_loop_end();
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			?>
			<div class="empty-search-form">
				<div class="empty-search-form__wrapper">
					<img class="empty-search-form__icon" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/warning.svg" alt="" width="30px" height="28px">
					<p class="empty-search-form__text">Nie znaleziono produktów</p>
				</div>
				<a class="empty-search-form__link" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Wróć do sklepu</a>
			</div>
			<?php } ?>  
	</div>
  </div>
</div>
<?php
get_footer();

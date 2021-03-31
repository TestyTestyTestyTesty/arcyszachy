<?php
/* Template Name: Registration */

get_header();
?>
	<?php
	if ( ( ! is_user_logged_in() && ! is_page( 'panel-uzytkownika' ) ) && ( ! is_page( 'rejestracja' ) ) ) {
		get_template_part( 'template-parts/breadcrumbs' );
	}
	?>
	<main id="primary" class="site-main">
		<div class="container">
			<div class="container--medium">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
		</div>

	</main><!-- #main -->

<?php
// if ( ( ! is_user_logged_in() && ! is_page( 'panel-uzytkownika' ) ) && ( ! is_page( 'rejestracja' ) ) ) {
	get_footer();
// }

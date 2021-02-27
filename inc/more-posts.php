<?php

/*
 * Load more posts
 */

function blog_scripts() {
	// Register the script

	// Localize the script with new data
	$script_data_array = array(
		'ajaxurl'  => admin_url( 'admin-ajax.php' ),
		'security' => wp_create_nonce( 'load_more_posts' ),
	);
	wp_localize_script( 'js-theme', 'blog', $script_data_array );

}
add_action( 'wp_enqueue_scripts', 'blog_scripts' );

function load_posts_by_ajax_callback() {
	check_ajax_referer( 'load_more_posts', 'security' );
	$paged      = $_POST['page'];
	$args       = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => '4',
		'paged'          => $paged,
		'category__not_in' => 3 ,
	);
	$blog_posts = new WP_Query( $args );
	?>
 
	<?php if ( $blog_posts->have_posts() ) : ?>
		<?php
		while ( $blog_posts->have_posts() ) :
			$blog_posts->the_post();
			?>
			<article class="post-mini">
				<a href="<?php echo get_permalink(); ?>" class="post-mini__link">
					<div class="post-mini__box">
						<img class="post-mini__img" src="<?php echo get_the_post_thumbnail_url(); ?>">
						<span class="post-mini__category"><?php echo get_the_category()[0]->name; ?></span>
					</div>
					<div class="post-mini__info">
						<time class="post-mini__date" datetime="<?php echo get_the_date( 'd.m.Y' ); ?>"><?php echo get_the_date( 'd.m.Y' ); ?></time>
						<h3 class="post-mini__title"><?php echo get_the_title(); ?></h3>
					</div>
				</a>
			</article>
		<?php endwhile; ?>
		<?php
	endif;

	wp_die();
}

add_action( 'wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback' );
add_action( 'wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback' );

function load_questions() {
	check_ajax_referer( 'load_more_posts', 'security' );
	$paged      = $_POST['page'];
	$args       = array(
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'post_type'      => 'knowledge',
		'paged'          => $paged,
		'tax_query'      => array(
			array(
				'taxonomy' => 'knowledge_cat',
				'field'    => 'term_id',
				'terms'    => 14,
			),
		),
	);
	$blog_posts = new WP_Query( $args );
	?>
 
	<?php if ( $blog_posts->have_posts() ) : ?>
		<?php
		while ( $blog_posts->have_posts() ) :
			$blog_posts->the_post();
			?>
		<div class="abc-questions__col">
			<div class="abc-questions__item">
				<h3 class="abc-questions__header"><?php echo the_title(); ?></h3>
				<div class="abc-questions__desc">
					<?php echo the_content(); ?>
				</div>
				<a href="<?php echo get_permalink(); ?>" class="link abc-questions__link">Czytaj więcej</a>
			</div>
		</div>
		<?php endwhile; ?>
		<?php
	endif;

	wp_die();
}

add_action( 'wp_ajax_load_questions', 'load_questions' );
add_action( 'wp_ajax_nopriv_load_questions', 'load_questions' );

function load_noticeboard() {
	check_ajax_referer( 'load_more_posts', 'security' );
	$paged = $_POST['page'];
	$args  = array(
		'post_status'    => 'publish',
		'posts_per_page' => 3,
		'post_type'      => 'noticeboard',
		'paged'          => $paged,

	);
	$blog_posts = new WP_Query( $args );
	?>
 
	<?php if ( $blog_posts->have_posts() ) : ?>
		<?php
		while ( $blog_posts->have_posts() ) :
			$blog_posts->the_post();
			?>
				<div class="post">
					<div class="post__top">
						<?php echo get_the_post_thumbnail( $post->ID, 'related-post', array( 'class' => 'post__thumbnail' ) ); ?>
					</div>
					<?php $post_date = get_the_date( 'd.m.Y' ); ?>
					<time class="post__publish-date" datetime="<?php echo $post_date; ?>"><?php echo $post_date; ?></time>
					<a class="post__title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</div>
		<?php endwhile; ?>
		<?php
	endif;

	wp_die();
}

add_action( 'wp_ajax_load_noticeboard', 'load_noticeboard' );
add_action( 'wp_ajax_nopriv_load_noticeboard', 'load_noticeboard' );

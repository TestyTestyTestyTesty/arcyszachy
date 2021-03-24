<?php
/**
 * solaris functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package solaris
 */
 require_once 'inc/enqueue.php';
 add_image_size( 'related-post', 384, 212 );
 add_image_size( 'category-post', 464, 261 );
 add_image_size( 'post-main', 1007, 2564 );
 add_image_size( 'post-home-newest', 800, 450 );
 add_image_size( 'add-post', 1920, 371 );
 add_filter( 'template_include', 'var_template_include', 1000 );
 add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

	unset( $tabs['description'] );          // Remove the description tab
	unset( $tabs['reviews'] );          // Remove the reviews tab
	unset( $tabs['additional_information'] );   // Remove the additional information tab

	return $tabs;
}
function var_template_include( $t ) {
	$GLOBALS['current_theme_template'] = basename( $t );
	return $t;
}
function remove_admin_login_header() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'remove_admin_login_header' );
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
	if ( isset( $_GET['clear-cart'] ) ) {
		global $woocommerce;
		$woocommerce->cart->empty_cart();
	}
}
add_action( 'init', 'move_related_products_before_tabs' );
function move_related_products_before_tabs() {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 5 );
}
add_filter(
	'woocommerce_output_related_products_args',
	function ( $args ) {
		$args = array(
			'posts_per_page' => 5,
			'columns'        => 5,
	'orderby'        => 'rand', // @codingStandardsIgnoreLine.
		);

		return $args;
	},
	20
);


add_filter( 'woocommerce_pagination_args', 'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {

	$args['prev_text'] = '<svg class="pagination-arrow-left" data-name="Icon" xmlns="http://www.w3.org/2000/svg" width="7.114" height="12"><g data-name="Group 6"><path data-name="Icon Color" d="M0 10.59L4.397 6l-4.4-4.59L1.354 0l5.76 6-5.76 6z" fill="#4e4e4e"/></g></svg>';
	$args['next_text'] = '<svg class="pagination-arrow-right" data-name="Icon" xmlns="http://www.w3.org/2000/svg" width="7.114" height="12"><g data-name="Group 6"><path data-name="Icon Color" d="M0 10.59L4.397 6l-4.4-4.59L1.354 0l5.76 6-5.76 6z" fill="#4e4e4e"/></g></svg>';

	return $args;
}
 // sorting
 remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 add_action( 'woo_custom_catalog_ordering', 'woocommerce_catalog_ordering', 30 );


if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20 );

class submenu_wrap extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class='sub-menu-wrap'><ul class='sub-menu'>\n";
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "$indent</ul></div>\n";
	}
}
function addScrollToDescription() {
	?>
	<div id="#full-description" class="scrollToDescription">
		<div class="scrollToDescription__img--wrapper">
			<img class="scrollToDescription__img" width="5px" height="6px" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/small-arrow.svg" alt="">
		</div>
		<span class="scrollToDescription__text">Zobacz pełny opis</span>
	</div>
	<?php
}
add_action( 'woocommerce_single_product_summary', 'addScrollToDescription', 37 );

function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


if ( ! function_exists( 'solaris_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function solaris_setup() {
		if ( function_exists( 'acf_add_options_page' ) ) {

			acf_add_options_page(
				array(
					'page_title' => 'Theme General Settings',
					'menu_title' => 'Theme Settings',
					'menu_slug'  => 'theme-general-settings',
					'capability' => 'edit_posts',
					'redirect'   => false,
				)
			);

			acf_add_options_sub_page(
				array(
					'page_title'  => 'Theme Footer Settings',
					'menu_title'  => 'Footer',
					'parent_slug' => 'theme-general-settings',
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => 'Testimonials',
					'menu_title'  => 'Testimonials',
					'parent_slug' => 'theme-general-settings',
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => 'Cart',
					'menu_title'  => 'Cart',
					'parent_slug' => 'theme-general-settings',
				)
			);
			acf_add_options_sub_page(
				array(
					'page_title'  => 'Cookies',
					'menu_title'  => 'Cookies',
					'parent_slug' => 'theme-general-settings',
				)
			);

		}
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on solaris, use a find and replace
		 * to change 'solaris' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'solaris', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'woocommerce' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu'   => esc_html__( 'Primary menu', 'solaris' ),
				'footer-menu'    => esc_html__( 'Footer menu', 'solaris' ),
				'officials-menu' => esc_html__( 'Officials menu', 'solaris' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'solaris_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'solaris_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function solaris_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'solaris_content_width', 640 );
}
add_action( 'after_setup_theme', 'solaris_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function solaris_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'solaris' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'solaris' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'solaris_widgets_init' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom posts.
 */
require get_template_directory() . '/inc/custom-post.php';

/**
 * Load more posts.
 */
require get_template_directory() . '/inc/more-posts.php';

/**
 * function showing which posts are now visible in query.
 */
require get_template_directory() . '/inc/paged-results-function.php';



/**
 * Inject inline svg.
 */
function svg( $icon, $class = '' ) {

	$icon = file_get_contents( get_template_directory() . '/assets/dist/images/svg/' . $icon . '.svg' );
	$icon = str_replace( '<svg', "<svg class='icon" . $class . "'", $icon );

	return $icon;
};



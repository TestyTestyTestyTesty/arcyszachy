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
add_action( 'init', 'move_related_products_before_tabs' );
function move_related_products_before_tabs() {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 5 );
}

function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );
// Add custom post type to USP Meta Box
function usp_meta_box_custom_post_types( $post_types ) {

	array_push( $post_types, 'noticeboard' ); // change 'book' to your custom post type

	return $post_types;

}
// Hide Price Range for WooCommerce Variable Products
add_filter(
	'woocommerce_variable_sale_price_html',
	'lw_variable_product_price',
	10,
	2
);
add_filter(
	'woocommerce_variable_price_html',
	'lw_variable_product_price',
	10,
	2
);

function lw_variable_product_price( $v_price, $v_product ) {

	// Product Price
	$prod_prices = array(
		$v_product->get_variation_price( 'min', true ),
		$v_product->get_variation_price( 'max', true ),
	);
	$prod_price  = $prod_prices[0] !== $prod_prices[1] ? sprintf(
		__( '<span class="price-from">Cena od</span> %1$s', 'woocommerce' ),
		wc_price( $prod_prices[0] )
	) : wc_price( $prod_prices[0] );

	// Regular Price
	$regular_prices = array(
		$v_product->get_variation_regular_price( 'min', true ),
		$v_product->get_variation_regular_price( 'max', true ),
	);
	sort( $regular_prices );
	$regular_price = $regular_prices[0] !== $regular_prices[1] ? sprintf(
		__( '<span class="price-from">Cena od</span> %1$s', 'woocommerce' ),
		wc_price( $regular_prices[0] )
	) : wc_price( $regular_prices[0] );

	if ( $prod_price !== $regular_price ) {
		$prod_price = $prod_price . $v_product->get_price_suffix() . '</ins>';
	}
	return $prod_price;
}
add_action( 'woocommerce_before_single_product', 'move_variations_single_price', 1 );
function move_variations_single_price() {
	global $product, $post;
	if ( $product->is_type( 'variable' ) ) {
		add_action( 'woocommerce_single_product_summary', 'replace_variation_single_price', 10 );
	}
}

function replace_variation_single_price() {
	?>
	<style>
	  .woocommerce-variation-price {
		display: none;
	  }
	</style>
	<script>
	  jQuery(document).ready(function($) {
		var priceselector = '.product p.price';
		var originalprice = $(priceselector).html();

		$( document ).on('show_variation', function() {
		  $(priceselector).html($('.single_variation .woocommerce-variation-price').html());
		});
		$( document ).on('hide_variation', function() {
		  $(priceselector).html(originalprice);
		});
	  });
	</script>
	<?php
}


function default_taxonomy_term( $post_id, $post ) {
	if ( 'publish' === $post->post_status ) {
		$defaults   = array(
			'themes_categories' => array( 'other' ),
		);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
			}
		}
	}
}
add_action( 'save_post', 'default_taxonomy_term', 100, 2 );

add_filter( 'usp_meta_box_post_types', 'usp_meta_box_custom_post_types' );
function get_current_template( $echo = false ) {
	if ( ! isset( $GLOBALS['current_theme_template'] ) ) {
		return false;
	}
	if ( $echo ) {
		echo $GLOBALS['current_theme_template'];
	} else {
		return $GLOBALS['current_theme_template'];
	}
}
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 35 );


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


// turn variation dropdowns into radios
function variation_radio_buttons( $html, $args ) {
	$args = wp_parse_args(
		apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ),
		array(
			'options'          => false,
			'attribute'        => false,
			'product'          => false,
			'selected'         => false,
			'name'             => '',
			'id'               => '',
			'class'            => '',
			'show_option_none' => __( 'Choose an option', 'woocommerce' ),
		)
	);
	if ( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
		$selected_key     = 'attribute_' . sanitize_title( $args['attribute'] );
		$args['selected'] = isset( $_REQUEST[ $selected_key ] ) ? wc_clean( wp_unslash( $_REQUEST[ $selected_key ] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
	}
	$options               = $args['options'];
	$product               = $args['product'];
	$attribute             = $args['attribute'];
	$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
	$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
	$class                 = $args['class'];
	$show_option_none      = (bool) $args['show_option_none'];
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
	if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[ $attribute ];
	}
	$radios = '
  ';
	if ( ! empty( $options ) ) {
		if ( $product && taxonomy_exists( $attribute ) ) {
			$terms = wc_get_product_terms(
				$product->get_id(),
				$attribute,
				array(
					'fields' => 'all',
				)
			);
			foreach ( $terms as $term ) {
				if ( in_array( $term->slug, $options, true ) ) {
					$radios .= '
  ' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ) . '
  ';
				}
			}
		} else {
			foreach ( $options as $option ) {
				$checked = sanitize_title( $args['selected'] ) === $args['selected'] ? checked( $args['selected'], sanitize_title( $option ), false ) : checked( $args['selected'], $option, false );
				$radios .= '
  ' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '
  ';
			}
		}
	}
	$radios .= '
  ';
	return $html . $radios;
}
  add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'variation_radio_buttons', 20, 2 );
function variation_check( $active, $variation ) {
	if ( ! $variation->is_in_stock() && ! $variation->backorders_allowed() ) {
		return false;
	}
	return $active;
}
  add_filter( 'woocommerce_variation_is_active', 'variation_check', 10, 2 );
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

/**
 *  Change excerpt.
 */

function new_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


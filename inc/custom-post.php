<?php

/*
 * Create custom posts
 */

// Register Custom Post Type
function noticeboard() {

	$labels  = array(
		'name'                  => 'Tablica ogłoszeń',
		'singular_name'         => 'Tablica ogłoszeń',
		'menu_name'             => 'Tablica ogłoszeń',
		'name_admin_bar'        => 'Tablica ogłoszeń',
		'archives'              => 'Item Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'Wszystkie ogłoszenia',
		'add_new_item'          => 'Dodaj nowe ogłoszenie',
		'add_new'               => 'Dodaj nowe',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edytuj ogłoszenie',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Nie znaleziono',
		'not_found_in_trash'    => 'Nie znaleziono w koszu',
		'featured_image'        => 'Główne zdjęcie',
		'set_featured_image'    => 'Ustaw główne zdjęcie',
		'remove_featured_image' => 'Usuń zdjęcie',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$rewrite = array(
		'slug'       => 'ogloszenia',
		'with_front' => true,
		'pages'      => true,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => 'noticeboard',
		'description'         => 'Ogłoszenia użytkowników',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-feedback',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'noticeboard', $args );

}
//add_action( 'init', 'noticeboard', 0 );

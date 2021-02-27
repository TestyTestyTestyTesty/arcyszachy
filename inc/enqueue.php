<?php

function theme_enqueue_style() {
	wp_enqueue_style( 'css-vendor', get_template_directory_uri() . '/assets/dist/css/vendor.css', array(), false );
	wp_enqueue_style( 'css-theme', get_template_directory_uri() . '/assets/dist/css/theme.css', array(), false );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_style' );

function theme_enqueue_script() {
	wp_enqueue_script( 'js-vendor', get_template_directory_uri() . '/assets/dist/js/vendor.js', array(), false, false );
	wp_enqueue_script( 'js-theme', get_template_directory_uri() . '/assets/dist/js/theme.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_script', 1 );



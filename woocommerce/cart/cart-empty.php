<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );?>
<section class="empty-cart">
		<?php 
		$image = get_field('cart__icon','options');
		if( !empty( $image ) ): ?>
			<img class="empty-cart__icon" width="77px" height="70px" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
		<?php if( get_field('cart__text-big','options') ): ?>
			<h2 class="empty-cart__text-top"><?php the_field('cart__text-big','options'); ?></h2>
		<?php endif; ?>
		<?php if( get_field('cart__text-small','options') ): ?>
			<p class="empty-cart__text-bottom"><?php the_field('cart__text-small','options'); ?></p>
		<?php endif; ?>
		<?php 
		$link = get_field('cart__link','options');
		if( $link ): 
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<div class="empty-cart__link--wrapper">
				<a class="empty-cart__link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			</div>
		<?php endif; ?>
	</section>

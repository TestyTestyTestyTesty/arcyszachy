<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="empty-category">
    <div class="empty-category__wrapper">
        <img class="empty-category__icon" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/warning.svg" alt="" width="30px" height="28px">
        <p class="empty-category__text">Nie znaleziono produktów</p>
    </div>
    <a class="empty-category__link" href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Wróć do sklepu</a>
</div>

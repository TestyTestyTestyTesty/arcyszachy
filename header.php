<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ProjectPeople
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/manifest/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/manifest/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/manifest/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/mainfest/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/manifest/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#b91d47">
	<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'in-device' ); ?></a>
	<div id="pixel-to-watch"></div>
	<header id="header-desktop" class="header-desktop">
		<div class="container--medium header__top">
			<?php
				$custom_logo_id  = get_theme_mod( 'custom_logo' );
				$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
			?>
			<a href="<?php echo get_home_url(); ?>" class="logo logo--header">
				<img src="<?php echo $custom_logo_url; ?>" alt="inDevice logo - home" />
			</a>
			<div class="navigation">
				<?php get_search_form(); ?>
				<nav class="navigation__woocommerce">
					<a class="navigation__link navigation__account" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="Konto użytkownika">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/myaccount.svg" alt="Strona konta klienta" width="22px" height="26px">
					</a>
					<?php $cartUrl = wc_get_cart_url(); ?>
					<a class="navigation__link navigation__cart" href="<?php echo $cartUrl; ?>" title="Koszyk">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/cart.svg" alt="Strona koszyka" width="22px" height="26px">
						<span class="navigation__cart-number"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
					</a>
					<span class="navigation__cart-value"><?php echo wc_price( WC()->cart->cart_contents_total); ?></span>
				</nav>
			</div>
		</div>
		<div class="container--medium header__bottom">
			<nav class="header-desktop__menu">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'menu_class'     => 'menu',
							'walker'         => new submenu_wrap(),
						)
					);
					?>
			</nav>
		</div>
	</header>
	<header id="header-mobile" class="header-mobile">
		<div class="container">
			<div class="container--big">
				<div class="header-mobile__top">
					<?php
					 $custom_logo_id = get_theme_mod( 'custom_logo' );
					$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
					?>
					<a href="<?php echo get_home_url(); ?>" class="logo logo--header">
						<img src="<?php echo $custom_logo_url; ?>" alt="inDevice logo - home" />
					</a>
					<nav class="navigation__top">
						<div class="navigation__links">
							<a class="navigation__link navigation__account" href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="Konto użytkownika">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/myaccount.svg" alt="Strona konta klienta" width="22px" height="26px">
							</a>
							<a class="navigation__link navigation__cart" href="<?php echo $cartUrl; ?>" title="Koszyk">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/svg/cart.svg" alt="Strona koszyka" width="22px" height="26px">
								<span class="navigation__cart-number"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
							</a>
						</div>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>  
					</nav>
				</div>
				<div class="header-mobile__search">
					<?php get_search_form(); ?>
				</div>
				 <div class="header-mobile__bottom">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary-menu',
								'menu_class'     => 'header-mobile__menu',
							)
						);
						?>
				</div>
			</div>
		</div>
	</header>

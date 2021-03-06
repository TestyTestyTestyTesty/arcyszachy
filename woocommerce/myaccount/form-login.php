<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>
	<div class="form-login-register">
		<?php
		$image = get_field( 'footer-logo', 'options' );
		if ( ! empty( $image ) ) :
			?>
			<a href="<?php echo get_home_url(); ?>">
				<img class="woocommerce-account__logo" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			</a>
		<?php endif; ?>
	
		<div class="form-switcher">
			<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" class="woocommerce-account__form-title woocommerce-account__login form-active"><?php esc_html_e( 'Login', 'woocommerce' ); ?></a>
			<a href="<?php echo get_permalink( get_page_by_path( 'rejestracja' ) ); ?>" class="woocommerce-account__form-title woocommerce-account__register"><?php esc_html_e( 'Register', 'woocommerce' ); ?></a>
		</div>
	
		<form  class="woocommerce-form woocommerce-form-login login form-visible" method="post">
	
			<?php do_action( 'woocommerce_login_form_start' ); ?>
	
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>
	
			<?php do_action( 'woocommerce_login_form' ); ?>
	
			<div class="form-row woocommerce-account__remember-wrapper">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
				</p>
			</div>
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
	
			<?php do_action( 'woocommerce_login_form_end' ); ?>
	
		</form>
	</div>
	<div class="button-form-return__wrapper">
		<a href="<?php echo get_home_url(); ?>" class="button-form-return">Wróć do strony głównej</a>
	</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

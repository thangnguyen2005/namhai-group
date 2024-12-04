<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flash
 */

?>

<style>
	body {
		font-family: Helvetica, Arial, sans-serif !important;
	}
	.boxed .tg-container{
		padding: 10 !important;	
	}
	.full-row .header-top {
		background: #018791;
		padding: 5px 0;
		font-size: 13.6px;
	}

	.inner-header-top {
		max-width: 1220px;
		width: 100%;
		margin: auto;
		box-sizing: border-box;
		display: flex;
		justify-content: space-between;
		color: #fff;
	}

	.header-main {
		padding-top: 5px;
		padding-bottom: 5px;
		margin-top: 25px;
	}

	@media (max-width: 900px) {
		.inner-header-top {
			flex-direction: column;
			text-align: center;
		}
	}


	#search-form {
		width: 150px;
		box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
		margin: 0;
		border: 1px solid #ddd;
		float: left;
		height: 34px;
		padding: 0px 5px;
		border-radius: 5px 0 0 5px;
	}

	.search-submit {
		margin-bottom: 0 !important;
		background-color: #01959f;
		float: left;
		border-radius: 0 5px 5px 0;
		border: none;
	}

	.search-submit i {
		color: #fff;
		font-size: 14px;
	}

	.searchform {
		padding-left: 5%;
	}

	.header-top {
		background-color: #f1f1f1;
		padding: 10px;
		text-align: center;
		transition: top 0.3s ease;
		position: fixed;
		width: 100%;
		z-index: 1000;
	}

	.header-main {
		color: white;
		padding: 15px;
		text-align: center;
		position: fixed;
		width: 100%;
		top: 0;
		/* Dưới header-top */
		z-index: 999;
		transition: top 0.3s ease;
	}


	@media (max-width: 900px) {
		.header-top {
			position: unset;
		}

		.header-main {
			margin-top: 0;
			position: unset;
		}

		.banner-slider {
			margin-top: 0px !important;
		}
	}
</style>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * WordPress function to load custom scripts after body.
	 *
	 * Introduced in WordPress 5.2.0
	 *
	 * @since Flash 1.3.0
	 */
	if (function_exists('wp_body_open')) {
		wp_body_open();
	}
	?>

	<?php
	if (get_theme_mod('flash_disable_preloader', '') != 1) : ?>
		<div id="preloader-background">
			<div id="spinners">
				<div id="preloader">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php
	/**
	 * flash_before hook
	 */
	do_action('flash_before'); ?>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'flash'); ?></a>

		<?php
		/**
		 * flash_before_header hook
		 */
		do_action('flash_before_header'); ?>
		<div class="full-row header-top" id="headerTop">
			<div class="inner-header-top inner-container">
				<div class="left-header-top">
					<?php echo "Chuyên bulong inox, ốc vít, thanh ren, dây xích, bulong hóa chất" ?>
				</div>
				<div class="right-header-top">
					<?php echo "Email: Sales@namhaiinox.com.vn Hotline: 0977.260.612" ?>
				</div>
			</div>
		</div>

		<header id="headerMain" class="header-main" role="banner">
			<div class="header-bottom">
				<div class="tg-container">
					<div class="logo">
						<?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
							<figure class="logo-image">
								<?php flash_the_custom_logo(); ?>
								<?php if (get_theme_mod('flash_transparent_logo', '') != '') : ?>
									<a href="<?php echo esc_url(home_url('/')); ?>">
										<img class="transparent-logo" src="<?php echo esc_url(get_theme_mod('flash_transparent_logo', '')); ?>" />
									</a>
								<?php endif; ?>
							</figure>
						<?php endif; ?>
						<div class="logo-text site-branding">
							<?php
							if ((is_front_page() && is_home()) || (is_front_page() && !is_home())) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;

							$description = get_bloginfo('description', 'display');
							if ($description || is_customize_preview()) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						</div>
					</div>
					<div class="site-navigation-wrapper">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<div class="menu-toggle">
								<i class="fa fa-bars"></i>
							</div>
							<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
						</nav><!-- #site-navigation -->

						<?php $logo_position = get_theme_mod('flash_logo_position', 'left-logo-right-menu'); ?>

						<?php if ($logo_position == 'center-logo-below-menu') : ?>
							<div class="header-action-container">
								<?php if ((get_theme_mod('flash_header_cart', '') !=  '1') && class_exists('WooCommerce')) :
									$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : WC()->cart->get_cart_url();
								?>
									<div class="cart-wrap">
										<div class="flash-cart-views">
											<a href="<?php echo esc_url($cart_url); ?>" class="wcmenucart-contents">
												<i class="fa fa-opencart"></i>
												<span class="cart-value"><?php echo wp_kses_data(WC()->cart->get_cart_contents_count()); ?></span>
											</a>
										</div>
										<?php the_widget('WC_Widget_Cart', ''); ?>
									</div>
								<?php endif; ?>

								<?php if (get_theme_mod('flash_header_search', '') !=  '1') : ?>
									<div class="search-wrap">
										<div class="search-icon">
											<i class="fa fa-search"></i>
										</div>
										<div class="search-box">
											<?php get_search_form(); ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
						<?php endif ?>
					</div>
					<form role="search" method="get" class="searchform" action="https://theme256v5.demov6.keyweb.vn/">
						<input id="search-form" type="text" value="" name="s" class="app_search search-field" placeholder="Gõ từ khóa cần tìm">
						<button type="submit" class="search-submit" value=""><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>

		</header><!-- #masthead -->
		<script>
			let lastScrollTop = 0;
			const headerTop = document.getElementById('headerTop');
			const headerMain = document.getElementById('headerMain');
			console.log(headerMain, headerTop);
			window.addEventListener('scroll', function() {
				let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
				if (scrollTop > lastScrollTop) {
					headerTop.style.top = '-50px'; // Ẩn header-top
					headerMain.style.top = '-45px'; // Đưa header chính lên đầu
				} else {
					headerTop.style.top = '0'; // Hiện header-top
					headerMain.style.top = '0'; // Đưa header chính xuống
				}
				lastScrollTop = scrollTop;
			});
		</script>
		<?php
		/**
		 * flash_after_header hook
		 */
		do_action('flash_after_header'); ?>

		<?php get_template_part('template-parts/header-media'); ?>


		<?php
		/**
		 * flash_before_main hook
		 */
		do_action('flash_before_main'); ?>

		<div id="content" class="site-content">
			<div class="tg-container">
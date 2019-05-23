<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'storefront_before_site' ); ?>

	<div id="page" class="hfeed site">
	<div class="hamburger-content is-closed">
			<div class="hamburger-header">
				<div class="brand-logo-wrapper">
					<a href="https://hheerraa.co.kr/" class="custom-logo-link" rel="home" itemprop="url">
						<img class="logo-white" src="<?php echo THEME_IMG_PATH; ?>/brand-logo-white.png" class="custom-logo" alt="HhEeRrAa-Logo"/>
					</a>
				</div>
				<div class="hamburger-close-button">
					<img src="<?php echo THEME_IMG_PATH; ?>/close_main.png" class="hamburger-close-button" alt="Close"/>
				</div>
			</div>
			<div class="hamburger-icon-menu">
				<div class="icon-nav-top">
					<?php if ( !is_user_logged_in() ) { ?>
					<li class="user-menus-item">
						<a href="https://hheerraa.co.kr/?page_id=9" aria-current="page">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/login_main.png" alt="login"/> -->
							Login
						</a>
					</li>
					<li class="user-menus-item">
						<a href="https://hheerraa.co.kr/?page_id=84">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/orders_main.png" alt="order tracking for nonmember"/> -->
							Order
						</a>
					</li>
					<?php } ?>
					
					<?php if ( is_user_logged_in() ) { ?>
					<li class="user-menus-item">
						<a
							href="https://hheerraa.co.kr/?page_id=9">
								<!-- <img src="<?php echo THEME_IMG_PATH; ?>/login_main.png" alt="account"/> -->
								Account
						</a>
					</li>
					<li class="user-menus-item">
						<a
						href="https://hheerraa.co.kr/?page_id=9&orders">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/orders_main.png" alt="orders"/> -->
							Orders
						</a>
					</li>
					<?php } ?>
				</div>
				<div class="icon-nav-bottom">
					<li class="user-menus-item">
						<a
						href="https://hheerraa.co.kr/?page_id=7">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/bag_main.png" alt="bag"/> -->
							Shoppingbag
						</a>
					</li>
					<li class="user-menus-item">
						<a
							href="https://hheerraa.co.kr/?page_id=55">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/heart_main.png" alt="wishlist"/> -->
							Wishlist
						</a>
					</li>
				</div>
			</div>
			
			<div class="hamburger-navigation">
				<?php
					/**
					 * Functions hooked into storefront_header action
					 *
					 * @hooked storefront_header_container                 - 0
					 * @hooked storefront_skip_links                       - 5
					 * @hooked storefront_social_icons                     - 10
					 * @hooked storefront_site_branding                    - 20
					 * @hooked storefront_secondary_navigation             - 30
					 * @hooked storefront_product_search                   - 40 x
					 * @hooked storefront_header_container_close           - 41
					 * @hooked storefront_primary_navigation_wrapper       - 42
					 * @hooked storefront_primary_navigation               - 50
					 * @hooked storefront_header_cart                      - 60 x
					 * @hooked storefront_primary_navigation_wrapper_close - 68
					 */
						do_action( 'storefront_header' );
					?>
			</div>
			<!-- <div class="hamburger-footer">
				<a class="footer-sns-link" href="#">
					<img src="<?php echo THEME_IMG_PATH; ?>/youtube-white.png" alt="youbute link"/>
				</a>
				<a class="footer-sns-link" href="#">
					<img src="<?php echo THEME_IMG_PATH; ?>/pinterest-white.png" alt="pinterest link"/>
				</a>
				<a class="footer-sns-link" href="#">
					<img src="<?php echo THEME_IMG_PATH; ?>/instagram-white.png" alt="instagram link"/>
				</a>
			</div> -->
		</div>
		<?php do_action( 'storefront_before_header' ); ?>

		<header id="masthead" class="site-header--common header-custom" role="banner" style="<?php storefront_header_styles(); ?>">
			<div class="logo-menu-container col-full">	
				<a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
				<a class="skip-link screen-reader-text" href="#content">Skip to content</a>
				<div class="site-branding header-brand-logo">
					<a href="https://hheerraa.co.kr/" class="custom-logo-link" rel="home" itemprop="url">
						<img class="logo-black" src="<?php echo THEME_IMG_PATH; ?>/brand-logo_main.png" class="custom-logo" alt="HhEeRrAa-Logo"/>
						<img class="logo-white" src="<?php echo THEME_IMG_PATH; ?>/brand-logo_main.png" class="custom-logo" alt="HhEeRrAa-Logo"/>
					</a>
				</div>
				<div class="hamburger-menu-button">
					<img src="<?php echo THEME_IMG_PATH; ?>/hamburger_main.svg" class="hamburger-menu-button" alt="Menu"/>
				</div>
			</div>
			<div class="icon-nav-container">
				<div class="icon-nav-left">
					<?php if ( !is_user_logged_in() ) { ?>
					<li class="user-menus-item">
						<a href="https://hheerraa.co.kr/?page_id=9" aria-current="page">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/login_main.png" alt="login"/> -->
							Login
						</a>
					</li>
					<li class="user-menus-item">
						<a href="https://hheerraa.co.kr/?page_id=84">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/orders_main.png" alt="order tracking for nonmember"/> -->
							Order
						</a>
					</li>
					<?php } ?>
					
					<?php if ( is_user_logged_in() ) { ?>
					<li class="user-menus-item">
						<a
							href="https://hheerraa.co.kr/?page_id=9">
								<!-- <img src="<?php echo THEME_IMG_PATH; ?>/login_main.png" alt="account"/> -->
								Account
						</a>
					</li>
					<li class="user-menus-item">
						<a
						href="https://hheerraa.co.kr/?page_id=9&orders">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/orders_main.png" alt="orders"/> -->
							Orders
						</a>
					</li>
					<?php } ?>
				</div>
				<div class="icon-nav-right">
					<li class="user-menus-item">
						<a
						href="https://hheerraa.co.kr/?page_id=7">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/bag_main.png" alt="bag"/> -->
							Shoppingbag
						</a>
					</li>
					<li class="user-menus-item">
						<a
							href="https://hheerraa.co.kr/?page_id=55">
							<!-- <img src="<?php echo THEME_IMG_PATH; ?>/heart_main.png" alt="wishlist"/> -->
							Wishlist
						</a>
					</li>
				</div>
			</div>
		</header><!-- #masthead -->

		<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10 x
	 */
	// do_action( 'storefront_before_content' );
	?>

<aside class="left-sidebar left-sidebar--common">
					<?php
					/**
					 * Functions hooked into storefront_header action
					 *
					 * @hooked storefront_header_container                 - 0
					 * @hooked storefront_skip_links                       - 5
					 * @hooked storefront_social_icons                     - 10
					 * @hooked storefront_site_branding                    - 20
					 * @hooked storefront_secondary_navigation             - 30
					 * @hooked storefront_product_search                   - 40 x
					 * @hooked storefront_header_container_close           - 41
					 * @hooked storefront_primary_navigation_wrapper       - 42
					 * @hooked storefront_primary_navigation               - 50
					 * @hooked storefront_header_cart                      - 60 x
					 * @hooked storefront_primary_navigation_wrapper_close - 68
					 */
						do_action( 'storefront_header' );
					?>
<!-- 					
					<footer id="colophon" class="footer site-footer" role="contentinfo">
						<div class="col-full">
							<div class="footer-company-sns">
							<a class="footer-sns-link" href="#">
									<img src="<?php echo THEME_IMG_PATH; ?>/youtube_main.png" alt="youbute link"/>
								</a>
								<a class="footer-sns-link" href="#">
									<img src="<?php echo THEME_IMG_PATH; ?>/pinterest_main.png" alt="pinterest link"/>
								</a>
								<a class="footer-sns-link" href="#">
									<img src="<?php echo THEME_IMG_PATH; ?>/instagram_main.png" alt="instagram link"/>
								</a>
							</div>
							<section class="footer-section">
							<div class="company-information">
								<div class="company-name">상호명 : 헤라(HhEeRrAa)&nbsp;&nbsp;|&nbsp;&nbsp;</div>
								<div class="company-license">사업자등록번호 : 170-24-00644&nbsp;&nbsp;|&nbsp;&nbsp;</div>
								<div class="company-online-business-license">통신판매신고업 : 제2서울성수동1가-2&nbsp;&nbsp;|&nbsp;&nbsp;</div>
								<div class="company-ceo">대표 : 김헤라&nbsp;&nbsp;|&nbsp;&nbsp;</div>
								<div class="company-address">주소 : 서울특별시 중구 퇴계로84길 20-4, 2층(신당동)&nbsp;&nbsp;|&nbsp;&nbsp;</div>
								<div class="company-phone">대표전화 : 070-7543-4372</div>
							</div>
							<div class="footer-legal">
								<div class="footer-copyright">&copy;
									<?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
								</div>
							</div>
						</section>

						</div>
					</footer> -->
				</aside>

		<div id="content" class="site-content " tabindex="-1">
			<div class="col-full col-full--home">
				

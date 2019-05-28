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
	<meta name="description" content="Showing the endless differences in detail.">
	<meta name="google-site-verification" content="rDlx5JnqnOiPFyUnR3eWfFCOa1DhVIysnoiRngFH28Q" />
	<meta name="naver-site-verification" content="64932338dfa6eb91b0a202c29fa39c8b44d08894"/>
	<meta name="format-detection" content="telephone=no">
	<meta name="p:domain_verify" content="d43d82f133f70698568c10c75df6c3b0"/>
	<meta name="author" content="헤라(HeraKim)" />
	<meta name="keywords" content="디자이너 브랜드" />

<meta property="og:type" content="website" />

<meta property="og:title" content="HhEeRrAa - Showing the endless differences in detail" />

<meta property="og:description" content="헤라(HhEeRrAa) - 끝없는 디테일의 차이를 보여주는 것, 디테일에서 무한한 차이를 보여주는 것. Showing the endless differences in detail" />

<meta property="og:image" content="<?php echo THEME_IMG_PATH; ?>/brand-logo_main.png" />

<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<title>HhEeRrAa</title>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140788690-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140788690-1');
</script>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'storefront_before_site' ); ?>

	<div id="page" class="hfeed site">
		<div class="event-description">
			<div class="event-description-title">2019 Summer</div>
			<div class="event-description-content">Pre-order 10% Discount</div>
			<div class="event-description-date"><div>May 24 - May 31</div><div class="event-description-shipping">(6월 1일부터 순차 배송)</div></div>
			
			<div class="event-description-title-kr">2019 여름시즌 전제품을 10% 할인된 금액으로 만나보세요</div>
			<div class="event-description-link-shop">
				<a href="<?php echo get_page_link(6); ?>">시즌제품 보러가기</a>
			</div>
		</div>
		<div class="full-bg">
			<img src="<?php echo THEME_IMG_PATH; ?>/full-bg.jpg" alt="full-bg">
		</div>
		<div class="full-bg-desktop">
			<img src="<?php echo THEME_IMG_PATH; ?>/full-bg-desktop.jpg" alt="full-bg-desktop">
		</div>
		<div class="full-bg-pad">
			<img src="<?php echo THEME_IMG_PATH; ?>/full-bg-pad.jpg" alt="full-bg-pad">
		</div>
		<div class="hamburger-content is-closed">
			<div class="hamburger-header">
				
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

		<header id="masthead-home" class="site-header--home header-custom-for-home" role="banner" style="<?php storefront_header_styles(); ?>">
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
					<img id="hamburger-menu-button" src="<?php echo THEME_IMG_PATH; ?>/hamburger_main.svg" class="hamburger-menu-button" alt="Menu"/>
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

		<div id="content-home" class="site-content site-content--home" tabindex="-1">
			<div class="col-full col-full--home">
				<aside class="left-sidebar left-sidebar--home">
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
					
				</aside>

				<?php
		do_action( 'storefront_content_top' );
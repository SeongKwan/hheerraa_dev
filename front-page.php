<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header('home');
?>
<div id="primary" class="content-area content-area--home">
	<main id="main" class="site-main site-main--home">

		<div class="slider-home">
			<?php 
				// echo do_shortcode('[smartslider3 slider=4]');
			?>

			<?php 
				// echo do_shortcode('[smartslider3 slider=5]');
			?>
	</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer('home');
<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	</header>
	
	<div class="entry-content">

		<div class="contact-subscribe-form">
			<?php the_content(); ?>
		</div>

		<div class="company-info">
			<div class="label-company-info">
				Address
			</div>
			<div class="content-company-info">
				34, Whangshipri-ro 6-gill Seongdong-gu
				<br/>Seoul, South Korea
			</div>
			<div class="label-company-info">
				Email
			</div>
			<div class="content-company-info">
				HhEeRrAaseoul@gmail.com
			</div>
			<div class="label-company-info">
				Number
			</div>
			<a href="tel: 070-7543-4372" class="content-company-info">
				070-7543-4372
			</a>
			<div class="label-company-info">
				Instagram
			</div>
			<div class="content-company-info">
				hheerraa_official
			</div>
			<div class="label-company-info">
				Youtube
			</div>
			<div class="content-company-info">
				HhEeRrAa
			</div>
			<div class="label-company-info">
				Pinterest
			</div>
			<div class="content-company-info">
				HhEeRrAa
			</div>
		</div>
		<div class="sns-links-icon-container">
			<i class="fab fa-instagram"></i>
			<i class="fab fa-youtube"></i>
			<i class="fab fa-pinterest"></i>
		</div>
	</div>
		
</article><!-- #post-## -->
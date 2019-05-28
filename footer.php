<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->
	
	<footer id='footer' class="main-footer">
	<?php do_action( 'storefront_before_footer' ); ?>
		<div class="footer-top">
			<div class="footer-line"></div>
			<div class="footer-content-container">
				<div class="footer-content footer-content--about">
					<a href="<?php echo get_page_link(44); ?>">About</a>
				</div>
				<div class="footer-content footer-content--privacy-policy">
					<a href="<?php echo get_page_link(148); ?>">Privacy policy</a></div>
				<div class="footer-content footer-content--terms">
					<a href="<?php echo get_page_link(53); ?>">Terms</a></div>
				<div class="footer-content footer-content--sales-refunds">
					<a target="_blank" href="https://www.instagram.com/hheerraa_official/?hl=ko">Instagram</a></div>
			</div>
			<div class="footer-line"></div>
		</div>
		<div class="footer-company-info-container">
			<div class="company-license">Registration : 170-24-00644&nbsp;&nbsp;
				<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-online-business-license">Mail order license : 2019-Seoul Junggu-0965&nbsp;&nbsp;<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-ceo">Owner : HeraKim&nbsp;&nbsp;<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-address">Address : 2nd(Shindang-dong), 20-4, Toegye-ro 84-gil, Jung-gu, Seoul&nbsp;&nbsp;<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-phone">
				<a href="tel: 070-7543-4372">Customer service : 070-7543-4372</a>
			</div>
		</div>
		<div class="footer-legal">
			<div class="footer-copyright">&copy;
				<?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
			</div>
		</div>
	</footer>
	

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
<div id="wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>
<div class="scroll-to-top"><img src="<?php echo THEME_IMG_PATH; ?>/up_main.png" alt="scrollTop"></div>
</body>
</html>

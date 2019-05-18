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

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer class="main-footer">
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
					<a href="<?php echo get_page_link(441); ?>">Sales & Refunds</a></div>
			</div>
			<div class="footer-line"></div>
		</div>
		<div class="footer-company-info-container">
			<div class="company-license">사업자등록번호 : 170-24-00644&nbsp;&nbsp;
				<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-online-business-license">통신판매신고업 : 제2서울성수동1가-2&nbsp;&nbsp;<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-ceo">대표 : 김헤라&nbsp;&nbsp;<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-address">주소 : 서울특별시 중구 퇴계로84길 20-4, 2층(신당동)&nbsp;&nbsp;<span class="company-info-divider">|</span>&nbsp;&nbsp;</div>
			<div class="company-phone">대표전화 : 070-7543-4372</div>
		</div>
		<div class="footer-legal">
			<div class="footer-copyright">&copy;
				<?php echo date('Y'); ?> <?php bloginfo('name'); ?> HhEeRrAa. All rights reserved.
			</div>
		</div>
	</footer>
	

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
<div id="wrap" style="display:none;border:1px solid;width:500px;height:300px;margin:5px 0;position:relative">
<img src="//t1.daumcdn.net/postcode/resource/images/close.png" id="btnFoldWrap" style="cursor:pointer;position:absolute;right:0px;top:-1px;z-index:1" onclick="foldDaumPostcode()" alt="접기 버튼">
</div>
</body>
</html>

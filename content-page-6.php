<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("my-bag-container"); ?>>

	<h1>content-page-6.php</h1>
	<?php
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10
	 * @hooked storefront_page_content         - 20
	 */
	do_action( 'storefront_content_top' );

	do_action( 'storefront_page' );
	?>

</article><!-- #post-## -->

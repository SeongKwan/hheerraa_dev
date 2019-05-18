<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("about_container"); ?>>

	<div class="entry-content">

		<?php the_content(); ?>

	</div>

</article><!-- #post-## -->
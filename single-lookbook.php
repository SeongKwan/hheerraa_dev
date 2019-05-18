<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class("lookbook_container"); ?>>
			<div class="lookbook-menu">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'lookbook',
					'container'		=> 'nav',
					'container_class' => 'lookbook-menu-container',
				) );
				?>
			</div>
			

			<div class="entry-content entry-content--lookbook">
				<?php the_content(); ?>
			</div>

		</article>

		<?php endwhile; endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
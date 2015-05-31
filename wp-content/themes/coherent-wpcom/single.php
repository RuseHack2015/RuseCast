<?php
/**
 * The template for displaying all single posts.
 *
 * @package coherent
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="post-nav" aria-hidden="true">' . __( 'Next: ', 'coherent' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'coherent' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="post-nav" aria-hidden="true">' . __( 'Previous: ', 'coherent' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'coherent' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>

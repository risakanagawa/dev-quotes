<?php
/**
 * The template for displaying all single posts.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
		<div class="quotes-block">
		<div class="quote-content">
		<p><?php the_content();?></p>
		</div>
		<p class='quote-title'><?php the_title();?></p>  
		</div>

		<?php endwhile; // End of the loop. ?>
		<button class="quotes-btn">SHOW ME ANOTHER</button>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

<?php
/**
 * The template for displaying archive pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
					<?php $query = new WP_Query(array('posts_per_page' => '5'));?>
				<?php if (have_posts()): while ($query->have_posts()): $query->the_post();?>
				<div class="archive-items">
				<div class="quote-content">
					<?php the_content();?>
				</div>
				<p class='quote-title'>
				<?php the_title();?>
				<?php $source = get_post_meta($post->ID, '_qod_quote_source', true); 
					$url = get_post_meta($post->ID, '_qod_quote_source_url', true);
				?>
					<?php if($url): ?>
						, <a href="<?php echo $url ?>"><?php echo $source ?></a>
					<?php elseif($source): ?>
						<?php echo ', '.$source ?>
					<?php endif ?>
				</p>  
				</div>
		<?php endwhile;?>
		<?php else: ?>
			<h2>Not Found</h2>
		<?php endif;?>

			<?php qod_numbered_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

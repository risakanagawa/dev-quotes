<?php
/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header();?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="quotes-block">

		<?php $query = new WP_Query(array('orderby' => 'rand', 'posts_per_page' => '1'));?>
		<?php if (have_posts()): while ($query->have_posts()): $query->the_post();?>
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

		<?php endwhile;?>
		<?php else: ?>
			<h2>Not Found</h2>
		<?php endif;?>
		</div>
		<button class="quotes-btn">SHOW ME ANOTHER</button>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();?>

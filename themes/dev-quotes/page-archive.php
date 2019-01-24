<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <h1>Archives</h1>
            <div class="archive-section">
                <h2>Quote Authors</h2>
                <ul>
                <?php $args = array(
                    'numberposts'     => -1,
                    'offset'           => 0,
                    'orderby'          => 'date',
                    'order'            => 'DESC',
                    'post_type'        => 'post',
                    'post_status'      => 'publish',
                    'suppress_filters' => true 
                );
                $posts = get_posts( $args ); 
                foreach( $posts as $post )  : setup_postdata($post); ?>
                <li><a href="<?php the_permalink();?>" class="author_name"><?php the_title(); ?></a></li>
                <?php endforeach; ?>
                </ul>
             </div>

            <div class="archive-section">
            <h2>Categories</h2>
                <ul class="dev_category">
                <?php wp_list_categories('title_li='); ?>
                </ul>
            </div>

            <div class="archive-section">
                <h2>Tags</h2>
                <ul>
                <?php
                $posttags = get_tags();
                if ($posttags) {
                    foreach($posttags as $tag) {
                    echo '<li><a href="'. get_tag_link($tag->term_id) .'">' . $tag->name . '</a></li>';
                    }
                }
                ?>
                </ul>
            </div>
            
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();?>
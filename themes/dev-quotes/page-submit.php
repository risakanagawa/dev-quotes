<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        <div class="submit-form">
            <h2>Submit a Quote</h2>
        <?php if ( is_user_logged_in() ) {?>
            <form action="POST" id="submitform">
                <label for="author">Author of Quote</label>
                <input type="text" id="submit-author">
                <label for="quotes">Quotes</label>
                <textarea type="text" id="submit-quotes"></textarea>
                <label for="place">Where did you find this quote?(e.g. book name)</label>
                <input type="text" id="submit-place">
                <label for="url">Provide the URL of the quote source, if available.</label>
                <input type="text" id="submit-url">
            </form>
            <button type="submit" id="quote_submit">Submit Quote</button>

        <?php } else {?>
            <p>Sorry, you must be logged in to submit a quote!</p>
            <a href=" <?php echo wp_login_url( $redirect ); ?>">Click here to login.</a>
        <?php } ?>
        </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

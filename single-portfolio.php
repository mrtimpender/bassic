<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bassic
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

	<div class="row">
		<?php while ( have_posts() ) : the_post(); ?>

			<h2><?php the_title(); ?></h2>
			
			<div class="categories"><?php echo get_the_category_list(', '); ?> </div>

			<img class="portfolio-hero" src="<?php the_field('portfolio_hero_image'); ?>">

			<p class="intro"><?php the_field('portfolio_introduction_text'); ?></p>

			<?php the_content(); ?>

			<!-- Related Posts -->
			<?php 
			$orig_post = $post;

			global $post;

			$categories = get_the_category($post->ID); // Get the current post's categories

			if ($categories) {

			    $category_ids = array();

			    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			    // Related Post Loop Settings
			    $args=array(
			        'post_type' => 'portfolio', // Post type to include
			        'category__in' => $category_ids, // Categories to include (the categories associated with the current post)
			        'post__not_in' => array($post->ID), // Posts to exclude (the current post)
			        'posts_per_page'=> 3, // Number of related posts that will be shown.
			        'caller_get_posts'=>1
			    );

			    $my_query = new wp_query( $args ); 

			    if( $my_query->have_posts() ) { ?>

			        <div class="portfolio"> <!-- Using the .portfolio class to inherit styles -->
			            <h3>Related Work</h3> <!-- Section Headline -->

			            <div class="row">

			            <?php while( $my_query->have_posts() ) { $my_query->the_post();  // Begin Loop ?>

			            <!-- Begin Related Post -->
			                <div class="column third" style="background-image: url(<?php the_field('portfolio_image'); ?>);">
							    <div class="portfolio-color-overlay"></div>
							    <h3 class="portfolio-title"><?php the_title(); ?></h3>
							    <a class="portfolio-link" href="<?php the_permalink(); ?>"><span class="dashicons dashicons-arrow-right-alt"></span></a>
							</div>
			            <!-- End Related Post -->

			            <?php } // End Loop ?>

			        </div>

			<?php } }  // Closing `if categories` and `if query`

			    // Resetting query for the rest of the page.
			    $post = $orig_post;
			    wp_reset_query(); 
			?>


		<?php endwhile; // end of the loop. ?>
	</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

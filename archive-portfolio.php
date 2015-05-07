<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bassic
 */

get_header(); ?>

	<div id="primary" class="content-area portfolio">
	
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<h2 class="portfolio-headline underline">Work</h2>

			<div class="row">


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="column third" style="background-image: url(<?php the_field('portfolio_image'); ?>);">
				    <div class="portfolio-color-overlay"></div>
				    <h3 class="portfolio-title"><?php the_title(); ?></h3>
				    <a class="portfolio-link" href="<?php the_permalink(); ?>"><span class="dashicons dashicons-arrow-right-alt"></span></a>
				</div>

			<?php endwhile; ?>

			</div>

			<?php the_posts_navigation(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>

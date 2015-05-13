<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bassic
 */

get_header(); ?>

	<div id="primary" class="content-area about">
	
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="row">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<h3 class="about-headline"><?php the_field('about_headline'); ?></h3>

				<div class="column half">
					<img class="about-hero" src="<?php the_field('about_hero'); ?>">
				</div>
				<div class="column half">
					<?php the_field('about_information'); ?>
				</div>

			<?php endwhile; ?>

			</div>

			<?php the_posts_navigation(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>

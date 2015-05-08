<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bassic
 */

get_header(); ?>

	<div id="primary" class="content-area services">
		<!-- Add Services class to keep all stylings consistent -->

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<h2 class="services-headline underline">Services</h2>

				    <div class="row">

						<?php
						    $args = array( 
						        'post_type' => 'services',
						        'posts_per_page' => 3
						    );
						    $loop = new WP_Query( $args );
						    while ( $loop->have_posts() ) : $loop->the_post();
						?>

				    	<div class="column third">
							<img class="service-icon" src="<?php the_field('services_icon'); ?>">
						    <h3 class="service-title"><?php the_title(); ?></h3>
						    <p class="service-description"><?php the_field ('services_description'); ?></p>
						</div>

						<?php endwhile; ?>

				    </div>

			<?php the_posts_navigation(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<!-- <?php get_sidebar(); ?> -->
<?php get_footer(); ?>

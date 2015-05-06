<?php
/**
 *	Template Name: Home Page 
 *
 * @package Bassic
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="hero" style="background-image: url(<?php the_field('hero_background_image') ?>);">
					<h1><?php the_field('hero_headline') ?></h1>
					<p><?php the_field('hero_subheadline') ?></p>
				</div>

				<!-- Begin Services -->
				<div class="services">
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
					    <?php wp_reset_postdata(); ?>

				    </div>
				</div>
				<!-- End Services -->

				<!-- Begin Portfolio -->
				<div class="portfolio">
    				<h2 class="portfolio-headline">Oooo Lala!</h2>

    				<div class="row">

						<?php
						    $args = array( 
						        'post_type' => 'portfolio',
						        'posts_per_page' => 3
						    );
						    $loop = new WP_Query( $args );
						    while ( $loop->have_posts() ) : $loop->the_post();
						?>

				        <div class="column third" style="background-image: url(<?php the_field('portfolio_image'); ?>);">
				        	<h3><?php the_title(); ?></h3>
				        	<a href="<?php the_permalink(); ?>"></a>
				        </div>	
					
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>

				    </div>

				    <a href="">View More ➞</a>
				</div>
				<!-- End Portfolio -->

				<!-- Begin Blog -->
				<div class="recent-blog">
				    <h2 class="blog-headline">Blog</h2>

				    <div class="row">

				    <?php
				        $args = array( 
				            'post_type' => 'post',
				            'posts_per_page' => 1
				        );
				        $loop = new WP_Query( $args );
				        while ( $loop->have_posts() ) : $loop->the_post();
				    ?>

				        <div class="blog-post">
				            <h3><?php the_title(); ?></h3>
				            <div class="meta"><?php bassic_posted_on(); ?></div> <!-- Don't forget to change the slug -->
				            <p><?php the_excerpt(); ?></p>
				            <a href="<?php the_permalink(); ?>">Read More ➞</a>
				        </div>

				    <?php endwhile; ?>
				    <?php wp_reset_postdata(); ?>

				    </div>

				    <a href="">View More ➞</a>
				</div>
				<!-- End Blog -->

				

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

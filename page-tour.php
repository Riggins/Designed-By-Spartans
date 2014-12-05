<?php /* Template Name: Tour Page */ ?>

<?php get_header(); ?>


<br/>

<!-- Display Recent Articles -->
	<div class="row">
	<div class="large-12 columns">
		<h2>All Posts</h2>
		
	</div>
	</div>
	
	<hr/>
	
	
	<div class="row">
	
	
		<div class="large-12 columns">

					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<div class="large-4 medium-4 columns">
								<?php the_content(); ?>
							</div>
						
						<?php endwhile; ?>

						<?php else : ?>
						
							<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
								<h1>Ruh roh. No posts?</h1>
							</div>
					
					<?php endif; wp_reset_query(); ?>
		</div>
		
	</div><!-- end 12 columns -->

<?php get_footer(); ?>
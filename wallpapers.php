<?php /* Template Name: Wallpapers */ ?>

<?php get_header(); ?>


<br/>

	<!-- Display Recent Articles -->
		<div class="row">
		<div class="large-12 columns">
			<h2>Wallpapers</h2>
		</div>
		</div>
		
		<hr/>
		
		<div class="row">
		<div class="large-12 columns">
			<h3>Monitors</h3>
		</div>
		</div>
		
		<hr/>
		
		<div class="row">
		<div class="large-12 columns">
		

					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('order=DESC&orderby=date&cat=9&paged=' . $paged); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
						<?php include('loop-grid.php') ?>
						
						<?php endwhile; ?>
						
							<?php kriesi_pagination(); ?>
						
						<?php else : ?>

						<h4>No more monitor wallpapers to show.</h4>
					
					<?php endif; wp_reset_query(); ?>

		
		</div>
		</div><!-- end 12 columns -->
						
		
		<hr/>
		
		
		<!-- Display Recent Articles -->
			<div class="row">
			<div class="large-12 columns">
				<h3>Mobile</h3>
			</div>
			</div>
			
			<hr/>
			
			<div class="row">
			<div class="large-12 columns">
			
						<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('order=DESC&orderby=date&cat=10&paged=' . $paged); ?>
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
							<?php include('loop-grid.php') ?>
							
							<?php endwhile; ?>
							
								<?php kriesi_pagination(); ?>
							
							<?php else : ?>
							

							<h4>All out of mobile wallpapers.</h4>

						
						<?php endif; wp_reset_query(); ?>
			
			</div>
			</div><!-- end 12 columns -->		
						
						
						
						

	<?php get_footer(); ?>
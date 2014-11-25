<?php get_header(); ?>
		
		
		<br/>
							
			<div class="row">		
				<div class="large-12 columns">   
				
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
						<div id="entry">
							<h2 class="bold entry-content"><?php the_title(); ?></h2>
							
						    <div class="entry-content"><?php the_content(); ?></div>
						</div>
					
					<?php endwhile; endif; ?>
					
					
				</div>
			</div>


<?php get_footer(); ?>

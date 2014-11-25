<?php get_header(); ?>

<br/>
			
			<div class="row" id="archive">
				<div class="large-12 columns">
				
					    <?php if (is_category()) { ?>
						    <div class="large-12 columns center">
							    <h2 class="archive-title h2">
								    <?php single_cat_title(); ?>
						    	</h2>
					    	</div>

					    	<hr/>

					    <?php } elseif (is_tag()) { ?> 
						    <h2 class="archive-title h2">
							    <span><?php _e("Posts Tagged:", "bonestheme"); ?></span> <?php single_tag_title(); ?>
						    </h2>
						    
						    <hr/>
					    
					    <?php } elseif (is_author()) { 
					    	global $post;
					    	$author_id = $post->post_author;
					    ?>
						    <h2 class="archive-title h2">

						    	<span><?php _e("Posts By:"); ?></span> <?php echo get_the_author_meta('display_name', $author_id); ?>

						    </h2>
					    <?php } elseif (is_day()) { ?>
						    <h2 class="archive-title h2">
	    						<span><?php _e("Daily Archives:", "bonestheme"); ?></span> <?php the_time('l, F j, Y'); ?>
						    </h2>
						    
						    <hr/>
		
		    			<?php } elseif (is_month()) { ?>
			    		    <h2 class="archive-title h2">
				    	    	<span><?php _e("Monthly Archives:", "bonestheme"); ?></span> <?php the_time('F Y'); ?>
					        </h2>
					        
					        <hr/>
					
					    <?php } elseif (is_year()) { ?>
					        <h2 class="archive-title h2">
					    	    <span><?php _e("Yearly Archives:", "bonestheme"); ?></span> <?php the_time('Y'); ?>
					        </h2>
					        
					        <hr/>
					       
					    <?php } ?>
					    
					    
					    
					    
					    <div class="large-3 columns">
							
							<?php include('searchform.php') ?>
							
							<select name="archive-menu" onChange="document.location.href=this.options[this.selectedIndex].value;">
							<option value="">Select month</option>
							<?php wp_get_archives('type=monthly&format=option'); ?>
							</select>
							
	
							<form action="<?php bloginfo('url'); ?>/" method="get">
								<div>
								<?php
								$select = wp_dropdown_categories('show_option_none=Select category&show_count=1&orderby=name&echo=0');
								$select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
								echo $select;
								?>
								<noscript><div><input type="submit" value="View" /></div></noscript>
								</div>
							</form>
							
							
	
							   <form action="<?php bloginfo('url'); ?>" method="get">
							   
							   <div>
							   <?php
							   $select = wp_dropdown_users('show_option_none=Select author&order=DESC&show=display_name&name=author&who=authors&echo=0');
							   $select = preg_replace("#<select([^>]*)>#", "<select$1 onchange='return this.form.submit()'>", $select);
							   echo $select;
							   ?>
							   
	
							   <noscript><input type="submit" name="submit" value="view" /></noscript>
							   </div>
							   </form>
							
						
						</div>
					    
					    
					    
					    
					    
					    <div class="large-9 columns">
					    
					    
						<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('posts_per_page=30&paged=' . $paged); ?>
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>


							<?php include('loop-feed.php') ?>
						   		
						   										   				
						<?php endwhile; ?>	
						   				        
	   				        <?php kriesi_pagination();?>
	   				
	   				    <?php else : ?>
	   				
	   					    <article id="post-not-found" class="hentry clearfix">
	   						    <header class="article-header">
	   							    <h1><?php _e("Ruh-roh, that post or page has disappeared!", "bonestheme"); ?></h1>
	   					    	</header>
	   						    <section class="entry-content">
	   							    <p><?php _e("Try double checking the URL.", "bonestheme"); ?></p>
	   							</section>
	   							<footer class="article-footer">
	   							    <p><?php _e("This is the error message in the archive.php template. Please alert the webmaster.", "bonestheme"); ?></p>
	   							</footer>
	   				    	</article>
	   				
	   				    <?php endif; ?>
	   				    
	   				    
						</div><!-- end 9 columns -->
					</div> 	
					</div><!-- end 12 columns -->


<?php get_footer(); ?>
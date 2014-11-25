<?php get_header(); ?>
			
			<br/>
			<div class="row">

				
				
					<div class="large-9 columns">
						<h3 class="archive-title"><span>
						
						<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e('('); echo $count; _e(')'); _e(' Related Articles'); wp_reset_query(); ?>
						
						</h3>
						
						<hr/>

						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
						    <div><label class="screen-reader-text" for="s">Search for:</label>
						        <input type="text" value="<?php echo $key; ?>" name="s" id="s" />
						        <input type="submit" class="search-btn" id="searchsubmit" value="Search" />
						    </div>
						</form>
						
						<hr/>
						
						

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
					
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
								<header class="article-header">
							
									<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
									<p class="byline subheader" style="margin-top: -15px;"><?php _e("Posted", "bonestheme"); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></p>
						
								</header> <!-- end article header -->
					
								<section class="entry-content">
								    <p><?php echo get_excerpt(320); ?></p>
					
								</section> <!-- end article section -->
						
								<footer class="article-footer">
							
								</footer> <!-- end article footer -->
					
							</article> <!-- end article -->
					
						<?php endwhile; ?>	
					
						    <!-- PageNavi plugin for pagination -->
							<!-- <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?> -->
							
							<!-- USE THIS INSTEAD -->
							<?php kriesi_pagination();?>
						   		
						   		<br/>
					
					    <?php else : ?>
					
    					    <article id="post-not-found" class="hentry clearfix">
    					    	<section class="article-header">
    					    		<h1><?php _e("Sorry, No Results.", "bonestheme"); ?></h1>
    					    	</section>
    					    </article>
					
					    <?php endif; ?>
					    
					    </div>
					    
					    
					    
					    <div class="large-3 columns">
					    	<?php get_sidebar(); ?>
					    </div>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
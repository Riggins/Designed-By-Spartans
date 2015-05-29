		<!-- if user wrote post or is an admin, show controls -->
		<?php global $current_user; get_currentuserinfo(); ?>
		<?php if ($post->post_author == $current_user->ID || current_user_can('level_10') ) { ?>
			<div class="admin-controls">
				<?php edit_post_link(); ?>
				<a href="<?php echo get_delete_post_link( $id ); ?>" class="post-delete-link">Delete</a>
			</div>
		<?php } ?>
		
	
		
		<!-- if is just text, no image -->
		<?php if ( !has_post_thumbnail() ) { ?>
			<div class="feed_item">
				<div class="feed_padding">
		
				<div class="feed_meta">
					<h3 class="feed_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<h6 class="feed_author">POSTED BY <?php the_author_posts_link(); ?> | <?php the_time(); ?></h6>
					
					
					<?php if ( is_user_logged_in() ) { ?>
						<div class="feed_count">
							<span class="views-grid"><span class="views-icon"></span><?php echo getPostViews(get_the_ID()); ?></span>

							<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
							<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
							
						</div>
					<?php } ?>
					
					
				</div>
				
				<br/>
				
				
				</div>
			</div><!-- end feed item -->
		
		<?php } ?>
		
		
		
		<!-- if there's an image -->
		<?php if ( has_post_thumbnail() ) { ?>
		
			<div class="feed_item">
				<div class="feed_padding">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('medium', array('class' => 'feed_visual')); ?>
				</a>
					
						
						<h3 class="feed_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
						<h5><?php the_author_posts_link(); ?></h5>
											
						<h6 class="subheader" style="margin-top: -10px"><?php the_time() ?></h6>
						
						
						<?php if ( is_user_logged_in() ) { ?>
							<div class="home_count">
								<span class="views-grid"><span class="views-icon"></span><?php echo getPostViews(get_the_ID()); ?></span>

								<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
								<?php if( function_exists('dot_irecommendthis') ) dot_irecommendthis(); ?>
								
							</div>
						<?php } ?>
		
					</div>
				</div>
		
		<?php } ?>

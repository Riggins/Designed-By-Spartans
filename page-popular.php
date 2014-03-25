<?php
/*
Template Name: Popular Page
*/
?>

<?php get_header(); ?>
			
	
		<div class="gridly-copy" style="background: #fff;">
			<h2>50 Most Popular Posts</h2>
			
			<hr/>
			
			<ol class="no-bullet">
			<?php query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=50'); if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> (<?php echo getPostViews(get_the_ID()); ?>)</li>
				
				<?php endwhile; endif; wp_reset_query(); ?>	
			</ol>
		</div>

			
<?php get_footer(); ?>
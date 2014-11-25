<?php get_header(); ?>

<div class="row section">
<div class="large-12 columns">

	<h2><?php single_cat_title( $prefix = '', $display = true ); ?></h2>
	
	<hr/>

	<div class="large-block-grid-4 columns">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php if(is_category() && in_category($cat)) { ?>
		
			<?php include('loop-grid.php') ?>
		
		<?php } endwhile; ?>
		
		<?php endif; ?>
	</div>	
	
	
	<hr/>
	
	<h5>All Categories</h5>
	<ul class="">
	<?php wp_list_categories('orderby=name&title_li='); ?> 
	</ul>
	

</div>
</div>

<?php get_footer(); ?>
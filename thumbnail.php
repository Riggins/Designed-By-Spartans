<!--<?php if (get_the_excerpt()) { ?>

		<?php the_excerpt(); ?>-->
		
<?php } if ( has_post_thumbnail() ) { ?> <!-- check to see if featured image was set -->
							
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('full', array('class' => 'absolute-homepage-image')); ?>
	</a>

<?php } elseif (catch_that_image() ) { ?> <!-- well, fine...use the first image! -->

	<a href="<?php the_permalink(); ?>">
		<img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>"  class="absolute-homepage-image" />
	</a>
	
<?php } else { ?> 


	
<?php } ?>

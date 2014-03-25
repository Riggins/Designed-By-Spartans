<?php get_header(); ?>
	
	<div class="content">

		<?php
		if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
		else :
		$curauth = get_userdata(intval($author));
		endif;
		?>
		
		<h2>About: <?php echo $curauth->nickname; ?></h2>
		<dl>
		<dt>Website</dt>
		<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
		<dt>Profile</dt>
		<dd><?php echo $curauth->user_description; ?></dd>
		</dl>
		<h2>Posts by <?php echo $curauth->nickname; ?>:</h2>

	</div>

<?php if (have_posts()) : ?>
<div id="post-area">
<?php while (have_posts()) : the_post(); ?>	

   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		 <?php if ( has_post_thumbnail() ) { ?>
         <div class="gridly-image"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'summary-image' );  ?></a></div>
          <div class="gridly-category"><p><?php the_category(', ') ?></p></div>
       
		  <?php } ?>
       			<div class="gridly-copy"><h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <p class="gridly-name"><?php the_author_posts_link(); ?></p>
                <hr />
                <p class="gridly-meta"><?php echo time_ago(); ?> / <?php comments_popup_link( '0 comments', '1 comment', '% comments', 'comments-link', 'Comments Off'); ?> / Likes</p>

				<?php the_excerpt(); ?> 

               <p class="gridly-link"><a href="<?php the_permalink() ?>">View more &rarr;</a></p>
         </div>
       </div>
       

<?php endwhile; ?>
</div>
<?php else : ?>
<?php endif; ?>

	

	</div>
	
	<?php// get_sidebar(); ?>


<?php get_footer(); ?>
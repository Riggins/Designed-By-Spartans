<?php get_header(); ?>

<div class="content system-message">
<center>
	<?php if ( is_user_logged_in() ) { ?>
    	<?php echo 'Welcome, registered user!'; ?>
    	
    	<li><a href="<?php echo home_url()?>/wp-admin/">Dashboard</a></li>
    	 <li><a href="<?php echo home_url()?>/wp-admin/post-new.php">New post</a></li>
    	 <?php edit_post_link('Edit post', '<li>', '</li>'); ?>
    	 <li><a href="<?php get_author_link( true, get_current_user_id() ); ?>">Your profile</a></li>
    	
	<?php } else { ?>
		<h3>Hey! Are you an art student at SJSU?</h3>
		<h4>Sign up to showcase your work and get feedback</h4>
    	<a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=register"><?php _e('Register') ?></a>
	<?php } ?>
</center>
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
    
<?php next_posts_link('<p class="view-older">View Older Entries</p>') ?>


<script>
	$(document).ready(function(){
	    $('#post-area .post').fadeOut().hide();
	    $('#post-area .post').delay().fadeIn(300);
	});
</script>
    
 
<?php get_footer(); ?>

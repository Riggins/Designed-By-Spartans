<?php get_header(); ?>

<div class="row section">
<div class="large-12 columns">

	<?php
	if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
	else :
		$curauth = get_userdata(intval($author));
	endif;
	?>



	<!-- establish "$user->ID" as the universal ID -->
<!-- 	<?php 
	global $current_user;
	$current_user = wp_get_current_user();
	$user->ID=$current_user->ID;
	?> -->


	<!-- subscribe to authors 
	<?php echo do_shortcode('[contributors]'); ?>-->
	
		<br/>
		
		<a href="<?php echo get_edit_user_link(); ?>"><span class="action-button">Edit profile</span></a>

		<h2 rel="nofollow"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
	
		<p><?php echo $curauth->user_description; ?></p>
		
		<a rel="nofollow" href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <br/>
		

		<!-- User Links -->
			<?php if ( get_the_author_meta( 'behance', $user->ID ) ) { ?>
				<a href="http://behance.net/<?php echo esc_attr( $curauth->behance ); ?>">Behance</a>
			<?php } ?>

			<?php if ( get_the_author_meta( 'dribbble', $user->ID ) ) { ?>
				<a href="http://dribbble.com/<?php echo esc_attr( $curauth->dribbble ); ?>">Dribbble</a>
			<?php } ?>
			
			<?php if ( get_the_author_meta( 'twitter', $user->ID ) ) { ?>
				<a href="http://twitter.com/<?php echo esc_attr( $curauth->twitter ); ?>">Twitter</a>
			<?php } ?>

			<?php if ( get_the_author_meta( 'facebook', $user->ID ) ) { ?>
				<a href="http://facebook.com/<?php echo esc_attr( $curauth->facebook ); ?>">Facebook</a>
			<?php } ?>
		
		<br />

		<a href="<?php echo home_url() . '/p/u/' . $curauth->user_nicename . '/feed'; ?>"><span class="action-button">Follow via RSS</span></a>

	<?php global $user_login; get_currentuserinfo(); if ($user_login) :?>
	
		<a href="http://<?php echo site_url(); ?>/wp-admin/press-this.php">Bookmarklet (drag to bookmarks)</a>
	
	<?php endif; ?>
	
	
</div>
</div>

	<hr/>






	
<div class="row">
<div class="large-12 columns">

	<h2>Posts</h2>
	

	<div class="large-block-grid-4 columns section">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="large-4 medium-4 columns">
				<?php include(TEMPLATEPATH . '/loops/loop-feed.php') ?>
			</div>
		
		<?php endwhile; ?>
		
			<?php kriesi_pagination(); ?>
		
		<?php else : ?>
		
				<h5>This designer prefers silence and whitespace. They haven't uploaded anything yet!</h5>
				
	<?php endif; wp_reset_query(); ?>
	
	</div><!-- end posts section -->









	<!-- Behance Section if applicable -->
	<?php if ( get_the_author_meta( 'behance', $user->ID ) ) { ?>
		
		<h2>Behance</h2>
		
		<script src="<?php echo get_bloginfo('template_directory');?>/library/js/jquery.behance.js"></script>
		
		<div class="row">
			<div id="be-grid"></div>
			<div id="be-showmore"></div>
		</div>
							
		<script>
		  $(document).ready(function() {

		    $('#be-grid').behance({
		      apiKey: 'EgW8NEun0zQUYlzNoHc6d0FsjWRuMnlF',
		      user: '<?php echo esc_attr( $curauth->behance ); ?>',
		      sort: 'featured_date',
		      gridID: '#be-grid',
		      cssItem: 'large-3 medium-3 columns',
		      cssTitle: 'green',
		      cssMore: 'button'
		    });
		  });

		</script>
		
    <?php } ?>













	<!-- Dribbble Section if applicable -->
	<?php if ( get_the_author_meta( 'dribbble', $user->ID ) ) { ?>
		
		<h2>Dribbble</h2>
		
		<script src="<?php echo get_bloginfo('template_directory');?>/library/js/jribbble.js"></script>
		
		<div class="row">
			<div class="dribbble-feed"></div>
		</div>
							
		<script>
			
			$('.dribbble-feed').hide();
			jQuery(window).load(function(){
			$('.dribbble-feed').fadeIn();
			});
			
			$(document).ready(function getDribbbleShots() {   
			  $.jribbble.getShotsByPlayerId('<?php echo esc_attr( $curauth->dribbble ); ?>', function (playerShots) {
			      var html = [];
			      $.each(playerShots.shots, function (i, shot) {
			          html.push('<div class="large-4 medium-4 columns"> <a href="' + shot.url + '" target="_blank">');
			          html.push('<img class="" src="' + shot.image_url + '" ');
			          html.push('alt="' + shot.title + '"></a></div>');
			      });
			      $('.dribbble-feed').html(html.join(''));
			  }, {page: 1, per_page: 6});
			});
		</script>
		
    <?php } ?>








</div><!-- end 12 columns -->
</div><!-- end content -->


<?php get_footer(); ?>
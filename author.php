<?php get_header(); ?>

<meta name="robots" content="noindex,nofollow">

<div class="row section">
<div class="large-12 columns">

	<?php
	if(isset($_GET['author_name'])) :
		$curauth = get_userdatabylogin($author_name);
	else :
		$curauth = get_userdata(intval($author));
	endif;
	?>


	<!-- subscribe to authors 
	<?php echo do_shortcode('[contributors]'); ?>-->
	
		<br/>
		(<a href="<?php echo get_edit_user_link(); ?>">Edit profile</a>)

		<h2 rel="nofollow"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
	
		<p><?php echo $curauth->user_description; ?></p>
		
		<a rel="nofollow" href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <br/>
		
		<hr />
		
		<h5>Follow Me</h5>
		
		<?php if ( get_the_author_meta( 'dribbble' ) ) { ?>
			<a href="http://twitter.com/<?php echo get_the_author_meta( 'dribbble' ) ?>">Dribbble</a>
		<?php } ?>
		
		<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
			<a href="http://twitter.com/<?php echo get_the_author_meta( 'twitter' ) ?>">Twitter</a>
		<?php } ?>
		
		<br />

		<a href="<?php echo home_url() . '/p/u/' . $curauth->user_nicename . '/feed'; ?>"><span class="action-button">Follow via RSS</span></a>

	<?php global $user_login; get_currentuserinfo(); if ($user_login) :?>
	
		<a href="javascript:var d=document,w=window,e=w.getSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),f='http://weeklylift.com/wp-admin/press-this.php',l=d.location,e=encodeURIComponent,g=f+'?u='+e(l.href.replace(/\//g,'\\/'))+'&t='+e(d.title)+'&s='+e(s)+'&v=2';function a(){if(!w.open(g,'t','toolbar=0,resizable=0,scrollbars=1,status=1,width=720,height=570')){l.href=g;}}a();void(0);">Bookmarklet (drag to bookmarks)</a>
	
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
				<?php include(TEMPLATEPATH . '/lib/loops/loop-feed.php') ?>
			</div>
		
		<?php endwhile; ?>
		
			<?php kriesi_pagination(); ?>
		
		<?php else : ?>
		
				<h5>This designer prefers silence and whitespace. They haven't uploaded anything yet!</h5>
				
	<?php endif; wp_reset_query(); ?>
	
	</div><!-- end posts section -->

	<!-- Dribbble Section if applicable -->
	<?php if ( get_the_author_meta( 'dribbble' ) ) { ?>
		
		<h2>Dribbble</h2>
		
		<script src="<?php echo get_bloginfo('template_directory');?>/js/jribbble.js"></script>
		
		<div class="row">
			<div class="dribbble-feed"></div>
		</div>
							
		<script>
			
			$('.dribbble-feed').hide();
			jQuery(window).load(function(){
			$('.dribbble-feed').fadeIn();
			});
			
			$(document).ready(function getDribbbleShots() {   
			  $.jribbble.getShotsByPlayerId('<?php echo get_the_author_meta( 'dribbble' ) ?>', function (playerShots) {
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
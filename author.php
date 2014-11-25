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
	

	

	
	<?php $the_query = new WP_Query( 'showposts=1' ); ?>
	<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>


		<br/>
		(<a href="<?php echo get_edit_user_link(); ?>">Edit profile</a>)

		<h2 rel="nofollow"><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h2>
	
		<p><?php echo $curauth->user_description; ?></p>
		
		<a rel="nofollow" href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <br/>

		<a href="<?php echo home_url() . '/p/u/' . $curauth->user_nicename . '/feed'; ?>"><span class="action-button">Follow via RSS</span></a>
	
	
	<?php endwhile;?>
	
	<?php global $user_login; get_currentuserinfo();
	if ($user_login) :?>
	
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
	
					<?php include('loop-grid.php') ?>
					
					<?php endwhile; ?>
					
						<?php kriesi_pagination(); ?>
					
					<?php else : ?>
					
						<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<h5>This user hasn't posted anything yet.</h5>
						</div>
				
				<?php endif; wp_reset_query(); ?>
	
	</div>



</div>
</div>


<?php get_footer(); ?>
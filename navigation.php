

<script>
	$(document).ready(function(){
	    $('.cd-navigation li a').each(function(index) {
	        if(this.href.trim() == window.location)
	            $(this).addClass("current");
	    });
	});
  </script>




<header>
	<a id="cd-logo" href="<?php echo site_url(); ?>">DBS LOGO</a>
 
	<nav id="cd-top-nav">
		<ul class="cd-navigation">
			<?php if ( !is_user_logged_in() ) { ?>
				
				<?php $redirect = '&amp;redirect_to='.urlencode(wp_make_link_relative(get_option('siteurl'))); $uri = wp_nonce_url( site_url("wp-login.php?$redirect", 'login'), 'log-in' ); ?>
				
				<li><a href="<?php echo $uri;?>">Login</a></li>
				<li><a href="<?php echo $site_url(); ?>/wp-login.php?action=register">Sign Up</a></li>
				
			<?php } else { ?>
				
				<li><a href="<?php echo site_url(); ?>">Home</a></li>
				<li><a href="<?php echo home_url() . '/p/u/' . get_the_author_meta( 'user_login', wp_get_current_user()->ID ); ?>">Profile</a></li>
				
				<?php if(is_single() OR is_page()) { ?>	
					<!-- if user wrote post or is an admin, show controls -->
					<?php global $current_user; get_currentuserinfo(); ?>
					<?php if ($post->post_author == $current_user->ID || current_user_can('level_10') ) { ?>
						<li><?php edit_post_link(); ?></li>
					<?php } ?>
				<? } ?>	
				
				<li><a href="<?php echo site_url(); ?>/wp-admin/post-new.php">+ New Post</a></li>
				
			<?php } ?><!-- end if user is or isn't logged in -->
		</ul>
	</nav>
 
	<a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span></a>
</header>
<main class="cd-main-content">
 
	<!-- put your content here -->
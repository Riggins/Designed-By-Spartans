</div>
</div>	


<header class="site-header">
	<div class="row">
		<div class="large-12 columns">
			<hgroup id="logo">
				<!--<a href="http://nickwittwer.com"><img id="logo" src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></a>-->
				<a href="<?php echo home_url(); ?>"><h3 id="logo" class="bold">DBS</h3></a>
			</hgroup>
		
			<nav id="nav">
			
			<span class="site-nav">

				<!-- if user is logged in, display profile link in nav -->
				<?php if ( !is_user_logged_in() ) { ?>
				
					<a class="nav-link <?php if (is_home()){ echo "active";}?>" href="<?php echo home_url(); ?>">Home</a>
					
					<a class="nav-link <?php if (is_page('about')){ echo "active";}?>" href="<?php echo home_url(); ?>/about">About</a>
				
				<?php } else { ?>
					<a class="nav-link <?php if (is_home()){ echo "active";}?>" href="<?php echo home_url(); ?>">Home</a>
				
					<a class="nav-link <?php if (is_page('sections')){ echo "active";}?>" href="/designs">Designs</a>
					
					<a class="nav-link <?php if (is_page('events')){ echo "active";}?>" href="/events">Events</a>
					
					<a class="nav-link <?php if (is_page('jobs')){ echo "active";}?>" href="/jobs">Jobs</a>
			
				
				<?php } ?>

			</span>
			
			
			<span class="right-nav">

				<?php if ( !is_user_logged_in() ) { ?>
					<?php
					$redirect = '&amp;redirect_to='.urlencode(wp_make_link_relative(get_option('siteurl')));
					$uri = wp_nonce_url( site_url("wp-login.php?$redirect", 'login'), 'log-in' );
					?>
					
					<a class="nav-link" href="<?php echo $uri;?>"><?php _e('Login');?></a>
					
					<a class="nav-link nav-signup" href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=register">Sign Up</a>
				
				<?php } else { ?>
					
					<a class="nav-link" href="<?php echo site_url(); ?>/wp-admin/post-new.php">+ New Post</a>
					
					<?php if(is_single() OR is_page()) { ?>
					
						<!-- if user wrote post or is an admin, show controls -->
						<?php global $current_user; get_currentuserinfo(); ?>
						<?php if ($post->post_author == $current_user->ID || current_user_can('level_10') ) { ?>
								<?php edit_post_link(); ?>
						<?php } ?>
		
					<? } ?>
					
					
					<a class="nav-link <?php if (is_page('profile')){ echo "active";}?>" href="<?php echo home_url() . '/p/u/' . get_the_author_meta( 'user_login', wp_get_current_user()->ID ); ?>">Profile</a>
					
					<!--<a class="nav-link" href="<?php echo site_url(); ?>/wp-admin/">Backend</a>-->
					
					<?php
					$redirect = '&amp;redirect_to='.urlencode(wp_make_link_relative(get_option('siteurl')));
					$uri = wp_nonce_url( site_url("wp-login.php?action=logout$redirect", 'login'), 'log-out' );
					?>
					
					<a class="nav-link" href="<?php echo $uri;?>"><?php _e('Logout');?></a>
				
				<?php } ?>

			</span>
			
			
			
			
			<span id="trigger-nav" class="nav-link show-for-medium-down">
			
			 &#9776;
			
			</span>
			
			
			
			</nav>
		</div>
	</div>

	
</header>
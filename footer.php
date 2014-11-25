<div id="footer-top">
		<div class="row">
				<div class="large-12 columns">
			
					<div class="large-3 columns">
						<h4>About</h4>
						<p>DBS is a community of designers at San Jose State.</p>
					</div>
					
					<div class="large-3 columns">
						
						<h4>Top Curators</h4>
						<?php foreach ( get_users( 'order=DESC&orderby=post_count&number=5' ) as $user ) : ?>
						
						    <?php echo $user->display_name; ?> (<?php echo $user->post_count; ?> posts) <br/>
						
						<?php endforeach; ?>
						

					</div>
			
					<div class="large-3 columns">
						<h4>Get Involved</h4>
						<a href="<?php echo site_url(); ?>/discussions">Discussions Board</a><br />
						<a href="#">Slack Channel (Soon)</a>
					</div>
				</div>
		</div>				
	</div>
	
	
	
	<div id="footer-bottom">
		<div class="row">
			<div class="large-12 columns footer">
			
				<div class="large-6 columns">
					<p id="footer-love">Made with <span class="heart-icon"></span> in San Jose</p>
				</div>
				
				<div class="large-6 columns">
					<p class="right">&copy; <?php echo date('Y'); ?>. <?php bloginfo('name'); ?>. 
					
					<?php if ( !is_user_logged_in() ) { ?>
						<a class="nav-link nav-signup" href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=register">Sign Up</a>
					
					<?php } else { ?>

						<?php
						$redirect = '&amp;redirect_to='.urlencode(wp_make_link_relative(get_option('siteurl')));
						$uri = wp_nonce_url( site_url("wp-login.php?action=logout$redirect", 'login'), 'log-out' );
						?>
						
						<a href="<?php echo $uri;?>"><?php _e('Logout');?></a>
					
					<?php } ?>
					
					<a href="mailto:hi@nickwittwer.com">Report bugs</a></p>		
				</div>
				
			</div>
		</div>
	</div>
	
	</div><!-- end content div -->
	
					
			<script src="<?php bloginfo('template_url'); ?>/js/retina.js"></script>
			
			<script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.js"></script>
			
			<script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.tooltips.js"></script>
			
			<script src="<?php bloginfo('template_url'); ?>/js/foundation/foundation.section.js"></script>
			
			<script src="<?php bloginfo('template_url'); ?>/js/jquery.instagram.js"></script>
			
			
			
			<script>
			  $(document).foundation();
			</script>

			
			<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
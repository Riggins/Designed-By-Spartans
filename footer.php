<div id="footer-top">
		<div class="row">
				<div class="large-12 columns">
			
					<div class="large-3 columns">
						<h4>About</h4>
						<p>DBS is a community of designers at San Jose State.</p>
					</div>
					
					<div class="large-3 columns">
						
						<h4>Members</h4>

						<?php wp_list_authors('exclude_admin=0&optioncount=0&show_fullname=1&hide_empty=0'); ?>						

					</div>
			
					<div class="large-3 columns">
						<h4>Get Involved</h4>
						
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
	
	
	
	
	
	</main><!-- end main content for navigation -->
 
<nav id="cd-lateral-nav">
		<ul class="cd-navigation">
			<li class="item-has-children">
				<a href="#0">Designs</a>
				<ul class="sub-menu">
					<li><a href="<?php echo site_url(); ?>/designs">Designs</a></li>
					<li><a href="<?php echo site_url(); ?>/">Mocks</a></li>
					<li><a href="<?php echo site_url(); ?>/">Finals</a></li>
				</ul>
			</li> <!-- item-has-children -->

			<li class="item-has-children">
				<a href="#0">Events</a>
				<ul class="sub-menu">
					<li><a href="<?php echo site_url(); ?>/events">San Jose</a></li>
					<li><a href="#">More Soon</a></li>
				</ul>
			</li> <!-- item-has-children -->

			<li class="item-has-children">
				<a href="#0">Jobs</a>
				<ul class="sub-menu">
					<li><a href="<?php echo site_url(); ?>/jobs">San Jose</a></li>
				</ul>
			</li> <!-- item-has-children -->
			
			<li class="item-has-children">
				<a href="#0">Discussions</a>
				<ul class="sub-menu">
					<li><a href="<?php echo site_url(); ?>/discussions">Discussions</a></li>
					<li><a href="#">Slack Channel (Soon)</a></li>
				</ul>
			</li> <!-- item-has-children -->
		</ul> <!-- cd-navigation -->

	
		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a href="<?php echo site_url();?>/tour">Tour</a></li>
		</ul> <!-- cd-single-item-wrapper -->

		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a href="#0">Journal</a></li>
			<li><a href="#0">FAQ</a></li>
			<li><a href="#0">Terms &amp; Conditions</a></li>
			<li><a href="#0">Careers</a></li>
			<li><a href="#0">Students</a></li>
		</ul> <!-- cd-single-item-wrapper -->
	</nav>
	
	
	
			
					
		<script src="<?php bloginfo('template_url'); ?>/assets/js/retina.js"></script>

			
		<!-- Google Analytics Here -->
  		<?php if(!is_user_logged_in()) { ?>
  		
			<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-41130431-7', 'auto');
			ga('send', 'pageview');
			
			</script>
  		
  		<?php } ?>
  		<!-- end analytics -->
			
			
			<?php wp_footer(); ?>
	</div>


	</body>

</html> <!-- end page. what a ride! -->
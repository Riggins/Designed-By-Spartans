<?php get_header(); ?>
<br/>
<?php if ( !is_user_logged_in() ) { ?>
<!-- USER ISN'T LOGGED IN -->
<div id="hero">
    <div class="row section">
        <div class="large-12 columns">
            	<h2>Designed by Spartans is a community for design students at SJSU.</h2>
            <br/>
            <br/>
            <div class="large-6 columns section">
                <div class="hero-left-box">
                    <!--<h3>Email (coming soon)</h3>
						<h4>Get our favorite content this week from around the web emailed to you every Saturday.</h4><br/><br/>-->
            </div>
            <div class="large-6 columns section">
                <div class="hero-right-box">
                    	<h3>Sign up</h3>

                    	<h4>Join our community of curators and help make WeeklyLift awesome!</h4>
                    <br/>
                    <?php if (get_option( 'users_can_register')) : ?>	<a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=register"><button><span class="">Sign up</span></button></a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<!-- USER IS LOGGED IN -->
<!--<div class="row">
		<div class="show-for-small small-12 columns center">
			<a href="mailto:team@halfbake.me?subject=Post to WorkGrid"><button><span class="">Upload Workspace</span></button></a>
		</div>
	</div>-->
<div class="show-for-small">
    <br/>
    <hr/>
</div>
<?php } ?>
<!-- Display Recent Articles -->
<!--<div class="row">
    <div class="large-12 columns">
        	<h2>Welcome back, <?php global $current_user; if ( isset($current_user) ) { echo $current_user->user_login; } ?>!</h2>
    </div>
</div>
<hr/>-->
<div class="row">

    <!-- Main Content -->
    <div class="large-9 medium-9 columns">
    	<h4>Designs</h4>
    	<hr />
        <?php $paged=( get_query_var( 'paged')) ? get_query_var( 'paged') : 1; query_posts( 'posts_per_page=9&paged=' . $paged); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        	<div class="large-4 medium-4 columns">
        		<?php include( 'loop-feed.php') ?>
        	</div>
        <?php endwhile; ?>
        <?php kriesi_pagination(); ?>
        <?php else : ?>
   			<div class="large-12 columns">
            	<h1>Nothing to show here.</h1>
       		</div>
        <?php endif; wp_reset_query(); ?>
     </div>
     
     <!-- Sidebar -->
	<div class="large-3 medium-3 columns">
		<h4>Upcoming Events</h4>
		<hr />
		
			<h6>Interaction Designer</h6>
			<p>We're looking for a dedicated designer to join our ranks at Facebook.</p>

		<h4>Recent Discussions</h4>
		<hr />
		
		
		<h4>New Jobs</h4>
		<hr />
		
	</div>
     
</div><!-- end row -->


<!-- Display Recent Pictures -->
<?php get_footer(); ?>
</body>

</html>
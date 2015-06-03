<?php get_header(); ?>


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

                    	<h4>Join our community of curators and help make DBS awesome!</h4>
                        <br/>
                        <?php if (get_option( 'users_can_register')) : ?>	<a href="<?php bloginfo('wpurl'); ?>/wp-login.php?action=register"><button><span class="">Sign up</span></button></a>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else { ?>

    <?php } ?>

    <div class="row">
     <div class="large-12 columns">
         <h4>Hey, <?php global $current_user; if ( isset($current_user) ) { echo $current_user->first_name; } ?>!</h4>

         <?php include(TEMPLATEPATH . '/user-nav.php') ?>

     </div>
 </div>
 <hr/>

</div>

<div class="row">
    <div class="large-12 columns">


        <h4>Members</h4>
        <?php bp_get_template_part( 'members/members-loop' ); ?> 

    </div>
</div>



<hr />

<!-- Recent Activity -->

<div class="row">
    
<div class="large-12 columns">
    

    <?php if ( bp_has_activities() ) : ?>

    <h4>Recent Activity</h4>
  
    <div class="pagination">
        <div class="pag-count"><?php bp_activity_pagination_count() ?></div>
        <div class="pagination-links"><?php bp_activity_pagination_links() ?></div>
    </div>
  
    <ul id="activity-stream" class="activity-list item-list">
  
    <?php while ( bp_activities() ) : bp_the_activity(); ?>
  
        <li class="<?php bp_activity_css_class() ?>" id="activity-<?php bp_activity_id() ?>">
  
            <div class="activity-avatar">
                <a href="<?php bp_activity_user_link() ?>">
                    <?php bp_activity_avatar( 'type=full&width=100&height=100' ) ?>
                </a>
            </div>
  
            <div class="activity-content">
  
                <div class="activity-header">
                    <?php bp_activity_action() ?>
                </div>
  
                <?php if ( bp_get_activity_content_body() ) : ?>
                    <div class="activity-inner">
                        <?php bp_activity_content_body() ?>
                    </div>
                <?php endif; ?>
  
                <?php do_action( 'bp_activity_entry_content' ) ?>
  
            </div>
        </li>
  
    <?php endwhile; ?>
  
    </ul>
  
<?php else : ?>
    <div id="message" class="info">
        <p><?php _e( 'Sorry, there was no activity found. Please try a different filter.', 'buddypress' ) ?></p>
    </div>
<?php endif; ?>


</div>


</div>









<hr/>








<div class="row">
    <!-- Main Content -->
    <div class="large-9 medium-9 columns">
       <h4>Blog Posts</h4>
       <hr />
       <?php $paged=( get_query_var( 'paged')) ? get_query_var( 'paged') : 1; query_posts( 'posts_per_page=9&paged=' . $paged); ?>
       <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           
           <div class="large-12 medium-12 columns">
              <?php include(TEMPLATEPATH . '/loops/loop-blog.php') ?>
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
	
  <?php get_sidebar(); ?>

</div>

</div><!-- end row -->



<?php get_footer(); ?>
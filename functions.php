<?php

// ------------------------Get rid of old WP jquery---------------------------//
add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery(){
    wp_deregister_script('jquery');
}

// ------------------------Redirect to login page if not logged in---------------------------//
add_action( 'parse_request', 'dmk_redirect_to_login_if_not_logged_in', 1 );

function dmk_redirect_to_login_if_not_logged_in() {
	is_user_logged_in() || auth_redirect();
}

add_filter( 'login_url', 'dmk_strip_loggedout', 1, 1 );

function dmk_strip_loggedout( $login_url ) {
	return str_replace( '%3Floggedout%3Dtrue', '', $login_url );
}








// ------------------------Admin Alerts/Messages---------------------------//
// Display Theme Information Widget (Dashboard)
function wpc_dashboard_widget_function() {
	echo "<ul><h2>Site Info</h2>
	<li>Status: Running well.</li>
	<li>Release Date: December 24, 2012</li>
	<li>Version 1.0: Fixes minor display glitches (sidebar), adds support for WP Polls plugin (sidebar), updated with hNews microformat support, updated homepage design.</li>
	</ul>

	<ul><h2>Next Updates</h2>
	<li>[2.0] Slider on Homepage!</li>
	<li>[2.0] Updated mobile version</li>
	<li>[3.0] New homepage design</li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Information', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );

// ------------------------Custom Excerpt Length---------------------------//
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_shortcodes( $excerpt );
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $excerpt);
  $excerpt = $excerpt.'...';
  return $excerpt;
}


// ------------------------Pull First Image From Post---------------------------//
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

//  if(empty($first_img)){ //Defines a default image
//    $first_img = get_bloginfo('template_directory').'/img/default.png';
//  }
  return $first_img;
}









add_action('generate_rewrite_rules', 'roots_add_rewrites');

function roots_add_rewrites($content) {
  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
  global $wp_rewrite;
  $roots_new_non_wp_rules = array(
    'css/(.*)'      => 'wp-content/themes/'. $theme_name . '/css/$1',
    'js/(.*)'       => 'wp-content/themes/'. $theme_name . '/js/$1',
    'img/(.*)'      => 'wp-content/themes/'. $theme_name . '/img/$1',
  );
  $wp_rewrite->non_wp_rules += $roots_new_non_wp_rules;
}






// ------------------------Display "time ago" if less than 24 hours old---------------------------//
// http://aext.net/2010/04/display-timeago-for-wordpress-if-less-than-24-hours/
add_filter('the_time', 'timeago');

function timeago()
{
    global $post;

    $date = $post->post_date;

    $time = get_post_time('G', true, $post);

    $time_diff = time() - $time;

    if( $time_diff > 0 && $time_diff < 24*60*60 )
        $display = sprintf( __('%s ago'), human_time_diff( $time ) );
    else
        $display = date('F n, Y');

    return $display;
}

// ------------------------Number of results per page (search)---------------------------//
function search_results_per_page( $query ) {
	if( $query->is_search )
		$query->set( 'posts_per_page' , 10 );
	return $query;
}
add_filter( 'pre_get_posts' , 'search_results_per_page' );


// ------------------------Recent Comments Sidebar ---------------------------//
// http://wplancer.com/how-to-display-recent-comments-without-using-a-plugin-or-widget/
function get_recent_comments($no_comments = 10, $comment_len = 70) {
   
   global $wpdb;
	
	$request  = "SELECT * FROM $wpdb->comments";
	$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
	$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
	$request .= " ORDER BY comment_date DESC LIMIT $no_comments";
		
	$comments = $wpdb->get_results($request);
		
	if ($comments) {
		foreach ($comments as $comment) {
			ob_start();
			?>
				<a href="<?php echo get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID; ?>">
				<li>
					
					
					<b><?php the_author(); ?>:</b>
					<?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, $comment_len)); ?>
				</li>
				</a>
			<?php
			ob_end_flush();
		}
	} else {
		echo '<li>'.__('No comments', 'banago').'</li>';
	}
}


// ------------------------Custom Login---------------------------//
function custom_login() {
	$files = '<link rel="stylesheet" href="'.get_bloginfo('template_directory').'/assets/css/login.css" />
			  <script src="'.get_bloginfo('template_directory').'/assets/js/jquery.min.js"></script>
	          <script src="'.get_bloginfo('template_directory').'/assets/js/login.js"></script>';
	echo $files;
}
add_action('login_head', 'custom_login');

// ------------------------Pagination---------------------------//
// http://www.kriesi.at/archives/how-to-build-a-wordpress-post-pagination-without-plugin
function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

// ------------------------Remove URL from comments---------------------------//
// http://www.wpbeginner.com/wp-themes/how-to-style-wordpress-comment-form/

function wpbeginner_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');


// ------------------------Remove URL from comments---------------------------//
// http://www.wprecipes.com/how-to-add-del-and-spam-buttons-to-your-comments
function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '| <span class="delete-comment-link"><a href="'.admin_url("comment.php?action=cdc&c=$id").'">Delete</a></span> ';
    echo '| <span class="spam-comment-link"><a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">Spam</a></span>';
  }
}


// ------------------------Popular Posts Per Category---------------------------//
// http://perishablepress.com/category-functions-wordpress/
function popular_posts_per_category() {
	global $post;
	$categories = get_the_category();
	foreach($categories as $category) {
		$cats[] = $category->cat_ID;
	}
	$cats_unique = array_unique($cats);
	$args = array(
		'category__in' => $cats_unique,
		'orderby' => 'comment_count',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 5
	);
	echo '<ul class="no-bullet">';
	$popular_posts = null;
	$popular_posts = new WP_Query($args);
	while ($popular_posts->have_posts()) : $popular_posts->the_post(); 
		$title_trim = get_the_title();
		if (strlen($title_trim) > 60) {
			$title_trim = substr($title_trim,0,60);
		} ?>

		<li><a href="<?php the_permalink(); ?>"><?php echo $title_trim; ?></a></li>
	<?php endwhile;
	rewind_posts();
	echo '</ul>';
}

// ------------------------Set Featured Image---------------------------//
add_theme_support( 'post-thumbnails' ); 



// ------------------------Custom Author URL Base---------------------------//
// ------------------------http://wordpress.org/support/topic/how-to-change-author-base-without-front ---------------------------//
function change_author_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'p/u';
    $wp_rewrite->author_structure = '/' . $wp_rewrite->author_base. '/%author%';
}
add_action('init','change_author_permalinks');


// ------------------------Custom Next/Prev Post Link classes---------------------------//
// ------------------------http://css-tricks.com/snippets/wordpress/add-class-to-links-generated-by-next_posts_link-and-previous_posts_link/---------------------------//
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="prev-post"';
}
function posts_link_attributes_2() {
    return 'class="next-post"';
}

// -------------------------Default WP User Display Names--------------------------//
// ------------------------http://pastebin.com/tQqC1BrW---------------------------//

class myUsers {
	static function init() {
		// Change the user's display name after insertion
		add_action( 'user_register', array( __CLASS__, 'change_display_name' ) );	
	}
	
	static function change_display_name( $user_id ) {
		$info = get_userdata( $user_id );
		
		$args = array(
			'ID' => $user_id, 
			'display_name' => $info->first_name . ' ' . $info->last_name 
		);
		
		wp_update_user( $args ) ;
	}
}

myUsers::init();


// -------------------------Display Post Views--------------------------//
// ------------------------http://wp-snippets.com/post-views-without-plugin/---------------------------//
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "";
    }
    return $count.''; // display "views"?
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}


// -------------------------Link Twitter Handles--------------------------//
// ------------------------http://www.wprecipes.com/automatically-link-twitter-usernames-in-wordpress---------------------------//

function twtreplace($content) {
	$twtreplace = preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/',"$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>",$content);
	return $twtreplace;
}

add_filter('the_content', 'twtreplace');   
add_filter('comment_text', 'twtreplace');


// -------------------------Hide WP Admin--------------------------//
/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );

/* Remove the Admin Bar preference in user profile */
remove_action( 'personal_options', '_admin_bar_preferences' );


// -------------------------Redirect Logins/out--------------------------//



// -------------------------Posts Per Page--------------------------//

function my_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 6);
    }

    if(is_category()){
      $query->set('posts_per_page', 9);
    }
    
	// alter the query for the Movies category page 
	if(is_page('grid')){
		$query->set('posts_per_page', 12);
	}
    

  }
}
add_action( 'pre_get_posts', 'my_post_queries' );


// -------------------------Show Active Authors--------------------------//

add_action( 'pre_user_query', 'wpse_11832_pre_user_query' );

/**
 * Adds "post_count" to the SELECT clause. Without this, the "post_count"
 * property for users will be undefined.
 * 
 * @param object $wp_user_query
 */
function wpse_11832_pre_user_query( $wp_user_query ) {
    if ( $wp_user_query->query_vars['orderby'] == 'post_count' )
        $wp_user_query->query_fields .= ', post_count';
}




// ------ Blah blah videos in excerpt --//

// Use First Video as Excerpt
$postcustom = get_post_custom_keys();
if ($postcustom){
  $i = 1;
  foreach ($postcustom as $key){
    if (strpos($key,'oembed')){
      foreach (get_post_custom_values($key) as $video){
        if ($i == 1){
          $text = $video.$text;
        }
      $i++;
      }
    }  
  }
}


// Custom Excerpt
function custom_wp_trim_excerpt($text) {
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content(''); // Original Content
    $text = strip_shortcodes($text); // Minus Shortcodes
    $text = apply_filters('the_content', $text); // Filters
    $text = str_replace(']]>', ']]&gt;', $text); // Replace
    
    $excerpt_length = apply_filters('excerpt_length', 55); // Length
    $excerpt_more = apply_filters('excerpt_more', ' ' . '<a class="readmore" href="'. get_permalink() .'">&raquo;</a>');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    
    // Use First Video as Excerpt
    $postcustom = get_post_custom_keys();
    if ($postcustom){
      $i = 1;
      foreach ($postcustom as $key){
        if (strpos($key,'oembed')){
          foreach (get_post_custom_values($key) as $video){
            if ($i == 1){
              $text = $video.$text;
            }
          $i++;
          }
        }  
      }
    }
  }
  return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');



// -------------------------Remove class from post edit link--------------------------//
function custom_edit_post_link($output) {
 $output = str_replace('class="post-edit-link"', 'class=""', $output);
 return $output;
}
add_filter('edit_post_link', 'custom_edit_post_link');


// -------------------------User Profile Settings--------------------------//
add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>Extra profile information</h3>

	<table class="form-table">

    <tr>
      <th><label for="twitter">Behance</label></th>

      <td>
        <input type="text" name="behance" id="behance" value="<?php echo esc_attr( get_the_author_meta( 'behance', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Please enter your Behance username.</span>
      </td>
    </tr>

		<tr>
			<th><label for="dribbble">Dribbble</label></th>

			<td>
				<input type="text" name="dribbble" id="dribbble" value="<?php echo esc_attr( get_the_author_meta( 'dribbble', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Dribbble username.</span>
			</td>
		</tr>
		
		<tr>
			<th><label for="twitter">Twitter</label></th>

			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Twitter username.</span>
			</td>
		</tr>

    <tr>
      <th><label for="facebook">Facebook</label></th>

      <td>
        <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description">Please enter your Facebook username.</span>
      </td>
    </tr>

	</table>

<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

		// Time to save the meta defined above!
		update_usermeta( $user_id, 'behance', $_POST['behance'] );
    update_usermeta( $user_id, 'dribbble', $_POST['dribbble'] );
		update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
    update_usermeta( $user_id, 'twitter', $_POST['facebook'] );
}


?>
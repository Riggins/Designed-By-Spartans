<?php


// ------------------------Admin Alerts/Messages---------------------------//
// Display Theme Information Widget (Dashboard)
function wpc_dashboard_widget_function() {
	echo "<ul><h2>Site Info</h2>
	<li>Status: Running well.</li>
	<li>Release Date: December 24, 2012</li>
	<li>Version 1.8: Fixes minor display glitches (sidebar), adds support for WP Polls plugin (sidebar), updated with hNews microformat support, updated homepage design.</li>
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


// ------------------------Theme Settings---------------------------//

$themename = "Times Settings";
$shortname = "nt";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"),


// GENERAL SECTION
array( "name" => "General",
	"type" => "section"),
array( "type" => "open"),
 
array( "name" => "Colour Scheme",
	"desc" => "Select the colour scheme for the theme",
	"id" => $shortname."_color_scheme",
	"type" => "select",
	"options" => array("blue", "red", "green"),
	"std" => "blue"),
	
array( "name" => "Logo URL",
	"desc" => "Enter the link to your logo image",
	"id" => $shortname."_logo",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Custom Message",
	"desc" => "Leave a custom message!",
	"id" => $shortname."_custom_message",
	"type" => "textarea",
	"std" => ""),		

// HOMEPAGE
array( "type" => "close"),
array( "name" => "Homepage",
	"type" => "section"),
array( "type" => "open"),

array( "name" => "Homepage header image",
	"desc" => "Enter the link to an image used for the homepage header.",
	"id" => $shortname."_header_img",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Homepage featured category",
	"desc" => "Choose a category from which featured posts are drawn",
	"id" => $shortname."_feat_cat",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"),
	
array( "type" => "close"),
array( "name" => "Footer",
	"type" => "section"),
array( "type" => "open"),

// FOOTER SECTION
array( "name" => "Footer copyright text",
	"desc" => "Enter text used in the right side of the footer. It can be HTML",
	"id" => $shortname."_footer_text",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => $shortname."_ga_code",
	"type" => "textarea",
	"std" => ""),	
	
array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
	"id" => $shortname."_favicon",
	"type" => "text",
	"std" => get_bloginfo('url') ."/favicon.ico"),	
	
array( "name" => "Feedburner URL",
	"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website",
	"id" => $shortname."_feedburner",
	"type" => "text",
	"std" => get_bloginfo('rss2_url')),

 
array( "type" => "close")
 
);


function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=functions.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?></h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>Enjoy the beautiful settings below! NOTE: Not all functions work yet!</p>

 
<?php break;
 
case 'text':
?>

<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.png" class="inactive" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
 </div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

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
//  return $first_img;
}

// ------------------------Custom Author---------------------------//
// display custom author name
add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name( $name ) {
global $post;

$author = get_post_meta( $post->ID, 'author', true );

if ( $author )
$name = $author;

return $name;
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
	$files = '<link rel="stylesheet" href="'.get_bloginfo('template_directory').'/css/login.css" />
			  <script src="'.get_bloginfo('template_directory').'/js/jquery.min.js"></script>
	          <script src="'.get_bloginfo('template_directory').'/js/login.js"></script>';
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



// ------------------------Custom Login Page---------------------------//
// ------------------------http://wordpress.org/support/topic/how-to-change-from-wp-loginphp-to-login---------------------------//
//add_filter('site_url',  'wplogin_filter', 10, 3);
//function wplogin_filter( $url, $path, $orig_scheme )
//{
// $old  = array( "/(wp-login\.php)/");
// $new  = array( "login");
// return preg_replace( $old, $new, $url, 1);
//}

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
function self_uri()
{

    $url = 'http';
    $script_name = '';

    if (isset($_SERVER['REQUEST_URI'])):
        $script_name = $_SERVER['REQUEST_URI'];

    else:
        $script_name = $_SERVER['PHP_SELF'];

        if ($_SERVER['QUERY_STRING'] > ' '):
            $script_name .= '?' . $_SERVER['QUERY_STRING'];

        endif;
    endif;

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
            $url .= 's';

        $url .= '://';

        if ($_SERVER['SERVER_PORT'] != '80'):
            $url .= $_SERVER['HTTP_HOST'] . ':' . $_SERVER['SERVER_PORT'] . $script_name;

        else:
            $url .= $_SERVER['HTTP_HOST'] . $script_name;

        endif;

    return $url;
}
//
// $redirect = '&amp;redirect_to='.urlencode(self_uri());
//


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






?>
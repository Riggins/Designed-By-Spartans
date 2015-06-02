<h4>Upcoming Events</h4>
<p>Google Calendar?</p>
<hr />


<h4>Recent Comments</h4>

<?php
$number=5; // number of recent comments desired
$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
?>
<ul id="recentcomments">
	<?php
	if ( $comments ) : foreach ( (array) $comments as $comment) :
		echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
	endforeach; endif;?></ul>


	<hr />


	<h4>New Jobs</h4>
	<p>Pulls from jobs category?</p>
	<hr />

	<h6>Interaction Designer</h6>
	<p>We're looking for a dedicated designer to join our ranks at Company X.</p>




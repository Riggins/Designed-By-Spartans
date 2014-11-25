<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to shape_comment() which is
 * located in the inc/template-tags.php file.
 * From: http://themeshaper.com/2012/11/04/the-wordpress-theme-comments-template/
 */
?>
 
<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() )
        return;
?>
 
    <div class="comments large-12 columns">
 

	    <?php
	     
	    // ##########  Do not delete these lines
	    if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
	        die ('Please do not load this page directly. Thanks!'); }
	    if ( post_password_required() ) { ?>
	        <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
	    <?php
	        return; }
	    // ##########  End do not delete section
	     
	    // Display Comments Section
	    if ( have_comments() ) : ?>
                    

                    
						<?php
						    if ( ! comments_open() ) : // There are comments but comments are now closed
						        echo"<p class='nocomments'>Comments are closed.</p>";
						    endif;
						 
						else : // I.E. There are no Comments
						    if ( comments_open() ) : // Comments are open, but there are none yet
						        // echo"<p>Be the first to write a comment.</p>";
						    else : // comments are closed
						        echo"<p class='nocomments'>Comments are closed.</p>";
						    endif;
						endif;
						 
						// Display Form/Login info Section
						// the comment_form() function handles this and can be used without any paramaters simply as "comment_form()"
						comment_form(array(
						  // see codex http://codex.wordpress.org/Function_Reference/comment_form for default values
						  // tutorial here http://blogaliving.com/wordpress-adding-comment_form-theme/
						  'comment_field' => '<p><label for="comment">Comment <span class="required">*</span></label><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" aria-required="true"></textarea></p>',
						  'label_submit' => 'Add Comment',
						  'comment_notes_after' => '',
						  'title_reply'=>'Comment' 
						  ));
						 
						?>
						
						
						
						</div>
						
				<div class="row">		
				<div class="large-12 columns comments">
						
						
						
						    <div class="navigation">
						        <div class="alignleft"><?php previous_comments_link() ?></div>
						        <div class="alignright"><?php next_comments_link() ?></div>
						    </div>
						
						
								            
				       <ol class="commentlist">
				       
					       <?php foreach ($comments as $comment) : ?>
					       
					       <br/>
					       <hr />
					       <br/>
					   
							<div class="large-12 columns the-comment">					   
					       		
					       		<div class="large-4 columns">
							       <!-- display author -->
							       <p>
							       
							       <?php echo get_avatar( $comment, 70, $default = 'http://nickwittwer.com/blog/wp-content/themes/nwtheme/img/default-avatar.png' ); ?>
							             
							       </p>
							       
							       <cite class="comment-info text-right" rel="nofollow"><?php comment_author_link() ?><br/> 
							       
							       <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('M j, Y') ?> at <?php comment_time() ?> 

							       <br/>
							       <br/>
							       
							      <?php edit_comment_link('Edit','<span class="edit-comment-link">','</span>'); ?> 
							       <?php delete_comment_link(get_comment_ID()); ?> 
							       
							       <?php comment_reply_link( array ( 'reply_text' => 'Reply' ) ); ?>
							       
							       </a></cite>

							    </div> 
							    
							    
							    
							    <div class="large-8 columns">
							       <!-- display the comment -->
							       <li id="comment-<?php comment_ID() ?>" class="comment-body">
							       <div class="quote"><?php comment_text() ?></div>
							       
							       <?php if ($comment->comment_approved == '0') : ?>
							       <em>Your comment is awaiting moderation.</em>
							       <?php endif; ?>
							    </div> 
							    
							    
							</div>
							
					       		
					       		 </div><!-- end comment design -->
					       	<?php endforeach; /* end for each comment */ ?>
				       </ol>
				       
		</div> <!-- end row -->
				       
            <div class="navigation">
                <div class="alignleft"><?php previous_comments_link() ?></div>
                <div class="alignright"><?php next_comments_link() ?></div>
            </div>

    
    </div><!-- #comments .comments-area -->
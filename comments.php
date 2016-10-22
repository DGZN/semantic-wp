<?php
 
/* THIS IS FOR SECURITY ON LOADING THIS PAGE DIRECTLY */
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

/* Password required */
if ( post_password_required() ) { ?>
	
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	
	<?php return; 
}

	/*comment list layout*/
	if ( have_comments() ) : ?>

		<div class="navigation clearfix">
			<div class="alignleft pull-left"><?php previous_comments_link() ?></div>
			<div class="alignright pull-right"><?php next_comments_link() ?></div>
		</div>
		 
		<ol class="commentlist">
			<?php 
				wp_list_comments(array(
					/*'per_page' => 4, //Allow comment pagination*/
					'reverse_top_level' => true, /*Show the latest comments at the top of the list*/
					'callback' => 'medicalrehab_theme_comment'
				));
			?>
		</ol>
		 
		<div class="navigation clearfix">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	
	<?php else : /* this is displayed if there are no comments so far */?>
	 
	<?php if ('open' == $post->comment_status) : /* If comments are open, but there are no comments. */ ?>
	 
	<?php else : /* comments are closed*/ ?>

		<p class="nocomments">Comments are closed.</p>
	 
	<?php endif; ?>
<?php endif; ?>


<?php

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(
 'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'medical-rehab' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'medical-rehab' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'url' =>
    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'medical-rehab' ) . '</label>' .
    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>',
);

$comments_args = array(
	// change the title of send button 
	'label_submit'=>'POST COMMENT',
	// change the title of the reply section
	'title_reply'=>'Write a Reply or Comment',
	// remove "Text or HTML to be displayed after the set of comment fields"
	'comment_notes_after' => '',
	// redefine your own textarea (the comment body)
	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'comment label', 'medical-rehab' ) . '</label><br /><textarea id="comment" class="form-control" name="comment" aria-required="true"></textarea></p>', 
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);

comment_form($comments_args);

?>
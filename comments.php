<?php /*
	
@package sunsettheme
*/

if( post_password_required() ){
	return;
}

?>

<div id="comments" class="comments-area">
	
	<?php 
		if( have_comments() ):
		//We have comments
	?>
	
	<?php 
		global $post;
		$comment_count = get_comments_number($post);
		$comment_message = $comment_count . ' comments';
		echo do_shortcode( '[section text="'. $comment_message . '"]'); 
	?>

	<ol class="comment-list">
		
		<?php 
			
			$args = array(
				'walker'			=> null,
				'max_depth' 		=> 5,
				'style'				=> 'ol',
				'callback'			=> null,
				'end-callback'		=> null,
				'type'				=> 'all',
				'reply_text'		=> 'reply ',
				'page'				=> '',
				'per_page'			=> '',
				'avatar_size'		=> 50,
				'reverse_top_level' => null,
				'reverse_children'	=> '',
				'format'			=> 'html5',
				'short_ping'		=> false,
				'echo'				=> true
			);
			
			wp_list_comments('type=comment&callback=mytheme_comment'); 
			
		?>
		
	</ol>
	
	<?php 
		if( !comments_open() && get_comments_number() ):
	?>
		 
		 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'sunsettheme' ); ?></p>
		 
	<?php
		endif;
	?>
		
	<?php	
		endif;
	?>

	<?php echo do_shortcode( '[section text="Leave a comment"]' ); ?>

	<?php
		$fields = array (
			'author' => '<div class="comment-form-author col-12 col-md-6 col-lg-6">
				<label for="art_name"></label>
				<input id="art_name" name="author" type="text" placeholder="name..." size="30"/>
			</div>',
			'email'  => '<div class="comment-form-email col-12 col-md-6 col-lg-6">
				<label for="art_email"></label> 
				<input id="art_email" name="email" placeholder="email..." size="30" aria-describedby="email-notes" />
			</div>',
			'cookies' => '',
		);
		$defaults = [
			'fields'               => $fields,
			'comment_field'        => '<div class="comment-form-comment col-12">
				<label for="art_comments"></label>
				<textarea id="art_comments" name="comment" cols="30" rows="6" placeholder="comment ..."  aria-required="true" required="required" ></textarea>
			</div>',
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_form'           => 'comment-form row',
			'class_submit'         => 'button-form',
			'name_submit'          => 'submit',
			'title_reply'          => '',
			'title_reply_to'       => '',
			'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h3>',
			'cancel_reply_before'  => ' <small>',
			'cancel_reply_after'   => '</small>',
			'cancel_reply_link'    => __( 'Cancel reply' ),
			'logged_in_as'         => '',
			'label_submit'         => __( 'Add a comment' ),
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<div class="form-submit">%1$s %2$s</div>',
			'format'               => 'xhtml',
		];
		
		add_filter('comment_form_fields', 'reorder_comment_fields' );
		function reorder_comment_fields( $fields ){
			$new_fields = array(); 
			$myorder = array('author','email','comment'); 

			foreach( $myorder as $key ){
				$new_fields[ $key ] = $fields[ $key ];
				unset( $fields[ $key ] );
			}

			if( $fields )
				foreach( $fields as $key => $val )
					$new_fields[ $key ] = $val;

			return $new_fields;
		}
		comment_form($defaults); 
	?>
	
</div><!-- .comments-area -->
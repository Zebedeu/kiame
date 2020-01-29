<?php /*
	
@package Kiame

*/

if( post_password_required() ){
	return;
}

?>

<div id="comments" class="comments-area">

	<div class="container">

		<div class="row">

			<div class="col-lg-8">
		
	<?php 
		if( have_comments() ):
		//We have comments
	?>
	
		<h2 class="comment-title">
			  <?php
        $comments_number = get_comments_number();
        if (1 === $comments_number) {
            /* translators: %s: post title */
            printf(esc_html__('One thought on &ldquo;%s&rdquo;', 'kiame'), esc_html(get_the_title()));
        } else {
            printf(
                esc_html(
                    /* translators: 1: number of comments, 2: post title */
                    _nx(
                        '%1$s thought on &ldquo;%2$s&rdquo;',
                        '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'kiame'
                    )
                ),
                esc_html(number_format_i18n($comments_number)),
                esc_html(get_the_title())
            );
        }
        ?>
		</h2>
		
		<?php kiame_get_post_navigation(); ?>
		
		<ol class="comment-list">
			
			<?php 
				
				$args = array(
					'walker'			=> null,
					'max_depth' 		=> '',
					'style'				=> 'ol',
					'callback'			=> null,
					'end-callback'		=> null,
					'type'				=> 'all',
					'reply_text'		=> __('Reply', 'kiame'),
					'page'				=> '',
					'per_page'			=> '',
					'avatar_size'		=> 64,
					'reverse_top_level' => null,
					'reverse_children'	=> '',
					'format'			=> 'html5',
					'short_ping'		=> false,
					'echo'				=> true
				);
				
				wp_list_comments( $args );
			?>
			
		</ol>
		
		<?php kiame_get_post_navigation(); ?>
		
		<?php 
			if( !comments_open() && get_comments_number() ):
		?>
			 
			 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kiame' ); ?></p>
			 
		<?php
			endif;
		?>
		
	<?php	
		endif;
	?>
	
	<?php 
		
		$fields = array(
			
			'author' =>
				'<div class="form-group"><label for="author">' . __( 'Name', 'kiame' ) . '</label> <span class="required">*</span> <input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
				
			'email' =>
				'<div class="form-group"><label for="email">' . __( 'Email', 'kiame' ) . '</label> <span class="required">*</span><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
				
			'url' =>
				'<div class="form-group last-field"><label for="url">' . __( 'Website', 'kiame' ) . '</label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div>'
				
		);
		
		$args = array(
			
			'class_submit' => 'btn btn-block btn-lg btn-info',
			'labkiame_submit' => __( 'Submit Comment', 'kiame' ),
			'comment_field' =>
				'<p class="form-group"><label for="comment">' . _x( 'Comment', 'noun', 'kiame' ) . '</label> <span class="required">*</span><textarea id="comment" class="form-control" name="comment" rows="4" required="required"></textarea></p>',
			'fields' => apply_filters( 'comment_form_default_fields', $fields )
			
		);
		
		comment_form( $args ); 
		
	?>
	</div>
</div>
</div>
	
</div><!-- .comments-area -->

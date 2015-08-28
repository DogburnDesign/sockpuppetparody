<?php
if ( post_password_required(get_the_ID()) ) { ?>
		<p class="nocomments"><?php _e('Please enter password to view or post a comments','incredible'); ?></p><?php
		return;
	}
if(have_comments()): ?>
	<h1 id="comments_title"><?php
		printf( _n( 'One Comment on &ldquo;%2$s&rdquo;', '%1$s Comments on &ldquo;%2$s&rdquo;', (int) get_comments_number(), 'incredible' ),
				number_format_i18n( get_comments_number() ), esc_attr( get_the_title() ));?>
	</h1><?php
	wp_list_comments('callback=incredible_comments');
	if ( (int) get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation','incredible'); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'incredible' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'incredible' ) ); ?></div>
		</nav><?php
	endif;
endif; ?>
<div class="row">
	<div class="col-md-12"><?php
		$required = get_option('require_name_email');
		$required = $required!="" ? "required" : "";
		if ( comments_open() ) {
			$fields=array(
				'author'=>' <div class="form-group">
								<label>'.__('Name *','incredible').'</label>
								<input type="text" name="author" id="author" class="form-control"
								'.$required.'>
							</div>',
				'email'=>'	<div class="form-group">
								<label>'.__('Email *','incredible').'</label>
								<input type="email" name="email" id="email" class="form-control" '.$required.'>
							</div>',
				);
			function incredible_comment_defaullt_fields($fields){
				return $fields;
			}
			add_filter('comment_form_default_fields', 'incredible_comment_defaullt_fields');
			$comments_args = array(
				'fields'=> apply_filters( 'comment_form_default_fields', $fields ),
				'label_submit'=>__('Submit Message','incredible'),
				'title_reply_to'    => '<div class="message_heading">
											<h4>'.__('Leave a Reply to %s','incredible').'</h4>
										</div>' ,
				'title_reply'=>'<div class="message_heading">
									<h4>'.__('Leave a Reply','incredible').'</h4>
								</div>',
				'comment_notes_after' => '',
				'comment_field' => '<div class="form-group">
										<label>'. __( "Message", 'incredible' ) . '</label> <textarea name="comment" id="comment" required="required" class="form-control" rows="8"></textarea>
									</div>',
				'class_submit'=>'btn btn-primary btn-lg',
			);?>
			<div id="contact-page clearfix"><?php
			comment_form($comments_args); ?>
			</div><?php
		} ?>
</div>
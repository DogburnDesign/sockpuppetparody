<?php
	$incredible_theme_options=array(
		
		'upload_image_logo'=>'',
		'height'=>'55',
		'width'=>'150',		
		'upload_image_favicon'=>'',
		'header_1_color'=>'#9e2426',
		'header_2_color'=>'#151515',
		
		/* Social Options */
		'header_social_media_in_enabled'=>'on',
		'footer_section_social_media_enbled'=>'on',
		'twitter_link' =>"#",
		'fb_link' =>"#",
		'linkedin_link' =>"#",
		'youtube_link' =>"#",
		'instagram' =>"#",
		'gplus' =>"#",
		'email_id' => 'incredible@mymail.com',
		'phone_no' => '0159753586',
		/**Footer iCON*/
		'footer_customizations'=>__('Copyright 2015 Your Company','incredible'),
		'developed_by_text'=>__('Theme Developed By','incredible'),
		'developed_by_weblizar_text'=>__('Weblizar Themes','incredible'),
		'developed_by_link'=>'http://www.weblizar.com/',		
	);


	/* General Options */
	function incredible_theme_options(){
		global $incredible_theme_options;
		return wp_parse_args(get_option( 'incredible_theme_options', array() ), $incredible_theme_options );
	}

	add_filter("comment_id_fields","incredible_closing_col_sm_7div_tag");
	function incredible_closing_col_sm_7div_tag($result){
		return $result.'</div>';
	} ?>
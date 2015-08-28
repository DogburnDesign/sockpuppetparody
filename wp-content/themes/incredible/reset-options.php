<?php
add_action( 'wp_ajax_reset_options', 'incredible_reset_options_data' );
function incredible_reset_options_data() {
	$wl_theme_options = incredible_theme_options();
	// Handle request then generate response using WP_Ajax_Response
	if(isset($_POST['option']) && $_POST['option']=="general" && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'],'incredible_nonce')){
		$wl_theme_options['_frontpage']=null;
		$wl_theme_options['upload_image_logo']=null;
		$wl_theme_options['height']=null;
		$wl_theme_options['width']=null;
		$wl_theme_options['custom_css']=null;
		$wl_theme_options['text_title']=null;
		$wl_theme_options['upload_image_favicon']=null;
		$wl_theme_options['header_1_color']=null;
		$wl_theme_options['header_2_color']=null;

	}
	if(isset($_POST['option']) && $_POST['option']=="social"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['header_social_media_in_enabled']=null;
		$wl_theme_options['footer_section_social_media_enbled']=null;
		$wl_theme_options['twitter_link']=null;
		$wl_theme_options['fb_link']=null;
		$wl_theme_options['linkedin_link']=null;
		$wl_theme_options['instagram']=null;
		$wl_theme_options['youtube_link']=null;
		$wl_theme_options['gplus']=null;
		$wl_theme_options['email_id']=null;
		$wl_theme_options['phone_no']=null;
	}
	if(isset($_POST['option']) && $_POST['option']=="home-image"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['slide_image_1']=null;
		$wl_theme_options['slide_title_1']=null;
		$wl_theme_options['slide_desc_1']=null;
		$wl_theme_options['slide_image_2']=null;
		$wl_theme_options['slide_title_2']=null;
		$wl_theme_options['slide_desc_2']=null;
		$wl_theme_options['slide_image_3']=null;
		$wl_theme_options['slide_title_3']=null;
		$wl_theme_options['slide_desc_3']=null;
		$wl_theme_options['slide_btn_text_1']=null;
		$wl_theme_options['slide_btn_text_2']=null;
		$wl_theme_options['slide_btn_text_3']=null;
		$wl_theme_options['slide_btn_link_1']=null;
		$wl_theme_options['slide_btn_link_2']=null;
		$wl_theme_options['slide_btn_link_3']=null;
	}
	if(isset($_POST['option']) && $_POST['option']=="home-image"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['slide_image_1']=null;
		$wl_theme_options['slide_title_1']=null;
		$wl_theme_options['slide_desc_1']=null;
		$wl_theme_options['slide_image_2']=null;
		$wl_theme_options['slide_title_2']=null;
		$wl_theme_options['slide_desc_2']=null;
		$wl_theme_options['slide_image_3']=null;
		$wl_theme_options['slide_title_3']=null;
		$wl_theme_options['slide_desc_3']=null;
		$wl_theme_options['slide_btn_text_1']=null;
		$wl_theme_options['slide_btn_text_2']=null;
		$wl_theme_options['slide_btn_text_3']=null;
		$wl_theme_options['slide_btn_link_1']=null;
		$wl_theme_options['slide_btn_link_2']=null;
		$wl_theme_options['slide_btn_link_3']=null;
	}
	if(isset($_POST['option']) && $_POST['option']=="portfolio-settings"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['portfolio_home']=null;
		$wl_theme_options['port_heading']=null;
		$wl_theme_options['port_desc']=null;
		
		$wl_theme_options['port_1_img']=null;
		$wl_theme_options['port_1_title']=null;
		$wl_theme_options['port_1_text']=null;
		$wl_theme_options['port_1_link']=null;
		
		$wl_theme_options['port_2_img']=null;
		$wl_theme_options['port_2_title']=null;
		$wl_theme_options['port_2_text']=null;
		$wl_theme_options['port_2_link']=null;
		
		$wl_theme_options['port_3_img']=null;
		$wl_theme_options['port_3_title']=null;
		$wl_theme_options['port_3_text']=null;
		$wl_theme_options['port_3_link']=null;
	
	}
	if(isset($_POST['option']) && $_POST['option']=="home-features"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['home_feature_title']=null;
		$wl_theme_options['home_feature_desc']=null;
		$wl_theme_options['feature_1_title']=null;
		$wl_theme_options['feature_1_text']=null;
		$wl_theme_options['feature_1_icon']=null;
		$wl_theme_options['feature_2_title']=null;
		$wl_theme_options['feature_2_text']=null;
		$wl_theme_options['feature_2_icon']=null;
		$wl_theme_options['feature_3_title']=null;
		$wl_theme_options['feature_3_text']=null;
		$wl_theme_options['feature_3_icon']=null;
	}
	if(isset($_POST['option']) && $_POST['option']=="footercall"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['fc_title']=null;
		$wl_theme_options['fc_desc']=null;
		$wl_theme_options['fc_icons']=null;
		$wl_theme_options['fc_btn_link']=null;
	}
	if(isset($_POST['option']) && $_POST['option']=="footer"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['footer_customizations']=null;
		$wl_theme_options['developed_by_text']=null;
		$wl_theme_options['developed_by_weblizar_text']=null;
		$wl_theme_options['developed_by_link']=null;
	}
	if(isset($_POST['option']) && $_POST['option']=="home_blog"  && isset($_POST['incredible_nonce']) && wp_verify_nonce($_POST['incredible_nonce'])){
		$wl_theme_options['blog_title']=null;
		$wl_theme_options['blog_desc']=null;
	}
	update_option('incredible_theme_options',$wl_theme_options);

	die;
}
?>
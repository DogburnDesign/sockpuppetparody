<?php 
function incredible_customizer( $wp_customize ) {
	wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css');
	$incredibleImageUrl1 =  esc_url(get_template_directory_uri() ."/images/slider/bg1.jpg");
	$incredibleImageUrl2 = esc_url(get_template_directory_uri() ."/images/slider/bg2.jpg");
	$incredibleImageUrl3 = esc_url(get_template_directory_uri() ."/images/slider/bg3.jpg");    
	/* Genral section */
	$wp_customize->add_panel( 'incredible_theme_option', array(
    'title' => __( 'Theme Options','incredible' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
) );
	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __('Theme General Options','incredible'),
            'description' => __('Here you can customize Your theme\'s general Settings','incredible'),
			'panel'=>'incredible_theme_option',
			'capability'=>'edit_theme_options',
            'priority' => 35,
			
        )
    );
	$wl_theme_options = incredible_theme_options();
	$wp_customize->add_setting(
		'incredible_theme_options[upload_image_logo]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_logo'],
			'sanitize_callback'=>'esc_url_raw',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'incredible_theme_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'incredible_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'incredible_theme_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'incredible_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	
	
	$wp_customize->add_setting(
		'incredible_theme_options[header_1_color]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['header_1_color'],
			'sanitize_callback'=>'incredible_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting(
		'incredible_theme_options[header_2_color]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['header_2_color'],
			'sanitize_callback'=>'incredible_sanitize_text',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'incredible_upload_image_logo', array(
		'label'        => __( 'Website Logo', 'incredible' ),
		'section'    => 'general_sec',
		'settings'   => 'incredible_theme_options[upload_image_logo]',
	) ) );
	$wp_customize->add_control( 'incredible_logo_height', array(
		'label'        => __( 'Logo Height', 'incredible' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'incredible_theme_options[height]',
	) );
	$wp_customize->add_control( 'incredible_logo_width', array(
		'label'        => __( 'Logo Width', 'incredible' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'incredible_theme_options[width]',
	) );
	
	$wp_customize->add_setting(
		'incredible_theme_options[upload_image_favicon]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['upload_image_favicon'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'incredible_upload_favicon_image', array(
		'label'        => __( 'Custom favicon', 'incredible' ),
		'section'    => 'general_sec',
		'settings'   => 'incredible_theme_options[upload_image_favicon]',
	) ) );
	
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'incredible_header_one_color', array(
		'label'        => __( 'Header One Color', 'incredible' ),
		'section'    => 'general_sec',
		'settings'   => 'incredible_theme_options[header_1_color]',
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'incredible_header_two_color', array(
		'label'        => __( 'Header Two Color', 'incredible' ),
		'section'    => 'general_sec',
		'settings'   => 'incredible_theme_options[header_2_color]',
	) ) );
	
	
	/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","incredible"),
	'panel'=>'incredible_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 41
	));
	$wp_customize->add_setting(
	'incredible_theme_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'incredible_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'incredible' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[header_social_media_in_enabled]'
	) );
	
	$wp_customize->add_setting(
	'incredible_theme_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[fb_link]',
		array(
		'default'=>esc_attr($wl_theme_options['fb_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'fb_link', array(
		'label'        => __( 'Facebook', 'incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[fb_link]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[linkedin_link]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube_link', 'incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[instagram]',
		array(
		'default'=>esc_attr($wl_theme_options['instagram']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'instagram', array(
		'label'        => __( 'Instagram', 'incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[instagram]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[gplus]',
		array(
		'default'=>esc_attr($wl_theme_options['gplus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capability'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'gplus', array(
		'label'        => __( 'Goole+', 'incredible' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[gplus]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[email_id]',
		array(
		'default'=>esc_attr($wl_theme_options['email_id']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'is_email',
		)
	);
		$wp_customize->add_control( 'email_id', array(
		'label'        => __( 'Email-ID', 'incredible' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'incredible_theme_options[email_id]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['phone_no']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'incredible_sanitize_integer',
		)
	);
		$wp_customize->add_control( 'phone_no', array(
		'label'        => __( 'Phone Number', 'incredible' ),
		'type'=>'text',
		'section'    => 'social_section',
		'sanitize_callback'=>'incredible_sanitize_text',
		'settings'   => 'incredible_theme_options[phone_no]'
	) );
	
	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","incredible"),
	'panel'=>'incredible_theme_option',
	'capability'=>'edit_theme_options',
    'priority' => 40
	));
	$wp_customize->add_setting(
	'incredible_theme_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'incredible_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'incredible_footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'incredible' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'incredible_theme_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'incredible_theme_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'incredible_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'incredible_developed_by_text', array(
		'label'        => __( 'Developed by Text', 'incredible' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'incredible_theme_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[developed_by_weblizar_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_weblizar_text']),
		'type'=>'option',
		'sanitize_callback'=>'incredible_sanitize_text',
		'capability'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'incredible_developed_by_weblizar_text', array(
		'label'        => __( 'Developed by link Text', 'incredible' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'incredible_theme_options[developed_by_weblizar_text]'
	) );
	$wp_customize->add_setting(
	'incredible_theme_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capability'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'incredible_developed_by_link', array(
		'label'        => __( 'Developed by link', 'incredible' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'incredible_theme_options[developed_by_link]'
	) );
	
	$wp_customize->add_section( 'incredible_more' , array(
				'title'      	=> __( 'Upgrade to Incredible Premium', 'incredible' ),
				'priority'   	=> 999,
				'panel'=>'incredible_theme_option',
			) );

			$wp_customize->add_setting( 'incredible_more', array(
				'default'    		=> null,
				'sanitize_callback' => 'sanitize_text_field',
			) );

			$wp_customize->add_control( new More_incredible_Control( $wp_customize, 'incredible_more', array(
				'label'    => __( 'Incredible Premium', 'incredible' ),
				'section'  => 'incredible_more',
				'settings' => 'incredible_more',
				'priority' => 1,
			) ) );
}
add_action( 'customize_register', 'incredible_customizer' );
function incredible_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function incredible_sanitize_checkbox( $input ) {
    if ( $input == 'on' ) {
        return 'on';
    } else {
        return '';
    }
}
function incredible_sanitize_integer( $input ) {
    return (int) $input;
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Incredible_Customize_Misc_Control' ) ) :
class Incredible_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'More_incredible_Control' ) ) :
class More_incredible_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() {
		?>
		<label style="overflow: hidden; zoom: 1;">
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/incredible-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Incredible Premium','incredible'); ?> </a>
			</div>
			<div class="col-md-4 col-sm-6">
				<img class="enigma_img_responsive " src="<?php echo get_template_directory_uri() .'/images/screenshot.jpg'?>">
			</div>			
			<div class="col-md-3 col-sm-6">
				<h3 style="margin-top:10px;margin-left: 20px;text-decoration:underline;color:#333;"><?php echo _e( 'Incredible Premium - Features','incredible'); ?></h3>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','incredible'); ?> </li>						
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 13 Templates','incredible'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('8 Different Types of Blog Templates','incredible'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('6 Types of Portfolio Templates','incredible'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','incredible'); ?></li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','incredible'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('WPML Compatible','incredible'); ?>   </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Woo-commerce Compatible','incredible'); ?>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Image Background','incredible'); ?>  </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','incredible'); ?> </li>
						<li class="upsell-enigma"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','incredible'); ?> </li>
					
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="https://weblizar.com/themes/incredible-premium-theme/" target="blank" class="btn btn-success btn"><?php _e('Upgrade to Incredible Premium','incredible'); ?> </a>
			</div>
			<span class="customize-control-title"><?php _e( 'Enjoying Incredible?', 'incredible' ); ?></span>
			<p>
				<?php
					printf( __( 'If you Like our Products , Please do Rate us on %sWordPress.org%s?  We\'d really appreciate it!', 'incredible' ), '<a target="" href="https://wordpress.org/support/view/theme-reviews/incredible?filter=5">', '</a>' );
				?>
			</p>
		</label>
		<?php
	}
}
endif;
?>
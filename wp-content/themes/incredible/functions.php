<?php
/** Theme Name	: Incredible
* Theme Core Functions and Codes
*/
	require(get_template_directory().'/core/menu/default_menu_walker.php' );
	require( get_template_directory().'/core/menu/weblizar_nav_walker.php' );
	require( get_template_directory().'/core/class-tgm-plugin-activation.php' );
	require(get_template_directory().'/default_options.php');	
	require(get_template_directory().'/customizer.php');
	add_action('wp_enqueue_scripts', 'enqueue_incredible_styles');
	function enqueue_incredible_styles(){
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		wp_enqueue_style('OpenSans','//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800');
		// Conditional polyfills
		$conditional_scripts = array(
			'html5shiv'=> get_template_directory_uri()."/js/html5shiv.js",
			'respond'  => get_template_directory_uri()."/js/respond.js"
		);
		foreach ( $conditional_scripts as $handle => $src ) {
			wp_enqueue_script( $handle, $src, array(), '', false );
		}
		add_filter( 'script_loader_tag', function( $tag, $handle ) use ( $conditional_scripts ) {
			if ( array_key_exists( $handle, $conditional_scripts ) ) {
				$tag = "<!--[if lt IE 9]>$tag<![endif]-->";
			}
			return $tag;
		}, 10, 2 );
		wp_enqueue_style('incredible_bootstrap',esc_url(get_template_directory_uri().'/css/bootstrap.css'));
		wp_enqueue_style('incredible_font-awesome',esc_url(get_template_directory_uri().'/css/font-awesome.css'));
		wp_enqueue_style('incredible_animate',esc_url(get_template_directory_uri().'/css/animate.css'));
		wp_enqueue_style('incredible_prettyPhoto',esc_url(get_template_directory_uri().'/css/prettyPhoto.css'));
		wp_enqueue_style('incredible_responsive',esc_url(get_template_directory_uri().'/css/responsive.css'));
		wp_enqueue_style('incredible_main',esc_url(get_stylesheet_uri()));
		wp_enqueue_style('incredible_ris-slider-css', esc_url(get_template_directory_uri().'/css/slider-pro.css'));
		wp_enqueue_script('incredible_jquery');
		wp_enqueue_script('incredible_sliderPro',get_template_directory_uri().'/js/jquery.sliderPro.js', array('jquery'), '', true);
		wp_enqueue_script('incredible_bootstrap.js',esc_url(get_template_directory_uri().'/js/bootstrap.js'));
		wp_enqueue_script('incredible_jquery.prettyPhoto',esc_url(get_template_directory_uri().'/js/jquery.prettyPhoto.js'));
		wp_enqueue_script('incredible_main',esc_url(get_template_directory_uri().'/js/main.js'));
		wp_enqueue_script('incredible_jquery-masonry');		
		wp_enqueue_script('incredible_wow',esc_url(get_template_directory_uri().'/js/wow.js'));
		if(is_front_page()){
			wp_enqueue_style('incredible_carousel',esc_url(get_template_directory_uri().'/css/carousel.css'));
			wp_enqueue_script('incredible_caroufredsel-element-js',esc_url(get_template_directory_uri().'/js/jquery.flexslider.js'));
			//wp_enqueue_script('carouFredSel-js',esc_url(get_template_directory_uri().'/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js'));
		}
		}
	add_action( 'after_setup_theme', 'incredible_head_setup' );
	function incredible_head_setup()
	{
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 550; //px
		$font_url = str_replace( ',', '%2C', 'http://fonts.googleapis.com/css?family=Tangerine' );
		add_editor_style( $font_url );
		// Load text domain for translation-ready
		load_theme_textdomain( 'incredible', esc_url(get_template_directory().'/core/lang' ));	
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'incredible' ) );
		register_nav_menu( 'secondary', __( 'Secondary Menu', 'incredible' ) );
		// theme support
		add_theme_support( "woocommerce" );
		add_theme_support( "title-tag" );
		add_theme_support( "custom-header" ); 
		add_theme_support( 'custom-background', array( 'default-color' => '000000') );
		add_theme_support( 'automatic-feed-links');
	}
	add_action( 'widgets_init', 'incredible_widgets_init');
	add_action('admin_init','incredible_settingApi_Option_Panel');
	function incredible_widgets_init() {
	/*sidebar*/
	 register_sidebar( array(
			'name' => __( 'Sidebar', 'incredible' ),
			'class'=>'blog_category',
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'incredible' ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		) );
	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'incredible' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'incredible' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 ">',
			'after_widget' => '</div>',
			'before_title' => '<div class="widget"><h3>',
			'after_title' => '</h3></div>',
		) );   
	}

if ( ! function_exists( '_wp_render_title_tag' ) ) {
	function theme_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'theme_slug_render_title' );
}

function incredible_comments($comments, $args, $depth){
	$GLOBALS['comment'] = $comments;
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	}else{
		$tag = 'li';
		$add_below = 'div-comment';
	}?>
	<div class="media comment_section">
		<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>" >
            <div class="pull-left post_comments"><?php
                if ( $args['avatar_size'] != 0 ) echo get_avatar( $comments, $args['avatar_size'] ); ?>
            </div>
            <div class="media-body post_reply_comments">
                <?php printf(  '<h3>%s</h3>', get_comment_author() ); 
				if ( $comments->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ,'incredible'); ?></em><br /><?php
				else: ?>
					<h4><?php printf( __('%1$s at %2$s','incredible'), get_comment_date(),  get_comment_time() ); 
						edit_comment_link( __( '(Edit)','incredible' ), '', '' );?></h4>
					<?php comment_text(); ?>
					<div class="reply"><?php 
						comment_reply_link( array_merge( $args, array( 
												'add_below' => $add_below,
												'depth' => $depth,
												'max_depth' => $args['max_depth'] 
												) )
											); ?> 
					</div><?php 
				endif; ?>
			</div><?php 
			if ( 'div' != $args['style'] ) :  ?>
				</div><?php
			endif; 
}
function incredible_excerpt_more($more){
	global $post;
	return '...<br><a href="'.get_permalink($post->ID).'" class="btn btn-primary readmore">'.__("Read More","incredible").'</a>';
}
add_filter('excerpt_more', 'incredible_excerpt_more');
function incredible_page_nav_link(){ ?>

	<div class="pagination pagination-lg col-md-12">
        <?php posts_nav_link(' &#183; ', '<div class="marginleft"> <i class="fa fa-long-arrow-left "></i>'.__('Previous Page','incredible').'</div>','<div class="marginright">'. __('Next Page','incredible').'<i class="fa fa-long-arrow-right"></i></div>'); ?>
    </div><!--/.pagination-->
	
<?php }

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'incredible_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'incredible_theme_wrapper_end', 10);

function incredible_theme_wrapper_start() {
  echo '<section id="blog" class="container"><div class="blog">
		<div class="row">
			<div class="col-md-12">';
}

function incredible_theme_wrapper_end() {
  echo '</div></div></div></section>';
}
function incredible_favicon() {
	$incredible_theme_options = incredible_theme_options();
	if($incredible_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($incredible_theme_options['upload_image_favicon']); ?>" >
	<?php } }
add_action('wp_head', 'incredible_favicon');

add_action('tgmpa_register','incredible_plugin_recommend');
function incredible_plugin_recommend(){
	$plugins = array(
	array(
            'name'      => 'Ultimate Responsive Image Slider',
            'slug'      => 'ultimate-responsive-image-slider',
            'required'  => false,
        ),
		array(
            'name'      => 'Photo Video Link Gallery',
            'slug'      => 'photo-video-link-gallery',
            'required'  => false,
        )
		
	);
    tgmpa( $plugins );
}

function incredible_filter_theme_page_templates( $page_templates, $this, $post ) {
    
     if (is_plugin_inactive('ultimate-responsive-image-slider/ultimate-responsive-image-slider.php')  && (is_plugin_inactive('photo-video-link-gallery/photo-video-link-gallery.php'))) {
    //plugin is not activated
	unset( $page_templates['homepage-tpl.php'] );
	}

    return $page_templates;
}
add_filter( 'theme_page_templates', 'incredible_filter_theme_page_templates', 20, 3 );

if (is_admin()) {
	require_once('core/admin/admin.php');
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>
	<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>
	<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>
	<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>" /><?php
	$incredible_theme_options = incredible_theme_options(); ?>
    <?php if($incredible_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($incredible_theme_options['upload_image_favicon']); ?>" >
	<?php } wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<div class="wraper">
	<header id="header">
		<div class="top-bar" style="<?php if($incredible_theme_options['header_1_color']!=""){echo "background:".esc_attr($incredible_theme_options['header_1_color']).";border-bottom: 1px solid ".esc_attr($incredible_theme_options['header_1_color']); } ?>; " >
			<div class="container">
				<?php 
				if($incredible_theme_options['header_social_media_in_enabled']=='on') { ?>
					<div class="row"><?php
						if($incredible_theme_options['phone_no'] !='') { ?>
							<div class="col-sm-6 col-xs-4" id="mob-email">
								<ul class="top-number">
									<li><i class="fa fa-phone-square" style="display:inline-block;">&nbsp;</i><?php echo (int)$incredible_theme_options['phone_no']; ?></li>
									<li><i class="fa fa-envelope-o" style="display:inline-block;">&nbsp;</i><?php echo sanitize_email($incredible_theme_options['email_id']); ?></li>
								</ul>
							</div><?php
						} ?>
						<div class="col-sm-6 col-xs-8">
						   <div class="social">
								<ul class="social-share"><?php
								if($incredible_theme_options['fb_link']!='') { ?>
									<li><a href="<?php echo esc_url($incredible_theme_options['fb_link']); ?>"><i class="fa fa-facebook"></i></a></li><?php
								}
								if($incredible_theme_options['twitter_link']!='') {	?>
									<li><a href="<?php echo esc_url($incredible_theme_options['twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li><?php
								}
								if($incredible_theme_options['linkedin_link']!='') {	?>
									<li><a href="<?php echo esc_url($incredible_theme_options['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li> <?php
								}
								if($incredible_theme_options['instagram']!='') {	?>
									<li><a href="<?php echo esc_url($incredible_theme_options['instagram']); ?>"><i class="fa fa-instagram"></i></a></li><?php
								}
								if($incredible_theme_options['youtube_link']!='') {	?>
									<li><a href="<?php echo esc_url($incredible_theme_options['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li><?php
								}	?>
								</ul>
						   </div>
						</div>
					</div><?php
				}	?>
			</div><!--/.container-->
		</div><!--/.top-bar-->
		<nav class="navbar navbar-inverse" role="navigation" style="<?php if(get_header_image()!=""){echo "background-image:url(".esc_url( get_header_image() ).");"; } elseif($incredible_theme_options['header_2_color']!=""){echo "background:".esc_attr($incredible_theme_options['header_2_color']).";"; } ?>" >
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button><?php if(display_header_text()){ ?>
					<a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php
					 if($incredible_theme_options['upload_image_logo']!=''){ ?>
						<img alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" src="<?php echo esc_url($incredible_theme_options['upload_image_logo']); ?>" height="<?php if($incredible_theme_options['height']!='') { echo (int) esc_attr($incredible_theme_options['height']); }  else { echo 80; } ?>" width="<?php if($incredible_theme_options['width']!='') { echo (int) esc_attr($incredible_theme_options['width']); }  else { echo 200; } ?>" /><?php
					}else{	 echo '<h1 style="color:#'.esc_attr(get_header_textcolor()).'">'.esc_attr(get_bloginfo('name')).'</h1>';
					} ?></a>
					<?php } ?>
				</div>
			<div class="collapse navbar-collapse navbar-right">
					<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'container' => false,
					'menu_class' => 'nav navbar-nav',
					'fallback_cb' => 'weblizar_fallback_page_menu',
					'walker' => new weblizar_nav_walker(),
					)
					);	?>
				</div>
			</div><!--/.container-->
		</nav><!--/nav-->
	</header><!--/header-->
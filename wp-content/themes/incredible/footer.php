<section id="bottom">
    <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row"><?php
            if ( is_active_sidebar( 'footer-widget-area' ) ){
					dynamic_sidebar( 'footer-widget-area' );
			}else{
					$args = array(
					'before_widget' => '<div class="col-md-3 col-sm-6">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget"><h3>',
					'after_title'   => '</h3></div>' );
					the_widget('WP_Widget_Archives', null, $args);
					the_widget('WP_Widget_Categories', null, $args);
			} ?>
        </div>
    </div>
</section><!--/#bottom-->
 <?php $incredible_theme_options = incredible_theme_options(); ?>
<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6"><?php
				echo esc_attr($incredible_theme_options['footer_customizations'])." ".esc_attr($incredible_theme_options['developed_by_text'])." "; ?>
				<a target="_blank" href='<?php if($incredible_theme_options["developed_by_link"]!="" ){ echo esc_url($incredible_theme_options["developed_by_link"]);} ?>' title="<?php echo esc_attr($incredible_theme_options['developed_by_weblizar_text']); ?>"><?php echo esc_attr($incredible_theme_options['developed_by_weblizar_text']); ?></a>
            </div>
			<div class="col-sm-6"><?php
				wp_nav_menu( array(
					'theme_location' => 'secondary',
					'menu_class' => 'pull-right',

				));?>
			</div>
        </div>
    </div>
</footer><!--/#footer-->
<?php wp_footer(); ?>
</div>
</body>
</html>
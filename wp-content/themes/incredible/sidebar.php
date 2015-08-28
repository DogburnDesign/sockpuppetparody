<?php
		if(class_exists( 'WooCommerce' ) && is_woocommerce()){ 
			return;
		}elseif( is_active_sidebar( 'sidebar-primary' ) ){
				dynamic_sidebar( 'sidebar-primary' );	
			}else{
				$args = array(
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3>',
				'after_title'   => '</h3>');
				the_widget('WP_Widget_Categories', null, $args);
				the_widget('WP_Widget_Archives', null, $args);
			} ?>
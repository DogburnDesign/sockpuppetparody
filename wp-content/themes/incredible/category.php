<?php get_header(); ?>
<section id="blog" class="container"><?php
	if(have_posts()) : ?>
		<div class="aligncenter bot_pad">
			<h2><?php printf( __( 'Category Archives: %s', 'incredible' ), '<span>' . ucfirst(esc_attr(single_cat_title( '', false )) . '</span>' )); ?></h2>
		</div><?php
	endif; ?>
	<div class="blog">
        <div class="row">
            <div class="col-md-8">
			<?php	
				get_template_part('loop');
				incredible_page_nav_link(); 
			?>
            </div><!--/.col-md-8-->
			<aside class="col-md-4">
			<?php get_sidebar(); ?>
			</aside>
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
<?php get_footer(); ?>
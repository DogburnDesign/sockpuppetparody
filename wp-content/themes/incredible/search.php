<?php get_header(); ?>
<section id="blog" class="container"><?php
	if(have_posts()): ?>
		<div class="aligncenter">
			<h2><?php printf( __( 'Search Results for: &ldquo;%s&rdquo;', 'incredible' ), '<span>' .esc_attr(get_search_query()) . '</span>'  ); ?></h2>
		</div><?php
	else :
		echo '<h2 style="padding-left:270px;padding-top:200px">'.__('Result Not Found','incredible').'</h2>';
	endif; ?>
	<div class="blog">
		<div class="row">
			<div class="col-md-8">
			 <?php if(have_posts()):while(have_posts()):the_post();
						get_template_part('loop');
						endwhile;
					endif;?>
				<?php esc_url(incredible_page_nav_link()); ?>
			</div><!--/.col-md-8-->
			<aside class="col-md-4">
				<?php get_sidebar(); ?>
			</aside>
		</div><!--/.row-->
	</div>
</section><!--/#blog-->
<?php get_footer();	?>
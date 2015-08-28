<?php get_header(); ?>
<section id="blog" class="container">
  <?php if(have_posts()) : the_post(); ?>
	<div class="aligncenter bot_pad">
		<h2><?php printf( __( 'Author Archives: %s', 'incredible' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . esc_attr( get_the_author() ) . '</a></span>' ); ?> </h2>
	</div>
	<div class="blog">
		<div class="row">
		  <div class="col-md-8">
			<?php
			get_template_part('loop');			
			incredible_page_nav_link();
			?>
		  </div>
		  <aside class="col-md-4">
			<?php  get_sidebar(); ?>
		  </aside>
		</div>
	</div>
	<?php endif; ?>
</section>
<?php get_footer(); ?>
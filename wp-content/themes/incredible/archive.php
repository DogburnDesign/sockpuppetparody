<?php get_header(); ?>
<section id="blog" class="container">
   <div class="aligncenter bot_pad">
			<?php if(have_posts()) : ?>		
			<h2><?php if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'incredible' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'incredible' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'incredible' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'incredible' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'incredible' ) ) . '</span>' );
					else :
						_e( 'Archives', '' );
					endif; ?>
			</h2>		
		<?php endif; ?>
    </div>
	<div class="blog">
		<div class="row">
			<div class="col-md-8">
			<?php
				get_template_part('loop');						
				incredible_page_nav_link(); ?>
			</div><!--/.col-md-8-->
			<aside class="col-md-4">
			<?php get_sidebar(); ?>
			</aside>
		</div><!--/.row-->
	</div>
</section><!--/#blog-->
<?php get_footer(); ?>
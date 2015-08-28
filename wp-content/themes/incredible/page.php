<?php get_header(); ?>
<section id="blog" class="container">
	<div class="aligncenter bot_pad">
		<h2><?php echo the_title(); ?></h2>
		<p class="lead"><?php  echo esc_attr(get_post_meta(get_the_ID(),'blog_text',true)); ?></p>
	</div>
	<div class="blog">
		<div class="row">
			<div class="col-md-8"><?php
			 if(have_posts()): while(have_posts()): the_post();  ?>
				<div class="blog-item"><?php
					if(has_post_thumbnail()):
							$post_thumbnail_id = get_post_thumbnail_id();
							$post_thumbnail_url = esc_url(wp_get_attachment_url( $post_thumbnail_id )); ?>
							<img class="img-responsive img-blog" src="<?php echo $post_thumbnail_url; ?>" width="100%"><?php
					endif; ?>
					<div class="row">
						<div class="col-xs-12 col-sm-2 text-center">
							<div class="entry-meta">
								<span id="publish_date"><?php echo date('m M ',strtotime(get_the_date())); ?></span>
								<span><i class="fa fa-user"></i><?php echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . esc_attr( get_the_author() ) . '</a>'; ?></span>
								<span><i class="fa fa-comment"></i><?php comments_popup_link(__('No Comments','incredible'), __('1 Comment','incredible'), __('% Comments','incredible')); ?> <?php edit_post_link(__('Edit','incredible'), ' &#124; ', ''); ?></span>
							</div>
						</div>
						<div class="col-xs-12 col-sm-10 blog-content">
							<h2><a href="<?php the_permalink(); ?>"  alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_content(); ?></p>
						</div>
					</div>
				</div><!--/.blog-item--><?php
				if(comments_open( get_the_ID() )):
					comments_template( '', true );
				endif;
				endwhile;
			endif; ?>
			</div><!--/.col-md-8-->
			<aside class="col-md-4">
			   <?php get_sidebar(); ?>
			</aside>
		</div><!--/.row-->
	</div>
</section><!--/#blog-->
<?php
get_footer();
?>
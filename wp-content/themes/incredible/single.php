<?php get_header(); ?>
<section id="blog" class="container">
	<div class="aligncenter" id="bot_pad">
		<h2><?php echo get_the_title(); ?></h2>
		<p class="lead"><?php  echo esc_attr(get_post_meta(get_the_ID(),'blog_text',true)); ?></p>
	</div>
	<div class="blog">
		<div class="row">
			<div class="col-md-8"><?php
				if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="blog-item">
							<div class="row">
								<div class="col-xs-12 col-sm-2 text-center">
									<div class="entry-meta">
										<span id="publish_date"><?php echo get_post_time('d M '); ?></span>
										<span><i class="fa fa-user"></i><?php echo '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . esc_attr( get_the_author() ) . '</a>'; ?></span>
										<span><i class="fa fa-comment"></i><?php comments_popup_link(__('No Comments','incredible'), __('1 Comment','incredible'), __('% Comments','incredible')); ?> <?php edit_post_link(__('Edit','incredible'), ' &#124; ', ''); ?></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-10 blog-content"><?php
							if(has_post_thumbnail()):
								$post_thumbnail_id = the_post_thumbnail('blog_img');
							endif; ?>
									<h2><?php the_title();	?></h2>
									<p><?php the_content();	?></p>
									<p><?php the_tags();	?>
									<?php printf(__('Filled Under: %s ','incredible'),get_the_category_list( ',' )); printf(__('Posted on: %s','incredible'),get_post_time( get_option('date_format'), true ));?></p>
									<?php wp_link_pages();?>
								</div>
							</div>
							<ul class="pagination pagination-lg">
								<li><?php  next_post_link('%link','<i class="fa fa-long-arrow-left"></i>'.__('Previous Post','incredible')); ?></li>
								<li><?php previous_post_link('%link',__(' Next Post','incredible').'<i class="fa fa-long-arrow-right"></i>'); ?></li>
							</ul>
						</div><!--/.blog-item--><?php
						if(comments_open( get_the_ID() )):
							comments_template( '', true );
						endif;
					endwhile;
				endif;?>
			</div><!--/.col-md-8-->
			<aside class="col-md-4">
				<?php get_sidebar(); ?>
			</aside>
		</div><!--/.row-->
	</div><!--/.blog-->
</section><!--/#blog-->
<?php get_footer();	?>
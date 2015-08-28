<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="blog-item">
	<div	<?php post_class('row'); ?> >
		<div class="col-xs-12 col-sm-2 text-center">
			<div class="entry-meta">
				<span id="publish_date"><?php echo date('m M ',strtotime(get_the_date())); ?></span>
				<span><i class="fa fa-user"></i> <?php esc_url(the_author_posts_link()); ?></span>
				<span><i class="fa fa-comment"></i><?php comments_popup_link(__('No Comments','incredible'), __('1 Comment','incredible'), __('% Comments','incredible')); ?> <?php edit_post_link(__('Edit','incredible'), ' &#124; ', ''); ?></span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-10 blog-content">	<?php
			if(has_post_thumbnail()){
				the_post_thumbnail('blog_img');
			} ?>
			<h2><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_content(__('Continue Reading','incredible')); ?></p>
			<p><?php the_tags();?>
			<?php printf(__('Filled Under: %s ','incredible'),get_the_category_list( ',' )); printf(__('Posted on: %s','incredible'),get_post_time( get_option('date_format'), true ));?></p>
		</div>
	</div>
</div><!--/.blog-item-->
<?php 
endwhile;
	endif; ?>
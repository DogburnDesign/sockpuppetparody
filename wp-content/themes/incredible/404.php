<?php get_header(); ?>
<section id="error" class="container text-center">
  <h1>
    <?php _e('404, Page not found','incredible'); ?>
  </h1>
  <p>
    <?php _e('We`re sorry, but the page you are looking for doesn`t exist.','incredible'); ?>
  </p>
  <a class="btn btn-primary" href="<?php echo esc_url(home_url( '/' )); ?>">
  <?php _e('GO BACK TO THE HOMEPAGE','incredible'); ?>
  </a> 
</section>
<!--/#error-->
<?php get_footer(); ?>
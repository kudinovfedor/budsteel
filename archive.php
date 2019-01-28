<?php get_header(); ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <?php get_template_part('loops/content', get_post_format()); ?>
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>
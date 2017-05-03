<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<div class="container mt-3">
    <?php if ( !dynamic_sidebar('home-ad-1') ) { _e('','lean'); } //广告 ?>
</div>

<div class="jumbotron jumbotron-fluid mt-3">
    <div class="container">
      <?php
      lean_the_archive_title( '<h1 class="header-title">', '</h1>' );
      lean_the_archive_description( '<p class="header-subtitle">', '</p>' );
      ?>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8">

      <?php  while ( have_posts() ) : the_post(); ?>

         <?php
         /**
          * 显示内容
          */
         get_template_part( 'template-parts/posts', 'list' );
          ?>
        <?php endwhile; ?>
        <div class="pagination pt-2 mt-2">
          <?php lean_pagination();?>
        </div>
        <?php else : ?>
     <?php get_template_part( 'template-parts/content', 'none' ); ?>
     <?php endif;     // Reset Post Data
       wp_reset_postdata();?>
    </div>

    <div class="col-xl-4 col-lg-4 hidden-sm-down">
      <?php get_sidebar();?>
    </div>
  </div>
</div>

<?php get_footer(); ?>

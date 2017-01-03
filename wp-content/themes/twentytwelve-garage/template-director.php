<?php
/*
Template Name: Director
*/ 
?>  

<?php get_header(); ?>

    <section id="main-content">

    <?php 

    /* OBTENER SLUG */
    
    global $wp_query;
    $post_id = $wp_query->post->ID;

    $post = get_post( $post_id );
    $slug = $post->post_name;

    /* OBTENER ID CAT */

    $idObj = get_category_by_slug($slug); 
    $cate_id = $idObj->term_id;

    ?>  

    <?php $actual_post = array(); ?>
    <?php

    $category = get_the_category( $id );
    /*
    if ( is_page('fernando-vilanova') ) { 
      $cate_id = 12;
    } elseif ( is_page('heinz-kobernik') ) {
      $cate_id = 7;
    } elseif ( is_page('tato-pereda') ) {
      $cate_id = 8;
    } elseif ( is_page('jose-luis-ocejo') ) {
      $cate_id = 13;
    } elseif ( is_page('sergio-busco') ) {
      $cate_id = 14;
    } elseif ( is_page('mancia-orlich') ) {
      $cate_id = 15;
    }
    */
    ?>

    <?php if (have_posts()) : ?>
            
    <?php while (have_posts()) : the_post(); ?>

    <div class="row">
      <div class="col-md-12">

        <div id="director-preview"><?php the_post_thumbnail('preview-video', array('class' => 'img-responsive')); ?></div>
      </div>
      <!-- / col 12 -->
    </div><!-- / row -->
    <div class="row">
      <div class="col-md-12">
        <div id="info-post">
          <div class="share">Compartir:</> </div>
          <h2><?php the_title(); ?></h2>
          <div class="content-post">
            <p><?php the_content(); ?> </p>
          </div>
          <!-- / content post -->
        </div><!-- / info post -->

      </div><!-- / col 12 -->
    </div><!-- / row -->

    <?php endwhile; ?>
            
     <?php endif; ?> 

  </section>
  <section id="old-posts">
    <div class="row top-posts">
      <div class="col-md-4">
        <div class="title-sidebar"> <?php echo get_cat_name($cate_id); ?> > Videos</div>
        <!-- / title sidebar -->
        <span class="line"></span> </div>
      <!-- / col md -->
      <div class="col-md-8"><span class="line"></span></div>
    </div>
    <!-- / row -->

    <?php global $post; ?>
    <?php
    $category = get_the_category( $id );
    $cat_id = $category[0]->cat_ID;
    ?>
    <?php $args = array( 'numberposts' => 20, 'orderby' => 'post_date', 'category' => $cate_id );
    $postslist = get_posts( $args );
    
    foreach ($postslist as $post) :  setup_postdata($post); ?>

    <div class="row video-container">
      <div class="col-md-4">
        <div class="video"> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail('featured-video-sidebar', array('class' => 'img-responsive')); ?>
          <div class="caption-bg"></div>
          <div class="caption">
            <div class="inner">
              <div class="date"><?php echo get_the_date( 'M j, Y' ); ?></div> 
              <div class="title"><?php the_title(); ?></div>
              <div class="plus"></div>
            </div><!-- / iinner -->
          </div><!-- / caption -->
          <!-- / caption -->
          </a> </div>
        <!-- / video -->
      </div>
      <!-- / col md -->
      <div class="col-md-8">

        <div class="date"><?php echo get_the_date( 'M j, Y' ); ?></div>
        <h3><?php the_title(); ?></h3>
        <div class="excerpt">
          <p><?php the_excerpt(); ?></p>
        </div>
        <!-- / excerpt -->
        <a class="read-more" href="<?php the_permalink(); ?>" title="LEER MÁS">LEER MÁS</a> </div>
      <!-- / col md 8 -->
    </div>
    <!-- / row -->

    <?php endforeach; ?>

  </section>

<?php get_footer(); ?>
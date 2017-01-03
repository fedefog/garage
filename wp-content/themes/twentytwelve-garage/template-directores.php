<?php
/*
Template Name: Directores
*/ 
?>  

<?php get_header(); ?>

  <section id="main-content">
    <div class="row">
      <div class="col-md-12 directores-page">

        <?php /*$categorias_options = array( 'include' => '12, 7, 8, 13, 14, 15' );*/
        $categorias_options = array( 'exclude' => '1, 3. 4, 9, 10, 11' );
        $categorias = get_categories( $categorias_options );

        foreach ($categorias as $cat) : ?>
        
        <div class="col-md-4 col-sm-4">
          <div class="director">
            <a href="http://garage-films.com/directores/<?php echo $cat->slug; ?>" title="">
            <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" class="img-responsive" />
            <div class="hl-hover">
              <div class="hl-bg"></div>
              <div class="excerpt">
              <h3><?php echo $cat->cat_name; ?></h3>
              <span>LEER MÁS</span>
              </div> 
            </div>
            </a>
          </div><!-- / director -->
        </div><!-- / col 3 -->

        <?php endforeach; ?>
        
      </div><!-- / col 12 -->
    </div><!-- / row -->
  </section>

<?php get_footer(); ?>
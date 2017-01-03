<?php get_header(); ?>

  <section id="main-content">
    
    <div class="row">

          <div class="col-md-12 directores-page nosotros">

         <?php if (have_posts()) : ?>
            
            <?php while (have_posts()) : the_post(); ?>

              <div class="col-md-12">

                <div class="page-content">
                <?php the_content(); ?>
                </div><!-- / page content -->

              </div><!-- / col 12 -->

            <?php endwhile; ?>
            
          <?php endif; ?>

        </div><!-- / row --> 

  </section>

<?php get_footer(); ?>
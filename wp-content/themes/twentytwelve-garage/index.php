<?php get_header(); ?>

	<section>

        <div class="row" id="slider">
          <div class="col-md-8">
            <div class="video featured">
              <?php $args = array( 'numberposts' => 1, 'orderby' => 'post_date', 'category_name' => 'destacado', 'comerciales' );
              $postslist = get_posts( $args );
                
              foreach ($postslist as $post) :  setup_postdata($post); ?>  

              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('featured-video', array('class' => 'img-responsive')); ?>
                <div class="caption-bg"></div>
                <div class="caption">
                  <div class="inner">
                    <div class="date"><?php the_date( 'M j, Y' ); ?> </div> 
                    <div class="title"><?php the_title(); ?></div>
                    <div class="excerpt"><?php echo substr(get_the_excerpt(), 0,190); ?></div>
                    <div class="plus"></div>
                  </div><!-- / iinner -->
                </div><!-- / caption -->
              </a>

              <?php endforeach; ?>

            </div><!-- / video -->  
          </div><!-- col 8 -->
          <div class="col-md-4 hidden-sm hidden-xs">

            <?php $posts_options = array( 'numberposts' => 2, 'orderby' => 'post_date', 'category_name' => 'secundario', 'comerciales' );
            $myposts = get_posts( $posts_options );
                
            foreach ($myposts as $post) :  setup_postdata($post);?>

            <div class="video">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php the_post_thumbnail('featured-video-side', array('class' => 'img-responsive')); ?>
                <div class="caption-bg"></div>
                <div class="caption">
                  <div class="inner">
                    <div class="date"><?php echo get_the_date( 'M j, Y' ); ?></div> 
                    <div class="title"><?php the_title(); ?></div>
                    <div class="plus"></div>
                  </div><!-- / iinner -->
                </div><!-- / caption -->
              </a>
            </div><!-- / video -->

            <?php endforeach; ?>

          </div><!-- col 4 -->
        </div><!-- / row -->

        <div class="row hidden-sm hidden-xs pacman" id="twitter">

          <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
          <div class="col-md-12">
            <div id="carousel-twitter">
              <?php dynamic_sidebar( 'sidebar-1' ); ?>
              <div id="prev-tweet" class="fade-fx"></a></div>
              <div id="next-tweet" class="fade-fx"></a></div>
            </div><!-- / carousel twitter -->  
          </div><!-- / col 12 -->
          <?php endif; ?>

          <?php /*
          <div class="col-md-12">
            <div id="carousel-twitter">
              <div id="twitter-slides">
                <div class="tweet-slide">
                  <div class="tw-user">TATO PEREDA</div>
                  <div class="tweet">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.</div>
                </div><!-- / tweet slide -->
                <div class="tweet-slide">
                  <div class="tw-user">SERGIO B.</div>
                  <div class="tweet">Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el a&ntilde;o 1500.</div>
                </div><!-- / tweet slide -->
              </div><!-- / twitter slides -->
              <div id="prev-tweet" class="fade-fx"></a></div>
              <div id="next-tweet" class="fade-fx"></a></div>
            </div><!-- / carousel twitter -->  
          </div><!-- / col 12 -->
          */ ?>

        </div><!-- / row -->

      </section>

      <section id="main-content">

        <div class="row">

          

          <div class="col-md-4 col-xs-12" id="sidebar">
            <div class="arrows hidden-sm hidden-xs">
              <div class="prev"></div>
              <div class="next"></div>
            </div><!-- / arrows -->
            <aside>
              <div class="title-sidebar">
                Videos Anteriores
              </div><!-- / title sidebar -->
              <div id="older-videos">
                <div class="slider-videos">

                  <?php $posts_options = array( 'numberposts' => 10, 'orderby' => 'post_date', 'category' => 9, 'category__not_in' => array(3, 4) );
                    $myposts = get_posts( $posts_options );
                    $counter = 0; /* contador */    

                    foreach ($myposts as $post) :  setup_postdata($post);?>      

                  <?php if ($counter == 0): echo '<div class="slide-videos pull-left">'; endif; ?>
                  <?php if ($counter == 5): echo '<div class="slide-videos pull-right">'; endif; ?>
                    <div class="video <?php if ($counter == 1 || $counter == 3): echo 'last-sm'; endif; ?>">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail('featured-video-sidebar', array('class' => 'img-responsive')); ?>
                        <div class="caption-bg"></div>
                        <div class="caption">
                          <div class="inner">
                            <div class="date"><?php echo get_the_date( 'M j, Y' ); ?></div> 
                            <div class="title"><?php the_title(); ?></div>
                            <div class="plus"></div>
                          </div><!-- / iinner -->
                        </div><!-- / caption -->
                      </a>
                    </div><!-- / video -->
                  <?php if ($counter == 4 || $counter == 9): echo '</div>'; endif; ?>

                  <?php $counter++ ?>

                  <?php endforeach; ?>

                </div><!-- / slider videos -->
              </div><!-- / older videos -->
            </aside>
          </div><!-- / col 4 -->

          <div class="col-md-8" id="highlights-container">
            <div class="title-highlights hidden-md hidden-lg">
              Highlights
            </div><!-- / title Higlights -->
            <div class="highlights">

              <?php $hl = get_posts ( array ( 'post_type' => 'highlights', 'numberposts' => 6) );  

              $odd_or_even = 'pull-left';
              $hl_counter = 0; /* contador */ 
              $zise = 'small';
              $ids = array();

              foreach( $hl as $post ) : setup_postdata($post); 

              array_push( $ids, get_the_ID() );


              if ( $hl_counter == 0 || $hl_counter == 3 ) {
                $zise = 'medium';
              } elseif ( $hl_counter == 1 || $hl_counter == 2 ) {
                $zise = 'small';
              } elseif ( $hl_counter == 4 || $hl_counter == 5 ) {  
                $zise = 'big';
              }

              ?>

              <div class="<?php echo $odd_or_even; ?>">

                <?php $odd_or_even = ('pull-left'==$odd_or_even) ? 'pull-right' : 'pull-left'; ?>

                <div class="hl <?php echo $zise; ?>">
                  <?php $thumb_id = get_post_thumbnail_id( $post->ID );?>
                  <?php $image = wp_get_attachment_image_src( $thumb_id,'full' ); ?>
                  <a href="<?php echo $image[0]; ?>" class="thickbox" title="<?php the_title(); ?>">
                    <?php

                    if ( $zise == 'medium' ) {
                      the_post_thumbnail('hl-medium', array('class' => 'img-responsive'));
                    } elseif ( $zise == 'small' ) {
                      the_post_thumbnail('hl-small', array('class' => 'img-responsive'));
                    } elseif ( $zise == 'big' ) {  
                      the_post_thumbnail('hl-big', array('class' => 'img-responsive'));
                    }

                    ?>
                    <div class="hl-hover">

                      <?php if(has_term('highlights', 'video')) { ?>  

                        <div class="icon video"></div>                

                      <?php } else {?>

                         <div class="icon image"></div>    

                      <?php } ?>

                      <div class="hl-bg"></div>
                      <div class="excerpt">
                        <p><?php the_title(); ?></p>
                        <span>LEER MÁS</span>
                      </div><!-- / excerpt -->
                    </div><!-- / hl hover -->
                  </a>
                </div><!-- / hl -->
              </div><!-- / left -->

              <?php $hl_counter++ ?>
              <?php if ($hl_counter == 6): $hl_counter = 0; endif; ?>

              <?php endforeach; ?>

            </div><!-- / highlights -->
          </div><!-- / col 8 -->

        </div><!-- / row -->

        <div class="row">
          <div class="col-md-12">
            <div class="highlights olds">

              <?php $hl = get_posts ( array ( 'paged'=> (get_query_var('paged')) ? get_query_var('paged') : 1,'post_type' => 'highlights', 'posts_per_page'   => 24, 'post__not_in' => $ids ));  

              $odd_or_even = 'pull-left';
              $hl_counter = 0; /* contador */ 
              $zise = 'small';

              foreach( $hl as $post ) : setup_postdata($post); 


              if ( $hl_counter == 0 ) {
                $zise = 'medium';
              } elseif ( $hl_counter == 1 ) {
                $zise = 'small';
              } elseif ( $hl_counter == 2 ) {  
                $zise = 'medium2';
              } elseif ( $hl_counter == 3 ) {  
                $zise = 'extrabig';
              } elseif ( $hl_counter == 4 ) {  
                $zise = 'big';
              } elseif ( $hl_counter == 5 ) {  
                $zise = 'medium2';
              } elseif ( $hl_counter == 6 ) {  
                $zise = 'small';
              } elseif ( $hl_counter == 7 ) {  
                $zise = 'medium';
              }

              ?>

              <div class="post <?php echo $odd_or_even; ?> <?php if ($hl_counter == 6): echo "pull-sm-right"; endif; ?>  <?php if ($hl_counter == 2): echo "pad-left"; endif; ?> <?php if ($hl_counter == 7): echo "pad-right pull-sm-left"; endif; ?>">

                <?php $odd_or_even = ('pull-left'==$odd_or_even) ? 'pull-right' : 'pull-left'; ?>

                <div class="hl <?php echo $zise; ?>">
                  <?php $thumb_id = get_post_thumbnail_id( $post->ID );?>
                  <?php $image = wp_get_attachment_image_src( $thumb_id,'full' ); ?>
                  <a href="<?php echo $image[0]; ?>" class="thickbox" title="<?php the_title(); ?>">
                    <?php

                    if ( $zise == 'medium' ) {
                      the_post_thumbnail('hl-medium', array('class' => 'img-responsive'));
                    } elseif ( $zise == 'medium2' ) {
                      the_post_thumbnail('hl-medium-2', array('class' => 'img-responsive'));  
                    } elseif ( $zise == 'small' ) {
                      the_post_thumbnail('hl-small', array('class' => 'img-responsive'));
                    } elseif ( $zise == 'big' ) {  
                      the_post_thumbnail('hl-big', array('class' => 'img-responsive'));
                    } elseif ( $zise == 'extrabig' ) {  
                      the_post_thumbnail('hl-extrabig', array('class' => 'img-responsive'));
                    } elseif ( $zise == 'medium3' ) {  
                      the_post_thumbnail('hl-medium-3', array('class' => 'img-responsive'));
                    }


                    ?>
                    <div class="hl-hover">

                      <?php if(has_term('highlights', 'video')) { ?>  

                        <div class="icon video"></div>                

                      <?php } else {?>

                         <div class="icon image"></div>    

                      <?php } ?>

                      <div class="hl-bg"></div>
                      <div class="excerpt">
                        <p><?php the_title(); ?></p>
                        <span>LEER MÁS</span>
                      </div><!-- / excerpt -->
                    </div><!-- / hl hover -->
                  </a>
                </div><!-- / hl -->
              </div><!-- / post -->

              <?php $hl_counter++ ?>
              <?php if ($hl_counter == 8): $hl_counter = 0; endif; ?>

              <?php endforeach; ?>

            </div><!-- / highlights -->
          </div><!-- / col 12 -->
        </div><!-- / row -->

        <div class="row">
          <div class="col-md-12 load-container first">
            <a class="load-more fade-fx" href="" title="Cargar Más"></a>
          </div><!-- / col 12 -->
        </div><!-- / row -->

      </section>

<?php get_footer(); ?>
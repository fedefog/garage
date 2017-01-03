<?php get_header(); ?>
    
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">

                <?php if ( have_posts() ) : ?>

                <div class="resultado-title"><h2><?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>"' . get_search_query() . '"</span>' ); ?></h2></div>

                <div id="search-container" class="olds">
                
            		<?php while ( have_posts() ) : the_post(); ?>

                        <div class="row video-container post">
                            <div class="col-md-4">
                            <div class="video"> 
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail('featured-video-sidebar', array('class' => 'img-responsive')); ?>
                                    <div class="caption-bg"></div>
                                    <div class="caption">
                                        <div class="inner">
                                            <div class="date"><?php echo get_the_date( 'M j, Y' ); ?></div> 
                                            <div class="title"><?php the_title(); ?></div>
                                            <div class="plus"></div>
                                        </div><!-- / iinner -->
                                    </div><!-- / caption -->
                                </a> </div><!-- / video -->
                            </div><!-- / col md 4 -->
                            <div class="col-md-8">
                                <div class="date">MAR 10 , 2014</div>
                                <h3><?php the_title(); ?></h3>
                                <div class="excerpt">
                                    <p><?php the_excerpt(); ?></p>
                                </div><!-- / excerpt -->
                                <a class="read-more" href="<?php the_permalink(); ?>" title="LEER MÁS">LEER MÁS</a> 
                            </div><!-- / col md 8 -->
                        </div><!-- / row -->

            		<?php endwhile; ?>

                    </div><!-- / search container -->

            	<?php else : ?>

        		<div class="resultado-title"><h2>No se encontraron resultados para "<?php echo get_search_query(); ?>"</h2></div>

    			<h3>Lo sentimos pero no hay nada que se ajuste a tu criterio de búsqueda. Por favor, inténtalo de nuevo con otras palabras clave.</h3>

    			<?php endif; ?>

            </div><!-- / col 12 -->
        </div><!-- / col 12 -->
    </div><!-- / row -->
</section>

<?php get_footer(); ?>
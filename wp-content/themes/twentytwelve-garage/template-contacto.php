<?php
/*
Template Name: Contacto
*/ 
?>  

<?php get_header(); ?>

  <section id="main-content">

    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12">

        <div class="title-sidebar">
            PRODUCTORES EJECUTIVOS
          </div><!-- / title sidebar -->

          <span class="line"></span>

        </div><!-- / col md 12 -->
      </div><!-- / col md 12 -->  
      <br><br>
      <div class="col-md-12 directores-page">

        <div class="col-md-4 col-sm-4">
          <div class="director">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/01-osvaldo-chaves.jpg" class="img-responsive" />
            <div class="hl-hover">
              <div class="hl-bg"></div>
              <div class="excerpt">
              <h3>Osvaldo Chaves</h3>
              <h4>2556-1416/17</h4>
              <a  href="mailto:osvaldo@garage-films.com">osvaldo@garage-films.com</a>
              </div> 
            </div>
          </div><!-- / director -->
        </div><!-- / col 4 -->

        <div class="col-md-4 col-sm-4">
          <div class="director">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/02-max-chaves.jpg" class="img-responsive" />
            <div class="hl-hover">
              <div class="hl-bg"></div>
              <div class="excerpt">
              <h3>Max Chaves</h3>
              <h4>2556-1416/17</h4>
              <a  href="mailto:max@garage-films.com">max@garage-films.com</a>
              </div> 
            </div>
          </div><!-- / director -->
        </div><!-- / col 4 -->

        <div class="col-md-4 col-sm-4">
          <div class="director">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/03-monica-granados.jpg" class="img-responsive" />
            <div class="hl-hover">
              <div class="hl-bg"></div>
              <div class="excerpt">
              <h3>Mónica Granados</h3>
              <h4>2556-1416/17</h4>
              <a  href="mailto:monica@garage-films.com">monica@garage-films.com</a>
              </div> 
            </div>
          </div><!-- / director -->
        </div><!-- / col 4 -->

      </div><!-- / directores -->
    </div><!-- / row -->
    
    <div class="row">

          <div id="info-post">

            <div class="col-md-6">
              <div class="title-sidebar">
                  Datos Contacto
                </div><!-- / title sidebar -->

                <span class="line"></span>

                <ul class="datos">
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ubicacion.jpg">Av. La Capilla 216, 503 San Benito, San Salvador, El Salvador </li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/tel.jpg">2556-1416/17 </li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mail.jpg"><a href="mailto:info@garage-films.com">info@garage-films.com</a></li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter.jpg"><a target="_blank" href="https://twitter.com/grgfilms">twitter.com/grgfilms</a></li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook.jpg"><a target="_blank" href="https://www.facebook.com/GRGfilms">www.facebook.com/GRGfilms</a></li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/instagram.jpg"><a target="_blank" href="http://instagram.com/grgfilms">instagram.com/grgfilms</a></li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/vimeo.jpg"><a target="_blank" href="http://vimeo.com/garagefilmselsalvador">vimeo.com/garagefilmselsalvador</a></li>
                  <li><img src="<?php bloginfo('stylesheet_directory'); ?>/images/youtube.jpg"><a target="_blank" href="https://www.youtube.com/channel/UC3RQWXhp--8_I3M0oS10fNg">youtube.com/user/GRGfilms</a></li>
                  
                </ul>

            </div><!-- / col 6 -->

            <div class="col-md-6">
              <div class="title-sidebar">
                  Formulario
                </div><!-- / title sidebar -->
                <span class="line"></span>

                <?php echo do_shortcode('[contact-form-7 id="91" title="Formulario de contacto 1"]'); ?>

            </div><!-- / col 6 -->

          </div><!-- / info post -->

        </div><!-- / row --> 

  </section>

  <section id="mapa">
    <div class="row">
      <div class="col-md-12">
        <div class="mapa-title"><div class="inner">LOCALÍZANOS</div></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.5148867561575!2d-89.24155439999994!3d13.687236199999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6330294e7fc2b1%3A0xa31ef80313f48d3b!2sAvenida+La+Capilla!5e0!3m2!1ses!2sar!4v1399919978875" width="100%" height="350" frameborder="0" style="border:0"></iframe>
      </div><!-- / col 12 -->
    </div><!-- / row -->
  </section>

<?php get_footer(); ?>
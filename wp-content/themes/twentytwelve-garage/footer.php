<footer>
        <div class="col-md-8 col-sm-7" id="menu-ft">
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </div><!-- / col 8 -->
        <div class="col-md-4 col-sm-5" id="text-ft">
          Todos los derechos reservados &nbsp;&nbsp;Garage Films &nbsp;&nbsp;2014
        </div><!-- / col 4 -->
      </footer>

    </div><!-- /container -->
    <?php
    $time = time();
    ?>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.cycle.all.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/garage.js?time=<?php echo $time; ?>>"></script>

    <?php wp_footer(); ?>



    <style>body{opacity: 1;}</style>

  </body>
</html>
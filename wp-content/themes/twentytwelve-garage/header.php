<?php
/**
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <!-- Bootstrap core CSS -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.css" rel="stylesheet">

    <?php
    $time2 = time();
    ?>

    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_directory'); ?>/style.css?time2=<?php echo $time2; ?>>" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>body{opacity: 0;}</style>

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

    <div class="container">

      <header>

        <div class="navbar navbar-top" role="navigation">
          <div class="navbar-header">
            <a class="navbar-brand logo hidden-xs" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo1-garage-films.jpg" title="Garage Films" alt="Logo Garage"></a>
            <a class="navbar-brand logo2" href="<?php bloginfo('url'); ?>"><img class="hidden-xs" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo2-garage-films.png" title="Garage Films" alt="Logo Garage"><img class="visible-xs center-block" src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-mobile.png" title="Garage Films" alt="Logo Garage"></a>
          </div>
          <div class="top-navigation pull-right hidden-sm hidden-xs">
            <ul class="languages pull-left">
              <li class="login"><a href="ftp://direct.garage-films.com">Login</a></li>
              <li><a class="active" href="<?php bloginfo('url'); ?>">Espa&ntilde;ol</a></li>  |
              <li class="langs"><a href="<?php bloginfo('url'); ?>">Inglés</a><span>Próximamente!</span></li>
            </ul>
            <ul class="socials pull-right">
              <li><a class="vimeo-bt" target="_blank" href="http://vimeo.com/garagefilmselsalvador"></a></li>
              <li><a class="youtube-bt" target="_blank" href="https://www.youtube.com/channel/UC3RQWXhp--8_I3M0oS10fNg"></a></li>
              <li><a class="instagram-bt" target="_blank" href="http://instagram.com/grgfilms"></a></li>
              <li><a class="facebook-bt" target="_blank" href="https://www.facebook.com/GRGfilms"></a></li>
              <li><a class="twitter-bt" target="_blank" href="https://twitter.com/grgfilms"></a></li>
            </ul>
          </div>
        </div>

        <div class="navbar navbar-inverse" role="navigation">
          <div class="navbar-header">
            <form method="get" id="searchform" action="" class="pull-right visible-xs">
                <label for="s" class="assistive-text"></label>
                <input type="text" class="field" name="s" id="s" placeholder="Search...">
                <input type="submit" class="submit" name="submit" id="searchsubmit" value="">
            </form>
            <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              MENU
            </button>
          </div>
          <div class="collapse navbar-collapse">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav navbar-nav' ) ); ?>
            <?php /*<ul class="nav navbar-nav">
              <li class="active"><a href="#">Home</a></li>
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Directores</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Director 1</a></li>
                  <li><a href="#">Director 2</a></li>
                  <li><a href="#">Director 3</a></li>
                </ul>
              </li>
              <li><a href="#about">Contenido</a></li>
              <li><a href="#about">Nosotros</a></li>
              <li><a href="#contact">Contacto</a></li>
            </ul> */ ?>
            <form method="get" id="searchform" action="" class="pull-right hidden-xs">
                <label for="s" class="assistive-text"></label>
                <input type="text" class="field" name="s" id="s" placeholder="Search...">
                <input type="submit" class="submit" name="submit" id="searchsubmit" value="">
            </form>
          </div><!--/nav-collapse -->
        </div>

      </header>
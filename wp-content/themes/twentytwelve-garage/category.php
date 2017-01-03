<?php get_header(); ?>

    <section id="main-content">
    <div class="row">
      <div class="col-md-12">

        <?php global $post; ?>
        <?php $args = array( 'numberposts' => 1, 'orderby' => 'post_date', 'category' => $cat );
        $postslist = get_posts( $args );
        
            foreach ($postslist as $post) :  setup_postdata($post); ?>

            <?php $postid = $post->ID; ?>

        <div class="video-nav">
          <?php if(get_adjacent_post(true, $cats, true)) { ?>
          <a href="<?php echo get_permalink(get_adjacent_post(true,'',true)); ?>"><div class="prev"></div></a>
          <?php }
          else { /*do nothing*/ } ; ?>

          <?php if(get_adjacent_post(false, $cats, false)) { ?>
          <a href="<?php echo get_permalink(get_adjacent_post(true,'',false)); ?>"><div class="next"></div></a>
          <?php }
          else { /*do nothing*/ } ; ?>
          <?php $vimeo = get_post_meta( $post->ID , 'vimeo_value_key', true ); ?>
        </div><!-- / video nav -->
        <div id="vimeo-preview"> <a href=""><?php the_post_thumbnail('preview-video', array('class' => 'img-responsive')); ?>
          <div class="preview-hover"></div>
          </a> </div>
        <div id="vimeo-video">
          <div class="js-video [vimeo, widescreen]">
            <iframe id="bgiframe" src="http://player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&byline=0&portrait=0&color=ffcc00&api=1&player_id=bgiframe" width="100%" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
          </div>
          <!-- / js-video -->
        </div>
        <!-- / video vimeo -->
      </div>
      <!-- / col 12 -->
    </div>
    <!-- / row -->
    <div class="row">
      <div class="col-md-12">
        <div id="info-post">
          <div class="share">Compartir:</> </div>
          <h2><?php the_title(); ?></h2>
          <div class="content-post">
            <p><?php the_content(); ?></p>
          </div>
          <!-- / content post -->
          <div class="action-post"> <a href="" class="pull-left show-comments" title="">VER COMENTARIOS</a> <a href="" class="pull-right show-form-comments" title="">COMENTAR</a> </div>
          <!-- / actions post -->
          <div id="comments-container" class=""> <?php comments_template(); ?>  </div>
          <!-- / comments -->
          <div id="comments-form-container">
              <?php $args = array(
              'id_form'           => 'commentform',
              'id_submit'         => 'submit',
              'title_reply'       => __( 'Leave a Reply' ),
              'title_reply_to'    => __( 'Leave a Reply to %s' ),
              'cancel_reply_link' => __( 'Cancel Reply' ),
              'label_submit'      => __( 'Post Comment' ),

              'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
                '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
                '</textarea></p>',

              'must_log_in' => '<p class="must-log-in">' .
                sprintf(
                  __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
                  wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                ) . '</p>',

              'logged_in_as' => '<p class="logged-in-as">' .
                sprintf(
                __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
                  admin_url( 'profile.php' ),
                  $user_identity,
                  wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                ) . '</p>',

              'comment_notes_before' => '<p class="comment-notes">' .
                __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
                '</p>',

              'comment_notes_after' => '<p class="form-allowed-tags">' .
                sprintf(
                  __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
                  ' <code>' . allowed_tags() . '</code>'
                ) . '</p>',

              'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                  '<p class="comment-form-author">' .
                  '<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
                  ( $req ? '<span class="required">*</span>' : '' ) .
                  '<input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                  '" size="30"' . $aria_req . ' /></p>',

                'email' =>
                  '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                  ( $req ? '<span class="required">*</span>' : '' ) .
                  '<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                  '" size="30"' . $aria_req . ' /></p>',

                'url' =>
                  '<p class="comment-form-url"><label for="url">' .
                  __( 'Website', 'domainreference' ) . '</label>' .
                  '<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                  '" size="30" /></p>'
                )
              ),
            );
            ?>

            <?php comment_form( $args ); ?> 
          </div><!-- / comments container -->
        </div><!-- / info post -->

        <?php endforeach; ?>

      </div><!-- / col 12 -->
    </div><!-- / row -->
  </section>
  <section id="old-posts" class="olds">
    <div class="row top-posts">
      <div class="col-md-4">
        <div class="title-sidebar"> <?php single_cat_title( '', true ); ?> > Videos</div>
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
    <?php $args = array( 'numberposts' => 20, 'orderby' => 'post_date', 'category' => $cat_id, 'post__not_in' => array($postid) );
    $postslist = get_posts( $args );
    
    foreach ($postslist as $post) :  setup_postdata($post); ?>

    <div class="row video-container post">
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

        <div class="date">MAR 10 , 2014</div>
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
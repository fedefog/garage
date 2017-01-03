<?php get_header(); ?>

	<section id="main-content">
    <div class="row">
      <div class="col-md-12">

        <?php if (have_posts()) : ?>
            
        <?php while (have_posts()) : the_post(); ?>

        <div class="video-nav">
          <a href="<?php echo get_permalink(get_adjacent_post(false,'',true)); ?>"><div class="prev"></div></a>
          <a href="<?php echo get_permalink(get_adjacent_post(false,'',false)); ?>"><div class="next"></div></a>
        </div><!-- / video nav -->
        <div id="hl"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></div>
      </div><!-- / col 12 -->
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
          <div id="comments-container" class=""> <?php comments_template( '', true ); ?> </div>
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

        <?php endwhile; ?>
            
        <?php endif; ?>

      </div><!-- / col 12 -->
    </div><!-- / row -->
  </section>
  <section id="old-posts" class="olds">
    <div class="row top-posts">
      <div class="col-md-4">
        <div class="title-sidebar">Highlights Anteriores</div>
        <!-- / title sidebar -->
        <span class="line"></span> </div>
      <!-- / col md -->
      <div class="col-md-8"><span class="line"></span></div>
    </div>
    <!-- / row -->

    <?php   global $post;
    $current_post = $post; // remember the current post

    for($i = 1; $i <= 10; $i++):
    $post = get_previous_post(); // this uses $post->ID
    setup_postdata($post);

    ?>

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
        <a class="read-more" href="<?php the_permalink(); ?>" title="LEER MAS">LEER MAS</a> </div>
      <!-- / col md 8 -->
    </div>
    <!-- / row -->

    <?php endfor;
    $post = $current_post; 

    ?>

  </section>

<?php get_footer(); ?>
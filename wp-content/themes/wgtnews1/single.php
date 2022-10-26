<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header(); ?>


<div id="page" class="site">
  <div id="content" class="site-content">
		<div class="container">
        <div class="row">
          <!-- Single post Section ~~~~~~~~~~~~~~~ -->
          <div class="col-md-8 col-12">
            <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

    <header id="masthead" class="single-file <?php echo is_singular() && twentynineteen_can_show_post_thumbnail() ? 'site-header featured-image' : 'site-header'; ?>">

      <!-- .site-branding-container -->

      <?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
        <div class="site-featured-image">
          <?php
            twentynineteen_post_thumbnail('small');
            the_post();
            $discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

            $classes = 'entry-header';
          if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
            $classes = 'entry-header has-discussion';
          }
          ?>
          <div class="<?php echo $classes; ?>">
            <?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
          </div><!-- .entry-header -->
          <?php rewind_posts(); ?>
        </div>
      <?php endif; ?>
    </header><!-- #masthead -->

            <div id="primary" class="content-area">
              <main id="main" class="site-main">

                <?php

                // Start the Loop.
                while ( have_posts() ) : the_post();
                  get_template_part( 'template-parts/content/content', 'single' );

                  if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation(
                      array(
                        /* translators: %s: Parent post link. */
                        'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
                      )
                    );
                  } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation(
                      array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'twentynineteen' ) . '</span> ' .
                          '<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
                          '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'twentynineteen' ) . '</span> ' .
                          '<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
                          '<span class="post-title">%title</span>',
                      )
                    );
                  }

                  // If comments are open or we have at least one comment, load up the comment template.
                  if ( comments_open() || get_comments_number() ) {
                    comments_template();
                  }

                endwhile; // End the loop.

                
                ?>

            
              </main><!-- #main -->
            </div><!-- #primary -->
          </div>

<!-- Right sidebar Section ~~~~~~~~~~~~~~~ -->

          <div class="col-md-4 col-12 add_section">
             <?php
                if ( is_active_sidebar( 'gallery-add-section' ) ) { ?>
         	 			<div class="widget-column footer-widget-1">
         	 			  <?php dynamic_sidebar( 'gallery-add-section' ); ?>
             		</div>
           <?php } ?>
          </div>
        </div>
      </div>
  </div>
</div>

<?php get_footer();

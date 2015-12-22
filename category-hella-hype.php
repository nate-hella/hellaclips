<?php
/**
 * 
 * HellaHype category template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */

get_header(); ?>

<div class="container home-media">
  <?php echo do_shortcode( "[metaslider id=67141]" ); ?>
</div>

<div id="main" class="container">
  <div class="row">

    <?php if ( have_posts() ) : ?>

    <div class="page col-md-8">

      <div class="row">
        <div class="col-md-6">
          <h1 class="hc-lead font-size-big font-weight-bold">Latest From Hella Hype</h1>
        </div>

      </div>

      <ul class="row list-inline">

         <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args= array(
          'category_name' => 'Hella Hype',
          'paged' => $paged
      );
      query_posts($args);
        while ( have_posts() ) : the_post();  ?>

          <li class="hh-entry col-md-12" id="post-<?php the_ID(); ?>">
            <a class="col-md-5" href="<?php the_permalink(); ?>" target="_top" title="<?php the_title(); ?>">

              <figure class="hh-media-figure">
                <?php // Post thumb

                  if ( '' != get_the_post_thumbnail( ) ) :
                    the_post_thumbnail( '', array('class' => 'img-responsive') );
                  else :
                    $og_cdn_img = get_post_meta( get_the_ID( ), 'original_thumbnail', true );

                    // Check if the custom field has a value
                    if( ! empty( $og_cdn_img ) ) {
                      echo '<img class="img-responsive" src="http://c767450.r50.cf2.rackcdn.com/img/video_thumbs/' . $og_cdn_img . '" />';
                    }
                  endif;

                ?>
              </figure>
            </a>
            <figure class="col-md-7">

            <!-- Title -->
              <a href="<?php the_permalink(); ?>" target="_top" title="<?php the_title(); ?>">
                <h2 class="entry-title font-size-medium font-weight-bold">
                  <?php // Trim title
                    $title = the_title('', '', false);
                    $newtitle = ( strlen( $title ) > 40 ? substr( $title, 0, 40 ) : $title );
                    echo $newtitle;
                  ?>
                </h2>
              </a>

              <!-- Meta -->
              <span class="label label-default"><a href="<?php the_permalink(); ?>#respond" title="<?php the_title(); ?>" target="_top">Comment</a></span>
              <i class="fa fa-clock-o"></i> <?php the_date(); ?>

              <!-- Excerpt -->
              <p class="entry-excerpt font-weight-regular">
                <?php // Trim excerpt
                  $excerpt = get_the_excerpt();
                  $trimmed = ( strlen( $excerpt ) > 390 ? substr( $excerpt, 0, 390 ) . '...' : $excerpt );
                  echo ucfirst( $trimmed );
                ?>
              </p>
            </figure>
          </li>

        <?php endwhile; ?>

      </ul>
      <!-- Hellahype email us link -->
      

      <!-- Pagination -->
     <div class="col-md-12">

          <div class="pull-left font-weight-medium font-size-medium prev-page"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i> Newer' ); ?></div>
          <div class="pull-left font-weight-medium font-size-medium next-page"><?php next_posts_link( 'Older <i class="fa fa-chevron-right"></i>' ); ?></div>

      </div>

    </div> <!-- .page -->

    <?php else : ?>

      <article class="page col-md-8 not-found">
        <div class="entry">
          <p class="lead"><?php _e('Sorry, this page does not exist. Try searching for one.'); ?></p>
          <?php get_search_form(); ?>
        </div>
      </article>

    <?php endif; ?>

    <aside class="sidebar col-md-4">
      <div id="ad-content-sidebar">
        <script type='text/javascript'>
          GA_googleFillSlot("marquee_banner");
        </script>
      </div>

      <div class="hc-widget hc-widget-light clearfix">
        <h1 class="hc-lead font-size-big font-weight-bold">Latest On HellaHype</h1>
        
        <?php // Recent posts - Num posts, Cat ID
            get_recent_posts( 10, 6 );
          ?>
      </div>

      <?php // Hella Hype sidebar
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("hellahype") ) :
          get_sidebar( 'hellahype' );
        endif;
      ?>

      <div id="ad-content-sidebar">
        <script type='text/javascript'>
          GA_googleFillSlot("Vid_Page_Right");
        </script>
      </div>
      <div id="ad-content-sidebar col-md-4">
      <h3>
      Have a suggestion, product, or brand you want featured on Hellahype? <a href="mailto:hellahype@hellaclips.com?subject=HellaHype Inquiry"><i class="fa fa-paper-plane"></i> Drop us a line</a> 
      </h3></div>
    </aside>

  </div> <!-- .row -->
</div> <!-- #main -->

<?php
get_footer();

<?php
/*
Template Name: User Submitted
*/
get_header(); ?>

<div id="page-header">
  <div class="container">
    <h1 class="submit-title font-size-jumbo font-weight-light"><i class="fa fa-user"></i><i class="fa fa-long-arrow-up"></i> User Submitted Videos</h1>
  </div>
</div>


<div id="main" class="container">
  <div class="row">
  <?php query_posts('posts_per_page=5');
        $the_query = new WP_Query( array( 'author__not_in' => array( 1, 2, 3, 4, 20459 ), 'posts_per_page'=> '20', ) ); 
        if ( $the_query->have_posts() ) : ?>

    <div class="page col-md-12">
       <div class="row">
        <div class="col-md-6">
          <h1 class="hc-lead font-size-big font-weight-bold">Latest On Hellaclips</h1>
        </div>
        <div class="hc-lead-links col-md-6 text-right">
          <a class="font-size-medium font-weight-light" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Hellaclips Home" target="_top"><i class="fa fa-home"></i> Home</a>
          <!-- <a class="font-size-medium font-weight-light" href="<?php echo esc_url( get_category_link( 9 ) ); ?>" title="View All Articles" target="_top"><i class="fa fa-external-link-square"></i> Articles</a> -->
        </div>
      </div>

      <ul class="clearfix list-inline">

          <?php 
              while ($the_query->have_posts() ) : $the_query->the_post();  ?>

          <li class="entry col-xs-6 col-sm-3 col-md-3" id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink(); ?>" target="_top" title="<?php the_title(); ?>">
              <figure class="media-figure">

                <?php // Post thumbnail

                  if ( '' != get_the_post_thumbnail( ) ) {
                    the_post_thumbnail( 'medium', array('class' => 'img-responsive') );
                  } else {
                    $og_cdn_img = get_post_meta( get_the_ID( ), 'original_thumbnail', true );

                    // If custom field has value, use the CDN img
                    if( ! empty( $og_cdn_img ) ) {
                      echo '<img class="img-responsive" src="http://c767450.r50.cf2.rackcdn.com/img/video_thumbs/' . $og_cdn_img . '" />';
                    }
                  }

                ?>

                <div class="post-type font-weight-bold">
                  <i class="fa fa-play"></i>
                </div>

                <div class="views-count font-weight-bold">
                   <i class="fa fa-video-camera"></i> <?php the_author();?>
                </div>

              </figure>
              <figure class="media-body">

                <h2 class="entry-title font-size-medium font-weight-bold">
                  <?php // Trim title
                    $title = the_title('', '', false);
                    $newtitle = ( strlen( $title ) > 40 ? substr( $title, 0, 40 ) : $title );
                    echo $newtitle;
                  ?>
                </h2>
                <p class="entry-excerpt font-weight-regular">
                  <?php // Trim excerpt
                    $excerpt = get_the_excerpt();
                    if($excerpt != ''){
                      $trimmed = ( strlen( $excerpt ) > 55 ? substr( $excerpt, 0, 55 ) . '...' : $excerpt );
                      echo strip_tags(ucfirst( $trimmed ));
                    } else {
                      echo '...';
                    }
                  ?>
                </p>

              </figure>
            </a>
          </li>

        <?php endwhile; ?>

      </ul>

      <!-- Pagination -->
      <div class="col-md-12">
        <div class="row">
          <div class="pull-left font-weight-medium font-size-medium prev-page"><?php previous_posts_link( '<i class="fa fa-chevron-left"></i> Newer' ); ?></div>
          <div class="pull-left font-weight-medium font-size-medium next-page"><?php next_posts_link( 'Older <i class="fa fa-chevron-right"></i>' ); ?></div>
        </div>
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

  </div> <!-- .row -->
</div> <!-- #main -->
<?php
get_footer();

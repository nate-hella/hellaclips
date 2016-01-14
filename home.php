<?php
/**
 * Home page template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */
add_action('template_redirect', 'pbd_alp_init');
get_header(); 
$postnum = 0;
 ?>

  <div id="main" class="container">
  <div class="row">
  <?php echo '<div class="col-md-12" style="padding: 15px 15px 0 15px">' . do_shortcode("[metaslider id=12]") . '</div>' ?>
  <div id="owl-demo" class="owl-carousel col-md-12">
    <?php 
      $custom_query_args = array(
      'post_type'  => 'post',
      'meta_key'   => '_is_ns_featured_post',
      'meta_value' => 'yes',
      );
        $custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $custom_query = new WP_Query( $custom_query_args ); 

        // Pagination fix
          global $wp_query;
          $temp_query = $wp_query;
          $wp_query   = NULL;
          $wp_query   = $custom_query;
  
        if ( $custom_query->have_posts() ) : 
        while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

          <div class="slide"><a href="<?php the_permalink(); ?>"><div class="slidewrapper"></div><?php the_post_thumbnail( 'large' ); ?></i></a></div>
          <?php endwhile; 
                endif;
  
        // Reset postdata
          wp_reset_postdata();

        // Reset main query object
          $wp_query = NULL;
          $wp_query = $temp_query;
    ?>
    <script type="text/javascript">
   
    jQuery(document).ready(function($) {
    $("#owl-demo").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,  
      paginationSpeed : 400,
      items : 2,
      lazyLoad : true,
      itemsDesktop: false,
      itemsDesktopSmall : [900,2],
      itemsTablet: [600,1],
      itemsMobile : [479,2],
    })
    });
    </script>
  </div> <!-- end .owl -->

<div class="row col-md-12" style="margin-left:auto; margin-right:auto; padding:40px 0; ">
<div id='div-gpt-ad-1414776939914-0'style='width:900px; height:350px; margin-left:auto; margin-right:auto;'>
<script type='text/javascript'>
          googletag.cmd.push(function() {
          var slot1 = googletag.defineSlot("/3274935/Front_1_Big", [900, 350],
          "div-gpt-ad-1414776939914-0").addService(googletag.pubads()); 
          googletag.enableServices(); 
          googletag.display('div-gpt-ad-1414776939914-0');
          setInterval(function(){googletag.pubads().refresh([slot1]);}, 15000);
          });
</script>
</div>
</div>




  <div class="page col-md-12">
    <h1 class="hc-lead font-size-big font-weight-bold">Latest On Hellaclips</h1>
    <?php if ( have_posts() ) : ?>
      <ul class="clearfix list-inline">

      <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $args= array(
          'posts_per_page' => 15,
          'paged' => $paged
      );
      query_posts($args);
      while ( have_posts() ) : the_post();  ?> 

      

          
      <li class="col-lg-4 col-md-4 col-xs-6 thumb" id="post-<?php the_ID(); ?>">
          <?php // Generate post link
                  $link = get_the_permalink();
                  $target = '_top';
              ?>
        <div class="thumbnail">
          <div class="thumb-wrapper">
              <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" title="<?php the_title(); ?>">
              
                <div class="img-overlay">
                  <p class="entry-excerpt font-weight-regular hidden-xs">
                     <?php
                      $excerpt = wp_trim_excerpt();
                      echo string_limit_words($excerpt,35);
                    ?>
                  </p>
                </div>

                <?php // Post thumbnail
                if (has_post_thumbnail()){
                    the_post_thumbnail( 'medium', array('class' => 'img-responsive') );
                  } else {
                    $og_cdn_img = get_post_meta( get_the_ID( ), 'original_thumbnail', true );

                    // If custom field has value, use the CDN img
                    if ( ! empty( $og_cdn_img ) ) {
                      echo '<img class="img-responsive" src="http://c767450.r50.cf2.rackcdn.com/img/video_thumbs/' . $og_cdn_img . '" />';
                    }}
                ?></a>

                <?php if( in_category('video') ) { ?>
                  <div class="post-type font-weight-bold">
                    <i class="fa fa-play"></i>
                  </div>

                <?php } elseif( in_category('Hella Hype') ) { ?>
                  <div class="post-type font-weight-bold">
                    <i class="fa fa-tag"></i>
                  </div>
                <?php } else{
                    echo '';
                  } ?>
                  </a>
               
            </div>
            <div class="caption">
                 <a href="<?php echo $link; ?>" target="<?php echo $target; ?>" title="<?php the_title(); ?>">
                <h2 class="entry-title font-size-medium font-weight-bold">
                 <?php // Trim title
                    $title = the_title('', '', false);
                    $newtitle = ( strlen( $title ) > 90 ? substr( $title, 0, 90 ) : $title );
                    $allowedlimit = 85;
                      if(mb_strlen($title)>$allowedlimit){
                         echo mb_substr($title,0,$allowedlimit)."...";
                      }else{
                        echo $newtitle;
                      }
                  ?>
                </h2>
                </a>
            </div>
            </div>
          </li> 

        <?php $postnum++; if($postnum%5 == 0) { ?>
        <li class="col-lg-4 col-md-4 col-xs-6 thumb" id="post-<?php the_ID(); ?>">
        <div class="thumbnail">
        <div id='div-gpt-ad-1423004883652-0' style='width:300px; height:250px; margin-left:auto; margin-right:auto;'>
             <script type='text/javascript'>
               googletag.cmd.push(function() {
               var slot1 = googletag.defineSlot("/3274935/marquee_banner", [300, 250],
               "div-gpt-ad-1423004883652-0").addService(googletag.pubads()); 
               googletag.enableServices(); 
               googletag.display('div-gpt-ad-1423004883652-0');
               setInterval(function(){googletag.pubads().refresh([slot1]);}, 15000);
               });
            </script>
          </div>
        </div>
        </li>
      <?php } 
      if($postnum%8 == 0) { ?>
      <div id"" class="col-md-12">
      <div id='div-gpt-ad-1413313083987-0' style='width:728px; height:90px; margin-left:auto; margin-right:auto; margin-bottom: 20px;'>
        <script type='text/javascript'>
            googletag.cmd.push(function() {
              var slot1 = googletag.defineSlot("/3274935/Front_1", [728, 90],
              "div-gpt-ad-1413313083987-0").addService(googletag.pubads()); 
              googletag.enableServices(); 
              googletag.display('div-gpt-ad-1413313083987-0');
              setInterval(function(){googletag.pubads().refresh([slot1]);}, 15000);
          });
        </script>
      </div>
      </div>
      <?php
      }
      endwhile; 
      echo do_shortcode('[ajax_load_more posts_per_page="6"]');
      ?>            
      </ul>

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
 
</div> <!-- .row-off-canvas -->
<?php get_footer(); ?>
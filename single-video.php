<?php
/**
 * Single video page template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
  
  

        <div id="page-header"><div id="theater" class="container media" > 
          <div class="row">
            <figure id="video-wrapper" class="col-md-8">
            <div id="dim-lights-button">
                    Dim the lights
                </div>
              <?php // Grab video and parse data
                $url = get_post_meta( get_the_ID(), 'video_url', true );
                $embed_code = wp_oembed_get( $url );
                if( !$embed_code ) {
                  echo $url;
                } else {
                  echo $embed_code;
                } ?>
            </figure> <!-- .video-wrapper -->

            <div id="sidekick" class="col-md-4 hidden-sm hidden-xs">
                <?php
                  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidekick") ) :
                    get_sidebar( 'Sidekick' );
                  endif;
                ?>
            </div><!-- .sidekick -->
            

        </div><!-- .row -->
        </div><!-- .media -->
  </div> <!-- #page-header -->
<div class="container-fluid" style="position: relative;z-index: 200;">
    <div id="ad-content-start" class="container hidden-xs" style="background: black; display:none;">
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
  </div>
  
  <div id="main" class="container">
    <div class="row">


      <article id="video-wrapper" class="page col-md-8">
        <div class="col-md-12">

          <!-- Title -->
          <div class="row">
            <h2 class="title font-weight-bold"><?php the_title(); ?>
          </div>

          <!-- Post meta -->
          <div class="row">
            <div class="post-meta pull-left">
              <i class="fa fa-calendar-o"></i> <?php the_date(); ?>
            </div>
            <span class="label label-default"><a style="color: #222222" href="#respond" title="" target="_top">Comment</a></span>
          <!-- display view count if user submitted -->  
          <?php
              /** 
              $author_id = $post->post_author;
              if ($author_id > 10) { ?>
                  <div class="post-meta pull-left">
                  <i class="fa fa-eye"></i> <?php echo get_post_views();?>
                  </div> 
            <?php } 
            */
            ?> 
          <!-- Description -->
          <div class="row">
            <div class="description font-weight-light">
              <?php the_content(); ?>
            </div>
            <div class="clearfix">
              <?php echo do_shortcode("[ultimatesocial_facebook][ultimatesocial_twitter][ultimatesocial_google]"); ?>
            </div>
          </div>
          <div class="row related-posts">
            <?php wp_related_posts(); ?>
          </div>

          <!-- Comments -->
          <div id="respond" class="discussion row">
            <h1 class="hc-lead font-size-big font-weight-bold">Discussion</h1>
          </div>
          <div class="row">
           <fb:comments color-scheme="dark" data-numposts="5"  width="600" ></fb:comments>
          </div>

        </div>
      </article> <!-- .page -->


      <aside class="sidebar col-md-4">
        <div id="ad-content-sidebar">
          <script type='text/javascript'>
            GA_googleFillSlot("marquee_banner");
          </script>
        </div>

        <div class="hc-widget hc-widget-light clearfix">
          <h1 class="hc-lead font-size-big font-weight-bold">Recently Added</h1>
          
          <?php // Recent posts - Num posts, Cat ID
            get_recent_posts( 10, 4 );
          ?>
        </div>

        <?php // Single sidebar

          if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single") ) :
            get_sidebar( 'Single' );
          endif;
        ?>
        <div id="ad-content-sidebar">
          <script type='text/javascript'>
            GA_googleFillSlot("Vid_Page_Right");
          </script>
        </div>
      </aside> <!-- sidebar -->


    </div> <!-- .row -->
  </div> <!-- #main -->

<?php
endwhile;
endif;
<?php
/**
 * Single video page template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */

if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="container hh-single-top">

    <?php if ( has_post_format( 'gallery' ) ) { ?>

      <!-- Slider -->
      <div class="flexslider">
        <?php  $gallery = get_post_gallery();
                echo $gallery;?>
      </div>

    <?php } elseif ( has_post_format( 'image' ) ) { ?>

      <!-- Single Image -->
      <?php if ( has_post_thumbnail( ) ) { ?>

      <div class="container">
        <div class="row">
          <?php the_post_thumbnail( 'large', array( 'class' => "img-responsive" ) ); ?>
        </div>
      </div>

      <?php } // Post thunb ?>
    <?php } // Post format ?>  
  </div> <!-- .hh-single-top -->


  <!--<div id="ad-content-start" class="container hidden-xs">
     <script type='text/javascript'>
       GA_googleFillSlot("Front_1");
     </script>
</div>-->

  <div id="main" class="container">
    <div class="row">


      <article id="video-wrapper" class="page col-md-8">
        <div class="col-md-12">
        
          <!-- Title -->
          <div class="row">
            <h2 class="title font-weight-bold"><?php the_title(); ?></h2>
          </div>

          <!-- Post meta -->
          <div class="row">
            <div class="post-meta pull-left">
              <i class="fa fa-calendar-o"></i> <?php the_date(); ?>
            </div>
          </div>
          <div class="clearfix"> 
          <div class="row">
          <?php echo do_shortcode("[ultimatesocial_facebook][ultimatesocial_twitter][ultimatesocial_google]"); ?>
          </div>
          <!-- Description -->
         
            <div class="description font-weight-light">

              <?php // Remove gallery from description
                $content = strip_shortcode_gallery( get_the_content() );                                        
                $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) ); 
                echo $content;
              ?>
          </div>
          </div>
          <div class="clearfix">
          <?php echo do_shortcode("[ultimatesocial_facebook][ultimatesocial_twitter][ultimatesocial_google]"); ?>
          </div>
          <!-- Comments -->
          <div id="respond" class="discussion row">
            <h1 class="hc-lead font-size-big font-weight-bold">Discussion</h1>
          </div>
          <div class="col-md-12">
            <?php comments_template(); ?>
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
          <h1 class="hc-lead font-size-big font-weight-bold">More On Hella Hype</h1>
          
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
      </aside> <!-- sidebar -->


    </div> <!-- .row -->
  </div> <!-- #main -->

<?php
endwhile;
endif;
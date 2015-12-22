<?php
/**
 * Single gallery page template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */
?>
<div class="container-fluid" style="margin-top: 140px; position: relative;z-index: 200;">
    <div id="ad-content-start" class="container hidden-xs" style="background: black;">
      <button type="button" class="close home" data-dismiss="alert" ><i class="fa fa-times fa-2x"></i></button>
      <script type='text/javascript'>
           $('.close').on("click", function () {
         $(this).parents('div.ad-content-start').fadeOut();
       });
      </script>

      <div id='div-gpt-ad-1414776939914-0'style='width:900px; height:350px; margin-left:auto; margin-right:auto; '>
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

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php if ( has_post_format( 'gallery' ) ) { ?>

      <!-- Slider -->
      <div class="flexslider">
        <?php echo do_shortcode('[gallery]'); ?>
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
          <div id="gallery" class="heading">
            
          	<div class="title-and-meta">
            	<!-- Title -->
           		<div class="row">
            		<h2 class="title font-weight-bold"><?php the_title(); ?></h2>
           		</div>
         
         		<!-- Post meta -->
              	<div class="post-meta pull-left">
              	By: <?php echo get_the_author_link(); ?>
              	</div>
              	<div class="post-meta pull-left">
                	<i class="fa fa-calendar-o"></i> <?php the_date(); ?>
              	</div>
              	<div class="post-meta pull-left">
              		<i class="fa fa-eye"></i> <?php echo get_post_views(); ?>
            	</div>  
            </div><!-- end title-and-meta-->
           
            <?php if (has_post_thumbnail()): the_post_thumbnail('full');
            endif; ?>
        </div><!-- End heading -->

         <!-- Description -->
          <div class="row">
            <div class="description font-weight-light">
              <?php the_content(); ?>
            </div>
            <div class="clearfix">
              <?php echo do_shortcode("[ultimatesocial_facebook][ultimatesocial_twitter][ultimatesocial_google]"); ?>
            </div>
          </div>

          <!-- Comments -->
          <div id="respond" class="discussion row">
            <h1 class="hc-lead font-size-big font-weight-bold">Discussion</h1>
          </div>
          <div class="row">
            <?php comments_template(); ?>
          </div>

        </div>
      </article> <!-- .page -->

      <aside id="gallery" class="sidebar col-md-4">
        <div id="ad-content-sidebar">
          <script type='text/javascript'>
            GA_googleFillSlot("marquee_banner");
          </script>
        </div>

        <div class="hc-widget hc-widget-light clearfix">
          <h1 class="hc-lead font-size-big font-weight-bold">More Photo Galleries</h1>
          
          <?php // Recent posts - Num posts, Cat ID
            get_recent_posts( 10, 20);
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
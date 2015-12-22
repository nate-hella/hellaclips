<?php
/**
 * Template Name: Submit
 * Submit page template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */

get_header(); ?>

<div id="page-header">
  <div class="container">
    <h1 class="submit-title font-size-jumbo font-weight-light">Submit A Video</h1>
  </div>
</div>



<div class="container" id="main">
  <div class="row">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <h1 class="col-md-12 page-title"><?php the_title(); ?></h1>

  <article class="page col-md-8" id="post-<?php the_ID(); ?>">
    <div class="entry">
      
      <h1 class="hc-lead font-size-big font-weight-bold">Fill out the form below to submit a video</h1>
      <p><strong>SUPPORTED VIDEO TYPES:</strong> YoutTube, Vimeo</p>
     <?php the_content(); ?>
    </div>
  </article>
  
    

   <!-- <div class="page col-md-8">
      <h1 class="hc-lead font-size-big font-weight-bold">Fill out the form below to submit a video</h1>
      <p><strong>SUPPORTED VIDEO TYPES:</strong> YoutTube, Vimeo</p>
      <?php //echo do_shortcode( '[usp_form id="user-submitted"]' ); ?>
    </div>--> <!-- .page --> 

    <aside class="sidebar col-md-4">
      <div id="ad-content-sidebar">
        <script type='text/javascript'>
          GA_googleFillSlot("marquee_banner");
        </script>
      </div>

      <?php
        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Primary") ) :
          get_sidebar( 'Primary' );
        endif;
      ?>

      <div id="ad-content-sidebar">
        <script type='text/javascript'>
          GA_googleFillSlot("Vid_Page_Right");
        </script>
      </div>
    </aside>
<?php endwhile; else: ?>
  <article class="page col-md-8 not-found">
    <div class="entry">
      <p class="lead"><?php _e('Sorry, this page does not exist. Try searching for one.'); ?></p>
      <?php get_search_form(); ?>
    </div>
  </article>
  <?php endif; ?>

  </div> <!-- .row -->
</div> <!-- .container -->

<?php
get_footer(); ?>

<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */
?>

  

  <footer class="container-fluid">
      <div class="container">

        <!-- Logo / copywrite -->
        <div class="col-md-6">
          <a class="header-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" target="_top">
            <img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/img/hellaclips-logo.png" alt="Hellaclips">
          </a>
          <p><?php echo '&copy; 2010 - ' . date('Y'); ?></p>
        </div>

        <!-- Right side -->
        <div class="col-md-6 text-left">
          <div class="col-md-5 footer-columb">
            <h4>ABOUT</h4>
            <p>For the Love of the Game! We share the best <a class="font-weight-light" href="<?php get_site_url(); ?>/category/video">skate videos</a> from around the world right here on hellaclips.com.</p>
            <p>Want to be featured on Hellaclips? <a class="font-weight-light" href="<?php get_site_url(); ?>/submit" target="_top" title="Submit a Video">SUBMIT A VIDEO</a>!</p>
          </div>
          <div class="col-md-4 footer-columb">
            <h4>COMMUNITY</h4>
            <p><a class="font-weight-light" href="https://www.facebook.com/hellaclips" title="Hellaclips on Facebook" target="_blank"><i class="fa fa-facebook-square"></i>  Facebook</a></p>
            <p><a class="font-weight-light" href="https://twitter.com/hellaclips" title="Hellaclips on Twitter" target="_blank"><i class="fa fa-twitter-square"></i>  Twitter</a></p>
            <p><a class="font-weight-light" href="http://instagram.com/hellaclips/" title="Hellaclips on Instagram" target="_blank"><i class="fa fa-instagram"></i>  Instagram</a></p>
          </div>
          <div class="col-md-3 footer-columb">
            <h4>ADVERTISE</h4>
            <p>advertise@hellaclips.com</p>
          </div>
        </div>
      </div> <!-- .container -->

  </footer>


</div> <!-- END site-canvas -->
</div> <!-- END site-wrapper -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3437316-5', 'auto');
  ga('send', 'pageview');
</script>

<?php // FitVids & Flexslider
  if( is_single() ) {
    if( in_category( 'video' ) ) { ?>

      <script>
        $(document).ready(function() {
          $("#video-wrapper").fitVids();
        });
      </script>

    <?php } elseif ( in_category( 'Hella Hype' ) ) { ?>

      <script>
        $(document).ready(function() {
          $('.flexslider').flexslider({
            animation: "slide"
          });
        });
      </script>

<?php 
      } 
  } 
   wp_footer(); 

  //MOBILE takeover
  $ismobile = check_user_agent('mobile');
  if ( $ismobile ) : 
    include 'mobile-roadblock.php';
   
    echo '
    <script 
      type="text/javascript">
      CoverPop.start();
      cookieName: "mobile_block"
    </script> '; 

    endif; ?>  
</body
</html>
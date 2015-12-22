<?php
/**
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>> 

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if( is_singular() ) { ?> <meta name="description" content="<?php setup_postdata($post); $shortscrpt= (esc_attr(htmlentities(get_the_excerpt()))); echo substr( $shortscrpt, 0, 140 ); ?>"/> 
  <?php }elseif(is_category('2') ){ ?> <meta name="description" content="Skateboarding product reviews from the authority of everything and nothing at the same time." />
  <?php }else{ ?> <meta name="description" content="the best Skateboarding videos posted every day - The most up to date skate site on the net "/> <?php } ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="xdSqau_2beZ0ycUMQqCbM5HGAMDGTtWX1kJoukZzPmc" />
      <?php if (has_post_thumbnail( $post->ID ) ): ?>
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <meta property="og:image" content="<?php echo $image[0]; ?>"> <?php endif; ?>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
  <link rel="stylesheet" href="<?php if (is_home()) {echo get_stylesheet_directory_uri();?>/css/CoverPop.css"/><?php } ?> 
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/simple-sidebar.css"/>
  <script src=" <?php echo get_stylesheet_directory_uri(); ?>/js/CoverPop.js"></script>  
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="apple-touch-icon" href="touch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
  <title><?php wp_title('-','true','right') . bloginfo('name'); ?></title>

<!--google adsence and analytics -->
  <script src="https://partner.googleadservices.com/gampad/google_service.js"></script>
  <script>
    GS_googleAddAdSenseService('ca-pub-1579806026303950');
    GS_googleEnableAllServices();
  </script>
  <script type='text/javascript'>
    var googletag = googletag || {};
    googletag.cmd = googletag.cmd || [];
    (function() {
    var gads = document.createElement('script');
    gads.async = true;
    gads.type = 'text/javascript';
    var useSSL = 'https:' == document.location.protocol;
    gads.src = (useSSL ? 'https:' : 'http:') + 
    '//www.googletagservices.com/tag/js/gpt.js';
    var node = document.getElementsByTagName('script')[0];
    node.parentNode.insertBefore(gads, node);
    })();
  </script>
  <script>
    GA_googleAddSlot('ca-pub-1579806026303950','Front_2');
    GA_googleAddSlot('ca-pub-1579806026303950','Vid_Page_Right');
    GA_googleAddSlot('ca-pub-1579806026303950','marquee_banner');
    GA_googleAddSlot('ca-pub-1579806026303950','mobile_leaderboard_top');
    GA_googleFetchAds();
  </script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-57001731-1', 'auto');
    ga('send', 'pageview');
  </script>
  <script>
    var trackOutboundLink = function(url) {
    ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
     function () {
     document.location = url;
        }
      });
    }
  </script> 

  <!-- hpto dfp -->
<script type='text/javascript'>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
  (function() {
    var gads = document.createElement('script');
    gads.async = true;
    gads.type = 'text/javascript';
    var useSSL = 'https:' == document.location.protocol;
    gads.src = (useSSL ? 'https:' : 'http:') +
      '//www.googletagservices.com/tag/js/gpt.js';
    var node = document.getElementsByTagName('script')[0];
    node.parentNode.insertBefore(gads, node);
  })();
</script>

<script type='text/javascript'>
  googletag.cmd.push(function() {
    googletag.defineOutOfPageSlot('/3274935/HPTO', 'div-gpt-ad-1435086506813-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>

<?php wp_head(); ?>

</head>
<body>
  <div id="site-wrapper" class="row row-offcanvas row-offcanvas-right">
    <?php
      include_once "menu.php"; // display menu
    ?>
    
  







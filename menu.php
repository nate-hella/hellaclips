

<div id="leftmenu" class="">
  <nav id="offcanvas" class="menuLeft offcanvas" role="navigation">
        
  <a class="header-logo logo-with-ad menu_item" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" target="_top" >
    <img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/img/hellaclips-logo-orange.png" alt="Hellaclips">    
  </a> 

        <a type="button" class="toggle-nav big-sexy" >
          <i class="fa fa-bars" ></i>
        </a>

        <ul>
          <li id="search" class="menu-item menu-item-type-taxonomy menu-item-object-category">
          <p> <a title="search" type="button" class="toggle-search">Search<span class="searchIcon"><i class="fa fa-search"style="font-size: 1.5em; vertical-align: middle;"></i></span></a></p>
        </li>
        </ul>

        <?php // Primary nav
          $args = array(
          'menu' => 'top_menu',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'font-weight-light font-size-medium menu_item',
          //Process nav walker
          'walker' => new wp_bootstrap_navwalker()
            );
          wp_nav_menu($args); // Display nav
         ?>
  
  <div class="menuad">
    <div id='div-gpt-ad-1423004883652-0' style='width:300px; height:250px;'>
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
  </nav><!-- End site-menu --> 
</div>
  
  <div id="search-wrapper" class="" >
         <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?> 
  </div>
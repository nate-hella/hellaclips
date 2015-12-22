

<div id="leftmenu" class="">
  <nav id="offcanvas" class="menuLeft offcanvas" role="navigation">
        
     <!--   <a class="header-logo logo-with-ad menu_item" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" target="_top" >
          <img class="img-responsive" src="<?php bloginfo('stylesheet_directory'); ?>/img/hellaclips-logo-orange.png" alt="Hellaclips">    
        </a> -->

        <a type="button" class="toggle-nav big-sexy" >
          <i class="fa fa-bars" ></i>
        </a>
        <ul>
        <li id="search" class="menu-item menu-item-type-taxonomy menu-item-object-category">
          <a title="Hellahype" type="button" class="toggle-search"><span class="searchIcon"><i class="fa fa-search"></i></span>Search </a>
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
  </nav>
  </div><!-- End site-menu --> 

  <div id="search-wrapper" class="" >
         <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?> 
  </div>
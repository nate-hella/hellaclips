<?php
/**
 * Load styles and javascript on front-end
 *
 * Styles:
 * - Bootstrap
 * - Theme
 * - Font-Awesome
 * - Flexslider
 *
 * Scripts:
 * - Jquery
 * - Bootstrap
 * - FitVids
 * - Flexslider
 *
 */
if ( ! is_admin() ) {

    function hc_load_styles() {  // Load CSS

        // Bootstrap
        wp_register_style( 'bootstrap-styles', 'https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', array(), '3.1.1', 'all' );
        wp_enqueue_style( 'bootstrap-styles' );

        // Theme Styles
        wp_register_style( 'theme-styles', get_template_directory_uri() . '/css/main-takeover.css', array(), '4.09.52', 'all' );
        wp_enqueue_style( 'theme-styles' );

        // Font Awesome
        wp_register_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), '4.1.0', 'all' );
        wp_enqueue_style( 'font-awesome' );

        // if( is_single() && is_category( 'hellahype' ) ) {
            // Flexslider
            // wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '2.2.2', 'all' );
            // wp_enqueue_style( 'flexslider' );
        // }
    }
    add_action( 'wp_enqueue_scripts', 'hc_load_styles', 11 );


    function hc_load_scripts() { // Load Javascript

        // jQuery
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), '1.11.1', true);
        wp_enqueue_script( 'jquery' );

        // Bootstrap
        wp_register_script( 'bootstrap-scripts', 'https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array( 'jquery'), '3.1.1', true);
        wp_enqueue_script( 'bootstrap-scripts' );

        // Hellaclips JS
        wp_register_script( 'hc-scripts', get_template_directory_uri() . '/js/hc-main.js', array( 'jquery'), '1.1', true);
        wp_enqueue_script( 'hc-scripts' );
    }
    add_action( 'wp_enqueue_scripts', 'hc_load_scripts', 12 );


    function hc_conditionaly_load_scripts() {

        global $post;

        if ( is_single($post->ID) ) {

            if( in_category( 'video', $post->ID ) ) {
                // Fitvids
                wp_register_script( 'fitvids-script', get_template_directory_uri() . '/js/vendor/jquery.fitvids.js', array( 'jquery'), '1.1', true);
                wp_enqueue_script( 'fitvids-script' );
            }

            if( in_category( 'Hella Hype', $post->ID ) ) {
                // Flexslider
                wp_register_script( 'flexslider-script', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array( 'jquery'), '2.2.2', true);
                wp_enqueue_script( 'flexslider-script' );
            }
        }
    }
    add_action( 'wp_enqueue_scripts', 'hc_conditionaly_load_scripts' );

}





/**
 * Register bootstrap menu for theme
 *
 * Include walker nav for Bootstrap dropdown support
 * https://github.com/twittem/wp-bootstrap-navwalker
 */
require_once('vendor/wp_bootstrap_navwalker.php');

if ( ! function_exists( 'hc_register_menu' ) ):
    function hc_register_menu() {
        register_nav_menu( 'primary', __( 'Primary navigation', 'Hellaclips' ) );
    }
endif;
add_action( 'after_setup_theme', 'hc_register_menu' );



/**
 * Add theme support:
 *  - Post Thumbnails
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    // set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    // add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)

    add_theme_support( 'post-formats', array( 'video', 'gallery', 'image' ) );
    add_theme_support( 'html5', array( 'search-form' ) );
}





/**
 * Register sidebars
 */
function hc_register_sidebars() {

    if ( function_exists('register_sidebar') )
        register_sidebar( // Primary
            array(
                'id' => 'primary',
                'name' => __( 'Primary' ),
                'description' => __( 'Home sidebar' ),
                'before_widget' => '<div id="%1$s" class="hc-widget hc-trending clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h1 class="font-weight-light"><div class="sub-link">View <a href="' . get_category_link( 4 ) . '">All Videos</a></div>',
                'after_title' => '</h1>'
            )
        );

    if ( function_exists('register_sidebar') )
        register_sidebar( // Video Single
            array(
                'id' => 'single',
                'name' => __( 'Single' ),
                'description' => __( 'Single sidebar' ),
                'before_widget' => '<div id="%1$s" class="hc-widget hc-widget-light clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h1 class="hc-lead font-size-big font-weight-bold">',
                'after_title' => '</h1>'
            )
        );

    if ( function_exists('register_sidebar') )
        register_sidebar( // Hella Hype Single
            array(
                'id' => 'hellahype',
                'name' => __( 'Hellahype' ),
                'description' => __( 'Hella Hype sidebar' ),
                'before_widget' => '<div id="%1$s" class="hc-widget hc-widget-light clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h1 class="hc-lead font-size-big font-weight-bold">',
                'after_title' => '</h1>'
            )
        );
     if ( function_exists('register_sidebar') )
        register_sidebar( // Gallery Single
            array(
                'id' => 'gallery',
                'name' => __( 'gallery' ),
                'description' => __( 'Gallery sidebar' ),
                'before_widget' => '<div id="%1$s" class="hc-widget hc-widget-light clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h1 class="hc-lead font-size-big font-weight-bold">',
                'after_title' => '</h1>'
            )
        );

    if ( function_exists('register_sidebar') )
        register_sidebar( // Sidekick - Next to single video
            array(
                'id' => 'sidekick',
                'name' => __( 'Sidekick' ),
                'description' => __( 'sidekick sidebar' ),
                'before_widget' => '<div id="%1$s" class="hc-widget hc-widget-sidekick clearfix">',
                'after_widget' => '</div>',
                'before_title' => '<h1 class="hc-lead font-size-big font-weight-bold">',
                'after_title' => '</h1>'
            )
        );
}
add_action( 'widgets_init', 'hc_register_sidebars' );




/**
 * Custom login
 *
 * Loads custom login css for user auth pages
 */
function custom_login_css() {
    wp_enqueue_style( '', get_template_directory_uri() . '/login-style.css' );
}

if ( ! has_action( 'login_enqueue_scripts', 'custom_login_css' ) ) {
    add_action( 'login_enqueue_scripts', 'custom_login_css', 11 );
}


function hc_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'hc_login_logo_url' );


function hc_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'hc_login_logo_url_title' );


function hc_login_head() {
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'hc_login_head' );





/**
 * Custom recent posts
 *
 * Number of posts
 * Category ID
 */
function get_recent_posts( $num_posts, $cat_id ) {
    $args = array(
        'posts_per_page'      => $num_posts,
        'no_found_rows'       => true,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'cat'                 => $cat_id
      );

      // The Query
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
          $the_query->the_post();
          echo '<li><a href="' . get_the_permalink() . '" target="_top" title="' . get_the_title() . '">'  . get_the_title() . '</a></li>';
        }
        echo '</ul>';
      } else {
        // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
}





/**
 * Custom gallery
 *
 * Flexslider friendly
 */
function parse_gallery_shortcode($atts) {
 
    global $post;
 
    if ( ! empty( $atts['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $atts['orderby'] ) ) {
            $atts['orderby'] = 'post__in';
            $atts['include'] = $atts['ids'];
        }
    }
 
    extract(shortcode_atts(array(
        'orderby' => 'menu_order ASC, ID ASC',
        'include' => '',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'large',
        'link' => 'file'
    ), $atts));
 
 
    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image',
        'exclude' => get_post_thumbnail_id(),
        'orderby' => $orderby
    );
 
    if ( !empty($include) ) {
        $args['include'] = $include;
    } else {
        $args['post_parent'] = $id;
        $args['numberposts'] = -1;
    }
 
    $images = get_posts($args);
    $gallery = '<ul class="slides">';
     
    foreach ( $images as $image ) {
        $caption = $image->post_excerpt;
 
        $description = $image->post_content;
        if($description == '') $description = $image->post_title;
 
        $image_alt = get_post_meta($image->ID,'_wp_attachment_image_alt', true);
 
        // render your gallery here
        $gallery .= '<li>' . wp_get_attachment_image($image->ID, $size) . '</li>';
        
    }

    $gallery .= '</ul>';
    echo $gallery;
}

remove_shortcode('gallery');
add_shortcode('gallery', 'parse_gallery_shortcode');

/**
 * Remove gallery & images
 *
 * Removes gallery from the_content()
 */
function strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    // $content = preg_replace('/<img[^>]+\>/i', '', $content);
    return $content;
} 
/**
 * Calculate post views
 *
 * Displays view count based on wpp and custom post_views
 */
function get_post_views() {
    $tptnviews = get_tptn_post_count_only( get_the_ID(), 'total' );
    $hcviews = get_post_meta( get_the_ID(), 'post_views', true);
    $newpost = 100;

    if( $hcviews > $tptnviews) {
      return $hcviews + $tptnviews + rand(320, 500);
    }elseif ($tptnviews >= $hcviews) {
        return $tptnviews;
    }elseif ($tptnviews < $newpost) {
        return $tptnviews + 97;
    }else{ return 801; }
}

add_filter( 'check_password', 'check_sha1_password', 10, 4 );
/**
 * Check if a user has a SHA1 password hash,
 * allows login if password hashes match, then
 * updates password hash to wp format.
 *
 * Hooks into check_password filter, mostly
 * copied from md5 upgrade function with
 * pluggable.php/wp_check_password
 *
 * @param string $check
 * @param string $password
 * @param string $hash
 * @param string $user_id
 * @return results of sha1 hash comparison, or $check if $password is not a SHA1 hash
 */
function check_sha1_password( $check, $password, $hash, $user_id ) {
    if( is_sha1( $hash ) ) {

        $check = ( $hash == sha1( $password ) );

        if ( $check && $user_id ) {

            // Rehash using new proper WP hash
            wp_set_password( $password, $user_id );
            $hash = wp_hash_password( $password );

            // Allow login
            return true;

        } else {

            // SHA1 hash in db, but SHA1 has of provided $password did not match. Do not allow login.
            // echo $password . ' did not match ' . $check;
            return false;
        }
    }

    // Not SHA1 password, so return what was passed
    return $check;
}

/**
 * Check if provided string is a SHA1 hash
 */
function is_sha1( $str ) {
    return ( bool ) preg_match( '/^[0-9a-f]{40}$/i', $str );
}

/**
*change http tp https in all iframes
*
*/
function add_secure_video_options($html) {
   if (strpos($html, "<iframe" ) !== false) {
        $search = array('src="http://www.','src="http://');
        $replace = array('src="https://www.','src="https://');
        $html = str_replace($search, $replace, $html);

        return $html;
   } else {
        return $html;
   }
}
add_filter('the_content', 'add_secure_video_options', 10);

/**
 * get more in custom fields drop down
 */
function increase_postmeta_form_limit() {
	return 120;
}
add_filter('postmeta_form_limit', 'increase_postmeta_form_limit');

/** 
*Allow contributers to upload media
*/
if ( current_user_can('contributor') && !current_user_can('upload_files') )
    add_action('admin_init', 'allow_contributor_uploads');
function allow_contributor_uploads() {
    $contributor = get_role('contributor');
    $contributor->add_cap('upload_files');
}

add_action('set_current_user', 'cc_hide_admin_bar');
function cc_hide_admin_bar() {
  if (!current_user_can('edit_posts')) {
    show_admin_bar(false);
  }
}

?>
<?php
/*
* Include wp-load
*/
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

global $wpdb;


// Start and stop ID
$start = $_GET['start'];
$stop  = $_GET['stop'];


/*
* Query old users
*/
$videos = $wpdb->get_results( "SELECT * FROM hella_videos WHERE ID BETWEEN $start AND $stop" );

// echo '<pre>';
// var_dump($videos);
// echo '</pre>';

/*
* Number of users returned
*/
echo '<h2>Inserted: <i>' . count($videos) . '</i> videos</h2>';


/*
* Insert
*/

foreach ($videos as $video) {

    // $id = $video->id;
    // $title = $video->title;
    // $video = $video->url;
    // $slug = $video->slug;
    // $desc = $video->description;
    // $date = $video->created_at;
    // $thumb = $video->thumbnail;
    // $views = $video->view_count;
    // $exc = substr( $desc, 0, 60 );

    // echo $id . '<br />';
    // echo $title . '<br />';
    // echo $video . '<br />';
    // echo $slug . '<br />';
    // echo $desc . '<br />';
    // echo $date . '<br />';
    // echo $thumb . '<br />';
    // echo $views . '<br />';
    // echo $exc . '<br />';

    // echo '<p>----</p>';

    // echo '<strong>id:</strong> ' . $video->id . '<br />';
    // echo '<strong>title:</strong> ' . $video->title . '<br />';
    // echo '<strong>url:</strong> ' . $video->url . '<br />';
    // echo '<strong>slug:</strong> ' . $video->slug . '<br />';
    // echo '<strong>description:</strong> ' . $video->description . '<br />';
    // echo '<strong>created:</strong> ' . $video->created_at . '<br />';
    // echo '<strong>thumb:</strong> ' . $video->thumbnail . '<br />';
    // echo '<strong>views:</strong> ' . $video->view_count . '<br />';
    // echo '<strong>excerpt:</strong> ' . substr( $video->description, 0, 60 ) . '<br />';

    // echo $desc . '<br />';
    // echo $exc . '<br />';

    // $my_post = array(
    //   'post_title'    => $title,
    //   'post_name'     => $slug,
    //   'post_content'  => $desc,
    //   'post_status'   => 'publish',
    //   'post_excerpt'  => $exc,
    //   'post_date'     => $date
    // );

    $my_post = array(
      'post_title'    => $video->title,
      'post_name'     => $video->slug,
      'post_content'  => $video->description,
      'post_status'   => 'publish',
      'post_excerpt'  => $video->description,
      'post_date'     => $video->created_at
    );

    // echo '<pre>';
    // var_dump($my_post);
    // echo '</pre>';

    // Insert the post into the database
    $post_id = wp_insert_post( $my_post );

    if( is_wp_error($post_id) ) {
        echo $post_id->get_error_message();
    } else {
        set_post_format($post_id, 'video' );
        add_post_meta($post_id, 'original_id', $video->id,    true);
        add_post_meta($post_id, 'post_views',  $video->view_count, true);
        add_post_meta($post_id, 'video_url',   $video->url, true);
        add_post_meta($post_id, 'original_thumbnail', $video->thumbnail, true);
    }
}
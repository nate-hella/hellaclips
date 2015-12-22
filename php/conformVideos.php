<?php
/*
* Include wp-load
*/
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

global $wpdb;


/*
* Query old users
*/
$videos = $wpdb->get_results( "SELECT * FROM hella_videos WHERE id = 333");

echo '<pre>';
var_dump($videos);
echo '</pre>';

/*
* Number of users returned
*/
echo '<h2>Inserted: <i>' . count($videos) . '</i> videos</h2>';

foreach ($videos as $video) {
  echo $video->id;
}

/*
* Insert
*/
// foreach ($videos as $video) {

//     $id      = $video->id;
//     $title   = $video->title;
//     $video   = $video->url;
//     $slug    = $video->slug;
//     $desc    = $video->description;
//     $date    = $video->created_at;
//     $thumb   = $video->thumbnail;
//     $views   = $video->views;

//     $my_post = array(
//       'post_title'    => $title,
//       'post_name'     => $slug,
//       // 'post_content'  => $content,
//       'post_status'   => 'publish',
//       'post_excerpt'  => $desc,
//       'post_date'     => $date
//     );

//     // var_dump($my_post);

//     // Insert the post into the database
//     $post_id = wp_insert_post( $my_post );

//     if( is_wp_error($post_id) ) {
//         echo $post_id->get_error_message();
//     } else {
//         set_post_format($post_id, 'video' );
//         add_post_meta($post_id, 'original_id', $id, true);
//         add_post_meta($post_id, 'post_views', $views, true);
//         add_post_meta($post_id, 'video_url', $video, true);
//         add_post_meta($post_id, 'original_thumbnail', $thumb, true);
//     }
// }
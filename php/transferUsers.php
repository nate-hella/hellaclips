<?php
/*
* Include wp-load
*/
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

global $wpdb;

/*
* Get method
*/
$start = $_GET['start'];
$stop  = $_GET['stop'];
$debug = $_GET['debug'];

// if($debug == true){
//     /*
//     * Query old users
//     */
//     $users = $wpdb->get_results( "SELECT * FROM hella_users WHERE ID BETWEEN $start AND $stop" );

//     echo '<pre>';
//         var_dump($users);
//     echo '</pre>';
// } else {

    /*
    * Query old users
    */
    $users = $wpdb->get_results( "SELECT * FROM hella_users WHERE ID BETWEEN $start AND $stop" );

    /*
    * Number of users returned
    */
    echo '<h2>Users: ' . count($users) . '</h2>';

    /*
    * Insert
    */
    foreach ($users as $user) {

        $userdata = array(
            'user_login' => $user->user_login,
            'user_pass'  => $user->user_pass,
            'user_email' => $user->user_email
        );

        $user_id = wp_insert_user( $userdata );

        if( !is_wp_error($user_id) ) {
            $query = $wpdb->query("UPDATE $wpdb->users SET user_pass = '$user->password' WHERE ID = $user_id");
            // if($query){
            //     echo 'Users added and passwords converted to old!';
            // } else {
            //     echo $wpdb->get_results($query) . '<br />';
            // }

        } else {
            echo $user_id->get_error_message();
        }
    }
// }
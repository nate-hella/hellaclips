<?php

// register the meta box
add_action( 'add_meta_boxes', 'my_custom_field_checkboxes' );
function my_custom_field_checkboxes() {
    add_meta_box(
        'my_meta_box_id',          // this is HTML id of the box on edit screen
        'My Plugin Checkboxes',    // title of the box
        'my_customfield_box_content',   // function to be called to display the checkboxes, see the function below
        'post',        // on which edit screen the box should appear
        'normal',      // part of page where the box should appear
        'default'      // priority of the box
    );
}

// display the metabox
function my_customfield_box_content( $post_id ) {
    // nonce field for security check, you can have the same
    // nonce field for all your meta boxes of same plugin
    wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_nonce' );

    echo '<input type="checkbox" name="my_plugin_paid_content" value="1" /> Paid Content <br />';
    echo '<input type="checkbox" name="my_plugin_network_wide" value="1" /> Network wide';
}

// save data from checkboxes
add_action( 'save_post', 'my_custom_field_data' );
function my_custom_field_data() {

    // check if this isn't an auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    // security check
    if ( !wp_verify_nonce( $_POST['mypluing_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // further checks if you like, 
    // for example particular user, role or maybe post type in case of custom post types

    // now store data in custom fields based on checkboxes selected
    if ( isset( $_POST['my_plugin_paid_content'] ) )
        update_post_meta( $post_id, 'my_plugin_paid_content', 1 );
    else
        update_post_meta( $post_id, 'my_plugin_paid_content', 0 );

    if ( isset( $_POST['my_plugin_network_wide'] ) )
        update_post_meta( $post_id, 'my_plugin_network_wide', 1 );
    else
        update_post_meta( $post_id, 'my_plugin_network_wide', 0 );
}
?>
<?php

// register the meta box
add_action( 'add_meta_boxes', 'hellaclips_app_metabox' );
function hellaclips_app_metabox() {
    add_meta_box(
        'app_options',          // this is HTML id of the box on edit screen
        'Hellaclips App Options',    // title of the box
        'app_options_checks',   // function to be called to display the checkboxes, see the function below
        'post',        // on which edit screen the box should appear
        'side',      // part of page where the box should appear
        'high'      // priority of the box
    );
}

// display the metabox
function app_options_checks( $post ) {

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'hellaclips_save_meta_box_data', 'hellaclips_meta_box_nonce' );
    $checkboxMeta = get_post_meta( $post->ID );
    ?>
    <p>
        <input type="checkbox" name="add_to_hella_app" id="add_to_hella_app" value="yes" <?php if ( isset ( $checkboxMeta['add_to_hella_app'] ) ) checked( $checkboxMeta['add_to_hella_app'][0], 'yes' );?> /> Add this post to the Hellaclips app <br />
    </p>
    <p>
        <label for="meta-text" class="app-row-title"><?php _e( 'Kaltura entry_id', 'app-textdomain' )?></label>
        <input type="text" name="kaltura-meta" id="url-meta" value="<?php if ( isset ( $checkboxMeta['kaltura-meta'] ) ) echo $checkboxMeta['kaltura-meta'][0]; ?>" />
    </p>
    <p>
        <label for="meta-text" class="app-row-title"><?php _e( 'Youtube URL', 'app-textdomain' )?></label>
        <input type="text" name="youtube-meta" id="yt-url-meta" value="<?php if ( isset ( $checkboxMeta['youtube-meta'] ) ) echo $checkboxMeta['youtube-meta'][0]; ?>" />
    </p>
    <p>
        <label for="meta-text" class="app-row-title"><?php _e( 'Shorter title', 'app-textdomain' )?></label>
        <input type="text" name="short-title" id="short-title-meta" value="<?php if ( isset ( $checkboxMeta['short-title'] ) ) echo $checkboxMeta['short-title'][0]; ?>" />
    </p>
    <p>
        <label for="meta-text" class="app-row-title"><?php _e( 'Slide order number (1-20)', 'app-textdomain' )?></label>
        <input type="text" name="post-number-meta" id="url-meta" value="<?php if ( isset ( $checkboxMeta['post-number-meta'] ) ){ echo $checkboxMeta['post-number-meta'][0];}else{ echo "1";} ?>" />
    </p>
    <?php }

//save metabox entry (checkbox)
function hellaclips_save_meta_box_data( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['hellaclips_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['hellaclips_meta_box_nonce'], 'hellaclips_save_meta_box_data' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
   
    if( isset( $_POST[ 'add_to_hella_app' ] ) ) {
            update_post_meta( $post_id, 'add_to_hella_app', 'yes' );
        } else {
            update_post_meta( $post_id, 'add_to_hella_app', 'no' );
        }

    if( isset( $_POST[ 'kaltura-meta' ] ) ) {
        update_post_meta( $post_id, 'kaltura-meta', $_POST[ 'kaltura-meta' ] );
        }
    
    if( isset( $_POST[ 'post-number-meta' ] ) ) {
        update_post_meta( $post_id, 'post-number-meta', $_POST[ 'post-number-meta' ] );
        }

     if( isset( $_POST[ 'youtube-meta' ] ) ) {
        update_post_meta( $post_id, 'youtube-meta', $_POST[ 'youtube-meta' ] );
        }

     if( isset( $_POST[ 'short-title' ] ) ) {
        update_post_meta( $post_id, 'short-title', $_POST[ 'short-title' ] );
        }
}
add_action( 'save_post', 'hellaclips_save_meta_box_data' );

?>
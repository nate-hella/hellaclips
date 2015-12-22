<?php
/*
* create .xml file on post/page save 
*/

// Derect Wordpress to either create App Gallery entry or find and delete an Unwanted Entry
    if (isset($_POST['add_to_hella_app'])) { 
        //add_action( "save_post", "update_post_status");
        add_action( "save_post", "write_gallery_xml" );
   // }else{
        //add_to_hella_app is "Unchecked" add_action to "post_save" write Function that deletes post from Gallery
       // add_action( "save_post", "delete_from_app" );
    }

// Post status for Posts currently published to the App (currently not working) 
    function update_post_status() {
        global $post;
        $postid = $post->ID;
        $app_post_status = array(
        'ID'           => $postid ,
        'post_status' => 'OnApp',
        );
        wp_update_post( $app_post_status );
    }

//Check if Post is currently Published in the App; if so delete it, otherwize do nothing.
    function delete_from_app() {
        global $post;
        $postid = $post->ID;
        $cms_path = get_home_path(); 
        $key2 = 'Slide_number';
        $order = get_post_meta($postid, $key2, true);   
        $filename = $cms_path . "hella_app/script/" . $order . ".xml"; 

        if ( ! file_exists( $filename )){
        return;
        }else{ unlink($filename);}
    }

// Create XML file with nessisary post ibormation or append an existing XML with new Data for Use in App Gallery
function write_gallery_xml() {

    global $post;
    $postid = $post->ID;
    $comment = get_the_title($postid);
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
    $thumburl = $thumb['0'];
    $key1 = 'kaltura-meta';
    $key2 = 'order-number-meta';
    $entry_id = get_post_meta($postid, $key1, true);
    $videourl = "http://cdnapisec.kaltura.com/html5/html5lib/v2.28/mwEmbedFrame.php/p/1741222/uiconf_id/31805682/entry_id/' . $entry_id . '?wid=_1741222&amp;iframeembed=true&amp;entry_id=' . $entry_id";
    $order = get_post_meta($postid, $key2, true);


    $ap_post_xml = "\n" . '<runscript>' . "\n" .
    "\n\t\t" . '<setvar name="video' . $order . '_name" value="' . $postid . '" />' . "\n" .
    "\t\t" . '<setvar name="video' . $order . '_thumb" value="' . $thumburl . '" />' . "\n" .
    "\t\t" . '<setvar name="video' . $order . '_sharelink" value="" />' . "\n" .
    "\t\t" . '<setvar name="video' . $order . '_infolink" value=""   />' . "\n" .
    "\t\t" . '<setvar name="video' . $order . '_comment" value="' . $comment .  '" />' . "\n" .
    "\t\t" . '<setvar name="video' . $order . '_url" value="' . $videourl . '"   />' . "\n" .
    "\n" . '</runscript>';

    $cms_path = get_home_path();    
    $filename = $cms_path . "/hella_app/script/set_homevideo" . $order . ".xml"; 
    $open_ap_file = fopen($filename, "w") or die("ERROR: Unaible to Write to Ap Gallery");
    fwrite($open_ap_file, $ap_post_xml);
    fclose($open_ap_file);
}
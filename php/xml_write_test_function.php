<?php
/*
* create .xml file on post/page save 
*/

// Derect Wordpress to either create App Gallery entry or find and delete an Unwanted Entry
    if (isset($_POST['add_to_hella_app'])) { 
        //add_action( "save_post", "update_post_status");
        add_action( "save_post", "replace_number" );
    }

// Create XML file with nessisary post ibormation or append an existing XML with new Data for Use in App Gallery

function replace_number(){
    $cms_path = get_home_path();    
    $filename = $cms_path . "hella_app/script/set_homevideo.xml";
    $data = file($filename); // reads an array of lines

    function replace_a_line($data) {
      global $post;
      $postid = $post->ID;
      
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
      $thumburl = $thumb['0'];
      $key1 = 'kaltura-meta';
      $key2 = 'post-number-meta';
      $key3 = 'short-title';
      $key4 = 'youtube-meta';
      $entry_id = get_post_meta($postid, $key1, true);
        $videourl = "http://cdnapisec.kaltura.com/html5/html5lib/v2.28/mwEmbedFrame.php/p/1741222/uiconf_id/31805682/entry_id/" . $entry_id . "?wid=_1741222&amp;iframeembed=true&amp;entry_id=" . $entry_id;
      $order = get_post_meta($postid, $key2, true);
      $comment = get_post_meta($postid, $key3, true);
      $ytUrl = get_post_meta($postid, $key4, true);
      if (stristr($data, '<setvar name="video20_name"')) {
          return "\t" . '<setvar name="video' . $order . '_name" value="' . $postid . '" />' .   "\n"; }
        if (stristr($data, '<setvar name="video20_thumb"')) {   
          return  "\t" . '<setvar name="video' . $order . '_thumb" value="' . $thumburl . '" />' . "\n"; }
        if (stristr($data, '<setvar name="video20_sharelink"')) {    
          return  "\t" . '<setvar name="video' . $order . '_sharelink" value=""  />' . "\n"; }
        if (stristr($data, '<setvar name="video20_infolink"')) {  
          return  "\t" . '<setvar name="video' . $order . '_infolink" value=""   />' . "\n" ; }
        if (stristr($data, '<setvar name="video20_comment"')) {  
          return  "\t" . '<setvar name="video' . $order . '_comment" value="' . $comment .  '" />' . "\n"; }
        if (stristr($data, '<setvar name="video20_url"' )&& $ytUrl != ''){  
          return  "\t" . '<setvar name="video' . $order . '_url" value="' . $ytUrl . '"   />' . "\n"; } 
        if(stristr($data, '<setvar name="video20_url"' )&& $videourl != '') {
          return  "\t" . '<setvar name="video' . $order . '_url" value="' . $videourl . '"   />' . "\n";}
        if (stristr($data, '<setvar name="video20_action"')&& $ytUrl != '') {  
          return  "\t" . '<setvar name="video' . $order . '_action" value="gotoyoutubevideo"   />' . "\n"; }
        if (stristr($data, '<setvar name="video20_action"')&& $videourl != '') {  
          return  "\t" . '<setvar name="video' . $order . '_action" value="gotokalturavideo"   />' . "\n"; }
        if (stristr($data, '<setvar name="video20_sortorder"')) {  
          return  "\t" . '<setvar name="video' . $order . '_sortorder" value="' . $order . '"   />' . "\n" ;}

      $addone = strtr($data, array(
          'video19' => 'video20', 'value="19"' => 'value="20"',
          'video18' => 'video19', 'value="18"' => 'value="19"',
          'video17' => 'video18', 'value="17"' => 'value="18"',
          'video16' => 'video17', 'value="16"' => 'value="17"',
          'video15' => 'video16', 'value="15"' => 'value="16"',
          'video14' => 'video15', 'value="14"' => 'value="15"',
          'video13' => 'video14', 'value="13"' => 'value="14"',
          'video12' => 'video13', 'value="12"' => 'value="13"',
          'video11' => 'video12', 'value="11"' => 'value="12"',
          'video10' => 'video11', 'value="10"' => 'value="11"',
          'video9' => 'video10', 'value="9"' => 'value="10"',
          'video8' => 'video9', 'value="8"' => 'value="9"',
          'video7' => 'video8', 'value="7"' => 'value="8"',
          'video6' => 'video7', 'value="6"' => 'value="7"',
          'video5' => 'video6', 'value="5"' => 'value="6"',
          'video4' => 'video5', 'value="4"' => 'value="5"',
          'video3' => 'video4', 'value="3"' => 'value="4"',
          'video2' => 'video3', 'value="2"' => 'value="3"',
          'video1' => 'video2', 'value="1"' => 'value="2"',

        ));
      return $addone;
      
      return $data;
  }
$data = array_map('replace_a_line',$data);
file_put_contents($filename, implode('', $data));
}


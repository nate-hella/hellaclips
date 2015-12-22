<?php
/**
 * Single page template file
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */

get_header();

if (in_category('Hella Hype')) {
  include (TEMPLATEPATH . '/single-hellahype.php');
} elseif (in_category('gallery')) {
	include (TEMPLATEPATH . '/single-gallery.php');
} else {
  include (TEMPLATEPATH . '/single-video.php');
}

get_footer();
?>
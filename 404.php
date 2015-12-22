<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Hellaclips
 * @since Hellaclips 1.0
 */

get_header(); ?>

<div id="page-header">
  <div class="container">
    <h1 class="submit-title font-size-jumbo font-weight-light"><i class="fa fa-rocket"></i> <strong>404</strong> Not found</h1>
  </div>
</div>

<div id="main" class="container">
  <div class="row">

    <div class="container">
      <h2>Nothing is here! Try a search?</h2>
      <?php get_search_form(); ?>
    </div>

  </div>
</div><!-- #main -->

<?php
get_footer();
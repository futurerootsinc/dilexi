<?php /* Template Name: Upcoming */ ?>
  <?php
/**
 * The ypcoming template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="upcoming">
    <?php get_template_part('template-parts/navigation/menu') ?>
      <div id="shows-container">
        <div id="holder">
              <?php
              wp_reset_query(); // necessary to reset query
              while ( have_posts() ) : the_post();
                  the_content();
              endwhile; // End of the loop.
          ?>
          </div>
  </div>
  

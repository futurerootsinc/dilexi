<?php /* Template Name: News */ ?>
  <?php
/**
 * The front page template file
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

<div id="news">
  <?php get_template_part('template-parts/navigation/menu') ?>
  <div id="news-container">
    <?php 
      $query = new WP_Query(array(
          'post_type' => 'press',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'meta_key'			=> 'pub_date',
          'orderby'			=> 'meta_value',
          'order'				=> 'DESC'
      ));


      while ($query->have_posts()) {
          $query->the_post();
          $cont = get_the_content();
          echo "<a href=";
          echo $cont;
          echo ">";
          $post_id = get_the_title();
          echo $post_id;
          echo "</a>";
          echo "<br>";
        echo "<br>";

      }

      wp_reset_query();
  ?>
  </div>
</div>
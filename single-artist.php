<?php /* Template Name:single-artist */ ?>
<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Commonwealth
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="artist">
  <?php get_template_part('template-parts/navigation/menu') ?>
  <div id="section1">
    <div id="left-sidebar">
      <div class="top-content">

      </div>
      <div class="main-content">
        <div id="artist-container">
          
          <?php 
          //$currTitle = the_title();
          $query = new WP_Query(array(
              'posts_per_page'   => -1,
              'post_type' => 'artist',
              'post_status' => 'publish',
              'orderby' => 'title',
              'order'   => 'ASC'
          ));

          while ($query->have_posts()) {
              $query->the_post();
              $post_id = get_the_title();
              /*if(strcmp($post_id, $currTitle)) {
                echo "<p class='redSelect'>";
              }
              else {
                echo "<p>";
              }*/
              echo "<p>";
              echo "<a href=" . get_post_permalink() . ">";
              echo $post_id;
              echo "</a>";
              echo "</p>";
          }
          wp_reset_query();
            ?>
        </div>
      </div>
      <div class="bottom-content"></div>
    </div>
    <div id="right-content">
      <div class="top-content">
        <!--<h5 title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h5>-->
      </div>
      <div class="main-content">
        <div id="feat-img-container">
          <?php if ( has_post_thumbnail() ) {
              the_post_thumbnail( 'medium', array( 'class' => 'feat-img' ) );
          } ?>
        </div>
        <?php
        
        function compareUrls($a, $b) {
            return $a === $b;
        }

        global $wp;
        $isTheLanding = compareUrls(home_url( $wp->request ), 'https://commonwealthandcouncil.com/artist');
        ?>
        
        <script>
          var isLanding = <?php echo json_encode($isTheLanding) ?>;
          console.log(isLanding);
          if(isLanding) {
            var list = document.getElementsByTagName("H2");
            console.log(list)
            
          }
        </script>
        <div id="bio">
          <script>
            if(!isLanding) {
              var heading = document.createElement("H2");        // Create a <button> element
              var t = document.createTextNode("Bio");       // Create a text node
              //heading.appendChild(t);                                // Append the text to <button>
              //document.getElementById("bio").appendChild(heading); 
            }
          </script>

          <?php $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
          ?>

          <?php the_content(); ?>
        </div>
        <div id="exhibitions">
          <br>
          <script>
            if(!isLanding) {
              var heading2 = document.createElement("P");        // Create a <button> element
              var ta = document.createTextNode("Exhibitions at Commonwealth and Council");       // Create a text node
              heading2.appendChild(ta);                                // Append the text to <button>
              heading2.classList.add("heading-p");
              document.getElementById("exhibitions").appendChild(heading2); 
            }
          </script> 
          <p>
          <?php 
            global $post; $post_slug=$post->post_name;
            $artistWork = tribe_get_events( array(
                'posts_per_page'   => -1,
                'tag'              => $post_slug
              ));

            foreach($artistWork as $works) {
              $work = (array)$works;
              echo "<p>";
              echo "<a href=" . get_post_permalink($work["ID"]) . ">";
              echo $work["post_title"];
              echo "</a>";
              echo "</p>";

            }
          wp_reset_query();
          ?>
          </p>
        </div>
        <div id="news-section">
          <br>
          <script>
            if(!isLanding) {
              var heading3 = document.createElement("P");        // Create a <button> element
              heading3.classList.add("heading-p");
              var tb = document.createTextNode("News");       // Create a text node
              heading3.appendChild(tb);                                // Append the text to <button>
              document.getElementById("news-section").appendChild(heading3); 
            }
          </script>
          <p>
          <?php 
            global $post; $post_slug=$post->post_name;
            $artistNews = tribe_get_events( array(
                'posts_per_page'   => -1,
                'post_type'        => 'Press',
                'meta_key'			=> 'pub_date',
                'orderby'			=> 'meta_value',
                'order'				=> 'DESC',
                'tag'              => $post_slug
              ));

            foreach($artistNews as $news_articles) {
              $news = (array)$news_articles;
              echo "<p>";
              echo "<a href=" . get_post_field('post_content', $news["ID"]) . ">";
              echo $news["post_title"];
              echo "</a>";
              echo "</p>";

            }
          wp_reset_query();
          ?>
          </p>
        </div>
      </div>
      <div class="bottom-content"></div>
    </div>
  </div>
</div>




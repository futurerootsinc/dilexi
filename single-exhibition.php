<?php /* Template Name: single-exhibition */ ?>
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


<div id="single-exhibition">
  <?php get_template_part('template-parts/navigation/menu') ?>
  
  <div id="section1">
    <?php 
            $earliest = substr(tribe_events_earliest_date(), 0, 4);
            $latest = substr(tribe_events_latest_date(), 0, 4);
            $current = (int)$latest;
            $Currentyear = (int)$latest;
            $eventsByYear = array();
            $myarr = [];
            while($current >= $earliest) {
              $thisyear = tribe_get_events( array(
                'start_date'   => strval($current)."-01-01 00:01",
                'end_date'     => strval($current)."-12-31 23:59"
              ));
              
              $current = $current - 1;
            }
  
            wp_reset_query();
            ?>
    <div id="right-content">
      <div class="top-content">
       <h5 title="<?php the_title_attribute(); ?>"><?php the_title() ?></h5> 
        <!--<h5>Coming Soon!</h5>-->
        <div class="cont">
          <label class="switch">
            <input type="checkbox" onClick='switchDisplay()' />    <div></div>
          </label>
        </div>
      </div>
      <div class="main-content" id="myDIV">
        
        <?php 
          echo "<div id='press-container'>";
          the_content();
          echo "</div>";
          $thing = get_post_meta( get_the_ID(), 'slider' )[0];
          crellySlider($thing); 
        ?>
          
        
        <script>
          var counter = -1;
          window.onload = switchDisplay();

          function switchDisplay() {
            if(counter%2==0) {
              document.getElementsByClassName('crellyslider-slider')[0].style.display = "block";
              document.getElementById('press-container').style.display = "none";
            } else {
              document.getElementsByClassName('crellyslider-slider')[0].style.display = "none";
              document.getElementById('press-container').style.display = "block";
            }
            counter++;
          }
          //console.log(allOrganizers)
          //console.log(allEvents)
          
          //Get currently selected year
          //var currentYear = <?php echo $Currentyear; ?>;
        
 
          
        </script>
      </div>
      <div class="bottom-content"></div>
    </div>
  </div>
  <script type="text/javascript">
    function addClass(el, className) {
      if (el.classList)
        el.classList.add(className)
      else if (!hasClass(el, className)) el.className += " " + className
    }

    function removeClass(el, className) {
      if (el.classList)
        el.classList.remove(className)
      else if (hasClass(el, className)) {
        var reg = new RegExp('(\\s|^)' + className + '(\\s|$)')
        el.className=el.className.replace(reg, ' ')
      }
    }
    
    function showYear(year) {
      console.log("clicked on "+year);
      
      var all = document.getElementsByClassName("year");
      for(var i=0; i<all.length; i++) {
        //removeClass(all[i], "showing");
        addClass(all[i], "hide");
      }
      
      var thisOne = document.getElementsByClassName("year"+year);

      for(var h=0; h>thisOne.length; h++) {
        //removeClass(all[i], "hide");
        //addClass(all[i], "showing");
      } 
    }
  </script>
</div>
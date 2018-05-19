<?php /* Template Name: Exhibition */ ?>
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


<div id="exhibition">
  <?php get_template_part('template-parts/navigation/menu') ?>
  
  <div id="section1">
    <div id="left-sidebar">
      <div class="top-content">
        
      </div>
      <div class="main-content">
        <div id="artist-container">
          <?php 
            $earliest = substr(tribe_events_earliest_date(), 0, 4);
            $latest = substr(tribe_events_latest_date(), 0, 4);
            $current = (int)$latest;
            $Currentyear = (int)$latest;
            $eventsByYear = array();
            $myarr = [];
            while($current >= $earliest) {
              //make individual years only show corresponding stuff
              
              //make link with id for year
              echo "<a id='".$current."' onclick='showYear(".$current.")'>";
              //print year
              echo $current;
              echo "</a>";
              echo "<br>";
              echo "<br>";
              $thisyear = tribe_get_events( array(
                'start_date'   => strval($current)."-01-01 00:01",
                'end_date'     => strval($current)."-12-31 23:59"
              ));
              
              
              $organizers = [];
              
              //for each year of events
              foreach ($thisyear as &$value) {
                $lilarr = (array)$value;
                
                $ids = [];
                $ids = tribe_get_organizer_ids($lilarr['ID']); 

                //for each event in the year
                foreach($ids as $id) {
                  array_push($organizers, [$id, tribe_get_organizer($id)]); 
                }
                //print_r($organizers);
                array_push($myarr, $organizers);
                $organizers = [];   
              }
              
              //gets each organizer and stores them in array where [id, organizerName]
              
              $eventsByYear[] = [$current=>$thisyear];
              
              $current = $current - 1;
            }
  
            wp_reset_query();
            ?>
        </div>
      </div>
      <div class="bottom-content"></div>
    </div>
    <div id="right-content">
      <div class="top-content">
        <h5>Coming Soon!</h5>
      </div>
      <div class="main-content" id="myDIV">
        <script>
          
          //Get all events and all organizers from php arrays
          var allEvents = <?php echo json_encode($eventsByYear); ?>;
          var allOrganizers = <?php echo json_encode($myarr); ?>;
          
          //console.log(allOrganizers)
          //console.log(allEvents)
          
          //Get currently selected year
          var currentYear = <?php echo $Currentyear; ?>;
        
          //for all eventyears
          for(var ii=0; ii<allEvents.length; ii++) {
            
            //for all events within a year
            for(var h=0; h<allEvents[ii][currentYear].length; h++) {
              
              //TODO: make clickable link for event
              //var el = document.getElementById("outside");
              
              
              var para = document.createElement("P");                       // Create a <p> element
              //console.log(currentYear+' '+allEvents[ii][currentYear][h].post_title);
              para.className = "year";
              para.className += " year"+currentYear;
              para.className += " hide";
              var t = document.createTextNode(allEvents[ii][currentYear][h].post_title);
              para.appendChild(t);  
              // makes shows appear
              document.getElementById('myDIV').appendChild(para);
              if(ii==0) {
                //para.className += " show";
              }
              
              //ii is year index 0 - length (eg starts on current year)
              // h is event count within year
              
              var orgString = "";
              
              
              if(typeof allOrganizers[ii+h] !== 'undefined') {
                for(var g=0; g<allOrganizers[ii+h].length-1; g++) {
                  orgString += allOrganizers[ii+h][g][1]+', ';
                }
                orgString += allOrganizers[ii+h][allOrganizers[ii+h].length-1][1]
                //console.log(orgString);
              } 
              
              
              //var t = document.createTextNode(allEvents[ii][currentYear][h].post_title+" - "+orgString);      // Create a text node
              //para.appendChild(t);                                          // Append the text to <p>
              //document.getElementById("myDIV").appendChild(para); 
            }
            // Move backwards through years to oldest exhibition year
            currentYear--;
          }
          
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

      for(var h=0; h<thisOne.length; h++) {
        //removeClass(all[h], "hide");
        //addClass(all[h], "showing");
      }
      console.log(thisOne[0])   
      
    }
  </script>
</div>
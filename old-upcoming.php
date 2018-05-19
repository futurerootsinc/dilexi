<?php /* Template Name: Upcoming */ ?>
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

<div id="upcoming">
    <?php get_template_part('template-parts/navigation/menu') ?>
  <div id="shows-container">
      <?php 
        $rightnow = date("Y-m-d H:i");
              
        $events = tribe_get_events( array(
            'start_date' => date( 'Y-m-d H:i:s', strtotime('now')),
            'eventDisplay'   => 'custom',
            'posts_per_page' => -1
        ));

        $upcoming_show_count = sizeof($events);
        

        $upcomingEvents = array();
        foreach ($events as $value) {
          
          // if end date is after today
          if( strtotime($value->EventEndDate) > strtotime('now') ) {
            $artistID = sp_get_organizer($value->ID);

            $exhibitTitle = get_the_title( $value );

            $start = date("F j, Y - ", strtotime($value->EventStartDate));
            $end = date("F j, Y", strtotime($value->EventEndDate));
            $fulldate = $start . '' . $end;
            $fulldate;
            $url =  wp_get_attachment_url( get_post_thumbnail_id($value), 'thumbnail' );
            $showDetails = array($artistID, $exhibitTitle, $fulldate, $url);
            array_push($upcomingEvents, $showDetails);
          }
          
          unset($value); // break the reference with the last element
        }
      
        $upcoming_show_count = sizeof($upcomingEvents);

        ?>
      
      <script>
        
        var upcoming = <?php echo json_encode($upcomingEvents); ?>;
        var upcomingShows = "<?php echo $upcoming_show_count; ?>";
        var showElements = [];

        // Makes paragraph tags for each current show and divs
        var fullContainer = document.getElementById("shows-container");
        for(var i=0; i<upcomingShows; i++) {
          if(i%2 == 0) {
            console.log('made it')
            var row = document.createElement("DIV");
            row.className += " upcoming-show-row";
          }
          var show = document.createElement("DIV");
          show.className += " upcoming-show-info";

          var a = upcoming[i][0];
          
          var n = document.createElement("P"); 
          var t = document.createTextNode(a);
          
          n.appendChild(t);
          show.appendChild(n);


          var a = upcoming[i][1];
          
          var n = document.createElement("P"); 
          var t = document.createTextNode(a);
          
          n.appendChild(t);
          show.appendChild(n);

          var a = upcoming[i][2];
          
          var n = document.createElement("P"); 
          var t = document.createTextNode(a);
          
          n.appendChild(t);
          show.appendChild(n);
          row.appendChild(show);
          console.log(row);
          if(i%2 != 0) {
            fullContainer.appendChild(row);
          }
          console.log()
          showElements.push(show);
        }
        
        
    </script>
  </div>
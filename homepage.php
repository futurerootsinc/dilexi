<?php /* Template Name: Home */ ?>
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

<div id="current">
    <?php get_template_part('template-parts/navigation/menu') ?>
    <script>
      document.body.id = "frontpage";
    </script>
    

  <div id="current-shows">
       <?php 
        $rightnow = date("Y-m-d H:i");
              
        $events = tribe_get_events( array(
            'start_date' => date( 'Y-m-d H:i:s', strtotime( '-12 week' ) ),
            'eventDisplay'   => 'custom',
            'posts_per_page' => -1
        ));

        $current_show_count = sizeof($events);

        $upcomingEvents = array();
        $site = get_site_url();
        foreach ($events as $value) {
          
          // if end date is after today
          if( strtotime($value->EventEndDate) > strtotime('now') ) {
            $artistID = sp_get_organizer($value->ID);

            $exhibitTitle = get_the_title( $value );
            $exhibitID = $value->post_name;
            

            $start = date("F j, Y - ",strtotime($value->EventStartDate));
            $end = date("F j, Y",strtotime($value->EventEndDate));
            $fulldate = $start . '' . $end;
            $fulldate;
            $url =  wp_get_attachment_url( get_post_thumbnail_id($value), 'thumbnail' );
            $showDetails = array($artistID, $exhibitTitle, $fulldate, $url, $site.'/'.$exhibitID);
            array_push($upcomingEvents, $showDetails);
          }

          unset($value); // break the reference with the last element
        }
      
        $current_show_count = sizeof($upcomingEvents);

        ?>
      
      <script>
        
        var upcoming = <?php echo json_encode($upcomingEvents); ?>;
        
        // Fix hardcoding of this variable so that it constrains to current shows
        //var currentShows = "<?php echo $current_show_count; ?>";
        var currentShows = 2;
        console.log('current shows: '+currentShows);
        var showElements = [];
        console.log(upcoming)
        // Makes paragraph tags for each current show and divs
        
        for(var i=0; i<2; i++) {
          
          var bg = upcoming[i][3];
          document.body.style.backgroundImage = "url('"+bg+"')";

          var a = upcoming[i][0];
          var anch = document.createElement("A");
          anch.className += " current-show-info";
          anch.href = upcoming[i][4];
          var n = document.createElement("P"); 
          var t = document.createTextNode(a);
          
          n.appendChild(t);
          anch.appendChild(n);


          var a = upcoming[i][1];
          var n = document.createElement("P"); 
          var t = document.createTextNode(a);
          
          n.appendChild(t);
          anch.appendChild(n);
          

          var a = upcoming[i][2];
          var n = document.createElement("P"); 
          var t = document.createTextNode(a);
          
          n.appendChild(t);
          anch.appendChild(n);

          
          showElements.push(anch);
          document.getElementById("current-shows").appendChild(anch);
          
        }
        
          var children = showElements[1].childNodes;
            for(j=0; j<children.length; j++) {
              children[j].style.backgroundColor = "red";
            }
          var myVar = setInterval(myTimer, 5000);
          var counter = 1;
          console.log(counter);
          function myTimer() {
            
            bg = upcoming[counter%currentShows][3];
            document.body.style.backgroundImage = "url('"+bg+"')";
            var children = showElements[counter%2].childNodes;
            
            //console.log(children);
            for(j=0; j<children.length; j++) {
              children[j].style.backgroundColor = "red";
            }
            for(d=1; d<showElements.length; d++){
              var children = showElements[(counter+d)%2].childNodes;
              for(j=0; j<children.length; j++) {
                children[j].style.backgroundColor = "white";
              }
            }
            counter++;
          }
        
      </script>

    </div>

</div>
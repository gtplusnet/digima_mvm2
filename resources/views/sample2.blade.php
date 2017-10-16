<?php
function getPageFanCount() {
    $pageData = @file_get_contents('https://graph.facebook.com/AngDiaryNgLoyal/');
    if($pageData) { // if valid json object
        $pageData = json_decode($pageData); // decode json object
        if(isset($pageData->likes)) { // get likes from the json object
           return $pageData->likes;
        }
    } else {
        echo 'page is not a valid FB Page';
    }
}
echo getPageFanCount();

function wds_post_like_count( $post_id ='https://www.facebook.com/AngDiaryNgLoyal/') {
 
  // Check for transient
  if ( ! ( $count = get_transient( 'wds_post_like_count' . $post_id ) ) ) {
 
    // Setup query arguments based on post permalink
    $fql  = "SELECT url, ";
    //$fql .= "share_count, "; // total shares
    //$fql .= "like_count, "; // total likes
    //$fql .= "comment_count, "; // total comments
    $fql .= "total_count "; // summed total of shares, likes, and comments (fastest query)
    $fql .= "FROM link_stat WHERE url = '" . get_permalink( $post_id ) . "'";
 
    // Do API call
    $response = wp_remote_retrieve_body( wp_remote_get( 'https://api.facebook.com/method/fql.query?format=json&query=' . urlencode( $fql ) ) );
 
    // If error in API call, stop and don't store transient
    if ( is_wp_error( $response ) )
      return 'error';
 
    // Decode JSON
    $json = json_decode( $response );
 
    // Set total count
    $count = absint( $json[0]->total_count );
 
    // Set transient to expire every 30 minutes
    set_transient( 'wds_post_like_count' . $post_id, absint( $count ), 30 * MINUTE_IN_SECONDS );
 
  }
 
 return absint( $count );
 
}
echo wds_post_like_count();


?>



<!DOCTYPE html>
<html>
  <head>
    <title>bootstrap3_player demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~ Required CSS files ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">    
    <link href="css/bootstrap3_player.css" rel="stylesheet">
    <!-- ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^  -->
    <!-- ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^  -->

  </head>
  <body>


    <div class="container">
      
      <!-- /jumbotron -->
      <div class="row col-md-8 col-md-offset-2 col-xs-12">



        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Example: Audio with data ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
        <audio controls
          data-info-album-art="https://farm9.staticflickr.com/8642/16106988340_058071cdbe_z.jpg"
          data-info-album-title="8874"
          data-info-artist="Iain Houston and Felix Gibbons"
          data-info-title="BeBop Aliens"
          data-info-label="Independent"
          data-info-year="2005"
          data-info-att="Music: Iain Houston and Felix Gibbons."
          data-info-att-link="https://github.com/iainhouston">
          <source src="http://playerdemo.iainhouston.com/tests/BeBopAliens.ogg" type="audio/ogg" />
          <source src="http://playerdemo.iainhouston.com/tests/BeBopAliens.mp3" type="audio/mpeg" />
          <a href="http://playerdemo.iainhouston.com/tests/BeBopAliens.mp3">BeBopAliens</a>
          An html5-capable browser is required to play this audio. 
        </audio>
    </div><!-- /row -->
      <div class="row col-md-6 col-md-offset-3 col-xs-12">
        <audio controls>
          <source src="http://www.w3schools.com/html/horse.ogg" type="audio/ogg" />
          <source src="http://www.w3schools.com/html/horse.mp3" type="audio/mpeg" />
          <a href="http://www.w3schools.com/html/horse.mp3">horse</a>
          An html5-capable browser is required to play this audio. 
        </audio>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 
      <script src="js/bootstrap3_player.js"></script>
    
    </div>
  </body>
</html>
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
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    // $( "#datepicker" ).datepicker();
   
    $( "#datepicker" ).change(function(){
        var date = $("#datepicker" ).datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
        var james = $(this).val()
        alert(date);
    });
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="text" class="date" id="datepicker" value="20107/12/23"></p>
 
 
</body>
</html>
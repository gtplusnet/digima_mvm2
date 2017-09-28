<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>My Adventure.ph</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="bootstrap/css/modern-business.css" rel="stylesheet">
        <!-- some CSS styling changes and overrides -->
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar .file-input {
    display: table-cell;
    max-width: 220px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
    </head>
    <body>
<h1>Hi, {{ $name }}</h1>
<p>Sending Mail from Laravel.</p>



<br><br><br><br><br><br><br><br><br><br><br><br><center>
   <form action="uploadfile" method="post" enctype="multipart/form-data">

   {{ csrf_field() }}

    Select image to upload:<br>
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="Upload Image" >
</form>
       
     
</form>



   
   </body>
</html>
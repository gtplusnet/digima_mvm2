<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
        
        .dropdown-menu > li.kopie > a {
        padding-left:5px;
        }
        
        .dropdown-submenu {
        position:relative;
        }
        .dropdown-submenu>.dropdown-menu {
        top:0;left:100%;
        margin-top:-6px;margin-left:-1px;
        -webkit-border-radius:0 6px 6px 6px;-moz-border-radius:0 6px 6px 6px;border-radius:0 6px 6px 6px;
        }
        
        .dropdown-submenu > a:after {
        border-color: transparent transparent transparent #333;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        content: " ";
        display: block;
        float: right;
        height: 0;
        margin-right: -10px;
        margin-top: 5px;
        width: 0;
        }
        
        .dropdown-submenu:hover>a:after {
        border-left-color:#555;
        }
        .dropdown-menu > li > a:hover, .dropdown-menu > .active > a:hover {
        text-decoration: none;
        }
        
        @media (max-width: 767px) {
        
        
        
        .navbar-nav .dropdown-menu > li > a {
        color: red;
        background-color: #ccc;
        border-radius: 4px;
        margin-top: 2px;
        }
        
        .navbar-nav .open .dropdown-menu > li > a:hover,
        .navbar-nav .open .dropdown-menu > li > a:focus {
        background-color: #ccc;
        }
        .navbar-nav .open .dropdown-menu {
        border-bottom: 1px solid white;
        border-radius: 0;
        }
        .dropdown-menu {
        padding-left: 10px;
        }
        .dropdown-menu .dropdown-menu {
        padding-left: 20px;
        }
        .dropdown-menu .dropdown-menu .dropdown-menu {
        padding-left: 30px;
        }
        li.dropdown.open {
        border: 0px solid red;
        }
        }
        
        @media (min-width: 768px) {
        ul.category li:hover > ul.dropdown-menu {
        display: block;
        }
        #navbar {
        text-align: center;
        }
        }
        ul
        {
        width:100%;
        }
        li
        {
        width:100%;
        }
        </style>
        
    </head>
    <body>
        <div class="container">
            <div align="right">
<div id="google_translate_element"></div>
<span><script type="text/javascript">
//<![CDATA[
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
//]]>
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</script></span></div>
        </div>
        <div class="col-md-12">
            <div class="col-md-3">
                <ul class="category navbar-nav list-group">
                    
                    <li class="dropdown  dropdown-submenu list-group-item">
                        <a href="#" style="color:black;" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        
                        <ul class="dropdown-menu">
                            <li class="kopie"><a href="#">Dropdown</a></li>
                            <li><a href="#">Dropdown Link 1</a></li>
                            <li class="active"><a href="#">Dropdown Link 2</a></li>
                            <li><a href="#">Dropdown Link 3</a></li>
                            
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 4</a>
                            <ul class="dropdown-menu">
                                <li class="kopie"><a href="#">Dropdown Link 4</a></li>
                                <li><a href="#">Dropdown Submenu Link 4.1</a></li>
                                <li><a href="#">Dropdown Submenu Link 4.2</a></li>
                                <li><a href="#">Dropdown Submenu Link 4.3</a></li>
                                <li><a href="#">Dropdown Submenu Link 4.4</a></li>
                                
                            </ul>
                        </li>
                        
                        <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Link 5</a>
                        <ul class="dropdown-menu">
                            <li class="kopie"><a href="#">Dropdown Link 5</a></li>
                            <li><a href="#">Dropdown Submenu Link 5.1</a></li>
                            <li><a href="#">Dropdown Submenu Link 5.2</a></li>
                            <li><a href="#">Dropdown Submenu Link 5.3</a></li>
                            <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown Submenu Link 5.4</a>
                            <ul class="dropdown-menu">
                                <li class="kopie"><a href="#">Dropdown Submenu Link 5.4</a></li>
                                <li><a href="#">Dropdown Submenu Link 5.4.1</a></li>
                                <li><a href="#">Dropdown Submenu Link 5.4.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </li>
    </ul>
</div>
</div>
</body>
<script>
function googleTranslateElementInit() {
new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
// function googleTranslateElementInit() {
//   new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
// }
</script>
<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</html>
{{-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.dropdown-submenu {
position: relative;
}
.dropdown-submenu .dropdown-menu {
top: 0;
left:100px;
margin-top: -1px;
}
button
{
}
</style>
</head>
<body>
<div class="container">
<ul class="dropdown dropdown-submenu">
    
    <li class="dropdown-submenu"  data-toggle="dropdown">Tutorials
    </li>
    <ul class="dropdown dropdown-menu">
        <li><a tabindex="-1" href="#">HTML</a></li>
        <li><a tabindex="-1" href="#">CSS</a></li>
        <li class="dropdown-submenu">
            <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                <li class="dropdown-submenu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">fgfdgfdg<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">3rd level dropdown</a></li>
                        <li><a href="#">3rd level dropdown</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</ul>
</div>
<script>
$(document).ready(function(){
$('.dropdown-submenu a.test').on("click", function(e){
$(this).next('ul').toggle();
e.stopPropagation();
e.preventDefault();
});
});
</script>
</body>
</html> --}}
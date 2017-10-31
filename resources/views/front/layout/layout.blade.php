<!DOCTYPE html>
<html>
<style>
.js
{
    overflow-x:hidden !important;
}
</style>
    <head>
        <!-- Title -->
        <title>CROTIA Directory | @yield('title')</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template"/>
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- LIGHTBOX STYLES -->
        <link rel="stylesheet" href="/initializr/css/lightbox.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="/initializr/css/bootstrap.min.css">
        <link rel="stylesheet" href="/initializr/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- FONT FAMILY -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
        
        <script src="/initializr/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

        <!-- CSS Ko -->
        <link rel="stylesheet" type="text/css" href="/assets/front/css/layout.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/home.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/registration.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/login.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/success.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/searchresult.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/business.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/about.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/contact.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/category.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/payment.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/globals.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/resultsortgrid.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/searchtabular.css">
        <link rel="stylesheet" type="text/css" href="/assets/front/css/sendemail.css">

        <link rel="stylesheet" type="text/css" href="/assets/front/css/google_translate.css">


        <link rel="stylesheet" type="text/css" href="/assets/front/css/dummypage.css">
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <!-- Toastr Plugin CSS -->
        <link href="/assets/js/toastr/build/toastr.css" rel="stylesheet"/>

    </head>
    <body>
        <!-- HEADER NAVBAR HERE -->
        <div class="header-nav ">
            <div class="container">
               
                <div class="menu-bar">
                    <div class="pull-left">
                        <!-- TAB BAR -->  
                        <li class="nav-tab {{ Request::segment(1) == '' ? 'active-link' : '' }}"><a class="nav" href="/">Home</a></li>
                        <li class="nav-tab {{ Request::segment(1) == 'about' ? 'active-link' : '' }}"><a class="nav" href="/about">About</a></li>
                        <li class="nav-tab last {{ Request::segment(1) == 'contact' ? 'active-link' : '' }}"><a class="nav" href="/contact">Contact Us</a></li>
                       
                    </div>
                    <div class="pull-right">
                         <!-- BUTTONS -->
                        <div class="btn-login">
                            <a href="/login">Log in</a>    
                        </div>
                        <div class="btn-register">
                            <a href="/registration">Register</a>
                        </div>
                        <div class="language-selection" >

                            <div id="google_translate_element"></div>
                            <style>
                            .goog-logo-link
                            {
                                visibility:hidden;
                                margin-right:-20px;
                            }
                            .goog-te-combo
                            {
                                background-color: black;
                                color:#fff;
                                width:140px;
                            }
                            .skiptranslate
                            {
                                margin-right: -130px;
                                
                            }
                           </style>

                            {{-- <select class="language-select">
                                <option val="english">English</option>
                                <option val="croatian">Croatian</option>
                            </select> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- header-nav -->
        <div class="header-nav-bottom">
        <div class="container">
                <div class="pull-left col-md-2">
                    <img  src="/images/croatia_directory_logo.png">
                </div>
                <div class="menu-bar col-md-10">
                    <div class="searchbox-holder">

                        <form action="/business-search" method="POST" name="searchRegisteredBusinessForm" id="searchRegisteredBusinessForm">
                            {{ csrf_field() }}
                               
                                <div class="col-md-2 searchfields-format pull-right">
                                    <button type="submit" class="btn btn-search" name="searchButton" id="searchButton"><i class="fa fa-search"></i><p class="search-btn-text">Search</p></button>
                                </div>
                                 <div class="col-md-2 searchfields-format pull-right">
                                    <input class="zipcode-textbox" type="text" placeholder="Postal Code" name="postalCode" id="postalCode">
                                </div>
                                <div class="col-md-3 searchfields-format pull-right">
                                    <select class="counties-selectbox" required="true" name="countyDropdown" id="countyDropdown">
                                        <option value="" disabled selected>--County--</option>
                                        @foreach($countyList as $countyListItem)
                                        <option value="{{ $countyListItem->county_id }}">{{ $countyListItem->county_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-4 searchfields-format pull-right">
                                    <input  type="text" class="business-name-textbox" name="businessKeyword" id="businessKeyword" placeholder="Business, Category or Keyword..." required="true">
                                </div>
                                
                               
                            
                        </form>
                    </div>
                    
                </div>
         
        </div>
        </div><!-- header-nav -->
        
    

        
        @yield('content')

        <!-- FOOTER HERE -->
        <div class="footer-upper">
            <div class="container">
                <div class="col-md-12 no-padding footer-body">
                    <div class="col-md-5">
                        <p class="footer-title">SUBSCRIBE TO OUR NEWSLETTER</p>
                        <p class="footer-content newsletter-content">Join today to recieve latest offers</p>
                        <input type="text" class="input-emailadd" placeholder="Your Email Address">
                    </div>
                    <div class="col-md-4">
                        <p class="footer-title">CONTACT US</p>
                        <div class="contact-content">
                            <div class="img-holder">
                                <img src="/images/map_icon.png">
                            </div>
                            <p class="footer-content">8871 Spruce Street, Elizabeth City, NC 27909</p>
                        </div>
                        <div class="contact-content">
                            <div class="img-holder">
                                <img src="/images/mobile_icon.png">
                            </div>
                            <p class="footer-content">0926-536-0045</p>
                        </div>
                        <div class="contact-content">
                            <div class="img-holder">
                                <img src="/images/mail_icon.png">
                            </div>
                            <p class="footer-content">contact@yoursite.com</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="footer-title">ABOUT US</p>
                        <img src="/images/footer_logo.png">
                        <p class="footer-content aboutus-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div><!-- footer-upper -->
        <div class="footer-bottom">
            <div class="container">
                <p class="footer-text-bottom">COPYRIGHT 2017 © CROATIA DIRECTORY. ALL RIGHTS RESERVED POWERED BY DIGIMA WEB SOLUTIONS</p>
            </div>
        </div><!-- footer-bottom -->




        <!-- DITO ANG SCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/initializr/js/vendor/jquery-1.11.2.min.js">')</script>
        <script src="/initializr/js/vendor/bootstrap.min.js"></script>



        <!-- FOR GOOGLEMAP -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDoOPN-LMZZYOB3qYn3AcQV3ITZU7tuUQ&callback=initMap">
        </script>
       <!--  <script type="text/javascript" scr="/assets/js/front/rangeslider.js"></script> -->


        <!-- Registration JS -->
        {{-- <script src="/assets/js/front/registration.js"></script> --}}
        {{-- <script src="/assets/js/front/business-registration.js"></script> --}}


  
        
        <!-- Toastr Plugin JS !-->
        <script src="/assets/js/toastr/toastr.js"></script>


       <!-- LIGHTBOX SCRIPT -->
        <script src="/initializr/js/lightbox.min.js"></script>
        <!-- HANGGANG DITO -->
        {{-- LANGUAGE --}}
         <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
        }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>
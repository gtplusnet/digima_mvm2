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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        
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
        <link rel="stylesheet" type="text/css" href="/assets/front/css/global_login.css">


        <link rel="stylesheet" type="text/css" href="/assets/front/css/dummypage.css">
        

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <!-- Toastr Plugin CSS -->
        <link href="/assets/js/toastr/build/toastr.css" rel="stylesheet"/>

    </head>
    <body>
         <!-- HEADER NAVBAR HERE -->
        <div class="headers-nav " style="padding:20px 20px 20px 20px;">
            <div class="container">
                <div class="pull-left ">
                    <img  src="/images/croatia_directory_logo.png">
                </div>
               
                <div class="menu-bar">
                    
                    <div class="pull-right">
                         <!-- BUTTONS -->
                        <div class="btn-login">
                            <a href="">Log in</a>    
                        </div>
                        <div class="btn-register">
                            <a href="/forgot_password_user">Forgot Password</a>
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
        @yield('content')       
        <!-- FOOTER HERE -->
        <div style="margin-bottom: -20px;background-color: #3D516D;">
        <div class="footer-uppers">
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
        <div class="footer-bottoms">
            <div class="container">
                <p class="footer-text-bottom">COPYRIGHT 2017 © CROATIA DIRECTORY. ALL RIGHTS RESERVED POWERED BY DIGIMA WEB SOLUTIONS</p>
            </div>
        </div><!-- footer-bottom -->
        </div>
        <!-- DITO ANG SCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        {{-- <script>window.jQuery || document.write('<script src="/initializr/js/vendor/jquery-1.11.2.min.js"></script>')</script> --}}
        <script src="/initializr/js/vendor/bootstrap.min.js"></script>
        


        <!-- FOR GOOGLEMAP -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDoOPN-LMZZYOB3qYn3AcQV3ITZU7tuUQ&callback=initMap">
        </script>
       <!--  <script type="text/javascript" scr="/assets/js/front/rangeslider.js"></script> -->


        <!-- Registration JS -->
        <script src="/assets/js/front/registration.js"></script>


  
        
        <!-- Toastr Plugin JS !-->
        <script src="/assets/js/toastr/toastr.js"></script>


       <!-- LIGHTBOX SCRIPT -->
        <script src="/initializr/js/lightbox.min.js"></script>
        <!-- HANGGANG DITO -->
         <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
        }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>
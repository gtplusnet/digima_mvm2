<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>CROTIA Directory | {{ $page }}</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template"/>
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    </head>
    <body>
        <div class="header-nav">
            <div class="container clearfix">
                <div class="pull-left">
                    <div class="header-logo">
                        <img src="/images/croatiadirectory_logo.jpg">
                    </div>
                </div>
                <div class="pull-right">
                    <div class="menu-bar">  
                        <li class="nav-tab {{ Request::segment(1) == '' ? 'active' : '' }}"><a class="nav" href="/">Home</a></li>
                        <li class="nav-tab {{ Request::segment(1) == '' ? 'active' : '' }}"><a class="nav" href="/">Category</a></li>
                        <li class="nav-tab {{ Request::segment(1) == '' ? 'active' : '' }}"><a class="nav" href="/">About</a></li>
                        <li class="nav-tab {{ Request::segment(1) == '' ? 'active' : '' }}"><a class="nav" href="/">Contact Us</a></li>
                    </div>
                    <div class="pull-right">
                        <div class="menu-btn">
                            <div class="spacer-btn">
                                <a href="/login"><button class="btn btn-login"><i class="fa fa-power-off"> Log in</i></button></a>
                            </div>
                            <div>
                                <a href="/registration"><button class="btn btn-register"><i class="fa fa-plus-square"> Register</i></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- header-nav -->
        @yield('content')       
        <div class="footer">
            <div class="container clearfix">
                <div class="footer-top">
                    <div class="col-md-5">
                        <p class="footer-title">SUBSCRIBE TO OUR NEWSLETTER</p>
                        <p class="footer-text">Join today to recieve latest offers</p>
                        <input class="email-add-textbox" type="text" name="email-add" placeholder="Your Email Address">
                        <div class="social-links">
                            <div class="holder-facebook">
                                <a href=""><i class="fa fa-facebook social-icon"></i></a>
                            </div>
                            <div class="holder-twitter">
                                <a href=""><i class="fa fa-twitter social-icon"></i></a>
                            </div>
                            <div class="holder-instagram">
                                <a href=""><i class="fa fa-instagram social-icon"></i></a>
                            </div>
                            <div class="holder-pinterest">
                                <a href=""><i class="fa fa-pinterest-p social-icon"></i></a>
                            </div>
                            <div class="holder-googleplus">
                                <a href=""><i class="fa fa-google-plus social-icon"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <p class="footer-title">CONTACT US</p>
                        <div class="contactus-holder">
                            <i class="material-icons contact-icon">location_on</i>
                            <div class="spacer-contact">
                                <p class="footer-contact">8871 Spruce Street,<br>Elizabeth City, NC 27909</p>
                            </div>
                        </div>
                        <div class="contactus-holder">
                            <i class="material-icons contact-icon">phone_iphone</i>
                            <div class="spacer-contact">
                                <p class="footer-contact">0926-536-0045</p>
                            </div>
                        </div>
                        <div class="contactus-holder">
                            <i class="material-icons contact-icon">mail_outline</i>
                            <div class="spacer-contact">
                                <p class="footer-contact">contact@yoursite.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="footer-title">ABOUT US</p>
                        <img src="/images/invert_croatiadirectory_logo.png" class="invert-logo">
                        <p class="footer-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container clearfix">
                <div class="footer-bottom">
                    <div class="col-md-12">
                        <p class="footer-text-bottom">COPYRIGHT 2017 © CROATIA DIRECTORY. ALL RIGHTS RESERVED POWERED BY DIGIMA WEB SOLUTIONS</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- DITO ANG SCRIPT -->
        
        <script src="/initializr/js/vendor/bootstrap.min.js"></script>
        <script>window.jQuery || document.write('<script src="/initializr/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="/initializr/js/vendor/bootstrap.min.js"></script>
       <!--  <script type="text/javascript" scr="/assets/js/front/rangeslider.js"></script> -->

        <!-- HANGGANG DITO -->
    </body>
</html>
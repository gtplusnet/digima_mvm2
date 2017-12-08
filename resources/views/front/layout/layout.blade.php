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

        <title>Žute Stranice | @yield('title')</title>
        
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
        <link rel="stylesheet" type="text/css" href="/assets/front/css/dl-menu.css">


        <!-- Toastr Plugin CSS -->
        <link href="/assets/js/toastr/build/toastr.css" rel="stylesheet"/>
    </head>
    <body>
        <!-- HEADER -->

        <div class="header-nav">
            <div class="container">
                <div class="menu-bar">
                    <div class="pull-left">
                        <!-- TAB BAR -->
                        <li class="nav-tab {{ Request::segment(1) == '' ? 'active-link' : '' }}"><a class="nav" href="/">Početna</a></li>
                        <li class="nav-tab {{ Request::segment(1) == 'about' ? 'active-link' : '' }}"><a class="nav" href="/about">O nama</a></li>
                        <li class="nav-tab last {{ Request::segment(1) == 'contact' ? 'active-link' : '' }}"><a class="nav" href="/contact">Kontaktirajte Nas</a></li>
                    </div>
                    <div class="pull-right">
                        <!-- BUTTONS -->
                        <div class="btn-login">
                            <a href="/login">Prijava</a>
                        </div>
                        <div class="btn-register">
                            <a href="/registration">Registrirajte se</a>
                        </div>
                        <div class="language-selection">
                            <a href="javascript:;" id="English" onclick="translateLanguage(this.id);">
                                <img src="/images/flag_usa.ico" style="max-height:20px;border: 1px solid #fff;"/>
                            </a>
                        </div>
                        <div class="language-selection">
                            <a href="javascript:;" id="Croatia" onclick="translateLanguage(this.id);">
                                <img src="/images/flag_croatia.ico" style="max-height:20px;border: 1px solid #fff;"/>
                            </a>
                        </div>
                        <div class="language-selection" >
                            <div id="google_translate_element" style="display:none;"></div>
                            <style>
                            .goog-te-gadget-icon
                            {
                            visibility:hidden;
                            text-align:center;
                            position:absolute;
                            }
                            /*.goog-te-banner-frame
                            /*{*/
                                /*visibility:hidden !important;
                                height:0px !important;*/
                            /*}*/
                            .goog-te-banner-frame.skiptranslate {display: none !important;} 
                            body { top: 0px !important; }
                            
                            </style>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-bottom" id="navbar">
            <div class="container searchbox-holder">
                <form action="/business-search" method="POST" name="searchRegisteredBusinessForm" id="searchRegisteredBusinessForm">
                    {{ csrf_field() }}
                    <div class="col-md-2" >
                        <img  src="/images/croatia_directory_logo.png">
                    </div>
                    <div class="col-md-3 searchfields-format ">
                        <input  type="text" class="business-name-textbox" name="businessKeyword" id="businessKeyword" placeholder="Poslovanje, kategorija ili tipkovnica.." required="true">
                    </div>
                    <div class="col-md-3 searchfields-format ">
                        <select class="counties-selectbox" required="true" name="countyDropdown" id="countyDropdown" default>
                            <option value="" disabled selected><div>--Županja--</div></option>
                            @foreach($countyList as $countyListItem)
                            <option value="{{ $countyListItem->county_id }}">{{ $countyListItem->county_name }}</option>
                            @endforeach
                        </select>
                        <style>
                        select:required:invalid {
                              color: gray;
                            }
                            option[value=""][disabled] {
                              display: none;
                            }
                            option {
                              color: black;
                            }
                        </style>
                    </div>
                    <div class="col-md-2 searchfields-format ">
                        <input class="zipcode-textbox" type="text" placeholder="grad ili poštanski broj" name="postalCode" id="postalCode">
                    </div>
                    <div class="col-md-2 searchfields-format ">
                        <button type="submit" class="btn btn-search" name="searchButton" id="searchButton"><i class="fa fa-search"></i><p class="search-btn-text">Tražilica</p></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="header-wrapper">
            <div class="mob-top-header">
                <div class="left-container">
                    <div class="language-selection">
                        <a href="javascript:;" id="English" onclick="translateLanguage(this.id);">
                            <img src="/images/flag_usa.ico" style="max-height:20px;border: 1px solid #fff;"/>
                        </a>
                    </div>
                    <div class="language-selection">
                        <a href="javascript:;" id="Croatia" onclick="translateLanguage(this.id);">
                            <img src="/images/flag_croatia.ico" style="max-height:20px;border: 1px solid #fff;"/>
                        </a>
                    </div>
                </div>
                <div class="right-container">
                    <a href="/login"><span class="login">Login</span></a>
                    <a href="/registration"><span class="reg">Register</span></a>
                </div>
            </div>
            <div class="mob-main-header">
                <div class="row-no-padding clearfix">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <div class="left-container">
                            {{-- <i id="nav_list" class="fa fa-bars hamburger" onclick="on()"></i> --}}
                        </div>    
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <a href="/">
                            <div class="header-logo-container">
                                <img  src="/images/croatia_directory_logo.png">
                            </div>
                        </a>
                    </div>
                    <div style="z-index: 9;" class="col-md-3 col-sm-3 col-xs-3">
                        <div class="right-container">
                           <i id="show" class="fa fa-search"></i> 
                        </div> 
                    </div>
                </div>
                <!-- MOBILE PUSH MENU -->

                <div id="dl-menu" class="dl-menuwrapper">
                    <i class="fa fa-bars dl-trigger" style="padding-left: 5px;"></i>
                    <ul class="dl-menu">
                        <li class="menu-title">Navigation</li>
                        <li><a href="/">Home</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        <li class="menu-title">Category Filter</li>

                        @foreach($_mob_categories->where('parent_id','=',0)->where('archived',0) as $categories)
                        <li class="aGALIT">
                            <a href="">{{$categories->business_category_name}}</a>
                            <?php
                                $children = $_mob_categories->where('parent_id', $categories->business_category_id)->where('archived',0);
                            ?>
                            @if($children!=null)
                                <ul class="dl-submenu">
                                    <li class="menu-title">{{$categories->business_category_name}}</li>
                                    @foreach($children->sortBy('parent_id') as $child)
                                        <li>
                                            <a class="parent_filtered" id="parent_filtered">{{ $child->business_category_name }}</a>
                                            <?php
                                                $children1 = $_mob_categories->where('parent_id', $child->business_category_id)->where('archived',0);
                                            ?>
                                            @if($children1!=null)
                                                <ul class="dl-submenu">
                                                    <li class="menu-title">{{ $child->business_category_name }}</li>
                                                    @foreach($children1->sortBy('parent_id') as $child1)
                                                        <li>
                                                            <a href="#">{{ $child1->business_category_name }}</a>
                                                            <?php
                                                                $children2 = $_mob_categories->where('parent_id', $child1->business_category_id)->where('archived',0);
                                                            ?>
                                                            @if($children2!=null)
                                                                <ul class="dl-submenu">
                                                                    <li class="menu-title">{{ $child1->business_category_name }}</li>
                                                                    @foreach($children2->sortBy('parent_id') as $child2)
                                                                        <li>
                                                                            <a href="#">{{ $child2->business_category_name }}</a>
                                                                            <?php
                                                                                $children2 = $_mob_categories->where('parent_id', $child1->business_category_id)->where('archived',0);
                                                                            ?>
                                                                            @if($children2!=null)
                                                                            <ul class="dl-submenu">
                                                                                <li class="menu-title">{{ $child2->business_category_name }}</li>
                                                                                @foreach($children2->sortBy('parent_id') as $child2)
                                                                                <li>
                                                                                    <a href="#">{{ $child2->business_category_name }}</a>
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                            @endif
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
            <div id="search_nav" class="search-container">
                <form>
                    <input  type="text" class="search-control" name="businessKeyword" id="businessKeyword" placeholder="Business, Category or Keyword..." required="true">
                    <select class="search-control" required="true" name="countyDropdown" id="countyDropdown" default>
                        <option value="" disabled selected><div>--County--</div></option>
                        @foreach($countyList as $countyListItem)
                        <option value="{{ $countyListItem->county_id }}">{{ $countyListItem->county_name }}</option>
                        @endforeach
                    </select>
                    <input class="search-control" type="text" placeholder="City or Zip Code" name="postalCode" id="postalCode">
                    <button type="submit" class="btn btn-search" name="searchButton" id="searchButton">
                        <span><i class="fa fa-search"></i></span>&nbsp;&nbsp;<span>Search</span>
                    </button>
                </form>
            </div>
        </div>
        
        @yield('content')
        
        <!-- FOOTER HERE -->
        <div class="footer-upper">
            <div class="container">
                <div class="col-md-12 no-padding footer-body">
                    <div class="col-md-5">
                        <p class="footer-title">PRETPLATITE SE NA NAŠE OBAVIJESTI</p>
                        <p class="footer-content newsletter-content">Pridružite se danas da biste primali najnovije ponude</p>
                        <input type="text" class="input-emailadd" placeholder="Your Email Address">
                    </div>
                    <div class="col-md-4">
                        <p class="footer-title">KONTAKTIRAJTE NAS</p>
                        <div class="contact-content">
                            <div class="img-holder">
                                <img src="/images/map_icon.png">
                            </div>
                            <p class="footer-content">
                                @if(isset($contact_us->complete_address)==null)@else {{$contact_us->complete_address}}@endif
                            </p>
                        </div>
                        <div class="contact-content">
                            <div class="img-holder">
                                <img src="/images/mobile_icon.png">
                            </div>
                            <p class="footer-content">
                                 @if(isset($contact_us->phone_number)==null)@else {{$contact_us->phone_number}}@endif
                                </p>
                        </div>
                        <div class="contact-content">
                            <div class="img-holder">
                                <img src="/images/mail_icon.png">
                            </div>
                            <p class="footer-content">@if(isset($contact_us->email)==null)@else {{$contact_us->email}}@endif</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <p class="footer-title">O NAMA</p>
                        <img src="/images/footer_logo.png">
                        <p class="footer-content aboutus-content">The Right Place For Business.</p>
                    </div>
                </div>
            </div>
        </div><!-- footer-upper -->
        <div class="footer-bottom">
            <div class="container">
                <p class="footer-text-bottom">COPYRIGHT 2017 © CROATIA DIRECTORY. ALL RIGHTS RESERVED POWERED BY DIGIMA WEB SOLUTIONS</p>
            </div>
        </div>
        <!-- footer-bottom -->
        <!-- DITO ANG SCRIPT -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- FOR FILTER -->
        <script src="/assets/js/layout_filtering.js"></script>
         <!-- EWAN KO DITO DI AKO GUMAWA -->
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

        <script src="/assets/js/dl-menu.js"></script>
        <!-- HANGGANG DITO -->
        <script>
            $(document).ready(function()
            {
                $(document).on('click', '.dl-menuwrapper li a:only-child', function () 
                {
                    alert();
                    console.log('it works');
                });
            });
        </script>
        <!-- GOOGLE TRANSLATE -->
        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
        <script>
            function translateLanguage(lang) {
                var $frame = $('.goog-te-menu-frame:first');
                $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
                return false;
            }
            function googleTranslateElementInit() 
            {
                new google.translate.TranslateElement({ pageLanguage: 'hr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
            }
        </script>
        <!-- FOR FIXED HEADER -->
        <script>
            window.onscroll = function() {myFunction()};
            var navbar = document.getElementById("navbar");
            var sticky = navbar.offsetTop;
            function myFunction() {
              if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
              } else {
                navbar.classList.remove("sticky");
              }
            }
        </script>

        <!-- SEARCH SHOW -->
        <script type="text/javascript">
            $(document).ready(function()
            {
                $('#show').click(function() {
                    $('#search_nav').toggleClass('search-mob-show');
                });
            });
        </script>

        <script type="text/javascript">
            $(function() {
                $( '#dl-menu' ).dlmenu();
            });
        </script>
    </body>
</html>



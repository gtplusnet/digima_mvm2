<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Žute Stranice | @yield('title') </title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="/assets/admin/general_admin/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="/assets/admin/general_admin/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="/assets/admin/general_admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/general_admin/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/general_admin/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="/assets/admin/general_admin/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="/assets/admin/general_admin/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="/assets/admin/general_admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/general_admin/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/general_admin/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
        <link href="/assets/admin/general_admin/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="/assets/admin/general_admin/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        	
        <!-- Theme Styles -->
        <link href="/assets/admin/general_admin/assets/css/modern.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/general_admin/assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/general_admin/assets/css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" href="/assets/js/iziToast/dist/css/iziToast.min.css">
        
        <script src="/assets/admin/general_admin/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script>
            function translateLanguage(lang) {

                var $frame = $('.goog-te-menu-frame:first');
                if (!$frame.size()) {
                    alert("Error: Could not find Google translate frame.");
                    return false;
                }
                $frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
                return false;
            }
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
            }
        </script>
      
        
    </head>
    <body class="page-header-fixed">
        <main class="page-content content-wrap">
            @include('general_admin.include.header');
            @include('general_admin.include.sidebar');
            {{-- End Sidebar --}}    



            <div class="page-inner"> 



                {{-- Main Wrapper --}} 
                @yield('content')    
                <!-- Main Wrapper -->

                <div class="page-footer">
                    <p class="no-s">2017 &copy; Modern by DigimaHouse.dev</p>
                </div>

            </div><!-- Page Inner -->
        </main><!-- Page Content -->

        @include('general_admin.include.menu')

        <div class="cd-overlay"></div>
       
	

        <!-- Javascripts -->
        <script src="/assets/admin/general_admin/assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/pace-master/pace.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/switchery/switchery.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/waves/waves.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="/assets/admin/general_admin/assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="/assets/admin/general_admin/assets/js/modern.js"></script>
        <script src="/assets/admin/general_admin/assets/js/pages/dashboard.js"></script>
        <script src="https://use.fontawesome.com/6e78a1b40e.js"></script>
        <script src="/assets/js/iziToast/dist/js/iziToast.min.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
    </body>
</html>
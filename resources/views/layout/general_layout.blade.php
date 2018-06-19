<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Žute Stranice | </title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="/assets/general_assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="/assets/general_assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="/assets/general_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/general_assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/general_assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/> 
        <link href="/assets/general_assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>  
        <link href="/assets/general_assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>  
        <link href="/assets/general_assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/general_assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/general_assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/> 
        <link href="/assets/general_assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>   
        <link href="/assets/general_assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>  
        <link href="/assets/general_assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>    



            {{-- <script src="/assets/js/global.ajax.js"></script> --}}


            
        <!-- Theme Styles -->
        <link href="/assets/general_assets/css/modern.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/general_assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="/assets/general_assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="/assets/general_assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="/assets/general_assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        @if((Request::segment(2) != 'profile'))
        <link href="/assets/general_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        @endif
        <style>
        .waves-effect
        {
            text-transform:capitalize !important;
        }
        .page-breadcrumb
        {
            text-transform:capitalize !important;
        }
        .page-title h3
        {
            text-transform:uppercase !important;
        }
        th
        {
            text-transform:capitalize !important;
        }
        .title
        {
            text-transform:capitalize !important;
        }
        </style>
    </head>
    <body class="page-header-fixed">
        @if(session('user_access_level')=='ADMIN')
            <main class="page-content content-wrap">
                @include('layout.general_header');
                @include('general_admin.include.sidebar');
                <div class="page-inner">
                    @yield('content')    
                    <div class="page-footer">
                        <p class="no-s">2018 &copy; Powered by DigimaHouse.com</p>
                    </div>
                </div>
                
            </main>
            @include('general_admin.include.menu')
        @elseif(session('user_access_level')=='SUPERVISOR')
            <main class="page-content content-wrap">
                @include('layout.general_header');
                @include('supervisor.include.sidebar');
                <div class="page-inner">
                    @yield('content')    
                    <div class="page-footer">
                        <p class="no-s">2017 &copy; Powered by DigimaHouse.com</p>
                    </div>
                </div>
            </main>
            @include('supervisor.include.menu')
        @elseif(session('user_access_level')=='AGENT')
            <main class="page-content content-wrap">
                @include('layout.general_header');
                @include('agent.include.sidebar');
                <div class="page-inner">
                    @yield('content')    
                    <div class="page-footer">
                        <p class="no-s">2017 &copy; Powered by DigimaHouse.com</p>
                    </div>
                </div>
            </main>
            @include('agent.include.menu')
        @endif
        <div class="cd-overlay"></div>
    

        <!-- Javascripts -->
        <script src="/assets/general_assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="/assets/general_assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="/assets/general_assets/plugins/pace-master/pace.min.js"></script>
        <script src="/assets/general_assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="/assets/general_assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/general_assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="/assets/general_assets/plugins/switchery/switchery.min.js"></script>
        <script src="/assets/general_assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="/assets/general_assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="/assets/general_assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="/assets/general_assets/plugins/waves/waves.min.js"></script>
        <script src="/assets/general_assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="/assets/general_assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="/assets/general_assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="/assets/general_assets/plugins/toastr/toastr.min.js"></script>
        <script src="/assets/general_assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="/assets/general_assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="/assets/general_assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="/assets/general_assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="/assets/general_assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="/assets/general_assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="/assets/general_assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="/assets/general_assets/js/modern.js"></script>
        <script src="/assets/general_assets/js/pages/dashboard.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('body').on('hidden.bs.modal', function (e) {
                if($('.modal').hasClass('in')) 
                {
                    $('body').addClass('modal-open');
                }
                else
                {
                    $('div').removeClass('modal-backdrop');
                }    
            });
        </script>
        <script src="/assets/js/globals.js"></script>
        {{-- <script src="/assets/js/global.ajax.js"></script> --}}
        <!-- PAGES -->
        

    </body>
</html>
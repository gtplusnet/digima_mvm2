 <div class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="logo-box">
            <a href="/general_admin/dashboard" class="logo-text"><img src="/images/croatia_directory_logo.jpg" style="width:150px"></a>
        </div>
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul class="nav navbar-nav navbar-left">
                    <li>        
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                    </li>
                    <li>
                        <a href="#cd-nav" class="waves-effect waves-button waves-classic cd-nav-trigger"><i class="fa fa-diamond"></i></a>
                    </li>
                    <li>        
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-md dropdown-list theme-settings" role="menu">
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Fixed Header 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right fixed-header-check" checked>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Fixed Sidebar 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right fixed-sidebar-check">
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Horizontal bar 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right horizontal-bar-check">
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Toggle Sidebar 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right toggle-sidebar-check">
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Compact Menu 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right compact-menu-check">
                                        </div>
                                    </li>
                                    <li class="no-link" role="presentation">
                                        Hover Menu 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right hover-menu-check">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Boxed Layout 
                                        <div class="ios-switch pull-right switch-md">
                                            <input type="checkbox" class="js-switch pull-right boxed-layout-check">
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="li-group">
                                <ul class="list-unstyled">
                                    <li class="no-link" role="presentation">
                                        Choose Theme Color
                                        <div class="color-switcher">
                                            <a class="colorbox color-blue" href="?theme=blue" title="Blue Theme" data-css="blue"></a>
                                            <a class="colorbox color-green" href="?theme=green" title="Green Theme" data-css="green"></a>
                                            <a class="colorbox color-red" href="?theme=red" title="Red Theme" data-css="red"></a>
                                            <a class="colorbox color-white" href="?theme=white" title="White Theme" data-css="white"></a>
                                            <a class="colorbox color-purple" href="?theme=purple" title="purple Theme" data-css="purple"></a>
                                            <a class="colorbox color-dark" href="?theme=dark" title="Dark Theme" data-css="dark"></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="no-link"><button class="btn btn-default reset-options">Reset Options</button></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">                               
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">3</span></a>
                        <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                            <li><p class="drop-title">You have 3 pending tasks !</p></li>
                            <li class="dropdown-menu-list slimscroll tasks">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                            <p class="task-details">New user registered.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                            <p class="task-details">Database error.</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-icon badge badge-info"><i class="icon-heart"></i></div>
                                            <span class="badge badge-roundless badge-default pull-right">1h ago</span>
                                            <p class="task-details">Reached 24k likes</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                            <span class="user-name">{{$user->user_first_name.' '.$user->user_last_name}}<i class="fa fa-angle-down"></i></span>
                            <img class="img-circle avatar" src="/assets/admin/merchant/assets/images/avatar1.png" width="40" height="40" alt="">
                        </a>   
                        <ul class="dropdown-menu dropdown-list" role="menu">
                            <li role="presentation" class="text-center">LANGUAGE</li>
                            <li role="presentation" class="divider"></li>
                            <li><a href="#googtrans(en|hr)" class="lang-hr lang-select" data-lang="hr"><img src="/flags/hr.svg" class="language-flag" alt="CROATIA">CROATIA</a></li>
                            <li><a href="#googtrans(en|en)" class="lang-en lang-select" data-lang="en"><img src="/flags/us.svg" class="language-flag" alt="USA">USA</a></li>
                            <li><a href="#googtrans(en|es)" class="lang-es lang-select" data-lang="es"><img src="/flags/es.svg" class="language-flag" alt="MEXICO">MEXICO</a></li>
                            <li><a href="#googtrans(en|fr)" class="lang-fr lang-select" data-lang="fr"><img src="/flags/fr.svg" class="language-flag" alt="FRANCE">FRANCE</a></li>
                            <li><a href="#googtrans(en|zh-CN)" class="lang-zh-CN lang-select" data-lang="zh-CN"><img src="/flags/cn.svg" class="language-flag" alt="CHINA">CHINA</a></li>
                            <li><a href="#googtrans(en|ja)" class="lang-ja lang-select" data-lang="ja"><img src="/flags/jp.svg" class="language-flag" alt="JAPAN">JAPAN</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a href='/user/logout'><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                        </ul>
                    </li>
                    <script type="text/javascript">
                        function googleTranslateElementInit()
                        {
                        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');
                        }
                        function triggerHtmlEvent(element, eventName)
                        {
                        var event;
                        if (document.createEvent) {
                        event = document.createEvent('HTMLEvents');
                        event.initEvent(eventName, true, true);
                        element.dispatchEvent(event);
                        } else {
                        event = document.createEventObject();
                        event.eventType = eventName;
                        element.fireEvent('on' + event.eventType, event);
                        }
                        }
                        jQuery('.lang-select').click(function() {
                        var theLang = jQuery(this).attr('data-lang');
                        jQuery('.goog-te-combo').val(theLang);
                        window.location = jQuery(this).attr('href');
                        location.reload();
                        });
                        var placeholders = document.querySelectorAll('input[placeholder]');
                        if (placeholders.length) {
                        placeholders = Array.prototype.slice.call(placeholders);
                        var div = $('<div id="placeholders" style="display:none;"></div>');
                        placeholders.forEach(function(input){
                        var text = input.placeholder;
                        div.append('<div>' + text + '</div>');
                        });
                        
                        $('body').append(div);
                        var originalPH = placeholders[0].placeholder;
                        setInterval(function(){
                        if (isTranslated()) {
                        updatePlaceholders();
                        originalPH = placeholders[0].placeholder;
                        }
                        }, 500);
                        function isTranslated() {
                        var currentPH = $($('#placeholders > div')[0]).text();
                        return !(originalPH == currentPH);
                        }
                        function updatePlaceholders() {
                        $('#placeholders > div').each(function(i, div){
                        placeholders[i].placeholder = $(div).text();
                        });
                        }
                        }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <div id="google_translate_element" style="display:none;">
                        <style>
                        .goog-te-banner-frame.skiptranslate
                        {
                        display: none !important;
                        }
                        body
                        {
                        top: 0px !important;
                        }
                        .language-flag
                        {
                        height:25px;
                        width:40px;
                        margin:5px;
                        }
                        .list-unstyled {
                        padding-left: 0;
                        list-style: none;
                        }
                        </style>
                    </div>

                </ul>
            </div>
        </div>
    </div>
</div>


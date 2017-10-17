 <div class="navbar">
    <div class="navbar-inner">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        
       {{--  <div class="logo-box">
            <a href="index.html" class="logo-text"><span>CROATIA</span></a>
        </div><!-- Logo Box --> --}}
        <div class="logo-box">
            
            <a href="/supervisor/dashboard" class="logo-text"><img src="/images/croatia_directory_logo.jpg" style="width:150px"></a>
        </div><!-- Logo Box -->
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
                            <span class="user-name">{{session('full_name')}}<i class="fa fa-angle-down"></i></span>
                            <img class="img-circle avatar" src="/assets/admin/merchant/assets/images/avatar1.png" width="40" height="40" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-list" role="menu">
                            <li role="presentation"><a href="profile.html"><i class="fa fa-user"></i>Profile</a></li>
                            <li role="presentation"><a href="calendar.html"><i class="fa fa-calendar"></i>Calendar</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock screen</a></li>
                            <li role="presentation"><a href="/supervisor_logout"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                        </ul>
                    </li>
                    <li>
<<<<<<< HEAD
                    @if(session("supervisor_login"))
                    <a style="font-size:15px",  href='/supervisor/logout'>
                    <span>
                    <i class="fa fa-sign-out m-r-xs"></i>
                    Log out
                    </span>
                    </a>
                    @else
                    <a style="font-size:15px",  href="">
                    <span>
                    <i class="fa fa-sign-out m-r-xs"></i>
                    Hi Guest
                    </span>
                    </a>  
                     @endif        
=======
                        <a href="/supervisor_logout" class="log-out waves-effect waves-button waves-classic">
                            <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                        </a>
>>>>>>> 373df8a79dd0633eacf5846e0b73f36e9efd47c4
                    </li>
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div>
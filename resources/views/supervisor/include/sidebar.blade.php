
<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
       {{--  <div class="sidebar-header">
            <div class="sidebar-profile">
                <a href="javascript:void(0);" id="profile-menu-link">
                    <div class="sidebar-profile-image">
                        <img src="/assets/admin/merchant/assets/images/avatar1.png" class="img-circle img-responsive" alt="">
                    </div>
                    <div class="sidebar-profile-details">
                        <span>Full Name<br><small>Position</small></span>
                    </div>
                </a>
            </div>
        </div> --}}
        <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='') ? 'active' : ''  }}"><a href="/supervisor/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/supervisor/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
            <li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/supervisor/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Clients</p></a></li>

            <li class="{{ (Request::segment(2) == 'add_user') ? 'active' : ''  }}"><a href="/supervisor/add/user" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Add User</p></a></li>
            <li class="{{ (Request::segment(2) == 'view_user') ? 'active' : ''  }}"><a href="/supervisor/view/user" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>View User</p></a></li>

<!--             <li class="{{ (Request::segment(2) == 'team') ? 'active' : ''  }}"><a href="/admin/team" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Add Team/ Agent</p></a></li>
            <li class="{{ (Request::segment(2) == 'view_team') ? 'active' : ''  }}"><a href="/admin/view_team" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>View Team/ Agent</p></a></li>
>>>>>>> sub_master -->
        </ul>
    </div><!-- Page Sidebar Inner -->
</div>
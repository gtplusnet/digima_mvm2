
<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2) == 'dashboard') ? 'active' : ''  }}"><a href="/supervisor/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/supervisor/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
            <li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/supervisor/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Merchants</p></a></li>
            <li class="{{ (Request::segment(2) == 'manage') ? 'active' : ''  }}"><a href="/supervisor/manage/merchant" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Manage Merchants</p></a></li>
            <li class="{{ (Request::segment(2) == 'add_user') ? 'active' : ''  }}"><a href="/supervisor/add/user" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Manage Team/Agent</p></a></li>
            <li class="{{ (Request::segment(2) == 'view_user') ? 'active' : ''  }}"><a href="/supervisor/view/user" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>View User</p></a></li>
        </ul>
    </div>
</div>
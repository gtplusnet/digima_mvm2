
<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2) == 'dashboard') ? 'active' : ''  }}"><a href="/supervisor/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/supervisor/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
            <li class="{{ (Request::segment(2) == 'merchant') ? 'active' : ''  }}"><a href="/supervisor/merchant" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Merchants</p></a></li>
            <li class="{{ (Request::segment(2) == 'manage_user') ? 'active' : ''  }}"><a href="/supervisor/manage_user" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Manage Team/Agent</p></a></li>
        	<li style="display:none;" class="mob-logout"><a href="/user/logout" class="waves-effect waves-button"><span class="menu-icon fa fa-sign-out"></span><p>Sign Out</p></a></li>	
        </ul>
    </div>
</div>
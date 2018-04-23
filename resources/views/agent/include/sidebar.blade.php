<div class="page-sidebar sidebar">
	
    <div class="page-sidebar-inner slimscroll">
       <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)  =='dashboard') ? 'active' : ''  }}"><a href="/agent/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>DASHBOARD</p></a></li>
            <li class="{{ (Request::segment(2)  == 'profile') ? 'active' : ''  }}"><a href="/agent/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>PROFILE</p></a></li>
			<li class="{{ (Request::segment(2)  == 'merchant') ? 'active' : ''  }}"><a href="/agent/merchant" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>MERCHANT</p></a></li>
            <li class="{{ (Request::segment(2)  == 'add') ? 'active' : ''  }}"><a href="/agent/add/merchant" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>ADD MERCHANT</p></a></li>
			<li style="display:none;" class="mob-logout"><a href="/user/logout" class="waves-effect waves-button"><span class="menu-icon fa fa-sign-out"></span><p>SIGN OUT</p></a></li>	
        </ul>
    </div>
</div>

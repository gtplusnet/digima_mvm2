<div class="page-sidebar sidebar">
	
    <div class="page-sidebar-inner slimscroll">
       <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='dashboard') ? 'active' : ''  }}"><a href="/agent/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Kontrolna Ploča</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/agent/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>profil Agenta</p></a></li>
			<li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/agent/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Trgovac</p></a></li>
            <li class="{{ (Request::segment(2) == 'add') ? 'active' : ''  }}"><a href="/agent/add/client" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Dodajte trgovca</p></a></li>
			<li style="display:none;" class="mob-logout"><a href="/agent/logout" class="waves-effect waves-button"><span class="menu-icon fa fa-sign-out"></span><p>Sign Out</p></a></li>	
        </ul>
    </div>
</div>

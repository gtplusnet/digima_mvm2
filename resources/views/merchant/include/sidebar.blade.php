<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='dashboard') ? 'active' : ''  }}"><a href="/merchant/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Kontrolna Ploča</p></a></li>
			<li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/merchant/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Poslovni Profil</p></a></li>
 			<li class="{{ (Request::segment(2) == 'category') ? 'active' : ''  }}"><a href="/merchant/category" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Kategorija i Ključne Riječi</p></a></li>
			<li class="{{ (Request::segment(2) == 'messages') ? 'active' : ''  }}"><a href="/merchant/messages" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-envelope"></span><p>Poslovne Poruke</p></a></li>
 			<li class="{{ (Request::segment(2) == 'bills') ? 'active' : ''  }}"><a href="/merchant/bills" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-barcode"></span><p>Bills</p></a></li>
        	<li style="display:none;" class="mob-logout"><a href="/merchant/logout" class="waves-effect waves-button"><span class="menu-icon fa fa-sign-out"></span><p>Sign Out</p></a></li>	
        </ul>
    </div><!-- Page Sidebar Inner -->
</div>
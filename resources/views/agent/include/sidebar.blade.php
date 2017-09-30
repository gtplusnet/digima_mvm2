<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
       <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='') ? 'active' : ''  }}"><a href="/agent/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/agent/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
            <li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/agent/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Clients</p></a></li>
            <li class="{{ (Request::segment(2) == 'add_client') ? 'active' : ''  }}"><a href="/agent/add/client" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Add Client</p></a></li>
        </ul>
    </div>
</div>
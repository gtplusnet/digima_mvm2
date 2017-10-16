<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
       <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='dashboard') ? 'active' : ''  }}"><a href="/agent/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/agent/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
<<<<<<< HEAD
<<<<<<< HEAD
            <li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/agent/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Client</p></a></li>
=======
            <li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/agent/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Clients</p></a></li>
>>>>>>> sub_master
=======
            <li class="{{ (Request::segment(2) == 'client') ? 'active' : ''  }}"><a href="/agent/client" class="waves-effect waves-button"><span class="menu-icon fa fa-group"></span><p>Merchants</p></a></li>
>>>>>>> 373df8a79dd0633eacf5846e0b73f36e9efd47c4
            <li class="{{ (Request::segment(2) == 'add_client') ? 'active' : ''  }}"><a href="/agent/add/client" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Add Client</p></a></li>
        </ul>
    </div>
</div>
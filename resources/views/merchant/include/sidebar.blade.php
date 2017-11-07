<div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='') ? 'active' : ''  }}"><a href="/merchant/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>

            
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/merchant/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>


            <li class="{{ (Request::segment(2) == 'category') ? 'active' : ''  }}"><a href="/merchant/category" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Category & Keywords</p></a></li>

            <li class="{{ (Request::segment(2) == 'messages') ? 'active' : ''  }}"><a href="/merchant/messages" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-envelope"></span><p>Messages</p></a></li>

            <li class="{{ (Request::segment(2) == 'bills') ? 'active' : ''  }}"><a href="/merchant/bills" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-barcode"></span><p>Bills</p></a></li>
        
        </ul>
    </div><!-- Page Sidebar Inner -->
</div>
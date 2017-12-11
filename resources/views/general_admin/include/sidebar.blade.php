 <div class="page-sidebar sidebar">
    <div class="page-sidebar-inner slimscroll">
        <ul class="menu accordion-menu">
            <li class="{{ (Request::segment(2)=='dashboard') ? 'active' : ''  }}"><a href="/general_admin/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2)=='merchants') ? 'active' : ''  }}"><a href="/general_admin/merchants" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-phone-alt"></span><p>Merchants</p></a></li>
            <li class="{{ (Request::segment(2)=='payment_monitoring') ? 'active' : ''  }}"><a href="/general_admin/payment_monitoring" class="waves-effect waves-button"><span class="menu-icon fa fa-cc-visa"></span><p>Payment Monitoring</p></a></li>
            <li class="{{ (Request::segment(2)=='manage_invoice') ? 'active' : ''  }}"><a href="/general_admin/manage_invoice" class="waves-effect waves-button"><span class="menu-icon fa fa-file-audio-o""></span><p>Manage Invoice</p></a></li>
            <li class="{{ (Request::segment(2)=='manage_categories') ? 'active' : ''  }}"><a href="/general_admin/manage_categories" class="waves-effect waves-button"><span class="menu-icon fa fa-list" aria-hidden="true"></span><p>Manage Categories</p></a></li>
            <li class="{{ (Request::segment(2)=='manage_user') ? 'active' : ''  }}"><a href="/general_admin/manage_user" class="waves-effect waves-button"><span class="menu-icon fa fa-user-plus"></span><p>Manage User</p></a></li>
            <li class="{{ (Request::segment(2)=='manage_website') ? 'active' : ''  }}"><a href="/general_admin/manage_website" class="waves-effect waves-button"><span class="menu-icon fa fa-windows"></span><p>Manage Website</p></a></li>
            <li class="{{ (Request::segment(2)=='manage_front') ? 'active' : ''  }}"><a href="/general_admin/manage_front" class="waves-effect waves-button"><span class="menu-icon fa fa-desktop"></span><p>Manage Front</p></a></li>
            <li class="{{ (Request::segment(2)=='archived') ? 'active' : ''  }}"><a href="/general_admin/archived" class="waves-effect waves-button"><span class="menu-icon fa fa-trash"></span><p>Archived</p></a></li>
            {{-- <li class="{{ (Request::segment(2)=='report') ? 'active' : ''  }}"><a href="/general_admin/report" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-file"></span><p>Report</p></a></li> --}}
            <li style="display:none;" class="mob-logout"><a href="/general_admin/logout" class="waves-effect waves-button"><span class="menu-icon fa fa-sign-out"></span><p>Sign Out</p></a></li>  
        </ul>
    </div>
</div>


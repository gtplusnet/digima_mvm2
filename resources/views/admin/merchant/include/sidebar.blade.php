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
            <li class="{{ (Request::segment(2)=='') ? 'active' : ''  }}"><a href="/merchant" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
            <li class="{{ (Request::segment(2) == 'profile') ? 'active' : ''  }}"><a href="/merchant/profile" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
            <li class="{{ (Request::segment(2) == 'category') ? 'active' : ''  }}"><a href="/merchant/category" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-th-list"></span><p>Category & Keywords</p></a></li>
            <li class="{{ (Request::segment(2) == 'bills') ? 'active' : ''  }}"><a href="/merchant/bills" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-barcode"></span><p>Bills</p></a></li>
        </ul>
    </div><!-- Page Sidebar Inner -->
</div>
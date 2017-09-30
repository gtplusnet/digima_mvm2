 <div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <ul class="menu accordion-menu">
                        <li class="{{ (Request::segment(2)=='') ? 'active' : ''  }}"><a href="/general_admin/dashboard" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li class="{{ (Request::segment(2)=='business_list') ? 'active' : ''  }}"><a href="/general_admin/business_list" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-file"></span><p>Business List</p></a></li>
                        <li class="{{ (Request::segment(2)=='agent_calls') ? 'active' : ''  }}"><a href="" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-phone-alt"></span><p>Agent Calls</p></a></li>
                        <li class="{{ (Request::segment(2)=='emailing_invoice') ? 'active' : ''  }}"><a href="/general_admin/email_invoice" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-envelope"></span><p>Emailing Invoice</p></a></li>
                        <li class="{{ (Request::segment(2)=='payment_monitoring') ? 'active' : ''  }}"><a href="" class="waves-effect waves-button"><span class="menu-icon fa fa-money"></span><p>Payment Monitoring</p></a></li>
                        <li class="{{ (Request::segment(2)=='refund') ? 'active' : ''  }}"><a href="" class="waves-effect waves-button"><span class="menu-icon fa fa-undo"></span><p>Refund</p></a></li>
                        <li class="{{ (Request::segment(2)=='report') ? 'active' : ''  }}"><a href="/general_admin/report" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-file"></span><p>Report</p></a></li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
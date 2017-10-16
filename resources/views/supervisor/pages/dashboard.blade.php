@extends('supervisor.layout.layouts')
@section('content')
<link href="/assets/agent/assets1/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/supervisor">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>

<div id="main-wrapper">
</div>
<div class="wrapper">
   <div class="main-panel">
        

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Registered
                                        <i class="fa fa-circle text-warning"></i>Pending
                                        <i class="fa fa-circle text-success"></i> Activated
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users Behavior</h4>
                                <p class="category">24 Hours performance</p>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--others-->
              
            </div>
        </div>



    </div>
</div>
<script src="/assets/agent/assets1/js/jquery-1.10.2.js" type="text/javascript"></script>
    
    <script src="/assets/agent/assets1/js/chartist.min.js"></script>

    <script src="/assets/agent/assets1/js/demo.js"></script>


@endsection
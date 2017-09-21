@extends('admin.merchant.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">       
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">340,230</p>
                        <span class="info-box-title">Page views</span>
                    </div>
                    <div class="info-box-icon">
                        <i class="icon-eye"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      <!--   Facebook
 -->
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">150,000</p>
                        <span class="info-box-title">Page Likes</span>
                    </div>
                    <div class="info-box-icon">
                         <i style="color: royalblue ;"" class="fa fa-facebook"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="10" style="width: 80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


      <!--   TWITTER-->

      
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">200,000</p>
                        <span class="info-box-title">Page tweet</span>
                    </div>
                    <div class="info-box-icon">
                         <i style="color:#00aced;" class="fa fa-twitter"></i>

                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Line Chart</h3>
                </div>
                <div class="panel-body">
                    <div id="flot2">
                    <!-- <body>                 
                    <canvas id="myCanvas" width="450" height="200" 
                    style="border:1px solid #c3c3c3;">
                    Your browser does not support the canvas <element></element>nt.
                    </canvas>

                    <script>
                    var canvas = document.getElementById("myCanvas");
                    var ctx = canvas.getContext("2d");
                    ctx.moveTo(0,0);
                    ctx.lineTo(500,200);
                    ctx.stroke();
                    </script>

                    </body> -->
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h3 class="panel-title">Pie Chart</h3>
                </div>
                <div class="panel-body">
                    <div id="flot3"></div>   
                </div>
            </div>
        </div>

    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection
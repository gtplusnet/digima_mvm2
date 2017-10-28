@extends('merchant.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-13">
            <div class="panel panel-white">
               <div class="panel-heading clearfix">
                <h3 class="panel-title">Messages</h3>
                </div>
                <div class="panel-body"> 
                <form class="form-horizontal" method="POST" action="/merchant/add_messages" style="">

                 <div id="showHereSuccess">
                </div>

                @if (Session::has('message'))
                <div class="alert alert-success"><center>{{ Session::get('message') }}</center></div>
                @endif   

                @if (Session::has('danger'))
                <div class="alert alert-danger"><center>{{ Session::get('danger') }}</center></div>
                @endif 

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" style="width: 100%; text-align: center;" cellpadding="1" cellspacing="1"  border="2">
                 <thead>
                            <tr>
                            <th style="text-align: center;font-size: 13px">Full Name</th>
                            <th style="text-align: center;font-size: 13px">Mail To</th>
                            <th style="text-align: center;font-size: 13px">Subject</th>
                            <th style="text-align: center;font-size: 13px">Help Message</th>
                              <th style="text-align: center;font-size: 13px">Subject</th>
                            </tr>   
                            </thead>
                            @foreach($guest_messages as $data)
                            <tr>
                            <td>{{$data->full_name }}</td>
                            <td><a href="">{{$data->email}}</td>
                            <td>{{$data->subject}}</td>
                            <td>{{$data->messages}}</td>
                            <td>
                            <a href="/merchant/delete_messages/{{$data->guest_messages_id}}"><button type="button" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                           <!--  <a href="#"><button type="button" data-toggle="modal" class="btn btn-success"  id="">
                            <i class="fa fa-pencil" aria-hidden="true"></i>Email</button>
                            </td> -->
                            </tr>
                            @endforeach
                        </table> 

                      <!--   <div class="col-md-9">
                            <label for="guest_messages_id" class="col-sm-2 control-label" style="text-align: right;">ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="guest_messages_id" id="guest_messages_id">
                            </div>
                            <label for="full_name" class="col-sm-2 control-label" style="text-align: right;">Full Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="full_name" id="full_name">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="email" class="col-sm-2 control-label" style="text-align: right;">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="email" id="email">
                            </div>
                            <label for="subject" class="col-sm-2 control-label" style="text-align: right;">Subject</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="subject" id="subject">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="messages" class="col-sm-2 control-label" style="text-align: right;">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control input-rounded" name="messages" id="messages" placeholder="Messages" rows="4" style="border-radius: 20px; resize: none;"  required></textarea>
                            </div>
                        </div>
                        <div>
                            <div>
                                <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="save_message" class="save_message btn btn-primary" id="save_message";>SAVE</button>
                            </div>
                        </div> -->
                </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>

<script type="text/javascript" src="/assets/admin/merchant/assets/pages/category/category.js"></script>
@endsection
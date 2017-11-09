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

<style>a [href="mailto"]{color: red;}</style>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-13">
            <div class="panel panel-white">
               <div class="panel-heading clearfix">
                <h3 class="panel-title">Messages</h3>
                </div>
                <div class="panel-body"> 
                <form class="form-horizontal" method="POST" action="/merchant/messages" style="">

                 <div id="showHereSuccess">
                </div>
                

                @if (Session::has('danger'))
                <div class="alert alert-danger"><center>{{ Session::get('danger') }}</center></div>
                @endif 

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table class="table table-bordered" style="width: 100%; text-align: center;" cellpadding="0" cellspacing="0"  border="1">
                 <thead>
                            <tr>
                            <th style="text-align: center;font-size: 13px">MAIL TO</th>
                            <th style="text-align: center;font-size: 13px">SUBJECT</th>
                            <th style="text-align: center;font-size: 13px">MESSAGES</th>
                              <th style="text-align: center;font-size: 13px">ACTION</th>
                            </tr>   
                            </thead>
                            @foreach($guest_messages as $data)
                            <tr>
                            <td><a href="mailto:{{$data->email}}">{{$data->email}}</td>
                            <td>{{$data->subject}}</td>
                            <td>{{$data->messages}}</td>
                            <td>
                                <a href="/merchant/delete_messages/{{$data->guest_messages_id}}">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </table> 
                </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>

<script type="text/javascript" src="/assets/admin/merchant/assets/pages/category/category.js"></script>

@endsection
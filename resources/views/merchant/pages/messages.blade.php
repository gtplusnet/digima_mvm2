@extends('merchant.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant/dashboard">Home</a></li>
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
                    <h3 class="panel-title">Poruke</h3>
                </div>
                <div class="panel-body" style="overflow-x: scroll;">
                    <form class="form-horizontal" method="POST" action="/merchant/messages" style="">
                        
                        @if (Session::has('danger'))
                        <div class="alert alert-danger"><center>{{ Session::get('danger') }}</center></div>
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table table-bordered" style="width: 100%; text-align: center;" cellpadding="0" cellspacing="0"  border="1">
                            <thead>
                                <tr>
                                    <th style="text-align: center;font-size: 13px">Mail Na Adresu</th>
                                    <th style="text-align: center;font-size: 13px">Predmet</th>
                                    <th style="text-align: center;font-size: 13px">Poruke</th>
                                    <th style="text-align: center;font-size: 13px">Radnja</th>
                                </tr>
                            </thead>
                            @foreach($guest_messages as $data)
                            <tr>
                                <td><a  href="mailto:{{$data->email}}" data-id="{{$data->email}}">{{$data->email}}</p></td>
                                <td>{{$data->subject}}</td>
                                <td>{{$data->messages}}</td>
                                <td>
                                    <a href="/merchant/delete_messages/{{$data->guest_messages_id}}">
                                        <button type="button" class="btn btn-danger" id="deletemessages" name="deletemessages">
                                        <i class="fa fa-trash" aria-hidden="true"></i>Izbrisati
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {!! $guest_messages->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/assets/admin/merchant/assets/pages/category/messages.js"></script>
    @endsection
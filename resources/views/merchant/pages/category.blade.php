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
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                <h3 class="panel-title">Keyword's List</h3>
                </div>
                <div class="panel-body">   
                <form class="form-horizontal" method="POST" action="/merchant/add_business_category" style="">
                <div id="showHereSuccess">
                </div>
                @if (Session::has('message'))
                <div class="alert alert-success"><center>{{ Session::get('message') }}</center></div>
                @endif   
                @if (Session::has('danger'))
                <div class="alert alert-danger"><center>{{ Session::get('danger') }}</center></div>
                @endif 
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Category List</h3>
                            <ul id="tree1">
                                @foreach($categories as $category)
                                    <li>
                                        <input class="checkbox-parent" id="checkbox" name="business_category" type="checkbox" value="{{ $category->business_category_id }}"> 
                                        {{ $category->business_category_name }}          
                                        @if(count($category->childs))                                           
                                            @include('admin.merchant.pages.category.manageChild',['childs' => $category->childs])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>                       
                    </div>
                <form class="form-horizontal" method="POST" action="/merchant/category" style="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" style="width: 100%; text-align: center;" cellpadding="1" cellspacing="1"  border="2">
                <thead>
                            <tr>
                            <th style="text-align: center;font-size: 13px">Business ID </th>
                            <th style="text-align: center;font-size: 13px">Business Name / Category</th>
                       <!-- <th style="text-align: center;font-size: 13px">Business Information</th> -->
                            <th style="text-align: center;font-size: 13px">Action</th>
                         
                            </tr>   
                            </thead>
                            @foreach($categories as $data)
                            <tr>
                            <td>{{$data->business_category_id}}</td>
                            <td>{{$data->business_category_name}}</td>
                        <!--<td>{{$data->business_category_information}}</td> -->
                            <td>
                            <a href="/merchant/delete_business_category/{{$data->business_category_id}}"><button type="button" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                            </td>
                            </tr>
                            @endforeach
                        </table> 

                         <div class="col-md-9">
                            <label for="business_category_id" class="col-sm-2 control-label" style="text-align: right;">Business ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="business_category_id" id="business_category_id">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="business_category_name" class="col-sm-2 control-label" style="text-align: right;">Business Name/Category</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="business_category_name" id="business_category_name">
                            </div>
                        </div>

                        <div class="col-md-10">
                            <label for="input-Default" class="col-sm-4 control-label" style="text-align: right;">  </label>
                            <div>
                            <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="save_category" class="save_category btn btn-primary" id="save_category";>SAVE</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>

<script type="text/javascript" src="/assets/admin/merchant/assets/pages/category/category.js"></script>
@endsection
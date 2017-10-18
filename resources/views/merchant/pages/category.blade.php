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
                <h3 class="panel-title">Basic Tree</h3>
                </div>
                <div class="panel-body">                

                    <div class="row">
                        <div class="col-md-6">
                            <h3>Category List</h3>
                            <ul id="tree1">
                                @foreach($categories as $category)
                                    <li>
                                        <input class="checkbox-parent" id="checkbox" name="business_category" type="checkbox" value="{{ $category->business_category_id }}">{{ $category->business_category_name }}          
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
                            <th style="text-align: center;font-size: 13px">Business ID</th>
                            <th style="text-align: center;font-size: 13px">Business Name</th>
                            <th style="text-align: center;font-size: 13px">Business Information</th>
                            <th style="text-align: center;font-size: 13px">Action</th>
                         
                            </tr>   
                            </thead>
                            @foreach($categories as $data)
                            <tr>
                            <td>{{$data->business_category_id}}</td>
                            <td>{{$data->business_category_name}}</td>
                            <td>{{$data->business_category_information}}</td>
                            <td>
                            <a href="/merchant/delete_messages/{{$data->guest_messages_id}}"><button type="button" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
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
@extends('merchant.layout.layout')
@section('content')
<style>
.website-title
{
    background-color: #dbdee2;
    padding:10px 20px 10px 20px;
    border-radius: 2px;
    width:100%;
    font-size:20px;
}
.website-content
{
    background-color: #E9EDF2;
    /*margin: auto;*/
}
.form-text
{
    text-align: center;
    width:350px;

    padding:10px 10px 10px 10px;
}
.form-select
{
    width:90px;
    height:25px;
    border-radius: 5px;
}
.web-content
{
    margin:20px 20px 20px 20px;
    /*margin: auto;*/
}
.form-button
{
    padding:10px 10px 10px 10px;
    width:200px;
    background-color: #10e0bd;
}
.center {
    margin: auto;
    padding: 10px;
}
</style>
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wraper">
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
                <div class="website-title">
                    Category List
                </div>
                <div class="website-content col-md-12">
                    <table class="table table-bordered" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>ID</th> 
                                <th>Category Name</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($_category as $category)
                            <tr>
                                <td>{{$category->business_category_id}}</td>
                                <td><a href="{{$category->business_category_information}}">{{$category->business_category_name }}</td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
                <div class="website-content col-md-12">
                    <table class="table table-bordered" style="margin-top:10px;">
                        <thead>
                            <tr>
                               <!--  <th>ID</th>  -->
                                <th>{{$category->business_category_name}}</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($_category as $category)
                            <tr>
                               <!--  <td>{{$category->parent_id}}</td> -->
                                 <input type="hidden" name="" value="{{$category->parent_id}}" />
                                <td>{{$category->business_category_information }}</td>
                            </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       <!--  <div class="row">
            <div class="col-md-5 " style="margin:10px 0px 10px 10px;background-color: #F1F4F9;">
                <div class="website-title">
                    Add Keywords
                </div>
                <div class="website-content col-md-12">
                    <div class="web-content" id="keywords_alert">
                    </div>
                    <div class="web-content">
                        <select class="form-text center" id="countyID">
                                        <option>Category</option>
                                        @foreach($_category as $category)
                                        <option value="{{$category->business_category_id}}">{{$category->business_category_name}}</option>
                                        @endforeach
                        </select>
                    </div>
                    <div class="web-content">
                        <input type="text" id="business_tag_keywords_id " class="form-text center" placeholder=" Keywords Name" required/>
                    </div>
                    <div class="web-content">
                        <input type="text" id="keywords_name" class="form-text center" placeholder="Keywords Name" required/>
                    </div>
                    <div class="web-content">
                        <button type="button" id="addKeywords" class="form-button  center" >Add Keywords</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
                <div class="website-title">
                    Keywords List
                </div>
                <div class="website-content col-md-12">
                    <table class="table table-bordered" style="margin-top:10px;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                 <th>Category Name</th>
                                <th>Keywords Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($_keywords as $keywords)
                            <tr> 
                                <td>{{$keywords->business_tag_keywords_id}}</td>
                                <td>{{$keywords->business_tag_keywords_id}}</td>
                                <td>{{$keywords->keywords_name}}</td>
                                <td>
                                    <select class="form-select">
                                        <option >Edit</option>
                                        <option>Delete</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    -->
    </div>
</div>

<script type="text/javascript" src="/assets/admin/merchant/assets/pages/category/category.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_website.js"></script>
@endsection
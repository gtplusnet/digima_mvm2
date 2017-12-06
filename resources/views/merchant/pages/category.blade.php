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
width:100%;
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
background-color: #337ab7;
border-radius: 5px;
font-size:15px;
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
         <li><a href="/merchant/dashboard">Home</a></li>
         <li class="active">{{ $page }}</li>
      </ol>
   </div>
</div>
<div id="wraper">
   <div class="container">
      <div class="row">
         <form class="form-horizontal" method="POST" action="/merchant/add_tag_category" style="">
            <div class="col-md-5" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
               <div class="website-title">
                  Popis Kategorija
               </div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="website-content col-md-12" id="showk">
                  <table class="table table-bordered" style="margin-top:8px;">
                     <thead>
                        <tr>
                           <th>Označiti</th>
                           <th>Ime Kategorije</th>
                           <th style="text-align: center;">Radnja</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($_category as $category)
                        <tr>
                           <input type="hidden" name="business_id" value="{{$category->business_id}}">
                           <td><input type="checkbox" name="checkbox[]" value="{{$category->business_category_id}}" ></td>
                           <td>{{$category->business_category_name}}</td>
                           <td>
                              <p style="font-size:20px"><i class="fa fa-search center  viewSubs" aria-hidden="true" name="business_id" data-id="{{$category->business_category_id}}"></i></p>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  {!! $_category->render() !!}
                  <div class="web-content" >
                     <button type="submit" class="form-button center" name="business_id"  >Označiti</button>
                  </div>
               </div>
            </div>
            <div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
               <div class="website-title">
                  Popis oznaka
               </div>
               <div class="website-content col-md-12">
                  @if (Session::has('delete1'))
                  <div class="alert alert-danger ">
                     <center>{{ Session::get('delete1') }}</center>
                  </div>
                  @endif
                  @if (Session::has('message1'))
                  <div class="alert alert-success">
                     <center>{{ Session::get('message1') }}</center>
                  </div>
                  @endif
                  
                  <table class="table table-bordered" style="margin-top:10px;">
                     <thead>
                        <tr>
                           <th class="col-md-10">Ime Kategorije</th>
                           <th style="text-align: center;">Radnja</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($_subcategory as $subcategory)
                        <tr>
                           <td>{{$subcategory->business_category_name }}</td>
                           <td>
                              <a href="/merchant/delete_tag_category/{{$subcategory->business_tag_category_id }}"><button type="button"  class="btn btn-danger center">
                                 <i class="fa fa-trash" name="business_id" aria-hidden="true"></i> Izbrisati</button>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </form>
         </div>
         <div class="row">
            <form class="form-horizontal" method="POST" action="/merchant/category/add_keywords" style="">
               <div class="col-md-5 " style="margin:10px 0px 10px 10px;background-color: #F1F4F9;">
                  <div class="website-title">
                     Dodaj Ključne Riječi
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="website-content col-md-12">
                     @if (Session::has('message'))
                     <div class="alert alert-success">
                        <center>{{ Session::get('message') }}</center>
                     </div>
                     @endif
                     <div class="web-content">
                        <input type="text" name="keywords_name" id="business_tag_keywords_id " class="form-text center" placeholder="Naziv Ključne Riječi" required/>
                     </div>
                     <div class="web-content">
                        <button type="submit" id="addKeywords" class="form-button  center" >Dodaj Ključne Riječi</button>
                     </div>
                  </div>
               </div>
               <div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
                  <div class="website-title">
                     Popis Ključnih Riječi
                  </div>
                  <div class="website-content col-md-12">
                     @if (Session::has('delete'))
                     <div class="alert alert-danger">
                        <center>{{ Session::get('delete') }}</center>
                     </div>
                     @endif
                     <table class="table table-bordered" style="margin-top:10px;">
                        <thead>
                           <tr>
                              <th>Naziv Ključne Riječi</th>
                              <th style="text-align: center;">Radnja</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($_keywords as $keywords)
                           <tr>
                              <td class="col-md-10">{{$keywords->keywords_name}}</td>
                              <td style="text-align: center;">
                                 <a href="/merchant/category/delete_keywords/{{$keywords->business_tag_keywords_id}}"><button type="button" class="btn btn-danger center">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Izbrisati</button>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        {!! $_keywords->render() !!}
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <script src="/assets/js/global.ajax.js"></script>
      <script type="text/javascript" src="/assets/js/merchant/category.js"></script>
      @endsection
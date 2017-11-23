@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage front')
@section('description', 'manage front')
@section('content')
<div class="page-title" style="margin-bottom:20px;">
   <h3>Manage Front</h3>
   <div class="page-breadcrumb">
      <ol class="breadcrumb">
         <li><a href="/general_admin/dashboard">Home</a></li>
         <li class="active">Manage Front</li>
      </ol>
   </div>
</div>
<div id="main-wrapper">
   <div class="col-md-12">
      <ul class="nav nav-tabs">
         <li class="active li_me"><a data-toggle="pill" href="#aboutus">About Us</a></li>
         <li class="li_me"><a data-toggle="pill" href="#contactus">Contact Us</a></li>
         <li class="li_me"><a data-toggle="pill" href="#thankyou">Thank You</a></li>
         <li class="li_me"><a data-toggle="pill" href="#termsofoffers">Terms Of Offers</a></li>
      </ul>
      <div class="tab-content" style="">
         <div id="aboutus" class=" tab-pane fade in  active">
            <div class="row col-md-15" style="background-color: #fff !important;">
               <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="/general_admin/update_about_us">
                     {{ csrf_field() }}
                     <div id="showAboutUs" style="margin-top:50px;">
                     </div>
                     
                     <div class="form-group">
                        <label for="input-Default" class="col-sm-2 control-label">About Us Header</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="information_header" name="information_header" value="@if(isset($about_us->information_header)==null)@else {{$about_us->information_header}}@endif">
                        </div>
                     </div>
                     <div class="form-group" >
                        <label for="business_name" class="col-sm-2 control-label">About Us Information</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="10" name="information" id="information" >@if(isset($about_us->information)==null)@else {{$about_us->information}}@endif</textarea>
                        </div>
                     </div>
                     <div class="pull-right" style="">
                        <form class="form-inline">
                           <button  type="button" class="btn btn-success" name="Update_aboutus" id="Update_aboutus">Update</button>
                        </form>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div id="contactus" class=" tab-pane fade">
            <div class="row col-md-15" style="background-color: #fff !important;">
               <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="/general_admin/update_contact_us">
                     {{ csrf_field() }}
                     <div id="showContactUs" style="margin-top:50px;">
                     </div>
                     
                     <div class="form-group">
                        <label for="input-Default" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" id="phone_number" name="phone_number" value="@if(isset($contact_us->phone_number)==null)@else {{$contact_us->phone_number}}@endif">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="input-Default" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" id="email" name="email" value="@if(isset($contact_us->email)==null)@else {{$contact_us->email}}@endif">
                        </div>
                     </div>
                     <div class="form-group" >
                        <label for="" class="col-sm-2 control-label">Complete Address</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="5" name="complete_address" id="complete_address" >@if(isset($contact_us->complete_address)==null)@else {{$contact_us->complete_address}}@endif</textarea>
                        </div>
                     </div>
                     <div class="pull-right" style="">
                        <form class="form-inline">
                           <button type="button" class="btn btn-success" name="Update_Contactus" id="Update_Contactus">Update</button>
                        </form>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div id="thankyou" class=" tab-pane fade">
            <div class="row col-md-15" style="background-color: #fff !important;">
               <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="/general_admin/update_thank_you">
                     {{ csrf_field() }}
                     
                     <div id="showThankYou" style="margin-top:50px;">
                     </div>
                     <div class="form-group" >
                        <label for="" class="col-sm-2 control-label">Thank You Header</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="header" name="header" value="@if(isset($thank_you->header)==null)@else {{$thank_you->header}}@endif">
                        </div>
                     </div>
                     <div class="form-group" >
                        <label for="" class="col-sm-2 control-label">Thank You Message</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="10" name="information_thank_you" id="information_thank_you">@if(isset($thank_you->information_thank_you)==null)@else {{$thank_you->information_thank_you}}@endif</textarea>
                        </div>
                     </div>
                     <div class="pull-right" style="">
                        <form class="form-inline">
                           <button type="button" class="btn btn-success" name="Update_thankyou" id="Update_thankyou">Update</button>
                        </form>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div id="termsofoffers" class=" tab-pane fade">
            <div class="row col-md-15" style="background-color: #fff !important;">
               
               <div class="panel-body">
                  <form class="form-horizontal" method="POST" action="/general_admin/update_terms">
                     {{ csrf_field() }}
                     <div id="showTerms" style="margin-top:50px;">
                     </div>
                     <div class="form-group" >
                        <label for="business_name" class="col-sm-2 control-label">Terms of Offers</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" rows="20" name="terms_of_offers" id="terms_of_offers" >@if(isset($terms->terms_of_offers)==null)@else {{$terms->terms_of_offers}}@endif</textarea>
                        </div>
                     </div>
                     <div class="pull-right" style="">
                        <form class="form-inline">
                           <button type="button" class="btn btn-success" name="Update_terms" id="Update_terms">Update</button>
                        </form>
                     </div>
                  </form>
               </div>
               
            </div>
         </div>
      </div>
   </div>
</div>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_front.js"></script>
<style>
.date {
position: relative;
left:500px;
}
.distance
{
margin:10px 0px 10px 0px;
}
.li_me{
padding:0px;
width:25%;
margin-right:0px;
margin-left:-1px;
}
.modal-header
{
background-color: #24292E;
color:#fff;
}
</style>
@endsection
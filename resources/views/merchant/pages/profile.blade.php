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
         <div class="panel">
            <div class="panel-body">
               <!-- Nav tabs -->
               <div role="tabpanel">
                  <ul class="nav nav-pills" role="tablist">
                     <li role="presentation" class="active"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">General Information</a></li>
                     <li role="presentation" class=""><a href="#tab15" role="tab" data-toggle="tab" aria-expanded="false">Other Information</a></li>
                     <li role="presentation" class=""><a href="#tab11" role="tab" data-toggle="tab" aria-expanded="false">Business Hours</a></li>
                     <li role="presentation" class=""><a href="#tab20" role="tab" data-toggle="tab" aria-expanded="false">Business Image</a></li>
                     <li role="presentation" class=""><a href="#tab29" role="tab" data-toggle="tab" aria-expanded="false">Payment Method</a></li>
                  </ul>
               </div>
               <!-- Tab panes -->
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="tab9">
                     <form class="form-horizontal">
                        <div class="form-group">
                           <label for="business_name" class="col-sm-2 control-label">Business Name</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="business_name" value="{{$merchant_info->business_name}}" readonly>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="business_phone" class="col-sm-2 control-label">Business Primary Phone</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" id="business_phone" value="{{$merchant_info->business_phone}}" readonly>
                           </div>
                           <label for="business_alt_phone" class="col-sm-2 control-label">Business Alternate Phone</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" id="business_alt_phone" value="{{$merchant_info->business_alt_phone}}" readonly>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                           <div class="col-sm-10">
                              <textarea class="form-control" placeholder="" rows="4=6" readonly>{{$merchant_info->business_complete_address}}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">County</label>
                           <div class="col-sm-2">
                              <input type="text" name class="form-control" id="input-default" value="{{$merchant_info->county_name}}" readonly>
                           </div>
                           <label for="input-Default" class="col-sm-2 control-label">City</label>
                           <div class="col-sm-2">
                              <input type="text" class="form-control" id="input-default" value="{{$merchant_info->city_name}}" readonly>
                           </div>
                           <label for="input-Default" class="col-sm-2 control-label">Postal</label>
                           <div class="col-sm-2">
                              <input type="text" class="form-control" id="input-default" value="{{$merchant_info->postal_code}}" readonly>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="twitter_url" class="col-sm-2 control-label">Twitter</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" id="twitter_url" value="{{$merchant_info->twitter_url}}" readonly>
                           </div>
                           <label for="facebook_url" class="col-sm-2 control-label">Facebook</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" id="facebook_url" value="{{$merchant_info->facebook_url}}" readonly>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab15">
                     <form class="form-horizontal" method="POST" action="/merchant/add_other_info">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if (Session::has('add_info'))
                        <div class="alert alert-success">
                           <center>{{ Session::get('add_info') }}</center>
                        </div>
                        @endif 
                        @foreach($_other_info as $data)
                        <div class="form-group">
                           <label for="business_name" class="col-sm-2 control-label">Company Information</label>
                           <div class="col-sm-10">
                              <textarea class="form-control" rows="5" name="company_information" id="comment" value="">{{$data->company_information}}
                              </textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Business Website</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="input-default" name="business_website" value="{{$data->business_website}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Year Establish</label>
                           <div class="col-sm-2">
                              <input type="text" class="form-control" id="input-default"  name="year_established" value="{{$data->year_established}}">                                     
                           </div>
                        </div>
                        @endforeach
                        <div class="col-md-15">
                           <div class="text-right">
                              <button class="btn btn-primary" style="padding: 5px 18px;">Update</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" method="POST" id="tab11">
                     <form class="form-horizontal"  action="/merchant/profile/update_hours">
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-3 control-label">START</label>
                           <label for="input-Default" class="col-sm-3 control-label">END</label>
                        </div>
                        @foreach($_business_hours as $business_hours)
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">{{$business_hours->days}}</label>
                           <div class="col-sm-3 searchfields-format">
                              <input type="hidden" name="days[]" value="{{$business_hours->days}}">
                              <input type="hidden" name="business_id[]" value="{{$business_hours->business_id}}">
                              <input type="time" class="form-control" name="business_hours_from[]" id="business_hours_from" value="{{$business_hours->business_hours_from}}" required="true">
                           </div>
                           <div class="col-sm-3 searchfields-format">
                              <input type="time" class="form-control" name="business_hours_to[]" id="business_hours_to" value="{{$business_hours->business_hours_to}}" required="true">
                           </div>
                        </div>
                        @endforeach
                        <div class="col-md-8">
                           <div class="text-right">
                              <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="" class="update_hours btn btn-primary"  id="">Update</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="tab20">
                     <div>
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/merchant/add_images" style="">
                           <h3>Images</h3>
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           @foreach($_images as $images)
                           <div>
                              <label for="input-Default" class="col-sm-2 control-label">Business Banner:</label>
                              <input type="file" id="myFile" name="business_banners">
                              <input type="hidden" name="business_id" value="{{$images->business_id}}">
                              <a href="{{$images->business_banner}}" target="blank">VIEW IMAGE</a>  
                              <br><br>
                           </div>
                           <div>
                              <label for="input-Default" class="col-sm-2 control-label">Other Images 1:</label>
                              <input type="file" id="myFile" name="other_image_one">
                              <a href="{{$images->other_image_one}}"  target="blank">VIEW IMAGE</a>
                              <br><br>
                           </div>
                           <div>
                              <label for="input-Default" class="col-sm-2 control-label">Other Images 2:</label>
                              <input type="file" id="myFile" name="other_image_two">
                              <a href="{{$images->other_image_two}}"  target="blank">VIEW IMAGE</a>
                              <br><br>
                           </div>
                           <div>
                              <label for="input-Default" class="col-sm-2 control-label">Other Images 3:</label>
                              <input type="file" id="myFile" name="other_image_three">
                              <a href="{{$images->other_image_three}}"  target="blank">VIEW IMAGE</a>
                              <br><br>
                           </div>
                           @endforeach
                           <div class="col-sm-10">
                              <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="upload_images" class="upload_images btn btn-primary"  id="upload_images">Upload Images</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="tab29">
                     <form class="form-horizontal" method="POST" action="/merchant/add_payment_method" style="">
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                           <center>{{ Session::get('message') }}</center>
                        </div>
                        @endif   
                        @if (Session::has('danger'))
                        <div class="alert alert-danger">
                           <center>{{ Session::get('danger') }}</center>
                        </div>
                        @endif 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table class="table table-bordered" style="width: 100%; text-align: center;" cellpadding="1" cellspacing="1"  border="2">
                           <thead>
                              <tr>
                                 <th style="text-align: center;font-size: 13px">Payment Method</th>
                                 <th style="text-align: center;font-size: 13px">Action</th>
                              </tr>
                           </thead>
                           @foreach($_payment_method as $data)
                           <tr>
                              <td>{{$data->payment_method_name}}</td>
                              <td>
                                 <a href="/merchant/delete_payment_method/{{$data->payment_method_id}}"><button type="button" class="btn btn-danger">
                                 <i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                              </td>
                           </tr>
                           @endforeach
                        </table>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label" style="text-align: left;">Payment Method</label>
                           <div class="col-sm-3">
                              <input type="text" class="form-control" id="input-default"  name="payment_method_name">
                           </div>
                        </div>
                        <label for="input-Default" class="col-sm-3 control-label" style="text-align: left;"> </label>
                        <div class="col-md-2">
                        <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="save_payment" class="save_payment btn btn-primary" id="save_payment";>Add Payment</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="/assets/js/front/registration.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_website.js"></script>
<script>
   function myFunction() {
       var x = document.getElementById("myFile");
       x.disabled = false;
   }
</script>
@endsection
@extends('merchant.layout.layout')
@section('content')
<style>
.file-margin
{
   margin-bottom:20px;
}
th
{
   text-align: center;
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
<div id="main-wrapper">
   <div class="row">
      <div class="col-md-13">
         <div class="panel">
            <div class="panel-body">
               <!-- Nav tabs -->
               <div role="tabpanel">
                  <ul class="nav nav-pills" role="tablist">

                     <li role="presentation" class="active"><a href="#MI" role="tab" data-toggle="tab" aria-expanded="true">Merchant Information</a></li>
                     <li role="presentation" class=""><a href="#OI" role="tab" data-toggle="tab" aria-expanded="false">Other Information</a></li>
                     <li role="presentation" class=""><a href="#BH" role="tab" data-toggle="tab" aria-expanded="false">Business Hours</a></li>
                     <li role="presentation" class=""><a href="#BI" role="tab" data-toggle="tab" aria-expanded="false">Business Image</a></li>

                     <li role="presentation" class=""><a href="#PM" role="tab" data-toggle="tab" aria-expanded="false">Payment Method</a></li>

                      <li role="presentation" class=""><a href="#CP" role="tab" data-toggle="tab" aria-expanded="false">Change Password</a></li>

                  </ul>
               </div>
               <!-- Tab panes -->

               <div class="tab-content">
                
                  <div role="tabpanel" class="tab-pane fade active in" id="MI">
                     <form class="form-horizontal" method="POST" action="/merchant/update_merchant_info">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(Session::has('success_merchant'))
                            <div class='alert alert-success'><strong>Success!</strong> Information Updated.</div>
                            @endif 

                        <div class="form-group" style="margin-top:50px;">
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
                              <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{$merchant_info->twitter_url}}" >
                           </div>
                           <label for="facebook_url" class="col-sm-2 control-label">Facebook</label>
                           <div class="col-sm-4">
                              <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{$merchant_info->facebook_url}}">
                           </div>
                        </div>
                     
                        <div class="col-md-15">
                           <div class="text-right">
                              <button type="submit" class="btn btn-primary" id="update" style="padding: 5px 18px;">Update</button>
                           </div>
                        </div>


                     </form>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="OI">
                     <form class="form-horizontal" method="POST" action="/merchant/add_other_info">
                        <div id="other_info_success" style="margin-top:50px;">
                        </div>
                        <div class="form-group" >
                           <label for="business_name" class="col-sm-2 control-label">Company Information</label>
                           <div class="col-sm-10">
                              <textarea class="form-control" rows="5" name="company_information" id="company_information" >{{$other_info->company_information}}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Business Website</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="business_website" name="business_website" value="{{$other_info->business_website}}">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Year Establish</label>
                           <div class="col-sm-2">
                              <input type="text" class="form-control" id="year_established"  name="year_established" value="{{$other_info->year_established}}">
                           </div>
                        </div>

                        <div class="col-md-15">
                           <div class="text-right">
                              <button type="button" class="btn btn-primary" id="update" style="padding: 5px 18px;">Update</button>
                           </div>
                        </div>
                     </form>
                  </div>

                  <div role="tabpanel" class="tab-pane fade" method="POST" id="BH">
                     <form class="form-horizontal"  action="/merchant/profile/update_hours">
                        <div class="form-group" style="margin-top:50px;">
                           <label for="input-Default" class="col-sm-3 control-label">START</label>
                           <label for="input-Default" class="col-sm-3 control-label">END</label>
                           <label for="input-Default" class="col-sm-3 control-label">Disable?</label>
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
                           <div class="col-sm-3 searchfields-format">
                              @if($business_hours->desc == 'none')
                                 <select class="form-control" name="disable[]">
                                    <option value="none">Yes</option>
                                    <option value="disable">No</option>
                                 </select>
                              @else
                                 <select class="form-control" name="disable[]">
                                    <option value="disable">No</option>
                                    <option value="none">Yes</option>
                                 </select>
                              @endif
                           </div>
                        </div>
                        @endforeach
                        <div class="col-md-12">
                           <div class="text-right">
                              <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="" class="update_hours btn btn-primary"  id="">Update</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="BI">

                     <div class="col-md-12">
                        <div id="other_info_success" style="margin-top:50px;">
                        </div>
                        @if($images!=0)
                        <div class="col-md-6">
                           <div class="col-md-12 file-margin" >
                              <div class="col-md-6">
                                 <label for="input-Default" class="control-label">Business Banner:</label>
                                 <img src="{{$_images->business_banner}}" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                              <div class="col-md-6 ">
                                 <label for="input-Default" class="control-label">First Sub Image</label>
                                 <img src="{{$_images->other_image_one}}" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                           </div>
                           <div class="col-md-12 file-margin" >
                              <div class="col-md-6">
                                 <label for="input-Default" class="control-label">Second Sub Image</label>
                                 <img src="{{$_images->other_image_two}}" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                              <div class="col-md-6 ">
                                 <label for="input-Default" class="control-label">Third Sub Image</label>
                                 <img src="{{$_images->other_image_three}}" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/merchant/add_images" style="">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              
                              <div class="col-md-12 file-margin" >
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">Business Banner:</label>
                                 </div>
                                 <div class="col-md-6 ">
                                    <input type="file" id="business_banner" name="business_banner">
                                    <input type="hidden" name="business_banner_text" value="{{$_images->business_banner}}">
                                 </div>
                              </div>
                              <div class="col-md-12 file-margin">
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">First Sub Image</label>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="file" id="other_image_one" name="other_image_one">
                                     <input type="hidden" name="other_image_one_text" value="{{$_images->other_image_one}}">
                                 </div>
                              </div>
                              <div class="col-md-12 file-margin">
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">Second Sub Image</label>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="file" id="other_image_two" name="other_image_two">
                                     <input type="hidden" name="other_image_two_text" value="{{$_images->other_image_two}}">
                                 </div>
                              </div>
                              <div class="col-md-12 file-margin">
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">Third Sub Image</label>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="file" id="other_image_three" name="other_image_three">
                                     <input type="hidden" name="other_image_three_text" value="{{$_images->other_image_three}}">
                                 </div>
                                 <br><br><br>
                              </div>
                              <div  class="col-md-12">
                                 <div class="text-right">
                                    <button type="submit" style="padding: 5px 18px;" class="btn btn-primary"  id="">Update</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        @else
                        <div class="col-md-6">
                           <div class="col-md-12 file-margin" >
                              <div class="col-md-6">
                                 <label for="input-Default" class="control-label">Business Banner:</label>
                                 <img src="" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                              <div class="col-md-6 ">
                                 <label for="input-Default" class="control-label">First Sub Image</label>
                                 <img src="" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                           </div>
                           <div class="col-md-12 file-margin" >
                              <div class="col-md-6">
                                 <label for="input-Default" class="control-label">Second Sub Image</label>
                                 <img src="" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                              <div class="col-md-6 ">
                                 <label for="input-Default" class="control-label">Third Sub Image</label>
                                 <img src="" alt="" class="thumbnail" width="100%" height="auto">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/merchant/add_images" style="">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              
                              <div class="col-md-12 file-margin" >
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">Business Banner:</label>
                                 </div>
                                 <div class="col-md-6 ">
                                    <input type="file" id="business_banner" name="business_banner">
                                    <input type="hidden" name="business_banner_text" value="">
                                 </div>
                              </div>
                              <div class="col-md-12 file-margin">
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">First Sub Image</label>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="file" id="other_image_one" name="other_image_one">
                                     <input type="hidden" name="other_image_one_text" value="">
                                 </div>
                              </div>
                              <div class="col-md-12 file-margin">
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">Second Sub Image</label>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="file" id="other_image_two" name="other_image_two">
                                     <input type="hidden" name="other_image_two_text" value="">
                                 </div>
                              </div>
                              <div class="col-md-12 file-margin">
                                 <div class="col-md-4">
                                    <label for="input-Default" class="control-label">Third Sub Image</label>
                                 </div>
                                 <div class="col-md-6">
                                    <input type="file" id="other_image_three" name="other_image_three">
                                     <input type="hidden" name="other_image_three_text" value="">
                                 </div>
                                 <br><br><br>
                              </div>
                              <div  class="col-md-12">
                                 <div class="text-right">
                                    <button type="submit" style="padding: 5px 18px;" class="btn btn-primary"  id="">Update</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                        @endif
                        
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="PM">
                     <form class="form-horizontal" method="POST" action="/merchant/add_payment_method" style="">
                        
                        <div id="adding_payment_method_success" style="margin-top:50px;">
                        </div>
                        <table class="table table-bordered" style="width: 100%; text-align: center;font-size:13px;" cellpadding="1" cellspacing="1"  border="2">
                           <thead>
                              <tr>
                                
                                 <th >Payment Method Name</th>
                                 <th >Action</th>
                              </tr>
                           </thead>
                           @foreach($_payment_method as $data)
                           <tr>
                            
                              <td >{{$data->payment_method_name}}</td>
                              <td>
                                 <button type="button" class="btn btn-danger deletePaymentss" data-id="{{$data->payment_method_id}}">
                                 <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                 </button>
                              </td>
                           </tr>
                           @endforeach
                        </table>
                        {!! $_payment_method->render()!!}
                        <div class="col-md-4">
                           <label class="control-label" style="text-align: left;margin-bottom:10px;">&nbsp;&nbsp;Payment Method</label>
                           <div  class="col-md-12">
                              <input type="text" class="form-control" id="paymentMethodName"  name="payment_method_name">
                           </div>
                           <div class="col-md-12">
                              <button type="button" style="padding: 5px;margin-top:10px;" name="save_payment" id="savePayment" class="save_payment btn btn-primary" id="save_payment";>Add Payment</button>
                              
                           </div>
                        </div>
                     </form>
                  </div>


                  <div role="tabpanel" class="tab-pane fade" id="CP">
                      <form class="form-horizontal" method="POST" action="/merchant/change_password">
                        <br><br><br>
                        <div class="form-group"> 
                             <div class="col-sm-3">
                           <strong style="font-size: 18px;">Change Password</strong>
                           </div>
                        </div>
                       
                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Enter Current Password</label>
                           <div class="col-sm-3">
                              <input type="Password" class="form-control" id="" name="" value="">
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">New Password</label>
                           <div class="col-sm-3">
                              <input type="Password" class="form-control" id="" name="" value="">
                           </div>
                        </div>

                        <div class="form-group">
                           <label for="input-Default" class="col-sm-2 control-label">Confirm New Password</label>
                           <div class="col-sm-3">
                              <input type="Password" class="form-control" id=""  name="" value="">
                           </div>
                        </div>

                       <div class="col-md-5">
                           <div class="text-right">
                              <button type="submit" class="btn btn-primary" id="update" style="padding: 5px 18px;">Submit</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/merchant/merchant_profile.js"></script>
<script>
function myFunction() {
var x = document.getElementById("myFile");
x.disabled = false;
}
</script>
@endsection
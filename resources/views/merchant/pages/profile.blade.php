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
            <div class="panel">
                <div class="panel-body">
                    <div role="tabpanel">
                                   
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">General Information</a></li>

                            <li role="presentation" class=""><a href="#tab15" role="tab" data-toggle="tab" aria-expanded="false">Other Information</a></li>

                            <li role="presentation" class=""><a href="#tab11" role="tab" data-toggle="tab" aria-expanded="false">Business Hours</a></li>

                            <li role="presentation" class=""><a href="#tab20" role="tab" data-toggle="tab" aria-expanded="false">Payment Methods</a></li>

                        </ul>       

                        <!-- Tab panes -->

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab9">

                                <form class="form-horizontal">
    
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Business Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="business_name" value="Jolibee" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Primary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="095678923" readonly>
                                        </div>
                                         <label for="input-Default" class="col-sm-2 control-label">Business Alternate Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="095678923" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="" rows="4=6" readonly>Marcos St. Pandi, Bulacan</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">County</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default" value="Bulacan" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default" value="Pandi" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Postal</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default" value="1432" readonly>
                                        </div>           
                                    </div> 
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Twitter</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="Twitter Account" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Facebook</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="Facebook Account" readonly>
                                        </div>        
                                    </div> 
                                </form>
                            </div>


                            
                         <div role="tabpanel" class="tab-pane fade" id="tab15">
                          <form class="form-horizontal" method="POST" action="/merchant/add_other_info">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if (Session::has('add_info'))
                <div class="alert alert-success"><center>{{ Session::get('add_info') }}</center></div>
                @endif 
                                   
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Company Information</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="company_information" id="comment" value="">
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="input-Default" class="col-sm-2 control-label">Business Website</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-default" name="business_website" value="">
                                        </div>                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Year Establish</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default"  name="year_established" value="" >
                                        </di>                                       
                                    </div>  

                                    <div class="col-md-1">
                                        <div class="text-right">
                                        <button class="btn btn-primary" style="padding: 5px 18px;">Save</button>
                                        </div>
                                    </div>

                                 </div>
                                </form> 
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab11">
                                <form class="form-horizontal" action="">

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Monday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="08:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="05:00 PM" readonly>
                                        </div>                                 
                                    </div> 

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Tuesday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Wednesday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Thursday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Friday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Saturday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Sunday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <button class="btn btn-primary">Edit</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <button class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                   <div role="tabpanel" class="tab-pane fade" id="tab20">
                      <form class="form-horizontal" method="POST" action="/merchant/add_payment_method" style="">

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
                            <th style="text-align: center;font-size: 13px">ID</th>
                            <th style="text-align: center;font-size: 13px">Payment Method</th>
                            <th style="text-align: center;font-size: 13px">Action</th>
                            </tr>   
                         </thead>
                            @foreach($_payment_method as $data)
                            <tr>
                            <td>{{$data->payment_method_id}}</td>
                            <td>{{$data->payment_method_name}}</td>
                            <td>
                            <a href="#"><button type="button" " class="btn btn-warning"  id="">
                            <i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>

                            <a href="/merchant/delete_payment_method/{{$data->payment_method_id}}"><button type="button" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Delete</button>
                            </td>
                            </tr>
                            @endforeach
                        </table>  

                        <div class="form-group">
                             <label for="input-Default" class="col-sm-2 control-label" style="text-align: left;">Payment ID</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="input-default"  name="payment_method_id">
                            </div>                                       
                        </div>  
                         <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label" style="text-align: left;">Payment Method</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" id="input-default"  name="payment_method_name">
                            </div> 

                         </div>  
                            <label for="input-Default" class="col-sm-4 control-label" style="text-align: left;">  </label>
                            <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="save_payment" class="save_payment btn btn-primary" id="save_payment";>ADD</button>
                     </form>
                    </div>
                    </div>
                  </div>
               </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                        
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
@endsection


@extends('merchant.layout.layout')
@section('content')
<style type="text/css">
.thumb-image{
 float:left;width:100px;
 position:relative;
 padding:5px;
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
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-12">        
            <div class="panel">
                <div class="panel-body">
                    <div role="tabpanel">
                                   
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist" style="margin-bottom:20px;">
                            <li role="presentation" class="active"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">General Information</a></li>
                            <li role="presentation" class=""><a href="#tab10" role="tab" data-toggle="tab" aria-expanded="false">Other Information</a></li>
                            <li role="presentation" class=""><a href="#tab11" role="tab" data-toggle="tab" aria-expanded="false">Business Hours</a></li>
                            <li role="presentation" class=""><a href="#tab12" role="tab" data-toggle="tab" aria-expanded="false">Payment Methods</a></li>
                            <li role="presentation" class=""><a href="#tab12" role="tab" data-toggle="tab" aria-expanded="false">Add Business</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab9">

                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Business Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="business_name" value="{{$business->business_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Primary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->business_phone}}" readonly>
                                        </div>
                                         <label for="input-Default" class="col-sm-2 control-label">Business Alternate Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->business_alt_phone}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="" rows="4=6" readonly>{{$business->business_complete_address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">County</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->county_name}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->city_name}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Postal</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->postal_code}}" readonly>
                                        </div>           
                                    </div> 
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Twitter</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->twitter_url}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Facebook</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="input-default" value="{{$business->facebook_url}}" readonly>
                                        </div>        
                                    </div> 
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab10">
                                
                                <form class="form-horizontal">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Company Profile</label>
                                        <div id="wrapper" style="margin-top: 20px;"><input id="company_profile" multiple="multiple" type="file"/> 
                                        <label for="business_name" class="col-sm-2 control-label"></label>
                                        <div id="image-holder"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Company Information</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="company_information" id="company_information" value="">
                                                
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Website</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="company_website" name="company_website" value="">
                                        </div>                                        
                                    </div>
                                    <div    class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Year Establish</label>
                                        <div class="col-sm-2">
                                            <input type="hidden" class="form-control" id="business_id_other"  name="business_id_other" value="{{$business->business_id}}" >
                                            <input type="text" class="form-control" id="company_established"  name="company_established" value="" >
                                        </div>                                        
                                    </div>  
                                    
                                    <div class="col-md-4">
                                        <div class="text-right">
                                            <button class="btn btn-primary" id="save_other_info">Save</button>
                                        </div>
                                    </div>

                                </form> 
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="tab11">
                                <form class="form-horizontal">
                                    @foreach($business_hours as $business_time)
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">{{$business_time->days}}</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="{{$business_time->business_hours_from}}" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="{{$business_time->business_hours_to}}" readonly>
                                        </div>                                 
                                    </div> 
                                    @endforeach
                                    

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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                        
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/assets/merchant/merchant_profile.js"></script>
@endsection


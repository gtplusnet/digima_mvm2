@extends('admin.merchant.layout.layout')
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
                            <li role="presentation" class=""><a href="#tab10" role="tab" data-toggle="tab" aria-expanded="false">Other Information</a></li>
                            <li role="presentation" class=""><a href="#tab11" role="tab" data-toggle="tab" aria-expanded="false">Business Hours</a></li>
                            <li role="presentation" class=""><a href="#tab12" role="tab" data-toggle="tab" aria-expanded="false">Payment Methods</a></li>
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

                            <div role="tabpanel" class="tab-pane fade" id="tab10">    
                                <form class="form-horizontal" method="POST" action="/merchant/profile">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @foreach ($other_info as $business_other_info)

                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Company Information</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="company_information" id="comment" value="{{ $business_other_info-> company_information }}" readonly>                                                
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Website</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="input-default" name="business_website" value="{{ $business_other_info-> business_website }}" readonly>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Year Establish</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="input-default"  name="year_established" value="{{ $business_other_info-> year_established }}" readonly>
                                        </div>                                        
                                    </div>  
                                    @endforeach 
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <a href="/merchant/profile"><button class="btn btn-primary">Edit</button></a>
                                                <a href="#"><button class="btn btn-primary">Save</button></a>
                                            </div>
                                        </div>
                                    </div>                                    
                                </form> 

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab11">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Monday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
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
                                        <label for="input-Default" class="col-sm-2 control-label">Wensday</label>
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
@endsection


@extends('merchant.layout.layout')
@section('content')
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

        <div class="col-md-5">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">List</h4>
                </div>
             
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Membership</th>
                                    <th>Reference #</th>
                                    <th>Status</th>
                                </tr>
                            </thead>                       
                            <tbody>
                                @foreach($bills as $bill)
                                <tr>
                                    <td>{{$bill->membership_name}}</td>
                                    <td><p  class="dropdown-toggle waves-effect waves-button waves-classic">
                                        {{$bill->payment_reference_number}}</a></td>
                                    <td>{{$bill->payment_status}}</td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="invoice col-md-7">

            <form class="form-horizontal" method="POST" action="/merchant/bills">
            {{csrf_field()}}
            <div class="panel panel-white">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="m-b-md"><b>CROATIA Directory</b></h1>
                            <address>
                                <i class="fa fa fa-map-marker text-info"></i> @if(isset($contact_us->complete_address)==null)@else {{$contact_us->complete_address}}@endif<br>
                               <i class="fa fa fa-phone text-info"></i>@if(isset($contact_us->phone_number)==null)@else {{$contact_us->phone_number}}@endif<br>
                               <i class="fa fa fa-envelope-o text-info"></i> @if(isset($contact_us->email)==null)@else {{$contact_us->email}}@endif
                            </address>
                        </div>
                        <div class="col-md-8 text-right">
                            <h1>RECEIPT</h1>
                           <!--  <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button> -->
                            <button type="button" class="btn btn-default"><a class="fa fa-print" href="javascript:if(window.print)window.print()"> Print</a></button>


                        </div>
                        <div class="col-md-12">
                            
                             <div class="col-md-15">
                                <hr>
                                <p>
                                    <h3>Invoice to</h3><br>
                                </p>
                                
                                <div class="col-md-12">
                                    <strong> <i class="fa fa fa-user text-info"></i> {{session('full_name')}}</strong>
                                </div>
                                <div class="col-md-12">

                                    <strong> <i class="fa fa fa-phone text-info"></i> {{$bill->business_phone}} / {{$bill->business_alt_phone}} </strong>

                                </div>
                                <div class="col-md-12">
                                    <strong> <i class="fa fa fa-envelope-o text-info"></i>  {{session('email')}}   </strong>
                                </div>
                                <br><br>
                                <br><br>
                               
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Item One</td>
                                        <td>Lorem ipsum dolor sit amet</td>
                                        <td>23</td>
                                        <td>${{$bill->payment_amount}}</td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <h3>Thank you !</h3>
                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                            <img src="/assets/admin/merchant/assets/images/signature.png" height="150" class="m-t-lg" alt="">
                        </div>
                        <div class="col-md-4">
                            <div class="text-right">
                                <h4 class="no-m m-t-sm">Subtotal</h4>
                                <h2 class="no-m">$7282</h2>
                                <hr>
                                <h4 class="no-m m-t-sm">Shipping</h4>
                                <h2 class="no-m">$240</h2>
                                <hr>
                                <h4 class="no-m m-t-md text-success">Total</h4>
                                <h1 class="no-m text-success">$7522</h1>
                                <hr>
                            </div>
                        </div>
                    </div><!--row-->
                </div>
             </form>
            </div>
        </div>

    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection
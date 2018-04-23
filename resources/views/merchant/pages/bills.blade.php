@extends('merchant.layout.layout')
@section('content')
<div class="page-title">
    <h3 class="transform-uppercase">{{ $page }}</h3>
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
                    <h4 class="panel-title">Popis</h4>
                </div>
             
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Članstvo</th>
                                    <th>Referentni Broj</th>
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
                        <div class="col-md-6">
                            <h1 class="m-b-md transform-uppercase"><b>ŽUTE STRANICE</b></h1>
                            <address>

                                <strong>@if(isset($contact_us->complete_address)==null)@else {{$contact_us->complete_address}}@endif<br></strong>
                                <strong>@if(isset($contact_us->phone_number)==null)@else {{$contact_us->phone_number}}@endif<br></strong>
                                <strong>@if(isset($contact_us->email)==null)@else {{$contact_us->email}}@endif</strong>

                            </address>
                        </div>
                        <div class="col-md-8 text-right">
                          <!--   <h1>RECEIPT</h1> -->
                        </div>
                        <div class="col-md-12">
                            
                             <div class="col-md-15">
                                <hr>
                                <p>
                                    <h3>Faktura Za</h3><br>
                                </p>
                                
                                <div class="col-md-12">
                                    <strong>  {{session('full_name')}}</strong>
                                </div>
                                <div class="col-md-12">
                                    <strong>  {{$bill->business_phone}} / {{$bill->business_alt_phone}} </strong>
                                </div>
                                <div class="col-md-12">
                                    <strong>   {{session('email')}}   </strong>
                                </div>
                                <br><br>
                                <br><br>
                               
                            </div>
                        </div>
                        <div class="col-md-12" style="overflow-x: scroll;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        
                                        <th>Naziv Tvrtke</th>
                                        <th>Članstvo</th>
                                        <th>Cijena</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$bill->business_name}}</td>
                                        <td>{{$bill->membership_name}}</td>
                                        <td>${{$bill->payment_amount}}</td>
                                        <td>{{$bill->payment_status}}</td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <h3>Hvala Vam!</h3>
                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                            <img src="/assets/admin/merchant/assets/images/signature.png" height="150" class="m-t-lg" alt="">
                        </div>
                        <div class="col-md-4">
                            <div class="text-right">
                                <hr>
                                <h4 class="no-m m-t-md text-success">Ukupno</h4>
                                <h1 class="no-m text-success">${{$bill->payment_amount}}</h1>
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
<script src="/assets/merchant/bills.js"></script>
@endsection
@extends('general_admin.pages.general_admin_layout')
@section('title', 'invoice')
@section('description', 'merchants')
@section('content')
<div id="main-wrapper">
    <div class="row">
        <div class="invoice" style="margin:0% 20% 10% 20%">
            <form method="post" id="form_print" action="/general_admin/send_save_invoice/{{$id}}">
            {{csrf_field()}}
                @if(Session::has('error'))
                <div class='alert alert-danger'><strong>Failed!</strong> Transaction Failed! Invoice number has already been issued to another person.</div>
                @endif 
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h1 class="m-b-md"><b>CROATIA Directory</b></h1>
                                <address>
                                    Zagreb, Croatia<br>
                                    P: (123) 456-7890
                                </address>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 text-center"  >
                                <h4>Invoice Number</h4>
                                <input type="number" class="form-control" name="invoice_number" id="invoice_number" required/>
                                <input type="hidden" value="{{$invoice_info->business_id}}" name="business_id" id="business_id">
                                <input type="hidden" value="{{$invoice_info->business_contact_person_id}}" name="business_contact_person_id" id="business_contact_person_id">
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <p>
                                    <h3>Invoice to</h3><br>
                                </p>
                                
                                <div class="col-md-12">
                                    <strong>{{$invoice_info->contact_first_name}} {{$invoice_info->contact_last_name}}</strong>
                                </div>
                                <div class="col-md-12">
                                    <strong>{{$invoice_info->business_phone}}/{{$invoice_info->business_alt_phone}}</strong>
                                </div>
                                <div class="col-md-12">
                                    <strong>{{$invoice_info->user_email}}</strong>
                                </div>
                            </div>
                            <div class="col-md-12" id="showHere1s"> 
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Business Name</th>
                                            <th>Membership</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Item One</td>
                                            <td>{{$invoice_info->business_name}}</td>
                                            <td>{{$invoice_info->payment_method_name}}</td>
                                            <td>5000.00</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-12">
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
                            </div>
                            
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <input value="send & save" type="submit" name="submit" class="btn btn-default but" />
                        <input value="Print" type="submit" name="submit" class="btn btn-default but" />
                        <input value="Download" type="submit" name="submit" class="btn btn-default but" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
.but
{
margin:10px 10px 10px 10px;
}
</style>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_invoice.js"></script> --}}
@endsection
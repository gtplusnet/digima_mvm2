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
    <h3 class="transform-capitalize">{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant/dashboard">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div id="profile_alert">
                    @if(session('success_merchant'))
                    <div class="alert alert-success" style="margin-top:20px;">
                        <span>Uspjeh!</span>  Informacije su ažurirane
                    </div>
                    @endif
                    <!-- DONT DELETE -->
                </div>
                <div role="tabpanel">
                    <ul class="nav nav-pills col-md-12" role="tablist">
                        <li role="presentation" class="active tab-mobile transform-capitalize"><a href="#MI" role="tab" data-toggle="tab" aria-expanded="true">Merchant Information</a></li>
                        <li role="presentation" class="tab-mobile transform-capitalize"><a href="#OI" role="tab" data-toggle="tab" aria-expanded="false">Druge Podatke</a></li>
                        <li role="presentation" class="tab-mobile transform-capitalize"><a href="#BH" role="tab" data-toggle="tab" aria-expanded="false">Radno Vrijeme</a></li>
                        <li role="presentation" class="tab-mobile transform-capitalize"><a href="#BI" role="tab" data-toggle="tab" aria-expanded="false">Poslovna Slika</a></li>
                        <li role="presentation" class="tab-mobile transform-capitalize"><a href="#PM" role="tab" data-toggle="tab" aria-expanded="false">Način Plačanja</a></li>
                        <li role="presentation" class="tab-mobile transform-capitalize"><a href="#CP" role="tab" data-toggle="tab" aria-expanded="false">Promijeni Lozinku</a></li>
                    </ul>
                    <style>
                    @media screen and (max-width: 480px)
                    {
                    .tab-mobile
                    {
                    width:100%;
                    text-align:center;
                    }
                    }
                    </style>
                </div>
                <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane fade active in" id="MI">
                        <form class="form-horizontal">
                            {{ csrf_field() }}
                            
                            <div class="form-group" style="margin-top:50px;">
                                <label for="business_name" class="col-sm-2 control-label">Naziv Tvrtke</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="business_name" value="{{$merchant_info->business_name}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="business_phone" class="col-sm-2 control-label">Glavni telefon</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="business_phone" value="{{$merchant_info->business_phone}}" readonly>
                                </div>
                                <label for="business_alt_phone" class="col-sm-2 control-label">Alternativni telefon</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="business_alt_phone" value="{{$merchant_info->business_alt_phone}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Cijela poslovna adresa</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="business_complete_address" name="business_complete_address" rows="4=6" readonly>{{$merchant_info->business_complete_address}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Županja</label>
                                <div class="col-sm-2">
                                    <input type="text" name class="form-control" id="input-default" value="{{$merchant_info->county_name}}" readonly>
                                </div>
                                <label for="input-Default" class="col-sm-2 control-label">Grad</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="input-default" value="{{$merchant_info->city_name}}" readonly>
                                </div>
                                <label for="input-Default" class="col-sm-2 control-label">Poštanski broj</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="input-default" value="{{$merchant_info->postal_code}}" readonly>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="twitter_url" class="col-sm-2 control-label">Twitter korisničko ime</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{$merchant_info->twitter_url}}" readonly>
                                </div>
                                <label for="facebook_url" class="col-sm-2 control-label">URL Facebooka</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{$merchant_info->facebook_url}}" readonly>
                                </div>
                            </div>
                            
                            <div class="col-md-15">
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" id="updateprofile" style="padding: 5px 18px;"><i class="fa fa-pencil m-r-xs"></i>Ažurirajte podatke</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="OI">
                        <form class="form-horizontal" method="POST" action="/merchant/add_other_info">
                            {{csrf_field()}}
                            
                            <div class="form-group" >
                                <label for="business_name" class="col-sm-2 control-label">Informacije o Tvrtki</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" rows="5" name="company_information" id="company_information" >{{$other_info->company_information}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Poslovne Web Stranice</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="business_website" name="business_website" value="{{$other_info->business_website}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Godina Osnivanja</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="year_established"  name="year_established" value="{{$other_info->year_established}}">
                                </div>
                            </div>
                            <div class="col-md-15">
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary" id="update" style="padding: 5px 18px;"><i class="fa fa-pencil m-r-xs"></i>Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" method="POST" id="BH">
                        <form class="form-horizontal"  action="/merchant/profile/update_hours">
                            <div class="form-group" style="margin-top:50px;">
                                <label for="input-Default" class="col-sm-3 control-label">Početak</label>
                                <label for="input-Default" class="col-sm-3 control-label">Kraj</label>
                                <label for="input-Default" class="col-sm-3 control-label">Onesposobiti?</label>
                            </div>
                            @foreach($_business_hours as $business_hours)
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">{{$business_hours->days}}</label>
                                <div class="col-sm-3 searchfields-format">
                                    <input type="hidden" name="days[]" value="{{$business_hours->days}}">
                                    <input type="hidden" name="business_id[]" value="{{$business_hours->business_id}}">
                                    <input type="time" class="form-control" name="business_hours_from[]"  value="{{$business_hours->business_hours_from}}" required="true">
                                </div>
                                <div class="col-sm-3 searchfields-format">
                                    <input type="time" class="form-control" name="business_hours_to[]"  value="{{$business_hours->business_hours_to}}" required="true">
                                </div>
                                <div class="col-sm-3 searchfields-format">
                                    @if($business_hours->act == 'yes')
                                    <select class="form-control" name="disable[]">
                                        <option value="yes">Onesposobiti</option>
                                        <option value="no">Omogućiti</option>
                                    </select>
                                    @else
                                    <select class="form-control" name="disable[]">
                                        <option value="no">Omogućiti</option>
                                        <option value="yes">Onesposobiti</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-11">
                                <div class="text-right">
                                    <button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="" class="update_hours btn btn-primary"><i class="fa fa-clock-o m-r-xs"></i>Ažuriraj</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="BI">
                        <div class="col-md-12">
                            @if($images!=0)
                            <div class="col-md-6">
                                <div class="col-md-12 file-margin" >
                                    <div class="col-md-6">
                                        <label for="input-Default" class="control-label">Poslovna Slika</label>
                                        <img src="{{$_images->business_banner}}" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="input-Default" class="control-label">Prva slika</label>
                                        <img src="{{$_images->other_image_one}}" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                </div>
                                <div class="col-md-12 file-margin" >
                                    <div class="col-md-6">
                                        <label for="input-Default" class="control-label">Drugu slika</label>
                                        <img src="{{$_images->other_image_two}}" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="input-Default" class="control-label">Treću slika</label>
                                        <img src="{{$_images->other_image_three}}" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/merchant/add_images" style="">
                                    {{ csrf_field() }}
                                    <div class="col-md-12 file-margin" >
                                        <p style="color:red;">Slika minimalna dimenzija (800x600)</p>
                                    </div>
                                    <div class="col-md-12 file-margin" >
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Poslovna Slika</label>
                                        </div>
                                        <div class="col-md-6 ">
                                            <input type="file" id="business_banner" name="business_banner">
                                            <input type="hidden" name="business_banner_text" value="{{$_images->business_banner}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 file-margin">
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Prva slika</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="other_image_one" name="other_image_one">
                                            <input type="hidden" name="other_image_one_text" value="{{$_images->other_image_one}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 file-margin">
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Drugu slika</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="other_image_two" name="other_image_two">
                                            <input type="hidden" name="other_image_two_text" value="{{$_images->other_image_two}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 file-margin">
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Treću slika</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="other_image_three" name="other_image_three">
                                            <input type="hidden" name="other_image_three_text" value="{{$_images->other_image_three}}">
                                        </div>
                                        <br><br><br>
                                    </div>
                                    <div  class="col-md-10">
                                        <div class="text-right">
                                            <button type="submit" style="padding: 5px 18px;" class="btn btn-primary"  id=""><i class="fa fa-image m-r-xs"></i>Ažuriraj</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @else
                            <div class="col-md-6">
                                <div class="col-md-12 file-margin">
                                    <div class="col-md-6">
                                        <label for="input-Default" class="control-label">Poslovna Slika</label>
                                        <img src="" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="input-Default" class="control-label">Prva slika</label>
                                        <img src="" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                </div>
                                <div class="col-md-12 file-margin" >
                                    <div class="col-md-6">
                                        <label for="input-Default" class="control-label">Drugu slika</label>
                                        <img src="" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="input-Default" class="control-label">Treću slika</label>
                                        <img src="" alt="" class="thumbnail" width="100%" height="auto">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/merchant/add_images" style="">
                                    {{ csrf_field() }}
                                    
                                    <div class="col-md-12 file-margin" >
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Poslovna Slika</label>
                                        </div>
                                        <div class="col-md-6 ">
                                            <input type="file" id="business_banner" name="business_banner">
                                            <input type="hidden" name="business_banner_text" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 file-margin">
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Prva slika</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="other_image_one" name="other_image_one">
                                            <input type="hidden" name="other_image_one_text" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 file-margin">
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Drugu slika</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="other_image_two" name="other_image_two">
                                            <input type="hidden" name="other_image_two_text" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 file-margin">
                                        <div class="col-md-4">
                                            <label for="input-Default" class="control-label">Treću slika</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="file" id="other_image_three" name="other_image_three">
                                            <input type="hidden" name="other_image_three_text" value="">
                                        </div>
                                        <br><br><br>
                                    </div>
                                    <div  class="col-md-12">
                                        <div class="text-right">
                                            <button type="submit" style="padding: 5px 18px;" class="btn btn-primary">Ažuriraj</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="PM">
                        <form class="form-horizontal" >
                            <div class="pull-right" style="margin:5px 5px 5px 0px">
                                <form class="form-inline">
                                    <div class="form-inline">
                                        <input type="text" class="form-control" id="paymentMethodName" name="paymentMethodName" >
                                        <button type="button"  name="savePayment" id="savePayment" class="save_payment btn btn-primary";><i class=" fa fa-file-text-o m-r-xs"></i>dodavanje načina plaćanja</button>
                                    </div><br>
                                </form>
                            </div>
                            
                            <table class="table table-bordered" style="width: 100%; text-align: center;font-size:13px;" cellpadding="1" cellspacing="1"  border="2">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;font-size: 13px">Naziv načina plaćanja</th>
                                        <th style="text-align: center;font-size: 13px">Radnja</th>
                                    </tr>
                                </thead>
                                @foreach($_payment_method as $data)
                                <tr>
                                    
                                    <td >{{$data->payment_method_name}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger deletePaymentss" data-id="{{$data->payment_method_id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>Izbrisati
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            
                            {!! $_payment_method->render()!!}
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="CP">
                        <form class="form-horizontal" method="POST" action="/merchant/change_password">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Unesite trenutnu lozinku</label>
                                <div class="col-sm-3">
                                    <input type="Password" class="form-control" id="current_password" name="current_password" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Nova lozinka</label>
                                <div class="col-sm-3">
                                    <input type="Password" class="form-control" id="new_password" name="new_password" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Potvrdi lozinku</label>
                                <div class="col-sm-3">
                                    <input type="Password" class="form-control" id="confirm_password"  name="confirm_password" >
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="text-right" >
                                    <button type="button" class="btn btn-primary" id="updatePassword" style="padding: 5px 18px;"><i class="fa fa-lock m-r-xs"></i>Ažuriraj</button>
                                </div>
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
<script src="/assets/merchant/merchant_profile.js"></script>
<style>
.web-content
{
margin:20px 20px 20px 20px;
/*margin: auto;*/
}
</style>
@endsection
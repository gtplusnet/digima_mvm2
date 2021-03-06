@extends('front.layout.layout')
@section('content')
<div class="banner-payment" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="title-holder-page" style="">
			DOKAZ o UPLATI
		</div>
	</div>
</div>
<div class="container">
{{-- 	<!-- OLD -->
	<div class="row clearfix" style="display: none;">
		<div class="col-md-3"></div>
		<div class="col-md-6 payment-container">
			<div class="payment-title-container">
				<p class="payment-title">Unesite Dokaz Plaćanja</p>
			</div>
			<form action="/merchant/upload_payment" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="payment-form-container">
					<div class="payment-form-upperpart row clearfix">
						<div class="col-md-6 payment-left-area">
							<label for="input-reference-number" class="payment-label">Referentni Broj:</label>
							<input type="text" name="payment_reference_number" class="payment-textfield"/>
						</div>
						<div class="col-md-6 payment-right-area">
							<label for="input-method" class="payment-label">Način Plaćanja:</label>
							<select class="payment-dropdown"  name="payment_method" required/>
								@foreach($method as $methods)
									<option value="{{$methods->payment_method_id}}">{{$methods->payment_method_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="payment-form-bottompart row clearfix">
						<div class="col-md-6 payment-left-area">
							<label for="input-amount" class="payment-label">Iznos:</label>
							<input type="text" name="payment_amount" class="payment-textfield" value="{{$merchant_info->membership_price}}" readOnly/>
							<input type="hidden" name="business_id" value="{{$merchant_info->business_id}}">
							<input type="hidden" name="contact_id" value="{{$merchant_info->business_contact_person_id}}">
							<input type="hidden" name="link" value="/merchant/payment/{{$merchant_info->business_id}}/edit_my_payment">
						</div>
						<div class="col-md-5 payment-right-area">
							<label for="proof-of-payment" class="payment-label">Prenesite Dokaz o Uplati:</label>
							<input id="uploadFile"  value="Nema Datoteke" placeholder="Odaberite Datoteku" disabled="disabled" />
						</div>
						<div class="col-md-1 payment-upload-icon-container">
							<div class="fileUpload payment-upload-holder fa fa-upload payment-upload-icon">
								<input id="uploadBtn" name="payment_file_name" type="file" class="upload"/>
							</div>
						</div>
					</div>
				</div>
				<div class="payment-title-container">
					<p class="payment-title">FAKTURA</p>
				</div>
				<div class="payment-form-container">
					<div class="payment-form-upperpart row clearfix">
						<div class="col-md-4 payment-left-area">
							<p class="payment-invoice-label">Broj Fakture : {{$merchant_info->invoice_number}}</p>
						</div>
						<div class="col-md-8 payment-email-right-area">
							<p class="payment-invoice-label">{{$merchant_info->user_email}}</p>
						</div>
					</div>
					<div class="payment-form-seperator">
						<div class="payment-form-upperpart row clearfix">
							<div class="col-md-6 payment-left-area">
								<p class="payment-invoice-content-label">Ime Klijenta:</p>
								
							</div>
							<div class="col-md-6 payment-right-area">
								<p class="payment-invoice-content-label">{{$merchant_info->contact_prefix}} {{$merchant_info->contact_first_name}} {{$merchant_info->contact_last_name}} </p>
								
							</div>
						</div>
						<div class="payment-form-upperpart row clearfix">
							<div class="col-md-6 payment-left-area">
								
								<p class="payment-invoice-content-label">Naziv Tvrtke:</p>
								
							</div>
							<div class="col-md-6 payment-right-area">
								
								<p class="payment-invoice-content-label">{{$merchant_info->business_name}}</p>
								
							</div>
						</div>
						<div class="row clearfix payment-form-upperpart">
							<div class="col-md-6 payment-left-area">
								
								<p class="payment-invoice-content-label">Cijela Poslovna Adresa:</p>
								
							</div>
							<div class="col-md-6 payment-right-area">
								<p class="payment-invoice-content-label">{{$merchant_info->business_complete_address}}</p>
								
							</div>
						</div>
						<div class="row clearfix payment-form-upperpart">
							<div class="col-md-6 payment-left-area">
								
								<p class="payment-invoice-content-label">City, State:</p>
								
							</div>
							<div class="col-md-6 payment-right-area">
								
								<p class="payment-invoice-content-label">{{$merchant_info->city_name}} {{$merchant_info->county_name}}</p>
								
							</div>
						</div>
						<div class="row clearfix payment-form-upperpart">
							<div class="col-md-6 payment-left-area">
								
								<p class="payment-invoice-content-label">ZIP Code:</p>
								
							</div>
							<div class="col-md-6 payment-right-area">
								
								<p class="payment-invoice-content-label">{{$merchant_info->postal_code}}</p>
								
							</div>
						</div>
						<div class="row clearfix payment-form-upperpart">
							<div class="col-md-6 payment-left-area">
								
								<p class="payment-invoice-content-label">Date  if Issue:</p>
							</div>
							<div class="col-md-6 payment-right-area">
								
								<p class="payment-invoice-content-label">{{$merchant_info->date_transact}}</p>
							</div>
						</div>
					</div>
					<div class="row clearfix payment-form-seperator">
						<div class="col-md-12 payment-form-upperpart">
							<div class="col-md-6 payment-left-area">
								<p class="payment-invoice-content-label">Package</p>
								<p class="payment-invoice-content-label">{{$merchant_info->membership_name}}</p>
							</div>
							<div class="col-md-6">
								<p class="payment-cost-label">Membership Cost</p>
								<p class="payment-cost-label">${{$merchant_info->membership_price}}</p>
							</div>
							
						</div>
					</div>
					<div class="row clearfix payment-form-lastpart">
						<div class="col-md-6"></div>
						<div class="col-md-3 payment-subtotal-container">
							<p class="payment-invoice-content-label">Total</p>
							
						</div>
						<div class="col-md-3">
							<p class="payment-cost-label">${{$merchant_info->membership_price}}</p>
						</div>
					</div>
				</div>
				<div class="payment-btn-container">
					<button class="payment-submit-btn">SUBMIT</button>
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div> --}}
	<!-- NEW -->
	<div class="payment-wrapper">
		<form action="/merchant/upload_payment" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="top-container">
				<div class="payment-title">
					Enter Evidence Payments
				</div>
				<div class="content">
					<div class="row clearfix">
						<div class="col-md-6">
							<label for="input-reference-number" class="payment-label">Referentni Broj:</label>
							<input type="text" name="payment_reference_number" class="payment-textfield" required/>
						</div>
						<div class="col-md-6">
							<label for="input-method" class="payment-label">Način Plaćanja:</label>
							<select class="payment-dropdown"  name="payment_method" required/>
								@foreach($method as $methods)
									<option value="{{$methods->payment_method_id}}">{{$methods->payment_method_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-6">
							<label for="input-amount" class="payment-label">Iznos:</label>
							<input type="text" name="payment_amount" class="payment-textfield" value="{{$merchant_info->membership_price}}" readOnly/>
							<input type="hidden" name="business_id" value="{{$merchant_info->business_id}}">
							<input type="hidden" name="contact_id" value="{{$merchant_info->business_contact_person_id}}">
							<input type="hidden" name="link" value="/merchant/payment/{{$merchant_info->business_id}}/edit_my_payment">
						</div>
						<div class="col-md-6">
							<label for="proof-of-payment" class="payment-label">Prenesite Dokaz o Uplati:</label>
							<div class="row clearfix">
								<div class="col-md-4 col-sm-4 col-xs-4">
									<div class="fileUpload payment-upload-holder fa fa-upload payment-upload-icon">
										<input id="uploadBtn" name="payment_file_name" type="file" class="upload" required onchange="getValue(this)" />
									</div>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input style="width: 100%;" id="uploadFile" placeholder="Odaberite Datoteku" disabled="disabled" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-container">
				<div class="payment-title">
					INVOICE
				</div>
				<div class="content mob-align">
					<div class="top">
						<div class="row clearfix">
							<div class="col-md-6">
								<p class="payment-invoice-label"><span class="bold">Broj Fakture :&nbsp;&nbsp;</span><span>{{$merchant_info->invoice_number}}</span></p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">{{$merchant_info->user_email}}</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">Ime Klijenta:</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label">{{$merchant_info->contact_prefix}} {{$merchant_info->contact_first_name}} {{$merchant_info->contact_last_name}}
								</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">Naziv Tvrtke:</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label">{{$merchant_info->business_name}}</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">Cijela Poslovna Adresa:</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label">{{$merchant_info->business_complete_address}}</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">City, State:</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label">{{$merchant_info->city_name}} {{$merchant_info->county_name}}</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">ZIP Code:</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label">{{$merchant_info->postal_code}}</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label bold">Date  if Issue:</p>
							</div>
							<div class="col-md-6">
								<p class="payment-invoice-label">{{$merchant_info->date_transact}}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="mid mob-align row-no-padding clearfix">
					<div class="col-md-6">
						<p class="payment-invoice-label bold">Package</p>
					</div>
					<div class="col-md-6">
						<p class="payment-invoice-label">{{$merchant_info->membership_name}}</p>
					</div>
					<div class="col-md-6">
						<p class="payment-invoice-label bold">Membership Cost</p>
					</div>
					<div class="col-md-6">
						<p class="payment-invoice-label">${{$merchant_info->membership_price}}</p>
					</div>
				</div>
				<div class="bottom mob-align row-no-padding clearfix">
					<div class="col-md-6">
						<p class="payment-invoice-label bold">Total</p>
					</div>
					<div class="col-md-6">
						<p class="payment-invoice-label">${{$merchant_info->membership_price}}</p>
					</div>
				</div>
			</div>
			<div class="payment-btn-container">
				<button class="payment-submit-btn">SUBMIT</button>
			</div>
		</form>
	</div>
</div>
<style>
#uploadBtn {
position: relative;
overflow: hidden;
margin: 2px;
height:23px;
width:100px;
margin-top:-20px;
padding-right: 50px;
}
#uploadFile {
position: relative;
overflow: hidden;
margin: 2px;
margin-top: -1px;
height:26px;
width:200px;
/*padding-right: px;*/
}
.fileUpload input.upload {
position: absolute;
top: 0;
right: 0;
margin: 0;
padding: 0;
margin-top: -1px;
font-size: 20px;
cursor: pointer;
opacity: 0;
filter: alpha(opacity=0);
}
</style>
<script type="text/javascript">
	function getValue(input)
	{
		document.getElementById("uploadFile").value = input.files[0].name;
	}
</script>
@endsection
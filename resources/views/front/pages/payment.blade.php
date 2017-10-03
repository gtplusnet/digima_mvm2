@extends('front.layout.layout')
@section('content')
<div class="banner-payment" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/payment_icon.png" class="payment-bg">
		</div>
	</div>
</div>
<div class="container">
	<div class="col-md-3"></div>
	<div class="col-md-6 payment-container">	
		<div class="payment-title-container">
			<p class="payment-title">ENTER YOUR PROOF OF PAYMENT</p>
		</div>
		<form action="/merchant/upload_payment" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			{{-- <div class="col-md-5">
			@foreach($picture as $pictures)
			<div class="profile-images" style="margin-top: 50px;">
                        <img src="{{$pictures->payment_file_name}}" alt="Nadia Ali"/>
                    </div>
			
			@endforeach
		</div> --}}
			<div class="col-md-12 payment-form-container">		
					<div class="col-md-12 payment-form-upperpart">
						<div class="col-md-6 payment-left-area">
							<label for="input-reference-number" class="payment-label">Reference Number:</label>
							<input type="text" name="payment_reference_number" class="payment-textfield">
						</div>
						<div class="col-md-6 payment-right-area">
							<label for="input-method"class="payment-label">Method of Payment:</label>
							<select class="payment-dropdown"  name="payment_method">
								@foreach($method as $methods)

								<option value="{{$methods->payment_method_id}}">{{$methods->payment_method_name}}</option>
								@endforeach
							
							</select>
						</div>
					</div>
					<div class="col-md-12 payment-form-bottompart">
						<div class="col-md-6 payment-left-area">
							<label for="input-amount" class="payment-label">Amount:</label>
							<input type="text" name="payment_amount" class="payment-textfield">
						</div>
						<div class="col-md-5 payment-right-area">
							<label for="proof-of-payment" class="payment-label">Upload Proof of Payment:</label>
							<input id="uploadFile"  value="No File" placeholder="Choose File" disabled="disabled" />
						</div>
						<div class="col-md-1 payment-upload-icon-container">
							<div class="fileUpload payment-upload-holder fa fa-upload payment-upload-icon">
						    <input id="uploadBtn" name="payment_file_name" type="file" class="upload" />
						</div>
						</div>

					</div>
							
			</div>
			<div class="col-md-12 payment-title-container">
				<p class="payment-title">INVOICE</p>
			</div>
			<div class="col-md-12 payment-form-container">
				<div class="col-md-12 payment-form-upperpart">
					<div class="col-md-4 payment-left-area">
						<p class="payment-invoice-label">Invoice No:00000</p>
					</div>
					<div class="col-md-8 payment-email-right-area">
						<p class="payment-invoice-label">{{session('email')}}</p>
					</div>
				</div>
				<div class="col-md-12 payment-form-seperator">
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							<p class="payment-invoice-content-label">Client Name:</p>
							
						</div>
						<div class="col-md-6 payment-right-area">
							<p class="payment-invoice-content-label">{{session('full_name')}} </p>
							
						</div>
					</div>
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							
							<p class="payment-invoice-content-label">Business Name:</p>
							
						</div>
						<div class="col-md-6 payment-right-area">
							
							<p class="payment-invoice-content-label">{{session('business_name')}} </p>
							
						</div>
					</div>
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							
							<p class="payment-invoice-content-label">Business Address:</p>
							
						</div>
						<div class="col-md-6 payment-right-area">
							<p class="payment-invoice-content-label">{{session('business_address')}} </p>
							
						</div>
					</div>
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							
							<p class="payment-invoice-content-label">City, State:</p>
							
						</div>
						<div class="col-md-6 payment-right-area">
							
							<p class="payment-invoice-content-label">{{session('city_state')}} </p>
							
						</div>
					</div>
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							
							<p class="payment-invoice-content-label">ZIP Code:</p>
							
						</div>
						<div class="col-md-6 payment-right-area">
							
							<p class="payment-invoice-content-label">{{session('zip_code')}} </p>
							
						</div>
					</div>
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							
							<p class="payment-invoice-content-label">Date  if Issue:</p>
						</div>
						<div class="col-md-6 payment-right-area">
							
							<p class="payment-invoice-content-label">Sept 31,2017 </p>
						</div>
					</div>
					
				</div>
				<div class="col-md-12 payment-form-seperator">	
					<div class="col-md-12 payment-form-upperpart">
						<div class="col-md-6 payment-left-area">
							<p class="payment-invoice-content-label">Description</p>
							<p class="payment-invoice-content-label">Advertising Package</p>
						</div>
						<div class="col-md-3">
							<p class="payment-cost-label">Unit Cost</p>
							<p class="payment-cost-label">$4</p>
						</div>
						<div class="col-md-3">
							<p class="payment-cost-label">Amount</p>
							<p class="payment-cost-label">4</p>
						</div>
					</div>
				</div>
				<div class="col-md-12 payment-form-lastpart">
					<div class="col-md-6"></div>
					<div class="col-md-3 payment-subtotal-container">
						<p class="payment-invoice-content-label">Subtotal</p>
						<p class="payment-invoice-content-label">Tax</p>
					</div>
					<div class="col-md-3">
						<p class="payment-cost-label">$4</p>
						<p class="payment-cost-label">$5</p>
					</div>
				</div>
			</div>
			<div class="col-md-12 payment-btn-container">
				<button class="payment-submit-btn">SUBMIT</button>
			</div>
		</form>	
	</div>
	<div class="col-md-3"></div>
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
<script language="javascript">
	document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>
@endsection
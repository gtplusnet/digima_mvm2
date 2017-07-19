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
		<form role="form">
			<div class="col-md-12 payment-form-container">		
					<div class="col-md-12 payment-form-upperpart">
						<div class="col-md-6 payment-left-area">
							<label for="input-reference-number" class="payment-label">Reference Number:</label>
							<input type="text" name="reference-number" class="payment-textfield">
						</div>
						<div class="col-md-6 payment-right-area">
							<label for="input-method" class="payment-label">Method of Payment:</label>
							<select class="payment-dropdown">
								<option></option>
								<option></option>
								<option></option>
								<option>---------------------</option>
							</select>
						</div>
					</div>
					<div class="col-md-12 payment-form-bottompart">
						<div class="col-md-6 payment-left-area">
							<label for="input-amount" class="payment-label">Amount:</label>
							<input type="text" name="amount" class="payment-textfield">
						</div>
						<div class="col-md-5 payment-right-area">
							<label for="proof-of-payment" class="payment-label">Upload Proof of Payment:</label>
							<input type="text" name="proof-of-payment" class="payment-textfield">
						</div>
						<div class="col-md-1 payment-upload-icon-container">
							<a href="">	
								<div class="payment-upload-holder">
									<i class="fa fa-upload payment-upload-icon"></i>
								</div>
							</a>
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
						<p class="payment-invoice-label">your@gmail.com</p>
					</div>
				</div>
				<div class="col-md-12 payment-form-seperator">
					<div class="col-md-12 payment-form-upperpart">	
						<div class="col-md-6 payment-left-area">
							<p class="payment-invoice-content-label">Client Name:</p>
							<p class="payment-invoice-content-label">Business Name:</p>
							<p class="payment-invoice-content-label">Business Address:</p>
							<p class="payment-invoice-content-label">City, State:</p>
							<p class="payment-invoice-content-label">ZIP Code:</p>
							<p class="payment-invoice-content-label">Date  if Issue:</p>
						</div>
						<div class="col-md-6 payment-right-area">
							<p class="payment-invoice-content-label"> </p>
							<p class="payment-invoice-content-label"> </p>
							<p class="payment-invoice-content-label"> </p>
							<p class="payment-invoice-content-label"> </p>
							<p class="payment-invoice-content-label"> </p>
							<p class="payment-invoice-content-label"> </p>
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
@endsection
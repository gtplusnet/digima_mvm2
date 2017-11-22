@extends('front.layout.layout')
@section('title', 'Registration')
@section('content')

<div class="banner-registration" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/registration_icon.png" class="registration-bg">
		</div>
	</div>
</div>
<div class="container">
	<form role="form" method="POST" action="/register-business" name="registrationForm" id="registrationForm">
	{{ csrf_field() }}
	<div class="col-md-6 form-leftpart">
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">PERSONAL INFORMATION</p>
		</div>	
		<div class="col-md-12 form-upper-container">			
			<div class="col-md-12 registration-form-container">
				<div class="col-md-3 form-firstpart">
				  	<label for="prefix" class="registration-form-label">Prefix:</label>
				    <select class="form-control" name="prefix" id="prefix" required="true">
						<option value="" disabled selected>--Prefix--</option>
						<option>Mr.</option>
						<option>Ms.</option>
						<option>Mrs.</option>
						<option>Dr.</option>
						<option>Dra.</option>
	  				</select>
				</div>
				<div class="col-md-4 form-secondpart">
				  	<label for="firstName" class="registration-form-label">First Name:</label>
				   	<input type="text" class="form-control" name="firstName" id="firstName" required="true">
				</div>
				<div class="col-md-5 form-thirdpart">
				  	<label for="lastName" class="registration-form-label">Last Name:</label>
				    <input type="text" class="form-control" name="lastName" id="lastName" required="true">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<label for="emailAddress" class="registration-form-label">Email Address:(will be used as login)</label>
				<input type="email" class="form-control" name="emailAddress" id="emailAddress" required="true">
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-6 dualfield-firstpart">	
					<label for="password" class="registration-form-label">Password:</label>
					<input type="password" class="form-control" name="password" id="password" required="true">
				</div>
				<div class="col-md-6 dualfield-secondpart">
					<label for="rePassword" class="registration-form-label">Re-enter Password:</label>
					<input type="password" class="form-control" name="rePassword" id="rePassword" required="true">
				</div>
			</div>
		</div>
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">BUSINESS INFORMATION</p>
		</div>
		<div class="col-md-12 form-bottom-container">
			<div class="col-md-12 registration-form-container">
			 	<label for="businessName" class="registration-form-label">Business Name:</label>
			    <input type="text" class="form-control" name="businessName" id="businessName" required="true">
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-12 dualfield-firstpart">	
					<label for="password" class="registration-form-label">Membership</label>
					<select class="form-control" name="membership"  required="true">
			  			@foreach($membership as $membership)
							<option value="{{ $membership->membership_id }}">{{ $membership->membership_name }}</option>
						@endforeach
	  				</select>
				</div>
				<div class="col-md-6 dualfield-secondpart">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-4 form-firstpart">
					<label for="primaryPhone" class="registration-form-label">Primary Phone:</label>
				    <input type="text" class="form-control" name="primaryPhone" id="primaryPhone" required="true">
				</div>
				<div class="col-md-4 form-secondpart">
					<label for="alternatePhone" class="registration-form-label">Alternative Phone:</label>
				    <input type="text" class="form-control" name="alternatePhone" id="alternatePhone" required="true">
				</div>
				<div class="col-md-4 form-thirdpart">
					<label for="faxNumber" class="registration-form-label">Fax Number:</label>
				   	<input type="text" class="form-control" name="faxNumber" id="faxNumber" required="true">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<label for="businessAddress" class="registration-form-label">Complete Business Address:</label>
				<textarea rows="5" name="businessAddress" id="businessAddress" class="businessadd-textarea" required="true"></textarea>
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-5 form-firstpart">
					<label for="countyDropdown" class="registration-form-label">County:</label>
			  		<select class="form-control countyDropdown" name="countyDropdown" id="countyDropdown" required="true">
			  			<option value="" disabled selected>--County--</option>
						@foreach($countyList as $countyListItem)
							<option value="{{ $countyListItem->county_id }}">{{ $countyListItem->county_name }}</option>
						@endforeach
	  				</select>
				</div>
				<div class="col-md-4 form-secondpart">
					<label for="cityDropdown" class="registration-form-label">City:</label>
			  		<select class="form-control cityDropdown" name="cityDropdown" id="cityDropdown" required="true">
						<option value="" disabled selected>--City--</option>
	  				</select>
				</div>
				<div class="col-md-3 form-thirdpart">
					<label for="postalCode" class="registration-form-label">Postal Code:</label>
			    	<input type="text" class="form-control postalCode" name="postalCode" id="postalCode" disabled="true">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 form-rightpart">
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">TERMS OF OFFERS</p>
		</div>
		<div class="col-md-12 form-upper-container">
			<div class="col-md-12 registration-textarea-container">
				<textarea readonly rows="30" name="terms-of-offers" id="terms_of_offers" class="registration-terms-textarea">@if(isset($terms->terms_of_offers)==null)@else{{$terms->terms_of_offers}}@endif</textarea>
			</div>
		</div>
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">SOCIAL MEDIA</p>
		</div>
		<div class="col-md-12 form-bottom-container">
			<div class="col-md-12 registration-form-container">
				<label for="" class="registration-form-label">This fields are not mandatory & not applicable to all businesses</label>
			</div>
			<div class="col-md-12 registration-form-container" >
				<div class="col-md-6 dualfield-firstpart">	
					<label for="facebookUrl" class="registration-form-label">Facebook URL:</label>
					<input type="text" class="form-control" name="facebookUrl" id="facebookUrl">
				</div>
				<div class="col-md-6 dualfield-secondpart">
					<label for="twitterUsername" class="registration-form-label">Twitter Username:</label>
					<input type="twitterusername" class="form-control" name="twitterUsername" id="twitterUsername">
				</div>
			</div>
			
		</div>
	</div>
	<div class="col-md-12 form-singleupper-container">
		<input type="checkbox" value="" name="agreeCheckbox" id="agreeCheckbox" required="true"> 
		<label class="registration-form-label">I am interested in receiving special offers from Croatia Directory and its partners.</label>
	</div>
	<div class="col-md-12 form-singlebottom-container">
		<button type="submit" class="registration-continue-btn" name="continueButton" id="continueButton">CONTINUE</button>
	</div>
	</form>
</div>

	{{-- JAVASCRIPTS --}}
	<script src="/assets/js/global.ajax.js"></script>
	<script src="/assets/js/front/business-registration.js"></script>
	<script>
		$.ajaxSetup({
   			headers: {
   			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			}
		});
	</script>
	{{-- END OF JAVASCRIPTS --}}
@endsection
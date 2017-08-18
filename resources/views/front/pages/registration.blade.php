@extends('front.layout.layout')
@section('title', 'Registration')
@section('content')
<div class="banner-registration" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/registration_icon.png" class="registration-bg">
		</div>
	</div>
</div>
<div class="container">
	<form role="form" method="" action="" name="registrationForm" id="registrationForm">
	<div class="col-md-6 form-leftpart">
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">ENTER YOUR PERSONAL INFORMATION</p>
		</div>	
		<div class="col-md-12 form-upper-container">			
			<div class="col-md-12 registration-form-container">
				<div class="col-md-3 form-firstpart">
				  	<label for="prefix" class="registration-form-label">Prefix:</label>
				    <select class="form-control" name="prefix" id="prefix">
						<option value="--Prefix--" disabled selected>--Prefix--</option>
						<option>Mr.</option>
						<option>Ms.</option>
						<option>Mrs.</option>
						<option>Dr.</option>
						<option>Dra.</option>
	  				</select>
				</div>
				<div class="col-md-4 form-secondpart">
				  	<label for="firstName" class="registration-form-label">First Name:</label>
				   	<input type="text" class="form-control" name="firstName" id="firstName">
				</div>
				<div class="col-md-5 form-thirdpart">
				  	<label for="lastName" class="registration-form-label">Last Name:</label>
				    <input type="text" class="form-control" name="lastName" id="lastName">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<label for="emailAddress" class="registration-form-label">Email Address:(will be use as login)</label>
				<input type="email" class="form-control" name="emailAddress" id="emailAddress">
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-6 dualfield-firstpart">	
					<label for="password" class="registration-form-label">Password:</label>
					<input type="password" class="form-control" name="password" id="password">
				</div>
				<div class="col-md-6 dualfield-secondpart">
					<label for="rePassword" class="registration-form-label">Re-enter Password:</label>
					<input type="password" class="form-control" name="rePassword" id="rePassword">
				</div>
			</div>
		</div>
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">ENTER YOUR BUSINESS INFORMATION</p>
		</div>
		<div class="col-md-12 form-bottom-container">
			<div class="col-md-12 registration-form-container">
			 	<label for="businessName" class="registration-form-label">Business Name:</label>
			    <input type="text" class="form-control" name="businessName" id="businessName">
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-4 form-firstpart">
					<label for="primaryPhone" class="registration-form-label">Primary Business Phone:</label>
				    <input type="text" class="form-control" name="primaryPhone" id="primaryPhone">
				</div>
				<div class="col-md-4 form-secondpart">
					<label for="alternatePhone" class="registration-form-label">Alternate Business Phone:</label>
				    <input type="text" class="form-control" name="alternatePhone" id="alternatePhone">
				</div>
				<div class="col-md-4 form-thirdpart">
					<label for="faxNumber" class="registration-form-label">Fax Number:</label>
				   	<input type="text" class="form-control" name="faxNumber" id="faxNumber">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<label for="businessAddress" class="registration-form-label">Complete Business Address:</label>
				<textarea rows="5" name="businessAddress" id="businessAddress" class="businessadd-textarea"></textarea>
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-5 form-firstpart">
					<label for="countyDropdown" class="registration-form-label">County:</label>
			  		<select class="form-control" name="countyDropdown" id="countyDropdown">
			  			<option value="--County--" disabled selected>--County--</option>
						@foreach($countyList as $countyListItem)
							<option value="{{ $countyListItem->county_id }}">{{ $countyListItem->county_name }}</option>
						@endforeach
	  				</select>
				</div>
				<div class="col-md-4 form-secondpart">
					<label for="cityDropdown" class="registration-form-label">City:</label>
			  		<select class="form-control" name="cityDropdown" id="cityDropdown">
						<option value="--City--" disabled selected>--City--</option>
	  				</select>
				</div>
				<div class="col-md-3 form-thirdpart">
					<label for="postalCode" class="registration-form-label">Postal Code:</label>
			    	<input type="text" class="form-control" name="postalCode" id="postalCode" disabled="true">
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
				<textarea readonly rows="22" name="terms-of-offers" id="terms_of_offers" class="registration-terms-textarea">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</textarea>
			</div>
		</div>
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">SOCIAL MEDIA</p>
		</div>
		<div class="col-md-12 form-bottom-container">
			<div class="col-md-12 registration-form-container">
				<label for="" class="registration-form-label">This fields are not mandatory & not applicable to all businesses</label>
			</div>
			<div class="col-md-12 registration-form-container">
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
		<input type="checkbox" value="" name="agreeCheckbox" id="agreeCheckbox"> 
		<label class="registration-form-label">I am interested in receiving special offers from Croatia Directory and its partners.</label>
	</div>
	<div class="col-md-12 form-singlebottom-container">
		<button type="button" class="registration-continue-btn" name="continueButton" id="continueButton">CONTINUE</button>
	</div>
	</form>
</div>

	{{-- JAVASCRIPTS --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/assets/js/front/registration.js"></script>
	<script>
		$.ajaxSetup({
   			headers: {
   			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   			}
		});
	</script>
@endsection
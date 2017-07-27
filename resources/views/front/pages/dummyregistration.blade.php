@extends('front.layout.layout')
@section('content')
<div class="banner-registration" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/registration_icon.png" class="registration-bg">
		</div>
	</div>
</div>
<div class="container">
	<form role="form" action="/success">
	<div class="col-md-6 form-leftpart">
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">ENTER YOUR PERSONAL INFORMATION</p>
		</div>	
		<div class="col-md-12 form-upper-container">			
			<div class="col-md-12 registration-form-container">
				<div class="col-md-3 form-firstpart">
				  	<label for="inputprefix" class="registration-form-label">Prefix:</label>
				    <select type="prefix" class="form-control" name="prefix" id="inputprefix">
						<option value disabled selected> </option>
						<option>Mr.</option>
						<option>Ms.</option>
						<option>Mrs.</option>
						<option>Dr.</option>
						<option>Dra.</option>
	  				</select>
				</div>
				<div class="col-md-4 form-secondpart">
				  	<label for="inputfirstname" class="registration-form-label">First Name:</label>
				   	<input type="firstname" class="form-control" id="inputfirstname">
				</div>
				<div class="col-md-5 form-thirdpart">
				  	<label for="inputlastname" class="registration-form-label">Last Name:</label>
				    <input type="lastname" class="form-control" id="inputlastname">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<label for="inputemailadd" class="registration-form-label">Email Address:(will be use as login)</label>
				<input type="emailadd" class="form-control" id="inputemailadd">
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-6 dualfield-firstpart">	
					<label for="inputpassword" class="registration-form-label">Password:</label>
					<input type="password" class="form-control" id="inputpassword">
				</div>
				<div class="col-md-6 dualfield-secondpart">
					<label for="reinputpassword" class="registration-form-label">Re-enter Password:</label>
					<input type="repassword" class="form-control" id="inputpassword">
				</div>
			</div>
		</div>
		<div class="col-md-12 registration-title-container">
			<p class="registration-form-title">ENTER YOUR BUSINESS INFORMATION</p>
		</div>
		<div class="col-md-12 form-bottom-container">
			<div class="col-md-12 registration-form-container">
			 	<label for="inputbusinessname" class="registration-form-label">Business Name:</label>
			    <input type="businessname" class="form-control" id="inputbusinessname">
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-4 form-firstpart">
					<label for="inputprimaryphone" class="registration-form-label">Primary Business Phone:</label>
				    <input type="primaryphone" class="form-control" id="inputprimaryphone">
				</div>
				<div class="col-md-4 form-secondpart">
					<label for="inputalternatephone" class="registration-form-label">Alternate Business Phone:</label>
				    <input type="alternatephone" class="form-control" id="inputalternatephone">
				</div>
				<div class="col-md-4 form-thirdpart">
					<label for="inputfaxnumber" class="registration-form-label">Fax Number:</label>
				   	<input type="faxnumber" class="form-control" id="inputfaxnumber">
				</div>
			</div>
			<div class="col-md-12 registration-form-container">
				<label for="input-completeaddress" class="registration-form-label">Complete Business Address:</label>
				<textarea rows="5" name="complete-address" id="complete_address_info" class="businessadd-textarea"></textarea>
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-4 form-firstpart">
					<label for="inputcity" class="registration-form-label">City:</label>
			    	<input type="city" class="form-control" id="inputcity">
				</div>
				<div class="col-md-4 form-secondpart">
					<label for="inputstate" class="registration-form-label">State:</label>
			  		<select type="state" class="form-control" name="state" id="inputstate">
						<option> </option>
						<option> </option>
						<option> </option>
				  		<option> </option>
						<option> </option>
	  				</select>
				</div>
				<div class="col-md-4 form-thirdpart">
					<label for="inputzipcode" class="registration-form-label">ZIP Code:</label>
			    	<input type="zipcode" class="form-control" id="inputzipcode">
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
				<label for="twitter-username" class="registration-form-label">This fields are not mandatory & not applicable to all businesses</label>
			</div>
			<div class="col-md-12 registration-form-container">
				<div class="col-md-6 dualfield-firstpart">	
					<label for="facebook-url" class="registration-form-label">Facebook URL:</label>
					<input type="facebookurl" class="form-control" id="facebook-url">
				</div>
				<div class="col-md-6 dualfield-secondpart">
					<label for="twitter-username" class="registration-form-label">Twitter Username:</label>
					<input type="twitterusername" class="form-control" id="twitter-username">
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 form-singleupper-container">
		<input type="checkbox" value=""> 
		<label class="registration-form-label">I am interested in receiving special offers from Croatia Directory and its partners.</label>
	</div>
	<div class="col-md-12 form-singlebottom-container">
		<button class="registration-continue-btn">CONTINUE</button>
	</div>
	</form>
</div>
@endsection
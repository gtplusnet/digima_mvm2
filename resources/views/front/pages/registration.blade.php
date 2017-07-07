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
<form method="POST">
{{ csrf_field() }}
	<div class="row">
		<div class="col-md-6">
	    	<div class="panel panel-default personalinfo-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">ENTER YOUR PERSONAL INFORMATION</h2>
		  		</div>
		  		<div class="panel-body">
				  		<div class="form-group">
				  			<div class="col-md-3 personal-info">
				  				<label for="inputprefix">Prefix:</label>
				    			<select class="form-control" name="prefix" id="prefix">
				    				<option value=""></option>
							    	<option value="Dr.">Dr.</option>
							   		<option value="Miss">Miss</option>
							   		<option value="Mr.">Mr.</option>
							   		<option value="Mrs.">Mrs.</option>
							   		<option value="Ms.">Ms.</option>
	  							</select>
				  			</div>
				  			<div class="col-md-5 personal-info">
				  				<label for="firstname">First Name:</label>
				    			<input type="text" class="form-control" name="first_name" id="first_name">
				  			</div>
				  			<div class="col-md-4 personal-last-info">
				  				<label for="inputlastname">Last Name:</label>
				    			<input type="text" class="form-control" name="last_name" id="last_name">
				  			</div>
				 		</div>
				 		<div class="form-group">
				 			<label for="inputemailadd">Email Address:(will be use as login)</label>
				    		<input type="email" class="form-control email-textbox" name="email_address" id="email_address">
				 		</div>
				  		<div class="form-group">
					    	<div class="col-md-6 personal-info">	
					    		<label for="inputpassword">Password:</label>
					    		<input type="password" class="form-control" name="password" id="password">
					    	</div>
					    	<div class="col-md-6 personal-last-info">
					    		<label for="reinputpassword">Re-enter Password:</label>
					    		<input type="password" class="form-control" name="retype_password" id="retype_password">
					    	</div>
				  		</div>
		  		</div>
			</div>
			<div class="panel panel-default socialmedia-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">SOCIAL MEDIA</h2>
		  		</div>
		  		<div class="panel-body">
				  		<div class="form-group">
				  			<label class="socialmedia-note">This fields are not mandatory & not applicable to all businesses</label>
					    	<div class="col-md-6 personal-info">	
					    		<label for="inputfacebook">Facebook URL:</label>
					    		<input type="text" class="form-control" name="facebook_url" id="facebook_url">
					    	</div>
					    	<div class="col-md-6 personal-last-info">
					    		<label for="inputtwitter">Twitter Username:</label>
					    		<input type="text" class="form-control" name="twitter_username" id="twitter_username">
					    	</div>
				  		</div>
		  		</div>
			</div>

			<div class="panel panel-default terms-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">TERMS OF OFFERS</h2>
		  		</div>
		  		<div class="panel-body terms-textarea">
				  		<div class="form-group">
				  			<label for="terms_of_offer">Terms of Offer:</label>
	      					<textarea class="form-control" rows="5" name="terms_of_offer" id="terms_of_offer" readonly="true" style="resize: none;">Lorem ipsum dolor sit amet, quo in quas graeco. Ea nec altera definitiones. At altera postea mea, diceret similique duo ea, ea habemus eligendi mel. Mea mucius sapientem signiferumque ea. Stet appareat vix no, reque meliore ea vis.Viris vivendo pri ea, nonumy soleat vocent cu nec. Inermis appetere usu id, oratio consequat voluptatum est eu, ut sit partem dissentiet. Laboramus constituam necessitatibus no duo. Eos id choro option aperiam.His virtute incorrupte id, ne usu volumus suavitate sadipscing. Decore percipitur reformidans eam in. Eu audiam deserunt pro, vis cu novum salutatus, vim constituam scripserit ea. Ei novum option eam. Bonorum similique at nec.Quod eirmod fuisset ius ad. Neglegentur conclusionemque duo te. Mea iriure placerat at, fabulas petentium ea per. Admodum ceteros pericula at sed, mea te vidit velit democritum. Feugiat dolores pri ex. Ius id erat convenire intellegat, prompta qualisque adipiscing vis et. Eu eum volumus omittam, graece verterem nec ei. Eu agam prima eam, ocurreret maluisset interpretaris quo ut. Per ut ubique doming accommodare, eam in wisi appareat. Est consul doctus delicata ne, no pro eligendi argumentum conclusionemque. In ludus nonumy mea.</textarea>
				  		</div>
		  		</div>
			</div>
		</div>
		<div class="col-md-6">
	    	<div class="panel panel-default businessinfo-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">ENTER YOUR BUSINESS INFORMATION</h2>
		  		</div>
		  		<div class="panel-body">
				 		<div class="form-group">
				 			<label for="inputbusinessname">Business Name:</label>
				    		<input type="text" class="form-control businessname-textbox" name="business_name" id="business_name">
				 		</div>
				  		<div class="form-group">
					    	<div class="col-md-6 personal-info">	
					    		<label for="inputprimaryphone">Primary Business Phone:</label>
					    		<input type="text" class="form-control" name="primary_business_phone" id="primary_business_phone">
					    	</div>
					    	<div class="col-md-6 personal-last-info">
					    		<label for="inputsecondaryphone">Secondary Business Phone:</label>
					    		<input type="text" class="form-control" name="secondary_business_phone" id="secondary_business_phone">
					    	</div>
				  		</div>
				  		<div class="form-group businessadd-holder">
				  			<label for="inputbusinessadd">Complete Business Address:</label>
				 			<textarea class="businessadd-textarea" name="business_address" id="business_address"></textarea>
				 		</div>
				 		<div class="form-group">
				  			<div class="col-md-5 personal-info">
				  				<label for="inputcounty">County:</label>
				  				<select class="form-control" name="county_list" id="county_list">
				  					<option value=""></option>
							    	@foreach($county_list as $county_list)
						   	 			<option value="{{ $county_list->county_id }}">{{ $county_list->county_name }}</option>
						   			@endforeach
	  							</select>
				  			</div>
				  			<div class="col-md-4 personal-info">
				  				<label for="inputcity">City:</label>
				    			<select class="form-control" name="city_list" id="city_list">
							    	<option value=""></option>
	  							</select>
				  			</div>
				  			<div class="col-md-3 personal-last-info">
				  				<label for="inputpostalcode">Postal Code:</label>
				    			<input type="text" class="form-control" name="postal_code" id="postal_code" readonly="true">
				  			</div>
				 		</div>
		  		</div>
			</div>
			<div class="accept-terms">
				<div class="checkbox">
	  				<label><input type="checkbox" value="" id="agree_checkbox">I Agree in the Terms of Offer.</label>
				</div>
			</div>
			<div class="form-group button-holder" >
				  	<button type="button" class="btn btn-continue" id="continue">CONTINUE</button>
			</div>
		</div>
	</div>
</form>
</div>
@endsection
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
	<div class="row">
		<div class="col-md-6">
	    	<div class="panel panel-default personalinfo-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">ENTER YOUR PERSONAL INFORMATION</h2>
		  		</div>
		  		<div class="panel-body">
			   		<form role="form">
				  		<div class="form-group">
				  			<div class="col-md-2 personal-info">
				  				<label for="inputprefix">Prefix:</label>
				    			<select type="prefix" class="form-control" name="prefix" id="inputprefix">
							    	<option>Dr.</option>
							   		<option>Miss</option>
							   		<option>Mr.</option>
							   		<option>Mrs.</option>
							   		<option>Ms.</option>
	  							</select>
				  			</div>
				  			<div class="col-md-5 personal-info">
				  				<label for="inputfirstname">First Name:</label>
				    			<input type="firstname" class="form-control" id="inputfirstname">
				  			</div>
				  			<div class="col-md-5 personal-last-info">
				  				<label for="inputlastname">Last Name:</label>
				    			<input type="lastname" class="form-control" id="inputlastname">
				  			</div>
				 		</div>
				 		<div class="form-group">
				 			<label for="inputemailadd">Email Address:(will be use as login)</label>
				    		<input type="emailadd" class="form-control email-textbox" id="inputemailadd">
				 		</div>
				  		<div class="form-group">
					    	<div class="col-md-6 personal-info">	
					    		<label for="inputpassword">Password:</label>
					    		<input type="password" class="form-control" id="inputpassword">
					    	</div>
					    	<div class="col-md-6 personal-last-info">
					    		<label for="reinputpassword">Re-enter Password:</label>
					    		<input type="repassword" class="form-control" id="inputpassword">
					    	</div>
				  		</div>
					</form>
		  		</div>
			</div>
			<div class="panel panel-default socialmedia-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">SOCIAL MEDIA</h2>
		  		</div>
		  		<div class="panel-body">
			   		<form role="form">
				  		<div class="form-group">
				  			<label class="socialmedia-note">This fields are not mandatory & not applicable to all businesses</label>
					    	<div class="col-md-6 personal-info">	
					    		<label for="inputfacebook">Facebook URL:</label>
					    		<input type="facebook" class="form-control" id="inputfacebook">
					    	</div>
					    	<div class="col-md-6 personal-last-info">
					    		<label for="inputtwitter">Twitter Username:</label>
					    		<input type="twitter" class="form-control" id="inputtwitter">
					    	</div>
				  		</div>
					</form>
		  		</div>
			</div>

			<div class="panel panel-default terms-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">TERMS OF OFFERS</h2>
		  		</div>
		  		<div class="panel-body terms-textarea">
			   		<form role="form">
				  		<div class="form-group">
				  			<label for="terms_of_offer">Terms of Offer:</label>
	      					<textarea class="form-control" rows="5" name="terms_of_offer" id="terms_of_offer" readonly="true" style="resize: none;">Lorem ipsum dolor sit amet, quo in quas graeco. Ea nec altera definitiones. At altera postea mea, diceret similique duo ea, ea habemus eligendi mel. Mea mucius sapientem signiferumque ea. Stet appareat vix no, reque meliore ea vis.Viris vivendo pri ea, nonumy soleat vocent cu nec. Inermis appetere usu id, oratio consequat voluptatum est eu, ut sit partem dissentiet. Laboramus constituam necessitatibus no duo. Eos id choro option aperiam.His virtute incorrupte id, ne usu volumus suavitate sadipscing. Decore percipitur reformidans eam in. Eu audiam deserunt pro, vis cu novum salutatus, vim constituam scripserit ea. Ei novum option eam. Bonorum similique at nec.Quod eirmod fuisset ius ad. Neglegentur conclusionemque duo te. Mea iriure placerat at, fabulas petentium ea per. Admodum ceteros pericula at sed, mea te vidit velit democritum. Feugiat dolores pri ex. Ius id erat convenire intellegat, prompta qualisque adipiscing vis et. Eu eum volumus omittam, graece verterem nec ei. Eu agam prima eam, ocurreret maluisset interpretaris quo ut. Per ut ubique doming accommodare, eam in wisi appareat. Est consul doctus delicata ne, no pro eligendi argumentum conclusionemque. In ludus nonumy mea.</textarea>
				  		</div>
					</form>
		  		</div>
			</div>
		</div>
		<div class="col-md-6">
	    	<div class="panel panel-default businessinfo-part">
		  		<div class="panel-info-heading">
		  			<h2 class="panel-title">ENTER YOUR BUSINESS INFORMATION</h2>
		  		</div>
		  		<div class="panel-body">
			   		<form role="form">
				 		<div class="form-group">
				 			<label for="inputbusinessname">Business Name:</label>
				    		<input type="businessname" class="form-control businessname-textbox" id="inputbusinessname">
				 		</div>
				  		<div class="form-group">
					    	<div class="col-md-6 personal-info">	
					    		<label for="inputprimaryphone">Primary Business Phone:</label>
					    		<input type="primaryphone" class="form-control" id="inputprimaryphone">
					    	</div>
					    	<div class="col-md-6 personal-last-info">
					    		<label for="inputsecondaryphone">Secondary Business Phone:</label>
					    		<input type="secondaryphone" class="form-control" id="inputsecondaryphone">
					    	</div>
				  		</div>
				  		<div class="form-group businessadd-holder">
				  			<label for="inputbusinessadd">Complete Business Address:</label>
				 			<textarea class="businessadd-textarea" id="inputbusinessadd"></textarea>
				 		</div>
				 		<div class="form-group">
				  			<div class="col-md-4 personal-info">
				  				<label for="inputcity">City:</label>
				    			<input type="city" class="form-control" id="inputcity">
				  			</div>
				  			<div class="col-md-4 personal-info">
				  				<label for="inputstate">State:</label>
				  				<select type="state" class="form-control" name="state" id="inputstate">
							    	<option> </option>
							   		<option> </option>
							   		<option> </option>
							   		<option> </option>
							   		<option> </option>
	  							</select>
				  			</div>
				  			<div class="col-md-4 personal-last-info">
				  				<label for="inputzipcode">ZIP Code:</label>
				    			<input type="zipcode" class="form-control" id="inputzipcode">
				  			</div>
				 		</div>
					</form>
		  		</div>
			</div>
			<div class="accept-terms">
				<div class="checkbox">
	  				<label><input type="checkbox" value="">I am interested in receiving offers from Croatia Directory and its partners.</label>
				</div>
			</div>
			<div class="form-group button-holder" >
				  	<button type="submit" class="btn btn-continue">CONTINUE</button>
			</div>
		</div>
	</div>
</div>
@endsection
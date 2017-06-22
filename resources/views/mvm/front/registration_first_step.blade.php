@extends('mvm.front.registration_layout')

@section('content')
	<div class="registration-form">
		<div class="row">
			<div class="col-md-6">
				<form method="POST">
					<h4>Enter Your Personal Information :</h4>
				  	<div class="form-group">
						<label for="prefix">Prefix :</label>
						<select class="form-control" name="prefix" id="prefix" style="width: 150px;">
						   <option>Dr.</option>
						   <option>Miss</option>
						   <option>Mr.</option>
						   <option>Mrs.</option>
						   <option>Ms.</option>
  						</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="first_name">First Name :</label>
				   	 	<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="last_name">Last Name :</label>
				   	 	<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="email">Email :</label>
				   	 	<input type="text" class="form-control" name="email" id="email" placeholder="Email">
				  	</div>

				  	<br>

				  	<h4>Social Media :</h4>
				  	<p>These are not mandatory and not applicable to businesses.</p>
				  	<div class="form-group">
				    	<label for="facebook">Facebook URL :</label>
				   	 	<input type="text" class="form-control" name="facebook_url" id="facebook_url" placeholder="Facebook URL">
				  	</div>
				  	<div class="form-group">
				    	<label for="twitter_username">Confirm Password :</label>
				   	 	<input type="text" class="form-control" name="twitter_username" id="twitter_username" placeholder="Twitter Username">
				  	</div>

				  	<br>
				  	<div class="form-group">
      					<label for="terms_of_offer">Terms of Offer:</label>
      					<textarea class="form-control" rows="5" name="terms_of_offer" id="terms_of_offer" readonly="true" style="resize: none;">Lorem ipsum dolor sit amet, quo in quas graeco. Ea nec altera definitiones. At altera postea mea, diceret similique duo ea, ea habemus eligendi mel. Mea mucius sapientem signiferumque ea. Stet appareat vix no, reque meliore ea vis.Viris vivendo pri ea, nonumy soleat vocent cu nec. Inermis appetere usu id, oratio consequat voluptatum est eu, ut sit partem dissentiet. Laboramus constituam necessitatibus no duo. Eos id choro option aperiam.His virtute incorrupte id, ne usu volumus suavitate sadipscing. Decore percipitur reformidans eam in. Eu audiam deserunt pro, vis cu novum salutatus, vim constituam scripserit ea. Ei novum option eam. Bonorum similique at nec.Quod eirmod fuisset ius ad. Neglegentur conclusionemque duo te. Mea iriure placerat at, fabulas petentium ea per. Admodum ceteros pericula at sed, mea te vidit velit democritum. Feugiat dolores pri ex. Ius id erat convenire intellegat, prompta qualisque adipiscing vis et. Eu eum volumus omittam, graece verterem nec ei. Eu agam prima eam, ocurreret maluisset interpretaris quo ut. Per ut ubique doming accommodare, eam in wisi appareat. Est consul doctus delicata ne, no pro eligendi argumentum conclusionemque. In ludus nonumy mea.</textarea>
    				</div>
				</form>
			</div>

			<div class="col-md-6">
				<form>
					<h4>Enter Your Business Information :</h4>
				  	<div class="form-group">
				    	<label for="business_name">Business Name :</label>
				   	 	<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Business Name">
				  	</div>
				  	<div class="form-group">
				    	<label for="business_phone">Business Phone :</label>
				   	 	<input type="text" class="form-control" name="business_phone" id="business_phone" placeholder="Business Phone">
				  	</div>
				  	<div class="form-group">
				    	<label for="alternate_contact">Alternate Contact :</label>
				   	 	<input type="text" class="form-control" name="alternate_contact" id="alternate_contact" placeholder="Alternate Contact">
				  	</div>
				  	<div class="form-group">
				    	<label for="business_address">Complete Business Address :</label>
				   	 	<textarea class="form-control" rows="5" name="business_address" id="business_address" style="resize: none;"></textarea>
				  	</div>
				  	<div class="form-group">
						<label for="county">County :</label>
						<select class="form-control" name="county_list" id="county_list" style="width: 200px;">
						   <option value="--Select County--">--Select County--</option>
						   @foreach($county_list as $county_list)
						   	 <option value="{{ $county_list->county_id }}">{{ $county_list->county_name }}</option>
						   @endforeach
  						</select>
				  	</div>
				  	<div class="form-group">
						<label for="city">City :</label>
						<select class="form-control" name="city_list" id="city_list" style="width: 285px;">
						   <option value="--No County Selected--">--No County Selected--</option>
  						</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="zip_code">Postal Code :</label>
				   	 	<input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" readonly="true">
				  	</div>

				  	<div class="accept-terms">
				  		<div class="checkbox">
  							<label><input type="checkbox" value="">I am interested in receiving offers from Croatia Directory and its partners.</label>
						</div>
				  	</div>
				  	<div class="form-group text-center">
				  		<button type="button" class="btn btn-primary btn-lg">Continue</button>
				  	</div>
				</form>
			</div>
		</div>
	</div>
@endsection


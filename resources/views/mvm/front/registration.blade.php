@extends('mvm.front.registration_layout')

@section('content')
	<div class="registration-form">
		<p>Note : All fields marked with a <span style="color: red; font-weight: normal;">*</span> are required.</p>
		<div class="row">
			<div class="col-md-6">
				<form method="POST">
					<h4>Enter Your Personal Information :</h4>
				  	<div class="form-group">
						<label for="prefix">Prefix : <span style="color: red; font-weight: normal;">*</span></label>
						<select class="form-control" name="prefix" id="prefix" style="width: 150px;">
						   <option value="--Select Prefix--">--Select Prefix--</option>
						   <option value="Dr.">Dr.</option>
						   <option value="Miss">Miss</option>
						   <option value="Mr.">Mr.</option>
						   <option value="Mrs.">Mrs.</option>
						   <option value="Ms.">Ms.</option>
  						</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="first_name">First Name : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<input type="text" class="form-control" name="first_name" id="first_name" placeholder="E.g., John">
				  	</div>
				  	<div class="form-group">
				    	<label for="last_name">Last Name : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<input type="text" class="form-control" name="last_name" id="last_name" placeholder="E.g., Doe">
				  	</div>
				  	<div class="form-group">
				    	<label for="email">Email Address : <span style="color: red; font-weight: normal;">*</span> </label>
				   	 	<input type="text" class="form-control" name="email_address" id="email_address" placeholder="E.g., smith@inbox.com">
				  	</div>
				  	<div class="form-group">
				    	<label for="password">Password : <span style="color: red; font-weight: normal;">*</span> </label>
				   	 	<input type="password" class="form-control" name="password" id="password" placeholder="">
				  	</div>
				  	<div class="form-group">
				    	<label for="retype_password">Re-type Password : <span style="color: red; font-weight: normal;">*</span> </label>
				   	 	<input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="">
				  	</div>

				  	<br>

				  	<h4>Social Media :</h4>
				  	<p>These are not mandatory and not applicable to businesses.</p>
				  	<div class="form-group">
				    	<label for="facebook">Facebook URL :</label>
				   	 	<input type="text" class="form-control" name="facebook_url" id="facebook_url" placeholder="E.g., https://www.facebook.com/CocaCola">
				  	</div>
				  	<div class="form-group">
				    	<label for="twitter_username">Twitter Username :</label>
				   	 	<input type="text" class="form-control" name="twitter_username" id="twitter_username" placeholder="E.g., @delloutlet">
				  	</div>

				  	<br>
				  	<div class="form-group">
      					<label for="terms_of_offer">Terms of Offer:</label>
      					<textarea class="form-control" rows="5" name="terms_of_offer" id="terms_of_offer" readonly="true" style="resize: none;">Lorem ipsum dolor sit amet, quo in quas graeco. Ea nec altera definitiones. At altera postea mea, diceret similique duo ea, ea habemus eligendi mel. Mea mucius sapientem signiferumque ea. Stet appareat vix no, reque meliore ea vis.Viris vivendo pri ea, nonumy soleat vocent cu nec. Inermis appetere usu id, oratio consequat voluptatum est eu, ut sit partem dissentiet. Laboramus constituam necessitatibus no duo. Eos id choro option aperiam.His virtute incorrupte id, ne usu volumus suavitate sadipscing. Decore percipitur reformidans eam in. Eu audiam deserunt pro, vis cu novum salutatus, vim constituam scripserit ea. Ei novum option eam. Bonorum similique at nec.Quod eirmod fuisset ius ad. Neglegentur conclusionemque duo te. Mea iriure placerat at, fabulas petentium ea per. Admodum ceteros pericula at sed, mea te vidit velit democritum. Feugiat dolores pri ex. Ius id erat convenire intellegat, prompta qualisque adipiscing vis et. Eu eum volumus omittam, graece verterem nec ei. Eu agam prima eam, ocurreret maluisset interpretaris quo ut. Per ut ubique doming accommodare, eam in wisi appareat. Est consul doctus delicata ne, no pro eligendi argumentum conclusionemque. In ludus nonumy mea.</textarea>
    				</div>
			</div>

			<div class="col-md-6">
<<<<<<< HEAD

				<form action="/success">
					<h4>Enter Your Business Information :</h4>

=======
					<h4>Enter Your Business Information : </h4>
>>>>>>> mod_ren_digima_mvm
				  	<div class="form-group">
				    	<label for="business_name">Business Name : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<input type="text" class="form-control" name="business_name" id="business_name" placeholder="E.g., Jack's Book Store">
				  	</div>
				  	<div class="form-group">
				    	<label for="primary_business_phone">Primary Business Phone : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<input type="text" class="form-control" name="primary_business_phone" id="primary_business_phone" placeholder="E.g., 555-989-7401">
				  	</div>
				  	<div class="form-group">
				    	<label for="secondary_business_phone">Secondary Business Phone : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<input type="text" class="form-control" name="secondary_business_phone" id="secondary_business_phone" placeholder="E.g., 555-989-7401">
				  	</div>
				  	<div class="form-group">
				    	<label for="fax_machine_number">Fax Number :</label>
				   	 	<input type="text" class="form-control" name="fax_number" id="fax_number" placeholder="E.g., 01-2222 8888">
				  	</div>
				  	<div class="form-group">
				    	<label for="business_address">Complete Business Address : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<textarea class="form-control" rows="5" name="business_address" id="business_address" placeholder="E.g., Krapinska 17/I stan 4 HR-10000 ZAGREB CROATIA" style="resize: none;"></textarea>
				  	</div>
				  	<div class="form-group">
						<label for="county">County : <span style="color: red; font-weight: normal;">*</span></label>
						<select class="form-control" name="county_list" id="county_list" style="width: 200px;">
						   <option value="--Select County--">--Select County--</option>
						   @foreach($county_list as $county_list)
						   	 <option value="{{ $county_list->county_id }}">{{ $county_list->county_name }}</option>
						   @endforeach
  						</select>
				  	</div>
				  	<div class="form-group">
						<label for="city">City : <span style="color: red; font-weight: normal;">*</span></label>
						<select class="form-control" name="city_list" id="city_list" style="width: 285px;">
						   <option value="--No County Selected--">--No County Selected--</option>
  						</select>
				  	</div>
				  	<div class="form-group">
				    	<label for="zip_code">Postal Code : <span style="color: red; font-weight: normal;">*</span></label>
				   	 	<input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="E.g., 10250" readonly="true">
				  	</div>

				  	<div class="accept-terms">
				  		<div class="checkbox">
  							<label><input type="checkbox" id="agree_checkbox" value="">I am interested in receiving offers from Croatia Directory and its partners.</label>
						</div>
				  	</div>
<<<<<<< HEAD:resources/views/mvm/front/registration.blade.php
				  	<div class="form-group text-center">
				  		<button type="button" class="btn btn-primary btn-lg" id="continue">Continue</button>
=======
				  	<div class="form-group text-center" >
				  		<button type="submit" class="btn btn-primary btn-lg">Continue</button>
>>>>>>> 21098de849dd28220bfa47f07770715d76718f04:resources/views/mvm/front/registration_first_step.blade.php
				  	</div>
			</div>
		</form>
		</div>
	</div>
@endsection


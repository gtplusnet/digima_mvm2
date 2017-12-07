@extends('front.layout.layout')
@section('title', 'Registration')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<div class="banner-registration" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="title-holder-page" style="">
			REGISTRACIJA
		</div>
	</div>
</div>
<div class="container">
	
	<form role="form" method="POST" action="/register-business" name="registrationForm" id="registrationForm">
		{{ csrf_field() }}
		<div class="col-md-6 form-leftpart">
			<div class="col-md-12 registration-title-container">
				<p class="registration-form-title">OSOBNE INFORMACIJE</p>
			</div>
			<div class="col-md-12 form-upper-container">
				<div class=" registration-form-container">
					<div class="col-md-3 form-firstpart">
						<label for="prefix" class="registration-form-label">Prefiks:</label>
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
						<label for="firstName" class="registration-form-label">Ime:</label>
						<input type="text" class="form-control" name="firstName" id="firstName" required="true">
					</div>
					<div class="col-md-5 form-thirdpart">
						<label for="lastName" class="registration-form-label">Prezime:</label>
						<input type="text" class="form-control" name="lastName" id="lastName" required="true">
					</div>
				</div>
				<div class="col-md-12 registration-form-container">
					<label for="emailAddress" class="registration-form-label">Email Adresa</label>
					<input type="email" class="form-control" name="emailAddress" id="emailAddress" required="true">
				</div>
				<div class="registration-form-container">
					<div class="col-md-6 dualfield-firstpart">
						<label for="password" class="registration-form-label">Lozinka:</label>
						<input type="password" class="form-control" name="password" id="password" required="true">
					</div>
					<div class="col-md-6 dualfield-secondpart">
						<label for="rePassword" class="registration-form-label">Ponovno Unesite Zaporku::</label>
						<input type="password" class="form-control" name="rePassword" id="rePassword" required="true">
					</div>
				</div>
			</div>
			<div class="col-md-12 registration-title-container">
				<p class="registration-form-title">POSLOVNE INFORMACIJE</p>
			</div>
			<div class="col-md-12 form-bottom-container">
				<div class="col-md-12 registration-form-container">
					<label for="businessName" class="registration-form-label">Naziv tvrtke:</label>
					<input type="text" class="form-control" name="businessName" id="businessName" required="true">
				</div>
				<div class="col-md-12 registration-form-container">
					<div class="dualfield-firstpart">
						<label for="password" class="registration-form-label">Članstvo</label>
						<select class="form-control" name="membership"  required="true">
							@foreach($_membership as $membership)
							<option value="{{ $membership->membership_id }}">{{ $membership->membership_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-6 dualfield-secondpart">
					</div>
				</div>
				<div class="registration-form-container">
					<div class="col-md-4 form-firstpart">
						<label for="primaryPhone" class="registration-form-label">Glavni Telefon:</label>
						<input type="text" class="form-control" name="primaryPhone" id="primaryPhone" required="true" placeholder="ex. 0 43 xxx xxxx">
					</div>
					
					<div class="col-md-4 form-secondpart">
						<label for="alternatePhone" class="registration-form-label">Alternativni Telefon:</label>
						<input type="text" class="form-control" name="alternatePhone" id="alternatePhone" required="true" placeholder="ex. 0 43 xxx xxxx">
					</div>
					<div class="col-md-4 form-thirdpart">
						<label for="faxNumber" class="registration-form-label">Broj faksa:</label>
						<input type="text" class="form-control" name="faxNumber" id="faxNumber">
					</div>
				</div>
				<div class="col-md-12 registration-form-container">
					<label for="businessAddress" class="registration-form-label">Cijela poslovna adresa:</label>
					<textarea rows="5" name="businessAddress" id="businessAddress" class="businessadd-textarea" required="true"></textarea>
				</div>
				<div class="registration-form-container">
					<div class="col-md-5 form-firstpart">
						<label for="countyDropdown" class="registration-form-label">Županja</label>
						<select class="form-control countyDropdown" name="countyDropdown" id="countyDropdown" required="true">
							<option value="" disabled selected>--County--</option>
							@foreach($countyList as $countyListItem)
							<option value="{{ $countyListItem->county_id }}">{{ $countyListItem->county_name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-4 form-secondpart">
						<label for="cityDropdown" class="registration-form-label">Grad</label>
						<select class="form-control cityDropdown" name="cityDropdown" id="cityDropdown" required="true">
							<option value="" disabled selected>--City--</option>
						</select>
					</div>
					<div class="col-md-3 form-thirdpart">
						<label for="postalCode" class="registration-form-label">Poštanski Broj:</label>
						<input type="text" class="form-control postalCode" name="postalCode" id="postalCode" disabled="true">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 form-rightpart">
			<div class="col-md-12 registration-title-container">
				<p class="registration-form-title">UVJETI PONUDE</p>
			</div>
			<div class="col-md-12 form-upper-container">
				<div class="col-md-12 registration-textarea-container">
					<textarea readonly rows="30" name="terms-of-offers" id="terms_of_offers" class="registration-terms-textarea">@if(isset($terms->terms_of_offers)==null)@else{{$terms->terms_of_offers}}@endif</textarea>
				</div>
			</div>
			<div class="col-md-12 registration-title-container">
				<p class="registration-form-title">DRUŠTVENI MEDIJI</p>
			</div>
			<div class="col-md-12 form-bottom-container">
				<div class="col-md-12 registration-form-container">
					<label for="" class="registration-form-label">Ova polja nisu obvezna i nisu primjenjiva na sve tvrtke</label>
				</div>
				<div class="col-md-12 registration-form-container" >
					<div class="col-md-6 dualfield-firstpart">
						<label for="facebookUrl" class="registration-form-label">URL Facebooka:</label>
						<input type="text" class="form-control" name="facebookUrl" id="facebookUrl">
					</div>
					<div class="col-md-6 dualfield-secondpart">
						<label for="twitterUsername" class="registration-form-label">Twitter korisničko ime:</label>
						<input type="twitterusername" class="form-control" name="twitterUsername" id="twitterUsername">
					</div>
				</div>
				
			</div>
		</div>

		<div class="col-md-12 form-singleupper-container">
			<input type="checkbox" value="" name="agreeCheckbox" id="agreeCheckbox" required="true">
			<label class="registration-form-label">Zanima me primanje posebnih ponuda iz Žute Stranice i njegovih partnera.</label>
		</div>
		<div class="col-md-12 form-singlebottom-container">
			<button type="submit" class="registration-continue-btn" name="continueButton" id="continueButton">Nastaviti</button>
		</div>

	</form>
</div>
<div class="modal fade" id="membershipPopUp" style="margin-top:10px;border:none">
	<div class="modal-dialog modal-lg">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">PREDAJTE VAŠE POSLOVNE DJELE U NAJVEĆE PONUDE</h4>
			</div>
			<div class="modal-body">
				<div >
					<div class="payment-containers">
						<div class="row-clearfix payment-content ">
							@foreach($_membership as $membership)
							<div class="col-md-6 package-container" style="margin:0px !important;padding:10px;    border: none !important;">
								<div style="padding:10px;border:1px solid black;">
									<div class="membership-offer">
										{{$membership->membership_name}}
									</div>
									<hr>
									<div class="membership-price">
										<span >${{$membership->membership_price}}/</span><span >MJESEC</span>
									</div>
									<hr>
									<div class="membership-details">
										<p class="membership-details-text" style="height:200px;overflow: hidden;">
											{{$membership->membership_info}}
										</p>
									</div>

								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<center><button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button></center>
			</div>
		</div>
	</div>
</div>
{{-- JAVASCRIPTS --}}
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/js/front/business-registration.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
	});
</script>
<script>
	
	jQuery(document).ready(function($)
	{
	$('#membershipPopUp').modal('toggle');
		$('html, body').css('overflowY', 'hidden');
		$('.modal-open').css('z-index', '1');
	});
	$(document).on("click",".fade",function(){
		$('html, body').css('overflowY', 'auto');
	});
</script>
{{-- END OF JAVASCRIPTS --}}
@endsection
@extends('front.layout.layout')
@section('title', 'Registration')
@section('content')
<div class="login-background" style="background-image: url('/images/background_login.jpg')">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">

			<div class="col-md-12">

			<div class="col-md-12 login-form-holder">

				
				<div class="col-md-12 login-container-middle">
					<div class="col-md-12 password-form">	

						<form role="form" method="post" action="/login">
							{{csrf_field()}}	
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="col-md-12 password-textfield-container">
								<label for="input-username" class="password-labels">Please Input Your Email</label>
								<input type="text" name="email" class="form-control password-textfields">

							</div>
							
							<div class="col-md-12 password-textfield-container-lastpart">
								<button class="password-btn">SUBMIT</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>	
	</div>
</div>
@endsection
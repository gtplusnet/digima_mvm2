@extends('mvm.front.front_layout')

@section('content')
		<div class="login-form">
			<form method="POST">
				<h3>Login to Existing Account</h3>
				<p>Login to edit or add new information to your existing business profile.</p>
				<div class="form-group">
					 <label id="label-email" for="email">E-mail :</label>
					 <input type="text" class="form-control input-lg" name="login_email" id="login_email">
				</div>
				<div class="form-group">
					  <label id="label-password" for="password">Password :</label>
					  <input type="password" class="form-control input-lg" name="login_password" id="login_password">
				</div>
				<div class="checkbox pull-right">
	  				<label><input type="checkbox" id="remember_me_checkbox" value="">Remember Me.</label>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary btn-lg btn-block" name="login_btn" id="login_btn">Login</button>
				</div>
				<div class="form-group text-center">	
					<a href="#">Forgot Password?</a>
				</div>
			</form>
		</div>
@endsection
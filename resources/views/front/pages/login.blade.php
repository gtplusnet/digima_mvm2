@extends('front.layout.layout')
@section('content')
<div class="container login-page-container">
	<div class="login-container">
		<div class="login-title-container">
			<p class="login-title">Login to Existing Account</p>
		</div>
		<div class="login-form-holder">
			<p class="login-note">Login to edit or add new information to your existing Business Profile.</p>
			<form role="form" class="login-form">
				<div class="form-group">
					<label for="input-email" class="login-label">Username or Email</label>
					<input type="email" class="form-control" id="email-user" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="input-password" class="login-label">Password</label>
					<input type="password" class="form-control" id="password-user" placeholder="Password">
				</div>
				<button type="submit" class="login-btn">LOGIN</button>
				<div class="forgot-password">
					<a href="">(Forgot Password?)</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@extends('front.layout.layout')
@section('content')
<div class="container">
	<table class="login-table">
		<tbody>
			<tr>
				<td>
					<div class="panel panel-default login-form-holder">
						<div class="panel-heading"><h3 class="panel-title"><strong>Login to Existing Account</strong></h3></div>
						<div class="panel-body">
							<label>Login to edit or add new information to your existing Business Profile.</label>
					   		<form role="form" class="login-form">
					  			<div class="form-group">
					    			<label for="input-email">Username or Email</label>
					    			<input type="email" class="form-control" id="email-user" placeholder="Enter email">
					  			</div>
					  			<div class="form-group">
					    			<label for="input-password">Password</label>
					    			<input type="password" class="form-control" id="password-user" placeholder="Password">
					  			</div>
					  			<button type="submit" class="btn btn-primary login-btn">Login</button>
					  			<div class="forgot-password">
					  				<a href="">(Forgot Password?)</a>
					  			</div>
							</form>
					  </div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection
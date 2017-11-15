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
					<div class="col-md-12 password-form" style="padding: 100px;">	
							
						@if(Session::has('message'))
						<form role="form" method="post" action="/reset/user/password">
							{{csrf_field()}}
	                    <div class="col-md-12 password-textfield-container">
							<label for="input-username" class="password-labels">New PAssword</label>
							<input type="password" name="password" class="form-control password-textfields">
						</div>

						<div class="col-md-12 password-textfield-container">
							<label for="input-username" class="password-labels">Confirm New Password</label>
							<input type="password" name="confirm_password" class="form-control password-textfields">
							<input type="hidden" name="business_id" value="{{$business_id}}" class="">
						</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<button type="submit" class="password-btn">SUBMIT</button>
						</div>
						</form>
	                    @elseif(Session::has('notmatch'))
	                    <div class="col-md-12 password-textfield-container">
							<p class="notice" style="text-align:center;font-size:30px;font-weight: bold;">You Are Not Allowed To Enter Here</p>
						</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<a href="/"><button  class="password-btn">CONTINUE</button></a>
						</div>
						@elseif(Session::has('success'))
						<div class='alert alert-success'><strong>SUCCESS!</strong>Password Change</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<a href="/login"><button  class="password-btn">LOGIN</button></a>
						</div>
						@elseif(Session::has('error'))

						<form role="form" method="post" action="/reset/user/password">
							{{csrf_field()}}
						
	                    <div class="col-md-12 password-textfield-container">
	                    	<div class='alert alert-danger'><strong>Failed!</strong>Password did'nt match</div>
							<label for="input-username" class="password-labels">New PAssword</label>
							<input type="text" name="password" class="form-control password-textfields">
						</div>

						<div class="col-md-12 password-textfield-container">
							<label for="input-username" class="password-labels">Confirm New Password</label>
							<input type="text" name="confirm_password" class="form-control password-textfields">
							<input type="hidden" name="business_id" value="{{$business_id}}" class="">
						</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<button type="submit" class="password-btn">SUBMIT</button>
						</div>
						</form>
	                    @endif 
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>	
	</div>
</div>
@endsection
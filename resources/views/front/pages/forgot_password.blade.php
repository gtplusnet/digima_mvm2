@extends('front.layout.layout')
@section('title', 'Registration')
@section('content')
<div class="login-background">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12 login-form-holder">
				<div class="col-md-12 login-container-middle">
					<div class="col-md-12 password-form" style="padding: 100px;">	
						@if(Session::has('sent'))
						<div class='alert alert-success'><strong>SUCCESS!</strong>Check your email to reset your password.</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<a href="/"><button  class="password-btn">CONTINUE</button></a>
						</div>
						@elseif(Session::has('notmatch'))
						<div class='alert alert-danger'><strong>Sorry!</strong>Email or Password did'nt match to any account.</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<a href="/"><button  class="password-btn">CONTINUE</button></a>
						</div>
						@else
						<form role="form" method="post" action="/reset/password">
							{{csrf_field()}}	
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="col-md-12 password-textfield-container">
								<label for="input-username" class="password-labels">Please Input Your Email</label>
								<input type="text" name="email" class="form-control password-textfields">
							</div>
							<div class="col-md-12 password-textfield-container">
								<label for="input-username" class="password-labels">Please Input Your Primary Phone Number</label>
								<input type="text" name="phone" class="form-control password-textfields">
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
		<div class="forgot-password-wrapper">
			<div class="mob-forgot-password">
				<div class="password-form">	
					@if(Session::has('sent'))
					<div class='alert alert-success'><strong>SUCCESS!</strong>Check your email to reset your password.</div>
					<div class="password-textfield-container-lastpart">
						<a href="/"><button  class="password-btn">CONTINUE</button></a>
					</div>
					@elseif(Session::has('notmatch'))
					<div class='alert alert-danger'><strong>Sorry!</strong>Email or Password did'nt match to any account.</div>
					<div class="password-textfield-container-lastpart">
						<a href="/"><button  class="password-btn">CONTINUE</button></a>
					</div>
					@else
					<form role="form" method="post" action="/reset/password">
						{{csrf_field()}}	
						@if($errors->any())
						<p><font color="red"><center>{{$errors->first()}}</center></font></p>
						@endif	
						<div class="password-textfield-container">
							<label for="input-username" class="password-labels">Please Input Your Email</label>
							<input type="text" name="email" class="form-control password-textfields">
						</div>
						<div class="password-textfield-container">
							<label for="input-username" class="password-labels">Please Input Your Primary Phone Number</label>
							<input type="text" name="phone" class="form-control password-textfields">
						</div>
						<div class="password-textfield-container-lastpart">
							<button type="submit" class="password-btn">SUBMIT</button>
						</div>
					</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
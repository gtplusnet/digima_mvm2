<!DOCTYPE html>
<html>
<head>
	<title>Croatia Directory</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<link rel="stylesheet" href="/assets/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<<<<<<< HEAD
<link rel="stylesheet" type="text/css" href="/assets/front/css/success.css">
<link rel="stylesheet" href="/assets/js/iziToast/dist/css/iziToast.min.css">
=======
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
<script src="/assets/js/jquery_growl/jquery.growl.js" type="text/javascript"></script>
<link href="/assets/js/jquery_growl/jquery.growl.css" rel="stylesheet" type="text/css" />
>>>>>>> mod_ren_digima_mvm
<body>
	<div class="container">
		<div class="registration-content">
			<div class="header">
				<p>CroatiaDirectory</p>
			</div>
			<div class="line-after-header">
				<hr>
			</div>
			@section('content')
			@show
			<div class="line-after-content">
				<hr>
			</div>
			<div class="bottom-link text-center">
				<a href="#">About Us </a><span>|</span>
				<a href="#">Terms of Use</a><span>|</span>
				<a href="#">Privacy Policy</a>
			</div>
			<div class="copyright text-center">
				<br>
				<p>@2017 CroatiaDirectory.com. All rights reserved.</p>
				<p>All companies and products mentioned on our site are trademarks and/or registered trademarks of their respective owners.</p>
			</div>
		</div>
	</div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
<script src="/assets/js/iziToast/dist/js/iziToast.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</html>
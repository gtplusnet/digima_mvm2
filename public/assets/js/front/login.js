$(document).ready(function(){
	$('#login_btn').click(function(){
		var login_email = $('#login_email').val();
		var login_password = $('#login_password').val();

		if(login_email == '')
		{
			iziToast.warning({
			    title: 'Caution',
			    message: 'Please enter Email.',
			    position: 'topRight',
			    transitionIn: 'fadeInDown',
			    transitionOut: 'fadeOutUp'
			});
		}
		else if(login_password == '')
		{
			iziToast.warning({
			    title: 'Caution',
			    message: 'Please enter Password.',
			    position: 'topRight',
			    transitionIn: 'fadeInDown',
			    transitionOut: 'fadeOutUp'
			});
		}
		else
		{
			$.ajax({
				type: 'POST',
				url: '/check_login',
				data: {login_email: login_email, login_password: login_password},
				success:function(data){
					if(data == 'Correct credentials.')
					{
						iziToast.success({
			    		title: 'OK',
			    		message: data,
			    		position: 'topRight',
			    		transitionIn: 'fadeInDown',
			    		transitionOut: 'fadeOutUp'
						});
					}
					else if(data == 'Sorry, your account is not activated yet.')
					{
						iziToast.error({
			    		title: 'Error',
			    		message: data,
			    		position: 'topRight',
			    		transitionIn: 'fadeInDown',
			    		transitionOut: 'fadeOutUp'
						});
					}
					else if(data == 'Sorry, your account has been disabled.')
					{
						iziToast.error({
			    		title: 'Error',
			    		message: data,
			    		position: 'topRight',
			    		transitionIn: 'fadeInDown',
			    		transitionOut: 'fadeOutUp'
						});
					}
					else if(data == 'Incorrect Email/Password.')
					{
						iziToast.error({
			    		title: 'Error',
			    		message: data,
			    		position: 'topRight',
			    		transitionIn: 'fadeInDown',
			    		transitionOut: 'fadeOutUp'
						});
					}
				}
			});
		}
	});
});
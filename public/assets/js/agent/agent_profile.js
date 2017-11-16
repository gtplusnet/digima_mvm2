$(document).ready(function()
{

	$(document).on('click','#updateProfile',function(){
		$.ajax({
			type:'POST',
			url:'/agent/update_profile',
			dataType:'text',
		}).done(function(data){
				$('#showProfile').html(data);
			});
	});
	$(document).on('click','#updatePassword',function(){
		$.ajax({
			type:'POST',
			url:'/agent/update_password',
			dataType:'text',
		}).done(function(data){
				$('#showProfile').html(data);
			});
	});
	$(document).on('click','#savePassword',function(){
		var currentPassword = $('#currentPassword').val();
		var newPassword 	= $('#newPassword').val();
		var confirmPassword = $('#confirmPassword').val();
		$.ajax({
			type:'POST',
			url:'/agent/checking_password',
			data:
				{ 
				currentPassword:currentPassword,
				newPassword:newPassword,
				confirmPassword:confirmPassword
				},
			dataType:'text',
			}).done(function(data){
				$('#showProfile').html(data);
			});
	});

});


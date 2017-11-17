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
				currentPassword		:currentPassword,
				newPassword			:newPassword,
				confirmPassword		:confirmPassword
				},
			dataType:'text',
			}).done(function(data){
				$('#showProfile').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});
	$(document).on('click','#saveProfile',function(){
		var primaryPhone 	= $('#primaryPhone').val();
		var secondaryPhone 	= $('#secondaryPhone').val();
		var otherInfo 		= $('#otherInfo').val();
		var address 		= $('#address').val();
		$.ajax({
			type:'POST',
			url:'/agent/saving_profile',
			data:
				{ 
					primaryPhone	:primaryPhone,
					secondaryPhone	:secondaryPhone,
					otherInfo		:otherInfo,
					address			:address,
				},
			dataType:'text',
			}).done(function(data){
				$('#showProfile').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});

});


$(document).ready(function()
{

	$(document).on('click','#updateProfile',function(){
		$.ajax({
			type:'POST',
			url:'/supervisor/update_profile',
			dataType:'text',
		}).done(function(data){
				$('#showProfile').html(data);
			});
	});
	$(document).on('click','#updatePassword',function(){
		$.ajax({
			type:'POST',
			url:'/supervisor/update_password',
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
			url:'/supervisor/checking_password',
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
	
	$(document).on('click','#saveProfile',function()
	{
		var address 		= document.getElementById("address").value;
        var primaryPhone 	= document.getElementById("primaryPhone").value;
		var secondaryPhone 	= document.getElementById("secondaryPhone").value;
		var otherInfo 		= document.getElementById("otherInfo").value;
		var stats			= 'null';
		var imageText 		= document.getElementById("imageText").value;
		
		if( document.getElementById("image").files.length == 0 )
		{
			// alert('juames');
			$.ajax({
			type:'POST',
			url:'/supervisor/saving_profile',
			data:
				{ 
					primaryPhone	:primaryPhone,
					secondaryPhone	:secondaryPhone,
					otherInfo		:otherInfo,
					address			:address,
					stats			:stats,
					imageText		:imageText,
					
				},
			dataType:'text',
			}).done(function(data){
				$('#showProfile').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
		}


		else
		{
			var name 			= document.getElementById("image").files[0].name;
			var form_data = new FormData();
	        var f = document.getElementById("image").files[0];
	        var fsize = f.size || f.fileSize;

	        var ext = $('#image').val().split('.').pop().toLowerCase();

	        if (fsize > 1073741824) 
	        {
	            toastr.warning("Cannot upload image, file size is very big.");
	        } 
	        else if ($.inArray(ext, ['gif','png','jpg','jpeg','bmp']) == -1) 
	        {

	            toastr.warning("Cannot upload image, file is not valid! input image only.");
	        } 
	        else 
	        {
	            form_data.append("file", document.getElementById('image').files[0]);
	            form_data.append("address", address);
	            form_data.append("primaryPhone", primaryPhone);
	            form_data.append("secondaryPhone", secondaryPhone);
	            form_data.append("otherInfo", otherInfo);
	            $.ajax({
	                url: "/supervisor/saving_profile",
	                method: "POST",
	                data: form_data,
	                contentType: false,
	                cache: false,
	                processData: false,
	                success: function (data) {
	                    $('#uploadModal').modal('hide');
	                    toastr.success("Profile updated successfully!");
	                    setTimeout(function(){location.reload();},3000);
	                    
	                }
	            });
	        }
		}
		
        
	});

});


var agent_profile = new agent_profile();
var agent_profile_data = {};    

function agent_profile()
{
	init();

	function init()
	{
		ready_document();
	}

	function ready_document()
	{
		$(document).ready(function()
		{
			
			update_profile();
			update_password();
			save_profile_submit();
		});
	}
	function update_profile()
	{
		$('body').on('click','#updateProfile',function()
		{
			$.ajax({
				type:'POST',
				url:'/agent/update_profile',
				dataType:'text',
				success: function(data)
	            {
	            	$('#showProfile').html(data);
	            }
			});
		});
	}
	function save_profile_submit()
	{
		$('body').on('click','#saveProfile',function()
		{
			var imageText 		    = document.getElementById("imageText").value;

			agent_profile_data.user_email 		    = document.getElementById("user_email").value;
			agent_profile_data.user_phone_number 	= document.getElementById("user_phone_number").value;
			agent_profile_data.user_address 	    = document.getElementById("user_address").value;
			agent_profile_data.stats 	            = 'null';

			if( document.getElementById("image").files.length == 0 )
			{
				
				$.ajax({
					type:'POST',
					url:'/agent/saving_profile',
					data:agent_profile_data,
					dataType:'text',
					success: function(data)
		            {
		            	$('#showProfile').html(data);
						setTimeout(function()
						{
							location.reload();
					    }, 1000);
		            }
				});
			}
			else
			{
				var name 	   = document.getElementById("image").files[0].name;
				var form_data  = new FormData();
		        var f 		   = document.getElementById("image").files[0];
		        var fsize 	   = f.size || f.fileSize;
		        var ext 	   = $('#image').val().split('.').pop().toLowerCase();
	        
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
		            form_data.append("file", 				document.getElementById('image').files[0]);
		            form_data.append("user_email", 			agent_profile_data.user_email);
		            form_data.append("user_phone_number", 	agent_profile_data.user_phone_number);
		            form_data.append("user_address", 		agent_profile_data.user_address);
		            $.ajax({
		                url: "/agent/saving_profile",
		                method: "POST",
		                data: form_data,
		                contentType: false,
		                cache: false,
		                processData: false,
		                success: function (data) 
		                {
		                    $('#uploadModal').modal('hide');
		                    toastr.success("Profile updated successfully!");
		                    setTimeout(function(){location.reload();},3000);
		                    
		                }
		            });
		        }
			}
			
		});
	}
	function update_password()
	{
		$('body').on('click','#updatePassword',function()
		{
			$.ajax({
				type:'POST',
				url:'/agent/update_password',
				dataType:'text',
				success: function(data)
	            {
	            	$('#showProfile').html(data);
	            }
			});
		});
		$('body').on('click','#savePassword',function()
		{
			agent_profile_data.currentPassword 	= $('#currentPassword').val();
			agent_profile_data.newPassword 		= $('#newPassword').val();
			agent_profile_data.confirmPassword 	= $('#confirmPassword').val();
			$.ajax({
				type: 'POST',
				url:  '/agent/checking_password',
				data: agent_profile_data,
				dataType:'text',
				success: function(data)
		        {
		            $('#showProfile').html(data);
					setTimeout(function()
					{
						location.reload();
					}, 1000);
		         }
		    });
		});
	}

}



		


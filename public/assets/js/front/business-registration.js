$(document).ready(function(){
	
	$(".countyDropdown").change(function(e){
		var countyId = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/get-city',
			dataType: 'json',
			data: {'countyId': countyId}
		}).done(function(data){
			$("#cityDropdown").html(data.html);
			$("#postalCode").val("");
		});
	});

	$(".cityDropdown").change(function(e){
		var cityId = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/get-postal-code',
			dataType: 'text',
			data: {'cityId': cityId}
		}).done(function(data){
			$(".postalCode").val(data);
		});
	});

	$("#registrationForm").on('submit', function(e){
		e.preventDefault();
		var formData = $(this).serialize();
		var formMethod = $(this).attr("method");
		var formAction = $(this).attr("action");
		if(password.value != rePassword.value)
		{
			toastr.warning('Password and Re-type Password do not match.');
		}
		else if(primaryPhone.value == alternatePhone.value )
		{
			toastr.warning('Primary and Alternate Phone  must not be the same.');
		}
		else
		{
			$.ajax({
				type: formMethod,
				url: formAction,
				dataType: 'json',
				data: formData
			}).done(function(data){
				if(data.status == 'used')
				{
					toastr.warning(data.message);
				}
				else if(data.status == 'success')
				{
					window.location = data.url;
				}
			});
		}
		
	});

	//Toastr Plugin Options
	toastr.options = {
		"closeButton": true,
		"debug": false,
		"newestOnTop": true,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	//End of Toastr Plugin Options
});
$(document).ready(function(){
	$("#searchRegisteredBusinessForm").on('submit', function(e){
		var businessKeyword = $("#businessKeyword").val();
		if(businessKeyword.length < 3)
		{
			e.preventDefault();
			toastr.warning('Please type atleast 3 keyword characters.');
		}
		else
		{
			$(this).submit();
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
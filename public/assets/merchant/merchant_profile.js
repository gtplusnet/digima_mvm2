// $(document).ready(function(){

// 	$(document).on("click","#OI",function()
// 	{
// 		alert();
// 		$('#show_alert_here').show();
// 	});
	
// });

$(document).ready(function(){

	$(document).on("click","#update",function(){
		var company_information = $('#company_information').val();
		var business_website = $('#business_website').val();
		var year_established = $('#year_established').val();
		
	

		$.ajax({
			type:'POST',
			url:'/merchant/add_other_info',
			data:{
				company_information: company_information,
				business_website: business_website,
				year_established: year_established,
				},
			dataType:'text',
		}).done(function(data){
			$('#other_info_success').html(data);
				setTimeout(function(){
				   location.reload();
				}, 1000);
			});
	});
	
});

$(document).ready(function(){

	$(document).on("click","#savePayment",function(){
		var paymentMethodName = $('#paymentMethodName').val();
		$.ajax({
			type:'POST',
			url:'/merchant/add_payment_method',
			data:{
				paymentMethodName: paymentMethodName,
				
				},
			dataType:'text',
		}).done(function(data){
			$('#adding_payment_method_success').html(data);
				setTimeout(function(){
				   location.reload();
				}, 1000);
		    });
	});
	$(document).on("click",".deletePaymentss",function(){
		var paymentMethodId = $(this).data("id");
		$.ajax({
			type:'POST',
			url:'/merchant/delete_payment_method',
			data:{
				paymentMethodId: paymentMethodId,
				
				},
			dataType:'text',
		}).done(function(data){
			$('#adding_payment_method_success').html(data);
				setTimeout(function(){
				   location.reload();
				}, 1000);
			});
	});
});


$(document).ready(function(){

	$(document).on("click","#updatePassword",function(){
		var current_password = $('#current_password').val();
		var new_password = $('#new_password').val();
		var confirm_password = $('#confirm_password').val();
		
		$.ajax({
			type:'POST',
			url:'/merchant/change_password',
			data:{
				current_password: current_password,
				new_password: new_password,
				confirm_password: confirm_password,
				},
			dataType:'text',
		}).done(function(data){
			$('#merchant_changepassword_success').html(data);
				setTimeout(function(){
				   location.reload();
				}, 1000);
			});
	});
	
});













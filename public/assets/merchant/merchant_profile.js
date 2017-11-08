$(document).ready(function(){

	$(document).on("click","#updateInfo",function(){
		var company_information = $('#company_information').val();
		var business_website = $('#business_website').val();
		var year_established = $('#year_established').val();

		alert(company_information);
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
			});
		
	});
	// $('.deletePayments').click(function(){
	// 	var paymentMethodId = $(this).data("id");
	// 	$.ajax({
	// 		type:'POST',
	// 		url:'/merchant/delete_payment_method',
	// 		data:{
	// 			paymentMethodId: paymentMethodId,
				
	// 			},
	// 		dataType:'text',
	// 	}).done(function(data){
	// 		$('#adding_payment_method_success').html(data);

	// 		});
	// });
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
			
			});
	});
	$(document).on("click","#deletePayments",function(){
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

			});
	});
});











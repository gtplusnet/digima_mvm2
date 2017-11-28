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
			data:
			{
				paymentMethodName: paymentMethodName,	
			},
			dataType:'text',
		}).done(function(data){
			$('#success_merchant').html(data);
				setTimeout(function()
				{
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
			$('#delete_payment_method_success').html(data);
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


$(document).ready(function()
{

	$(document).on('click','#updateprofile',function(){
		// alert('123');

		$.ajax({
			type:'POST',
			url:'/merchant/update_merchant_info',
			dataType:'text',

		}).done(function(data){

			// alert('table');
				$('#MI').html(data);
			});
	});

});

$(document).on('click','#saveprofile',function(){
		var business_complete_address 	= $('#business_complete_address').val();
		var twitter_url 				= $('#twitter_url').val();
		var facebook_url 				= $('#facebook_url').val();
		var county_id 				    = $('#county_id').val();
		var city_id						= $('#city_list').val();
	
		$.ajax({
			type:'POST',
			url:'/merchant/saving_merchant_info',
			data:
				{ 
					business_complete_address	:business_complete_address,
					twitter_url					:twitter_url,
					facebook_url				:facebook_url,
					county_id					:county_id,
					city_id						:city_id,
				},
			dataType:'text',
			}).done(function(data){
				$('#showProfile1').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});



$(document).ready(function(){

	$(document).on('change','#county_id',function(){
		var county_id = $('#county_id').val();
		$('#postal_code').val("");
		

		if(county_id == '')
		{
			$('#city_list').html('<option value=""></option>');
		}

		$.ajax({
			type:'POST',
			url:'/merchant/get_city',
			data:{county_id: county_id},
			dataType:'text',
			success:function(data){
			$('#city_list').html(data);
			}
		});
	});

	$('#city_list').change(function(){
		var city_id = $('#city_list').val();

			
		if(city_id == '')
		{
			$('#postal_code').val("");
		}

		$.ajax({
			type:'POST',
			url:'/merchant/get_zip_code',
			data:{city_id: city_id},
			dataType:'text',
			success:function(data){
			$('#postal_code').val(data);
		}
		});
		
	});
});











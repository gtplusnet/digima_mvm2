
$(document).ready(function()
{

	$(document).on('click','#Update_aboutus',function(){
		var information_header 	= $('#information_header').val();
		var information 	= $('#information').val();

		$.ajax({
			type:'POST',
			url:'/general_admin/update_about_us',
			data:
				{ 
					information_header	:information_header,
					information			:information,
					
				},
			dataType:'text',
			}).done(function(data){
			
				$('#showAboutUs').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});


	$(document).on('click','#Update_Contactus',function(){
		var phone_number 		= $('#phone_number').val();
		var email 				= $('#email').val();
		var complete_address 	= $('#complete_address').val();

		$.ajax({
			type:'POST',
			url:'/general_admin/update_contact_us',
			data:
				{ 
					phone_number		:phone_number,
					email				:email,
					complete_address	:complete_address,
					
				},
			dataType:'text',
			}).done(function(data){
			
				$('#showContactUs').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});


	$(document).on('click','#Update_thankyou',function(){
		var header 					= $('#header').val();
		var information_thank_you 	= $('#information_thank_you').val();
	
		$.ajax({
			type:'POST',
			url:'/general_admin/update_thank_you',
			data:
				{ 
					header							:header,
					information_thank_you			:information_thank_you,
					
				},
			dataType:'text',
			}).done(function(data){
			
				$('#showThankYou').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});

	$(document).on('click','#Update_terms',function(){
		var terms_of_offers = $('#terms_of_offers').val();
		
		$.ajax({
			type:'POST',
			url:'/general_admin/update_terms',
			data:
				{ 
					terms_of_offers : terms_of_offers,
				},

			dataType:'text',
			}).done(function(data){
				$('#showTerms').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	});

});

var merchant = new merchant();


function merchant()
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
			
			resend_invoice();
		});
	}

	function resend_invoice()
	{ 
		$(document).on('change','.resendAction',function()
		{
		if ($(this).val() == "resend") 
			   {
			   	
			   	
		    	var resend_email = $(this).data('email');
				var remarks="Please pay your Invoice or It will be deleted after 1 month";
				var invoice_name_resend = $(this).data('name');
				var resend_business_id = $(this).data('b_id');
				var resend_contact_name = $(this).data('contact_name');
				alert("---"+resend_email+"--"+remarks+"--"+invoice_name_resend+"--"+resend_business_id+"---"+resend_contact_name);
				$.ajax({
					type:'POST',
			 		url:'/general_admin/resend_invoice',
					data:{
						resend_email: resend_email,
						remarks: remarks,
						invoice_name_resend:invoice_name_resend,
						resend_business_id:resend_business_id,
						resend_contact_name:resend_contact_name,
						},
			 		dataType:'text',
			 	    }).done(function(data){
		               
			 			$('#success_alert').html(data);
			 			$('#successModals').modal('show');
					});
		       }
		
	});
	}
}

$(document).ready(function(){

		$(document).on('click','#search_btn_invoice',function()
		{
			var search_key1 = $('#search_send_invoice').val();
		
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_send_invoice',
				data:{
					search_key1: search_key1,
				},
				dataType:'text',
			}).done(function(data)
				{		
					$('#showHere').html(data);
					
			    });
	    });
});

$(document).ready(function(){

		$(document).on('click','#search_agent_btn',function()
		{
			var search_key2 = $('#search_agent').val();
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_agent_added',
				data:{
					search_key2: search_key2,
				},
				dataType:'text',
			}).done(function(data)
				{		
					
					$('#showHere1').html(data);
					
			    });
	    });
});

$(document).ready(function(){

		$(document).on('click','#search_pending_btn',function()
		{
			var search_key3 = $('#search_pending').val();
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_pending',
				data:{
					search_key3: search_key3,
				},
				dataType:'text',
			}).done(function(data)
				{		
					
					$('#showHere2').html(data);
					
			    });
	    });
});

$(document).ready(function(){

		$(document).on('click','#search_registered_btn',function()
		{
			var search_key4 = $('#search_registered').val();
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_registered',
				data:{
					search_key4: search_key4,
				},
				dataType:'text',
			}).done(function(data)
				{		
				
					$('#showHere3').html(data);
					
			    });
	    });
});




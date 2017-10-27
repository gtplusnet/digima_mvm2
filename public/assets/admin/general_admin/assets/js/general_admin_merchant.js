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
		$('.resendAction').change(function(){
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








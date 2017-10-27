$(document).ready(function(){

	// $('#save_send').click(function(){
	// 	var business_id = $('#business_id').val();
	// 	var business_contact_person_id = $('#business_contact_person_id').val();
	// 	var invoice_number = $('#invoice_number').val();
	// 	var token = $('#_token').val();
	// 	$.ajax({
	// 		type:'POST',
	// 		url:'/general_admin/send_save_invoice',
	// 		// url:'/pdfview',
	// 		data:{
	// 			business_id: business_id,
	// 			business_contact_person_id: business_contact_person_id,
	// 			invoice_number: invoice_number,
	// 		      },
	// 		dataType:'text',
	// 	}).done(function(data){
	// 			$('#showHere1s').html('success');
	// 		});
	// });

	$('.invoice_action').change(function(){
		var path = $(this).data('path');
		var email = $(this).data('email');
		var b_id = $(this).data('b_id');
		var contact_name = $(this).data('contact_name');
		var invoice_name_resend = $(this).data('name');
		$("#resend_email").val(email);
		$("#resend_business_id").val(b_id);
		$("#resend_contact_name").val(contact_name);
		
		if ($(this).val() == "view") 
		{
		   window.location = path;
        }
        if ($(this).val() == "resend") 
		{

			$("#resendModal").modal('show');
		}
    });
    $('#resendBtn').click(function(){
    	
        var resend_email = $("#resend_email").val();
		var remarks = $("#remarks").val();
		var resend_business_id = $("#resend_business_id").val();
		var invoice_name_resend =$("#invoice_name_resend").val();
		var resend_contact_name =$("#resend_contact_name").val();
		$("#resend_email").val(resend_email);
		$("#ajax-loader").show();
		$("#hide_me").hide();
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
                $("#ajax-loader").hide();
	 			$('#resendSuccess').html(data);
			});
    });

});
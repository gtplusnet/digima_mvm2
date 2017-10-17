$(document).ready(function(){

	$('#save_send').click(function(){
		var business_id = $('#business_id').val();
		var business_contact_person_id = $('#business_contact_person_id').val();
		var invoice_number = $('#invoice_number').val();
		var token = $('#_token').val();
		alert();
		
		
		
		$.ajax({
			type:'POST',
			url:'/general_admin/send_save_invoice',
			// url:'/pdfview',
			data:{
				business_id: business_id,
				business_contact_person_id: business_contact_person_id,
				invoice_number: invoice_number,
			      },
			dataType:'text',
		}).done(function(data){
				$('#showHere1s').html('success');
			});
	});
});
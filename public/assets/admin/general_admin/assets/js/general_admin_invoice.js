$(document).ready(function()
{

	$(document).on('change','.invoice_action',function(){
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


$(document).ready(function()
{

    $(document).on('click','#search_btn_invoice',function()
    {
        var search_key1 = $('#search_manage_invoice').val();
        // alert(search_key1);
        

        $.ajax({

            type:'POST',
            url:'/general_admin/search_manage_invoice',
            data:{
                search_key1: search_key1,
            },
            dataType:'text',
        }).done(function(data)
            {       
                // alert("Hello World");
                $('#ipakitamo').html(data);
                
            });
    });
});

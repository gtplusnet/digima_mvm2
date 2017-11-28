$(document).ready(function(){
    $(document).on('click','.viewPayment',function()
    {
        var id = $(this).data('id');
        $.ajax({
            type:'POST',
            url:'/general_admin/view_payment_details',
            data:{
                id: id,

                },
            dataType:'text',
            }).done(function(data){
                $('#insertPaymentBlade').html(data);
                $('#paymentDetails').modal('show');
                
            });
    })

    $(document).on('click','#acceptBtn',function(){
        $('#acceptBtn').modal('hide');
    	$('#acceptUser').modal('show');
        var business_id = $(this).data('id');
        $("#acceptBusinessId").val(business_id);
	});
    $(document).on('click','#declinedBtn',function(){
    
    	$('#declinedBtn').modal('hide');
    	$('#declinedUser').modal('show');
    });
    $(document).on('click','#acceptUserBtn',function(){
    
    	var business_id = $("#acceptBusinessId").val();
        $('#ajax-loader').show();
        $('.hideMe').hide();
        $.ajax({
			type:'POST',
	 		url:'/general_admin/accept_and_activate',
			data:{
				business_id: business_id,

				},
	 		dataType:'text',
	 	    }).done(function(data){
	 	    	
    	        $('.modal').modal('hide');
                $('#success_message').html(data);
    	        $('#success').modal('show');
                setTimeout(function(){
                       location.reload();
                    }, 1000);
    	        
			});
    });
    $(document).on('click','#declineUserBtn',function(){
    
    	var business_id = $("#accept_business_id").val();
    	$.ajax({
			type:'POST',
	 		url:'/general_admin/decline_and_deactivate',
			data:{
				business_id: business_id,
				},
	 		dataType:'text',
	 	    }).done(function(data){
	 	    	
    	        $('.modal').modal('hide');
    	        $('#success_message').html(data);
    	        $('#success').modal('show');
    	        
			});
    });
    $(document).on('click','#search_btn_admin',function()
        {
            var search_key = $('#search_payment_admin').val();
             $.ajax({
                type:'POST',
                url:'/general_admin/search_payment_monitoring',
                data:{
                    search_key: search_key,
                },
                dataType:'text',
            }).done(function(data)
                {       
                    $('#success_activation').html(data);
                });
        });
});



$(document).ready(function(){


    $(document).on('click','#acceptBtn',function(){
        alert();
    	$('#acceptBtn').modal('hide');
    	$('#acceptUser').modal('show');
        var business_id = $("#action_business_id").val();
		$("#accept_business_id").val(business_id);
	});
    $(document).on('click','#declinedBtn',function(){
    
    	$('#declinedBtn').modal('hide');
    	$('#declinedUser').modal('show');
    });
    $(document).on('click','#acceptUserBtn',function(){
    
    	var business_id = $("#accept_business_id").val();
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

});

$(document).ready(function(){

        $(document).on('click','#search_btn_admin',function()
        {
            var search_key = $('#search_payment_admin').val();
            // alert(search_key);
            

            $.ajax({

                type:'POST',
                url:'/general_admin/search_payment_monitoring',
                data:{
                    search_key: search_key,
                },
                dataType:'text',
            }).done(function(data)
                {       
                    // alert("Hello");
                    $('#success_activation').html(data);
                    
                });
        });
});


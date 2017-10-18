$(document).ready(function(){


    $('#acceptBtn').click(function(){
    	$('#acceptBtn').modal('hide');
    	$('#acceptUser').modal('show');
        var business_id = $("#action_business_id").val();
		$("#accept_business_id").val(business_id);
	});
    $('#declinedBtn').click(function(){
    	$('#declinedBtn').modal('hide');
    	$('#declinedUser').modal('show');
    });
    $('#acceptUserBtn').click(function(){
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
    $('#declineUserBtn').click(function(){
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
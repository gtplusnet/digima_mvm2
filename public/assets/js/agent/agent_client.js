$(document).ready(function(){

	$('#date_end').change(function(){
		var date_start = $('#date_start').val();
		var date_end = $('#date_end').val();
		$.ajax({
			type:'POST',
			url:'/agent/get_client',
			data:{date_start: date_start,date_end: date_end},
			dataType:'text',
		}).done(function(data){
				$('#showHere').html(data);
			});
	});
});


$(document).ready(function(){

	$('.transaction').click(function(){
		var transaction_id = $(this).data("id");
		
		$('.modal').hide();
		
		$.ajax({
			type:'POST',
			url:'/agent/get_client_transaction',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				$('.modal').show();
				$('#showHere').html(data);
				window.location.reload();
				
			});
	});

	$('.closed').click(function(){
		var transaction_id = $(this).data("id");
		$.ajax({
			type:'POST',
			url:'/agent/get_client_transaction_reload',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				window.location.reload();
			});
	});

	
});


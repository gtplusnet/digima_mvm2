
$(document).ready(function(){
	$('#date_end').change(function(){
		var date_start = $('#date_start').val();
		var date_end = $('#date_end').val();
		alert("123");
		
		$.ajax({
			type:'POST',
			url:'/admin/get_client',
			data:{date_start: date_start,date_end: date_end},
			dataType:'text',
		}).done(function(data){
				$('#showHere').html(data);
			});
	});

	$('.transaction').click(function(){
		var transaction_id = $(this).data("id");
		alert(transaction_id);
		$('.modal').hide();
		
		$.ajax({
			type:'POST',
			url:'/admin/get_client_transaction',
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
			url:'/admin/get_client_transaction_reload',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				window.location.reload();
			});
	});

	
});


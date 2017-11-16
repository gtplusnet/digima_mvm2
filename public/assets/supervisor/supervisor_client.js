
$(document).ready(function(){

		$(document).on('click','#search_button',function()
		{
			var search_key = $('#search_key1').val();
			
			

			$.ajax({

				type:'POST',
				url:'/supervisor/supervisor_search_client',
				data:{
					search_key: search_key,
				},
				dataType:'text',
			}).done(function(data)
				{		
					
					$('#showHere_pending').html(data);
					
			    });
	    });
});
	

$(document).ready(function(){

		$(document).on('click','#search_button1',function()
		{
			var search_key_act = $('#search_key2').val();
			
			

			$.ajax({

				type:'POST',
				url:'/supervisor/supervisor_search_client_activated',
				data:{
					search_key_act: search_key_act,
				},
				dataType:'text',
			}).done(function(data)
				{		
					
					$('#showHere_activated').html(data);
					
			    });
	    });
});


$(document).ready(function(){

	$('#date_end').change(function(){
		var date_start = $('#date_start').val();
		var date_end = $('#date_end').val();
		// alert(date_start+date_end);
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client',
			data:{date_start: date_start,date_end: date_end},
			dataType:'text',
		}).done(function(data){
				$('#showHere_pending').html(data)
			});
	});
});

$(document).ready(function(){

	$('#date_end1').change(function(){
		var date_start1 = $('#date_start1').val();
		var date_end1 = $('#date_end1').val();
		// alert(date_start1+date_end1);
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client1',
			data:{date_start1: date_start1,date_end1: date_end1},
			dataType:'text',
		}).done(function(data){
				$('#showHere_activated').html(data);
			});
	});
});



$(document).ready(function(){

	$('#date_end2').change(function(){
		var date_start2 = $('#date_start2').val();
		var date_end2 = $('#date_end2').val();
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client2',
			data:{date_start2: date_start2,date_end2: date_end2},
			dataType:'text',
		}).done(function(data){
				$('#showHere2').html(data);
			});
	});
});


$(document).ready(function(){

	$('.transaction').click(function(){
		var transaction_id = $(this).data("id");
		
		$('.modal').hide();
		
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client_transaction',
			data:{transaction_id: transaction_id},
			dataType:'text',
		});
	});

	$('.closed').click(function(){
		var transaction_id = $(this).data("id");
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client_transaction_reload',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				window.location.reload();
			});
	});

	$('#closed').click(function(){
		var transaction_id = $(this).data("id");
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client_transaction_reload',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				window.location.reload();
			});
	});

	
});


$(document).ready(function()
{
	$('body').on('click','.transaction',function(){
		var transaction_id = $(this).data("id");

		$.ajax({
			headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type:'POST',
			url:'/agent/get_client_transaction',
			data:{transaction_id: transaction_id},
			dataType:'text',
			success:function(data)
	 		{
				$('#agentCallModal').html(data);
				$('#agentCallModal').modal('show');
			}
		});
	});
	$('body').on('change','#date_end',function(){
		var date_start = $('#date_start').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		var date_end = $('#date_end').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		$.ajax({
			type:'POST',
			url:'/agent/get_client',
			data:{date_start: date_start,date_end: date_end},
			dataType:'text',
			success:function(data)
	 		{
				$('#showHere_signup').html(data);
			}
		});
	});
	$('body').on('change','#date_end1',function(){
		var date_start1 = $('#date_start1').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		var date_end1 = $(this).datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		$.ajax({
			type:'POST',
			url:'/agent/get_client1',
			data:{date_start1: date_start1,date_end1: date_end1},
			dataType:'text',
			success:function(data)
	 		{
				$('#showHere_pending').html(data);
			}
		});
	});
	$('body').on('change','#date_end2',function(){
		var date_start2 = $('#date_start2').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		var date_end2 = $('#date_end2').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		$.ajax({
			type:'POST',
			url:'/agent/get_client2',
			data:{date_start2: date_start2,date_end2: date_end2},
			dataType:'text',
			success:function(data)
	 		{
				$('#showHere_activated').html(data);
			}
		});
	});
	$('body').on('click','.closed',function(){
		
		location.reload();
			
	});

	$('body').on('click','#endMerchantCall',function(){
		var transaction_id = $('#end_merchant_id').val();
		var status = $('#end_merchant_status').val();
		$.ajax({
			type:'POST',
			url:'/agent/get_client_transaction_reload',
			data:{transaction_id: transaction_id,status:status},
			dataType:'text',
			success:function(data)
	 		{
				location.reload();
			}
		});
	});
	$('body').on('click','.end-call',function()
	{
		var id = $(this).data('id');
		var status = $(this).data("status");
		$('#end_merchant_id').val(id);
		$('#end_merchant_status').val(status);
		$('#endModals').modal('show');
    });
	$('body').on('click','#search_button1',function()
	{
		var search_key = $('#search_key1').val();
		$.ajax({
			type:'POST',
			url:'/agent/search_client',
			data:{
				search_key: search_key,
			},
			dataType:'text',
			success:function(data)
	 		{
				$('#showHere_signup').html(data);
			}
		});
    });
    $('body').on('click','#search_button12',function()
	{
		var search_key1 = $('#search_key12').val();
		$.ajax({

			type:'POST',
			url:'/agent/search_client_pending',
			data:{
				search_key1: search_key1,
			},
			dataType:'text',
			success:function(data)
	 		{
				$('#showHere_pending').html(data);
			}
		});
    });
    $('body').on('click','#search_button123',function()
	{
		var search_key2 = $('#search_key3').val();
		$.ajax({

			type:'POST',
			url:'/agent/search_client_activated',
			data:{
				search_key2: search_key2,
			},
			dataType:'text',
			success:function(data)
	 		{
				$('#showHere_activated').html(data);
			}
		});
    });
});




var merchant = new merchant();


function merchant()
{
	init();

	function init()
	{
		ready_document();
	}

	function ready_document()
	{
		$(document).ready(function()
		{
			
			resend_invoice();
			get_client();
			search_merchant();
			deactivate_merchant();
			dueDate();
			
		});
	}
	function deactivate_merchant()
	{
		$('body').on('change','.registerAction',function(){
			if($(this).val()=="newinvoice")
			{
				$('#business_id').val($(this).data('business_id'))
				$('#confirmModalInvoice').modal('show');
			}
			else if($(this).val()=="deactivate")
			{
				$('#confirmModal').modal('show');
			}
		});
		$('body').on('click','.newInvoiceSend',function()
		{
			var id = $('#business_id').val();
			window.location.assign("/general_admin/send_new_invoice/"+id+"/5")
		});
	}

	function resend_invoice()
	{ 
		$('body').on('change','.resendAction',function()
		{
			if ($(this).val() == "resend") 
		    {
			   	var resend_email 			= $(this).data('email');
				var remarks					= "Please pay your Invoice or It will be deleted after 1 month";
				var invoice_name_resend 	= $(this).data('name');
				var resend_business_id 		= $(this).data('b_id');
				var resend_contact_name 	= $(this).data('contact_name');
				$('#ajax-loader').show();
				$('#successModals').modal('show');
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
			 		success:function(data)
			 		{
						$('#success_alert').html(data);
			 			$('#ajax-loader').hide();
			 			$('#successModals').modal('show');
					}
			 	});
	        }
		
		});
	}
	function get_client()
	{
		$('body').on('change','#date_end',function(){
			var date_start 	= $('#date_start').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			var date_end 	= $('#date_end').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			$.ajax({
				type:'POST',
				url:'/general_admin/get_client',
				data:{date_start: date_start,date_end: date_end},
				dataType:'text',
				success:function(data)
		 		{
					$('#customerShow').html(data);
				}
			});
		});
		$('body').on('change','#date_end1',function(){
			var date_start1 	= $('#date_start1').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			var date_end1	= $('#date_end1').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			$.ajax({
				type:'POST',
				url:'/general_admin/get_client1',
				data:{date_start1: date_start1,date_end1: date_end1},
				dataType:'text',
				success:function(data)
		 		{
					$('#agentShow').html(data);
				}
			});
		});
		$('body').on('change','#date_end2',function(){
			var date_start2 	= $('#date_start2').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			var date_end2	= $('#date_end2').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			$.ajax({
				type:'POST',
				url:'/general_admin/get_client2',
				data:{date_start2: date_start2,date_end2: date_end2},
				dataType:'text',
				success:function(data)
		 		{
					$('#pendingShow').html(data)
				}
			});
		});
		$('body').on('change','#date_end3',function(){
			var date_start3 	= $('#date_start3').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			var date_end3	= $('#date_end3').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
			$.ajax({
				type:'POST',
				url:'/general_admin/get_client3',
				data:{date_start3: date_start3,date_end3: date_end3},
				dataType:'text',
				success:function(data)
		 		{
					$('#registeredShow').html(data)
				}
			});
		});
	}
	
	function search_merchant()
	{
		$('body').on('click','#search_btn_invoice',function()
		{
			var search_key1 = $('#search_send_invoice').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/search_send_invoice',
				data:{
					search_key1: search_key1,
				},
				dataType:'text',
				success:function(data)
		 		{
					$('#customerShow').html(data)
				}
			});
	    });
	    $('body').on('click','#search_agent_btn',function()
		{
			var search_key2 = $('#search_agent').val();
			$.ajax({

				type:'POST',
				url:'/general_admin/search_agent_added',
				data:{
					search_key2: search_key2,
				},
				dataType:'text',
				success:function(data)
		 		{
					$('#agentShow').html(data)
				}
			});
	    });
	    $('body').on('click','#search_pending_btn',function()
		{
			var search_key3 = $('#search_pending').val();
			$.ajax({

				type:'POST',
				url:'/general_admin/search_pending',
				data:{
					search_key3: search_key3,
				},
				dataType:'text',
				success:function(data)
		 		{
					$('#pendingShow').html(data)
				}
			});
	    });
	    $('body').on('click','#search_registered_btn',function()
		{
			var search_key4 = $('#search_registered').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/search_registered',
				data:{
					search_key4: search_key4,
				},
				dataType:'text',
				success:function(data)
		 		{
					$('#registeredShow').html(data);
				}
			});
	    });
	}
	
	function dueDate()
	{
		$('body').on('change','#dueDate',function()
		{
			var dueDate = $(this).val();
			$.ajax({
				type:'POST',
				url:'/general_admin/filter_due_date',
				data:{
					dueDate: dueDate,
				},
				dataType:'text',
				success:function(data)
		 		{
					$('#registeredShow').html(data);
				}
			});
	    });
	}
	
}






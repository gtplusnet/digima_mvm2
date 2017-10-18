
$(document).ready(function()
{
	$(".tab-content").on("submit",".edit_payment_form",function()
	{
		var serialized_data = $(this).serialize();
		console.log(serialized_data);
		
		$.ajax({
			type:'POST',
			url:'/merchant/edit_payment_method',
			data:serialized_data,
			dataType:'text',
		}).done(function(data)
		{
			$(".edit_container").load("/merchant/edit_payment_method .edit_container");	
			$(".alert_container").show();
			$("#myModalEdit").modal("hide");
		});
		// return false;
	});
});


$(document).ready(function()
{
	$(".tab-content").on("click",".save_messages",function()
	{
		var guest_messages_id = $('guest_messages_id').val();
		var full_name = $('full_name').val();
		var email = $('email').val();
		var subject = $('subject').val();
		var messages = $('messages').val();

		$.ajax({
			type:'POST',
			url:'/merchant/add_messages',
			data:{guest_messages_id: guest_messages_id,full_name: full_name,email: email,subject: subject,messages: messages},
			dataType:'text',
		}).done(function(data)
		{
			$(".table-bordered").load("/merchant/messages .table-bordered");	
			$(".alert_container").show();
			$('#showHereSuccess').html(data);
		});
	});
});

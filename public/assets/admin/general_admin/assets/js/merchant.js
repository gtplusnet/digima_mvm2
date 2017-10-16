
$(document).ready(function()
{
	$(".tab-content").on("click",".save_payment",function()
	{
		var payment_method_id = $('payment_method_id').val();
		var payment_method_name = $('payment_method_name').val();

		$.ajax({
			type:'POST',
			url:'/merchant/add_payment_method',
			data:{payment_method_id: payment_method_id,payment_method_name: payment_method_name},
			dataType:'text',
		}).done(function(data)
		{
			$(".table-bordered").load("/merchant/profile .table-bordered");	
			$(".alert_container").show();
			$('#showHereSuccess').html(data);
		});
	});
});

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
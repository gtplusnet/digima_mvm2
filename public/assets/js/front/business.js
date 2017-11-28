var business = new business();


function business()
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
			send_message();
		});
	}

	function send_message()
	{
		$(document).on('click','#messageSend',function()
		{

			$('#ajax-loader').show();
			$('#hiddenMo').hide();

			var email     	= $('#email').val();
			var business_id = $('#business_id').val();
			var subject		= $('#subject').val();
			var messages 	= $('#messages').val();
			

			$.ajax({
					type:'POST',
						url:'/guest/add_messages',
						data 	:{
									email		: email,
									business_id	: business_id,
									subject		: subject,
									messages 	: messages,
									'_token'	: $('meta[name="csrf-token"]').attr('content')
								},
						dataType:'text',
					}).done(function(data){
							$('#ajax-loader').hide();
							$('#hiddenMo'). show();
							$('#hiddenMo').html(data);
							setTimeout(function(){
								   location.reload();
								}, 1000);
						});

			
		});
	}
}

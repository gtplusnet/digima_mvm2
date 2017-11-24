var archived = new archived();


function archived()
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
			merchant();
			admin();
			supervisor();
			agent();
			team();
			action_restore();
		});

	}
	function merchant()
	{
		$(document).on("click",".merchant-restore",function()
		{
			var status  = $(this).data('status');
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_merchant');
			$('#restore_status').val(status);
			$('#confirmModal').modal('show');
		});


	}
	function admin()
	{
		$(document).on("click",".admin-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_admin');
			$('#confirmModal').modal('show');
		});
	}
	function supervisor()
	{
		
		$(document).on("click",".supervisor-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_supervisor');
			$('#confirmModal').modal('show');
		});

	}
	function agent()
	{
		$(document).on("click",".agent-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_agent');
			$('#confirmModal').modal('show');
		});
	}
	function team()
	{

	}

	function action_restore()
	{
		
		$(document).on("click","#restoreBtn",function()
		{
			alert();
			var id 		= $('#restore_id').val();
			var link 	= $('#restore_link').val();
			var status 	= $('#restore_status').val();
						$('#confirmModal').modal('show');
			$.ajax({
				type:'POST',
				url:'/general_admin/archived/'+link,
				data:{status: status,id: id},
				dataType:'text',
			}).done(function(data)
			{
				$('#restoreSuccess').html(data);
			 	$('#confirmModal').modal('hide');
			 	$('#restoreSuccessModal').modal('show');
			 	
				setTimeout(function(){
					   location.reload();
					}, 2000);
			});
		});
	}
}

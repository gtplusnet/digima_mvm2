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
			user_restore();
			payment();
			membership();
			team();
			categories();
			action_restore();
		});

	}
	function merchant()
	{
		$('body').on("click",".merchant-restore",function()
		{
			var status  = $(this).data('status');
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_merchant');
			$('#restore_status').val(status);
			$('#confirmModal').modal('show');
		});

		$('body').on("click",".merchant-delete",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('merchant');
			$('#type').val('one');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".merchant-delete_all",function()
		{
			var id		= $("#merchant_id").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('merchant');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});
	}
	function user_restore()
	{
		$('body').on("click",".user-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_user');
			$('#confirmModal').modal('show');
		});


		$('body').on("click",".user-delete",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('user');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".genadmin-delete_all",function()
		{
			var id		= $("#genadmin").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('user');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".supervisor-delete_all",function()
		{
			var id		= $("#supvisor").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('user');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});


		$('body').on("click",".agent-delete_all",function()
		{
			var id		= $("#agents").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('user');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});
	}
	
	function payment()
	{
		$('body').on("click",".payment-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_payment');
			$('#confirmModal').modal('show');
		});


		$('body').on("click",".payment-delete",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('payment');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".payment-delete_all",function()
		{
			var id		= $("#payment").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('payment');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});
	}
	function membership()
	{
		$('body').on("click",".membership-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_membership');
			$('#confirmModal').modal('show');
		});

		$('body').on("click",".membership-delete",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('membership');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".membership-delete_all",function()
		{
			var id		= $("#memberships").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('membership');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});

	}
			
	function categories()
	{
		$(document).on("click",".category-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_category');
			$('#confirmModal').modal('show');
		});

		$('body').on("click",".category-delete",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('category');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".category-delete_all",function()
		{
			var id		= $("#category").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('category');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});

	}

	function team()
	{
		$('body').on("click",".team-restore",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('restore_team');
			$('#confirmModal').modal('show');
		});

		$('body').on("click",".team-delete",function()
		{
			var id		= $(this).data('id');
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('team');
			$('#deleteModal').modal('show');
		});

		$('body').on("click",".team-delete_all",function()
		{
			var id		= $("#teams").val();
			$('#restore_id').val(id);
			$('#restore_link').val('delete');
			$('#table').val('team');
			$('#type').val('all');
			$('#deleteModal').modal('show');
		});
	}

	function action_restore()
	{
		$('body').on("click","#restoreBtn",function()
		{
			var id 		= $('#restore_id').val();
			var link 	= $('#restore_link').val();
			var status 	= $('#restore_status').val();
			$('#confirmModal').modal('show');
			$.ajax({
				type:'POST',
				url:'/general_admin/archived/'+link,
				data:{status: status,id: id},
				dataType:'text',
				success:function(data)
		 		{
					$('#restoreSuccess').html(data);
				 	$('#confirmModal').modal('hide');
				 	$('#restoreSuccessModal').modal('show');
				 	setTimeout(function()
					{
						   location.reload();
					}, 2000);
				}
			});
		});

		$('body').on("click","#deleteBtn",function()
		{
			var id 		= $('#restore_id').val();
			var link 	= $('#restore_link').val();
			var table 	= $('#table').val();
			var type 	= $('#type').val();
			$('#deleteModal').modal('show');
			$.ajax({
				type:'POST',
				url:'/general_admin/archived/'+link,
				data:{id: id, table : table, type: type},
				dataType:'text',
				success:function(data)
		 		{
					$('#restoreSuccess').html(data);
				 	$('#deleteModal').modal('hide');
				 	$('#restoreSuccessModal').modal('show');
				 	setTimeout(function()
					{
						   location.reload();
					}, 2000);
				}
			});
		});
	}
}

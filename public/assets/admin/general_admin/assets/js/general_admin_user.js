var manage_user = new manage_user();


function manage_user()
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
			add_agent();
			add_team();
			add_supervisor();
			add_admin();
			assigned_agent();
			action_box();
			update_info();
			add_payment_method();
			delete_payment_method();
		});
	}
	function add_payment_method()
	{
		$(document).on("click","#savePayment",function(){
			var paymentMethodName = $('#paymentMethodName').val();
			var businessId = $('#businessId').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/add_merchant_payment_method',
				data:{
					paymentMethodName: paymentMethodName,
					businessId:businessId,
					
					},
				dataType:'text',
			}).done(function(data){
				$('#adding_payment_method_success').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
			    });
		});
	}
	function delete_payment_method()
	{
		$(document).on("click",".deletePaymentss",function(){
			var paymentMethodId = $(this).data("id");
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/delete_merchant_payment_method',
				data:{
					paymentMethodId: paymentMethodId,
					},
				dataType:'text',
			}).done(function(data){
				$('#adding_payment_method_success').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
				});
		});
	}
	function update_info()
	{
		$(document).on("click","#updateInfo",function(){
			var company_information = $('#company_information').val();
			var business_website = $('#business_website').val();
			var year_established = $('#year_established').val();
			var business_id =$('#business_id').val();

			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/update_merchant_business_info',
				data:{
					business_id: business_id,
					company_information: company_information,
					business_website: business_website,
					year_established: year_established,
					
					},
				dataType:'text',
			}).done(function(data){
				$('#other_info_success').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
				});
		});
		
	}
	function merchant()
	{
		$('.merchant_actionbox').change(function()
		{
			if ($(this).val() == "edit") 
			{
	            var business_id = $(this).data('id');
	            $.ajax({
					type:'POST',
					url:'/general_admin/manage_user/view_merchant_info',
					data:{
						business_id: business_id,
						},
					dataType:'text',

				}).done(function(data){
					    $('#show_merchant_info').html(data);
					});
			}
		
	    });
	}

	function add_agent()
	{ 
		$('#add_agent').click(function(){
		var team_id = $('#team_id').val();
		var prefix = $('#prefix').val();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var primary = $('#primary').val();
		var secondary = $('#secondary').val();
		var address = $('#address').val();
		var other_info = $('#other_info').val();

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/add_agent',
			data:{
				team_id: team_id,
				prefix: prefix,
				first_name: first_name,
				last_name: last_name,
				email: email,
				password: password,
				primary: primary,
				secondary: secondary,
				address: address,
				other_info: other_info
			     },
			dataType:'text',

		}).done(function(data){
			    $('#agent_alert').html(data);
			});
	});
	}
	function add_team()
	{ 
		$('#add_team').click(function()
		{
			var team_name = $('#team_name').val();
			var team_info = $('#team_info').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/add_team',
				data:{
					team_name: team_name,
					team_info: team_info
					},
				dataType:'text',

			}).done(function(data)
				{
				    $('#team_alert').html(data);
				});
	    });
	}
	function add_supervisor()
	{ 
		$('#add_supervisor').click(function()
		{
			var team_id = $('#steam_id').val();
			var prefix = $('#sprefix').val();
			var first_name = $('#sfirst_name').val();
			var last_name = $('#slast_name').val();
			var email = $('#semail').val();
			var password = $('#spassword').val();
			var primary = $('#sprimary').val();
			var secondary = $('#ssecondary').val();
			var address = $('#saddress').val();
			var other_info = $('#sother_info').val();

			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/add_supervisor',
				data:{
					team_id: team_id,
					prefix: prefix,
					first_name: first_name,
					last_name: last_name,
					email: email,
					password: password,
					primary: primary,
					secondary: secondary,
					address: address,
					other_info: other_info
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#supervisor_alert').html(data);
				});
	    });
	}
	function add_admin()
	{ 
		$('#add_admin').click(function()
		{
			var full_name = $('#afull_name').val();
			var email = $('#aemail').val();
			var password = $('#apassword').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/add_admin',
				data:{
					full_name: full_name,
					email: email,
					password: password
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#admin_alert').html(data);
				});
	    });
	}
	function action_box()
	{ 
		//agent
		$('.agent_actionbox').change(function()
		{
			if ($(this).val() == "edit") 
			{
	        	alert('not available');
	        }
			if ($(this).val() == "assign") 
			{
		        var agent_id = $(this).data("id");
		        var agent_name = $(this).data("name");
		        $("#agent_id_assign").val(agent_id);
		        $("#agent_name_assign").val(agent_name);
		        $('#assignAgent').modal('show');
		     }
		    if ($(this).val() == "delete") 
		    {
		    	var agent_id = $(this).data("id");
		        $("#delete_agent_id").val(agent_id);
		        $('#deleteAgent').modal('show');
		    }
	    });
	    //team
	    $('.team_actionbox').change(function()
	    {
			if ($(this).val() == "edit") 
			{
	        	alert('not available');
	        }
			if ($(this).val() == "view_agent") 
			{
		        var agent_id = $(this).data("id");
		        var agent_name = $(this).data("name");
		        $("#team_id_assign").val(team_id);
		        $('#viewTeam').modal('show');
		    }
		    if ($(this).val() == "delete") 
		    {
		    	var agent_id = $(this).data("id");
		        $("#delete_team_id").val(agent_id);
		        $('#deleteTeam').modal('show');
	        }
	    });
	    //supervisor
	    $('.supervisor_actionbox').change(function()
	    {
			if ($(this).val() == "edit") 
			{
	        	alert('not available');
	        }
			if ($(this).val() == "assign") 
			{
		        var agent_id = $(this).data("id");
		        var agent_name = $(this).data("name");
		        $("#supervisor_id_assign").val(agent_id);
		        $("#supervisor_name_assign").val(agent_name);
		        $('#assignSupervisor').modal('show');
		    }
		    if ($(this).val() == "delete") 
		    {
		    	var agent_id = $(this).data("id");
		        $("#delete_agent_id").val(agent_id);
		        $('#deleteAgent').modal('show');
	        }
	    });
	    //admin
	    $('.admin_actionbox').change(function()
	    {
			if ($(this).val() == "edit") 
			{
	        	alert('not available');
	        }
			if ($(this).val() == "delete") 
			{
		    	var agent_id = $(this).data("id");
		        $("#delete_agent_id").val(agent_id);
		        $('#deleteAgent').modal('show');
	        }
	    });
	    //end action box
	    //delete
	    $('#agentDeleted').click(function()
	    {
		    var delete_agent_id = $('#delete_agent_id').val();

		 	$.ajax({
		 		type:'POST',
		 		url:'/general_admin/manage_user/delete_agent',
		 		data:{delete_agent_id: delete_agent_id},
		 		dataType:'text',

		 	}).done(function(data)
		 		{
		 		    $('#deleteAgent').modal('hide');
		 			$('#agent_success').html(data);
		 		});
	    });
	    $('#teamDeleted').click(function()
	    {
		    var delete_team_id = $('#delete_team_id').val();

		    $.ajax({

		 		type:'POST',
		 		url:'/general_admin/manage_user/delete_team',
		 		data:{delete_team_id: delete_team_id},
		 		dataType:'text',

		 	}).done(function(data)
		 		{
		 		    $('#deleteTeam').modal('hide');
		 			$('#team_success').html(data);
		 		});
	    });
	    //end delete

	}
	function assigned_agent()
	{
	    $('#agentAssigned').click(function()
	    {
		    var agent_id = $('#agent_id_assign').val();
			var team_id= $('#teamAssigned').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/assign_agent',
				data:{
					agent_id: agent_id,
					team_id: team_id,
					
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#assign_success').html(data);
				});
	    });
	}

	
}








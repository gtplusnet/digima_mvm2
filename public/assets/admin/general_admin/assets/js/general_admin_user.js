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
		$(document).on('change','.merchant_actionbox',function()
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
		$(document).on('click','#add_agent',function()
		{
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
		$(document).on('click','#add_team',function()
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
		$(document).on('click','#add_supervisor',function()
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
		$(document).on('click','#add_admin',function()
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
		$(document).on('change','.agent_actionbox',function()
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
	    $(document).on('change','.team_actionbox',function()
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
	    $(document).on('change','.supervisor_actionbox',function()
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
	    $(document).on('change','.admin_actionbox',function()
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
	    $(document).on('click','#agentDeleted',function()
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
	    $(document).on('click','#teamDeleted',function()
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
		 			setTimeout(function(){
					   location.reload();
					}, 1000);
		 		});
	    });
	    //end delete

	}
	function assigned_agent()
	{
	   
	    $(document).on('click','#agentAssigned',function()
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

$(document).ready(function(){

		$(document).on('click','#search_btn_merchant',function()
		{
			var search_key_merchant = $('#search_merchant').val();
			alert(search_key_merchant);
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_merchant',
				data:{
					search_key_merchant: search_key_merchant,
				},
				dataType:'text',
			}).done(function(data)
				{		
					alert('merchant');
					$('#showHere_merchant').html(data);
					
			    });
	    });
});

$(document).ready(function(){

		$(document).on('click','#search_btn_agent',function()
		{
			var search_key_agent = $('#search_agent').val();
			alert(search_key_agent);
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_agent_user',
				data:{
					search_key_agent: search_key_agent,
				},
				dataType:'text',
			}).done(function(data)
				{		
					alert('agent');
					$('#showHere_agent').html(data);
					
			    });
	    });
});

$(document).ready(function(){

		$(document).on('click','#search_btn_team',function()
		{
			var search_key_team = $('#search_team').val();
			alert(search_key_team);
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_team_user',
				data:{
					search_key_team: search_key_team,
				},
				dataType:'text',
			}).done(function(data)
				{		
					alert('team');
					$('#showHere_team').html(data);
					
			    });
	    });
});


$(document).ready(function(){

		$(document).on('click','#search_btn_supervisor',function()
		{
			var search_key_supervisor = $('#search_supervisor').val();
			alert(search_key_supervisor);
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_supervisor_user',
				data:{
					search_key_supervisor: search_key_supervisor,
				},
				dataType:'text',
			}).done(function(data)
				{		
					alert('supervisor');
					$('#showHere_supervisor').html(data);
					
			    });
	    });
});


$(document).ready(function(){

		$(document).on('click','#search_btn_admin',function()
		{
			var search_key_admin = $('#search_admin').val();
			alert(search_key_admin);
			
			
			$.ajax({

				type:'POST',
				url:'/general_admin/search_admin_user',
				data:{
					search_key_admin: search_key_admin,
				},
				dataType:'text',
			}).done(function(data)
				{		
					alert('admin');
					$('#showHere_admin').html(data);
					
			    });
	    });
});






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
			assigned_super();
			action_box();
			update_info();
			update_user_login();
			add_payment_method();
			delete_payment_method();
			view_members();
			search_user();
			decline_and_deactivate();
		});
	}
	function decline_and_deactivate()
	{
		
		$(document).on("click","#deleteMerchants",function(){

			var business_id 	= $('.deleteMerchant').val();
			alert(business_id);
			$.ajax({
				type:'POST',
				url:'/general_admin/decline_and_deactivate',
				data:{
					business_id:business_id,
					
					},
				dataType:'text',
			}).done(function(data){
				$('#showSuccesss').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
			    });
		});
	}
	function add_payment_method()
	{
		$(document).on("click","#savePayment",function(){

			var paymentMethodName 	= $('#paymentMethodName').val();
			var businessId 			= $('#businessId').val();
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
			if($(this).val() == 'delete')
			{
				$('#confirmModal').modal('show');
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
				    setTimeout(function(){
					   location.reload();
					}, 1000);
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
			var full_name 		= $('#afull_name').val();
			var email 			= $('#aemail').val();
			var password 		= $('#apassword').val();
			$.ajax({
				type 			:'POST',
				url 			:'/general_admin/manage_user/add_admin',
				data:
				{
					full_name	: full_name,
					email 		: email,
					password 	: password
				},
				dataType 		:'text',

			}).done(function(data)
				{
				    $('#admin_alert').html(data);
				});
	    });
	}
	function update_user_login()
	{
		$(document).on('click','#updateAgent',function()
		{
			var id 			= $("#agAgentId").val();
	        var email 		= $("#agEmail").val();
	        var oldEmail    = $('#agOldEmail').val();
	        var password 	= $("#agPassword").val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/update_agent_login',
				data:{
					id 	: id,
					email: email,
					oldEmail: oldEmail,
					password: password,
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#agent_alerts').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
	    $(document).on('click','#updateTeam',function()
		{
			
	        var id 			= $("#tTeam_id").val();
	        var name 		= $("#tTeam_name").val();
	        var info 		= $("#tTeam_info").val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/update_team_info',
				data:{
					id 	: id,
					name: name,
					info: info,
					},
				dataType:'text',

			}).done(function(data)
				{
				    $('#team_alerts').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
	    $(document).on('click','#updateSupervisor',function()
		{
			
	        var id 			= $("#supId").val();
	        var email 		= $("#supEmail").val();
	        var oldEmail    = $("#supOldEmail").val();
	        var password 	= $("#supPassword").val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/update_supervisor_login',
				data:{
					id 	: id,
					email: email,
					oldEmail: oldEmail,
					password: password,
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#supervisor_alerts').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
	    $(document).on('click','#updateAdmin',function()
		{
			var id 			= $("#adId").val();
	        var email 		= $("#adEmail").val();
	        var oldEmail    = $("#adOldEmail").val();
	        var password 	= $("#adPassword").val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/update_admin_login',
				data:{
					id 	: id,
					email: email,
					oldEmail: oldEmail,
					password: password,
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#admin_alerts').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
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
				var agent_id 		= $(this).data("id");
		        var agent_name 		= $(this).data("name");
		        var agent_email 	= $(this).data("email");
		        $("#agAgentId").val(agent_id);
		        $("#agFullname").val(agent_name);
		        $("#agEmail").val(agent_email);
		        $("#agOldEmail").val(agent_email);
		        $("#agPassword").val(agent_email);
		        $('#myModalAgentEdit').modal('show');
	        }
			if ($(this).val() == "assign") 
			{
		        var agent_id 		= $(this).data("id");
		        var agent_name 		= $(this).data("name");
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
				var team_id 	= $(this).data("id");
		        var team_name 	= $(this).data("name");
		        var team_info 	= $(this).data("info");
		        $("#tTeam_id").val(team_id);
		        $("#tTeam_name").val(team_name);
		        $("#tTeam_info").val(team_info);

	        	$('#myModalTeamEdit').modal('show');
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
				var supervisor_id 		= $(this).data("id");
		        var supervisor_name 	= $(this).data("name");
		        var supervisor_email 	= $(this).data("email");
		        $("#supId").val(supervisor_id);
		        $("#supFullname").val(supervisor_name);
		        $("#supEmail").val(supervisor_email);
		        $("#supOldEmail").val(supervisor_email);
		        $("#supPassword").val(supervisor_email);

	        	$('#myModalSupervisorEdit').modal('show');
	        }
			if ($(this).val() == "assign") 
			{
		        var super_id = $(this).data("id");
		        var super_name = $(this).data("name");
		        // alert(super_name);
		        $("#super_id_assign").val(super_id);
		        $("#super_name_assign").val(super_name);
		        $('#assignSupervisor').modal('show');
		    }
		    if ($(this).val() == "delete") 
		    {
		    	var super_id = $(this).data("id");
		        $("#delete_supervisor_id").val(super_id);
		        $('#deleteSupervisor').modal('show');
	        }
	    });
	    //admin
	    $(document).on('change','.admin_actionbox',function()
	    {
			if ($(this).val() == "edit") 
			{
	        	var admin_id 		= $(this).data("id");
		        var admin_name 	= $(this).data("name");
		        var admin_email 	= $(this).data("email");
		        $("#adId").val(admin_id);
		        $("#adFullname").val(admin_name);
		        $("#adEmail").val(admin_email);
		        $("#adOldEmail").val(admin_email);
		        $("#adPassword").val(admin_email);

		        $('#myModalAdminEdit').modal('show');
	        }
			if ($(this).val() == "delete") 
			{

		    	var admin_id = $(this).data("id");
		    	$("#delete_admin_id").val(admin_id);
		        $('#deleteAdmin').modal('show');
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
		 			$('#agent_success1').html(data);
		 			setTimeout(function(){
					   location.reload();
					}, 1000);
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
	    $(document).on('click','#supervisorDeleted',function()
	    {
		    var delete_supervisor_id = $('#delete_supervisor_id').val();

		    $.ajax({

		 		type:'POST',
		 		url:'/general_admin/manage_user/delete_supervisor',
		 		data:{delete_supervisor_id: delete_supervisor_id},
		 		dataType:'text',

		 	}).done(function(data)
		 		{
		 		    $('#deleteSupervisor').modal('hide');
		 			$('#supervisor_success').html(data);
		 			setTimeout(function(){
					   location.reload();
					}, 1000);
		 		});
	    });
	    $(document).on('click','#adminDeleted',function()
	    {
		    var delete_admin_id = $('#delete_admin_id').val();
		    $.ajax({

		 		type:'POST',
		 		url:'/general_admin/manage_user/delete_admin',
		 		data:{delete_admin_id: delete_admin_id},
		 		dataType:'text',

		 	}).done(function(data)
		 		{
		 		    $('#deleteAdmin').modal('hide');
		 			$('#admin_success').html(data);
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
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
	}
	function assigned_super()
	{
		$(document).on('click','#superAssigned',function()
	    {
		    var super_id = $('#super_id_assign').val();
			var team_id= $('#teamAssign').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/assign_supervisor',
				data:{
					super_id: super_id,
					team_id: team_id,
					
				     },
				dataType:'text',

			}).done(function(data)
				{
				    $('#assignSuccess').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
	}
	function view_members()
	{
		$(document).on('click','.viewMem',function()
	    {
	    	var team_id = $(this).data('id');
	    	$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/view_all_members',
				data:{
					team_id: team_id,
					},
				dataType:'text',

			}).done(function(data)
				{
				    $('#viewMemHere').html(data);
				    $('#myModalViewMem').modal('show');
				});
	    });
	}
	function search_user()
	{
		$(document).on('click','#search_btn_merchant',function()
		{
			var search_key_merchant = $('#search_merchant').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/search_merchant',
				data:{
					search_key_merchant: search_key_merchant,
				},
				dataType:'text',
			}).done(function(data)
				{		
					$('#showHere_merchant').html(data);
				});
	    });
	    $(document).on('click','#search_btn_agent',function()
		{
			var search_key_agent = $('#search_agent').val();
			$.ajax({

				type:'POST',
				url:'/general_admin/search_agent_user',
				data:{
					search_key_agent: search_key_agent,
				},
				dataType:'text',
			}).done(function(data)
				{		
					$('#showHere_agent').html(data);
				});
	    });
	    $(document).on('click','#search_btn_team',function()
		{
			var search_key_team = $('#search_team').val();
			$.ajax({

				type:'POST',
				url:'/general_admin/search_team_user',
				data:{
					search_key_team: search_key_team,
				},
				dataType:'text',
			}).done(function(data)
				{		
				
					$('#showHere_team').html(data);
					
			    });
	    });
	    $(document).on('click','#search_btn_supervisor',function()
		{
			var search_key_supervisor = $('#search_supervisor').val();
			$.ajax({

				type:'POST',
				url:'/general_admin/search_supervisor_user',
				data:{
					search_key_supervisor: search_key_supervisor,
				},
				dataType:'text',
			}).done(function(data)
				{		
					$('#showHere_supervisor').html(data);
				});
	    });
	    $(document).on('click','#search_btn_admin',function()
		{
			var search_key_admin = $('#search_admin').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/search_admin_user',
				data:{
					search_key_admin: search_key_admin,
				},
				dataType:'text',
			}).done(function(data)
				{		
					$('#showHere_admin').html(data);
				});
	    });
	}

	
}








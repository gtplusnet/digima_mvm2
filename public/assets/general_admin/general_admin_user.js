var manage_user = new manage_user();
var manageUserData = {};


function manage_user()
{
	this.toastr = function(name)
	{
		toastr.error(name+' cannot be null.', 'Something went wrong!', {timeOut: 3000})
	}
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
			add_user();
			edit_user();
			add_team();
			user_action_box();
			team_action_box();


			update_info();
			
			add_payment_method();
			delete_payment_method();
			view_members();
			search_user();
			decline_and_deactivate();
		});
	}
	function decline_and_deactivate()
	{
		
		$('body').on("click","#deleteMerchants",function(){

			var business_id 	= $('.deleteMerchant').val();
			alert(business_id);
			$.ajax({
				type:'POST',
				url:'/general_admin/decline_and_deactivate',
				data:{
					business_id:business_id,
					
					},
				dataType:'text',
				success: function(data)
				{
					$('#showSuccesss').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
		});
	}
	function add_payment_method()
	{
		$('body').on("click","#savePayment",function(){

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
				success: function(data)
				{
					setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
		});
	}
	function delete_payment_method()
	{
		$('body').on("click",".deletePaymentss",function(){
			var paymentMethodId = $(this).data("id");
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/delete_merchant_payment_method',
				data:{
					paymentMethodId: paymentMethodId,
					},
				dataType:'text',
				success: function(data)
				{
					$('#adding_payment_method_success').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
				}
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
				success: function(data)
				{
					$('#other_info_success').html(data);
					setTimeout(function()
					{
					   location.reload();
					}, 1000);
				}
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
					data:
					{
						business_id: business_id,
					},
					dataType:'text',
					success: function(data)
					{
						$('#show_merchant_info').html(data);
					}

				});
			}
			if($(this).val() == 'delete')
			{
				$('#confirmModal').modal('show');
			}
		
	    });
	}

	function add_user()
	{ 
		$(document).on('click','#addUserBtn',function()
		{
		    
			if($('#team_id').val()==0 && $('.addtitle').text() == 'ADD USER')
			{
				globals.global_tostr('TEAM');
			}
			
			else if($('#user_access_level').val()==0)
			{
				globals.global_tostr('POSITION');
			}
			else if($('#user_first_name').val()=="")
			{
				globals.global_tostr('FIRST NAME');
			}
			else if($('#user_last_name').val()=="")
			{
				globals.global_tostr('LAST NAME');
			}
			else if($('#user_email').val()=="")
			{
				globals.global_tostr('EMAIL');
			}
			else if($('#user_gender').val()=="")
			{
				globals.global_tostr('GENDER');
			}
			else if($('#user_phone_number').val()=="")
			{
				globals.global_tostr('PHONE NUMBER');
			}
			else if($('#user_address').val()=="")
			{
				globals.global_tostr('ADDRESS');
			}

			else
			{
				$(this).attr('disabled',true);
				$(this).html('<i class="fa fa-spinner fa-spin"></i>');
				manageUserData.team_id         	= $("#team_id").val();
				manageUserData.user_first_name 	= $("#user_first_name").val();
				manageUserData.user_last_name 	= $("#user_last_name").val();
				manageUserData.user_email 		= $("#user_email").val();
				manageUserData.user_gender 		= $("#user_gender").val();
				manageUserData.user_phone_number= $("#user_phone_number").val();
				manageUserData.user_address 	= $("#user_address").val();
				manageUserData.user_access_level= $("#user_access_level").val();
				

				$.ajax({
					headers: {
					      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},

					url:'/general_admin/manage_user/add_user',
					data: manageUserData,
					type: "POST",
					dataType:'text',
		            success: function(data)
					{
						$('#addUserBtn').removeAttr('disabled');
						$('#addUserBtn').html('ADD USER');
						if(data=='success')
						{

							toastr.success('User Added Successfully', 'Success', {timeOut: 3000})
							setTimeout(function(){
							   location.reload();
							}, 1000);
						}
						else if(data=='email_exist')
						{
							toastr.error('Email Already Exist', 'Something went wrong!', {timeOut: 3000})
						}
						else
						{
							toastr.error('Error Adding User', 'Something went wrong!', {timeOut: 3000})
						}
					}
				});
			}
			
		});
	}
	function edit_user()
	{
		$('body').on('change','.view_user_details',function()
		{
			
			if ($(this).val() == "view") 
			{
				var user_id 		= $(this).data("id");
				$.ajax({
					headers: {
					      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},

					url:'/general_admin/manage_user/user_details',
					data: {user_id:user_id},
					type: "POST",
					dataType:'text',
		            success: function(data)
					{
						$('#manageUserModal').modal('show');
						$('.showContent').html(data);
					}
				});

	        }
			if ($(this).val() == "assign") 
			{
				var id 		= $(this).data("id");
		        var name    = $(this).data("name");
		        var ref    = $(this).data("ref");
		        $("#id_assign").val(id);
		        $("#user_ref").val(ref);
		        $("#name_assign").val(name);
		        $('#assignUser').modal('show');
		    }
		    if ($(this).val() == "delete") 
		    {
		    	var user_id = $(this).data("id");
		        $("#delete_user_id").val(user_id);
		        $('#deleteUser').modal('show');
		    }
	    });
	}
	function add_team()
	{ 
		$('body').on('click',".addsupervisor",function() 
		{	
			$('.addtitle').html('ADD SUPERVISOR');
			$('.team_field').css('display','none');
			$('.team_label').css('display','none');

		});

		$('body').on('click',".addagent",function() 
		{	
			$('.addtitle').html('ADD USER');
			$('.team_field').css('display','');
			$('.team_label').css('display','');

		});

		$('body').on('click','#add_team',function()
		{
			var team_name = $('#team_name').val();
			var team_info = $('#team_info').val();
			var team_super = $('#team_super').val();
			
			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/add_team',
				data:{
					team_name: team_name,
					team_info: team_info,
					team_super: team_super
					},
				dataType:'text',
				success: function(data)
				{
					$('#team_alert').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
	    });

	}
	
	
	function user_action_box()
	{
		$('body').on('click','#updateUser',function()
		{
			console.log($("#old_email").val());
			manageUserData.user_info_id     = $(this).data('user_info_id');
			manageUserData.user_first_name 	= $("#old_first_name").val();
			manageUserData.user_last_name 	= $("#old_last_name").val();
			manageUserData.user_email 		= $("#old_email").val();
			manageUserData.user_gender 		= $("#old_gender").val();
			manageUserData.user_phone_number= $("#old_phone_number").val();
			manageUserData.user_address 	= $("#old_address").val();
			manageUserData.user_password 	= $("#old_password").val();

			$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/update_user',
				data: manageUserData,
				dataType:'text',
				success: function(data)
				{
					$('#userUpdateAlert').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
	    });
	    $('body').on('click','#userDeleted',function()
	    {
		    var delete_user_id = $('#delete_user_id').val();

		 	$.ajax({
		 		type:'POST',
		 		url:'/general_admin/manage_user/delete_user',
		 		data:{delete_user_id: delete_user_id},
		 		dataType:'text',
		 		success: function(data)
				{
					$('#deleteAgent').modal('hide');
		 			$('#agent_success1').html(data);
		 			setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
	    });
	    $('body').on('click','#userAssigned',function()
	    {
		    var user_id = $('#id_assign').val();
			var team_id = $('#teamAssigned').val();

			if($('#user_ref').val()=="supervisor")
			{
				var link = '/general_admin/manage_user/assign_supervisor';
			}
			else
			{
				var link = '/general_admin/manage_user/assign_user';
			}

			$.ajax({
				type:'POST',
				url:link,
				data:{
					user_id: user_id,
					team_id: team_id,
					},
				dataType:'text',
				success: function(data)
                {
                	$('#assign_success').html(data);
				    setTimeout(function()
				    {
					   location.reload();
					}, 1000);
                }
            });
	    });
	    
	    
	}
	function team_action_box()
	{
		$('body').on('change','.team_actionbox',function()
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
		        var agent_id 	= $(this).data("id");
		        var agent_name 	= $(this).data("name");
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
	    $('body').on('click','#teamDeleted',function()
	    {
		    var delete_team_id = $('#delete_team_id').val();

		    $.ajax({

		 		type:'POST',
		 		url:'/general_admin/manage_user/delete_team',
		 		data:{delete_team_id: delete_team_id},
		 		dataType:'text',
		 		success: function(data)
				{
					$('#deleteTeam').modal('hide');
		 			$('#team_success').html(data);
		 			setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
	    });
	    $('body').on('click','#updateTeam',function()
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
				success: function(data)
				{
					$('#team_alerts').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
				}
			});
	    });

	}
	
	function view_members()
	{
		$('body').on('click','.viewMem',function()
	    {
	    	var team_id = $(this).data('id');
	    	$.ajax({
				type:'POST',
				url:'/general_admin/manage_user/view_all_members',
				data:{
					team_id: team_id,
					},
				dataType:'text',
				success: function(data)
				{
					$('#viewMemHere').html(data);
				    $('#myModalViewMem').modal('show');
				}

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








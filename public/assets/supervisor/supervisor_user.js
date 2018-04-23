var supervisor_user = new supervisor_user();
var supervisor_user_data = {};    

function supervisor_user()
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
			
			team_action_box();
			agent_action_box();
			action_delete();
			search_function();
			add_and_update_team();
			view_member();
			assign_agent();
			update_agent();
		});
	}
	function team_action_box()
	{
		$('body').on('change','.teamAction',function () {
			if ($(this).val() 	== "delete") {
		    	var team_id 	= $(this).data("id");
		        $("#delete_team_id").val(team_id);
		        $('#deleteTeam').modal('show');
		    }

		    if ($(this).val() 	== "edit") {
		    	var team_id 	= $(this).data("id");
		    	var team_name 	= $(this).data("name");
		    	var team_info 	= $(this).data("info");
		        $("#teamIdEdit").val(team_id);
		        $("#teamNameEdit").val(team_name);
		        $("#teamInfoEdit").val(team_info);
		        $('#teamEditModal').modal('show');
		    }
	   });
	}
	function agent_action_box()
	{
		$('body').on('change','.actionbox',function () {
			if ($(this).val() 	== "assign") {
		        var agent_id 	= $(this).data("id");
		        var agent_name 	= $(this).data("name");
		        $("#agent_id_assign").val(agent_id);
		        $("#agent_name_assign").val(agent_name);
		        $('#assignAgent').modal('show');
		      }
		    if ($(this).val() 	== "delete") {
		    	var agent_id 	= $(this).data("id");
		        $("#delete_agent_id").val(agent_id);
		        $('#deleteAgent').modal('show');
		    }
		});
	}
	function action_delete()
	{
		$('#teamDeleted').click(function(){
			var delete_team_id = $('#delete_team_id').val();
			$.ajax({
				type:'POST',
				url:'/supervisor/delete_team',
				data:{delete_team_id: delete_team_id},
				dataType:'text',
				success: function(data)
	            {
	            	$('#deleteTeam').modal('hide');
					$('#team_delete_success').html(data);
					setTimeout(function()
					{
						location.reload();
					}, 1000);
	            }
	        });
		});

	    $('#agentDeleted').click(function(){
			var delete_agent_id = $('#delete_agent_id').val();
			$.ajax({
				type:'POST',
				url:'/supervisor/delete_agent',
				data:{delete_agent_id: delete_agent_id},
				dataType:'text',
				success: function(data)
	            {
	            	$('#deleteAgent').modal('hide');
					$('#agent_delete_success').html(data);
					setTimeout(function()
					{
						location.reload();
					}, 1000);
	            }
			});
		});
	}
	function search_function()
	{
		$('body').on('click','#search_button_team',function()
		{
			var search_key_team = $('#search_key1').val();
			$.ajax({
				type:'POST',
				url:'/supervisor/supervisor_search_team',
				data:
				{
					search_key_team: search_key_team,
				},
				dataType:'text',
				success: function(data)
	            {
	            	$('#showHere_team').html(data);
	            }
			});
	    });
		$('body').on('click','#search_button_agent',function()
		{
			var search_key_agent = $('#search_key2').val();
			$.ajax({
				type:'POST',
				url:'/supervisor/supervisor_search_agent',
				data:
				{
					search_key_agent: search_key_agent,
				},
				dataType:'text',
				success: function(data)
	            {
	            	$('#agent_delete_success').html(data);
	            }
			});
	    });
	}
	function add_and_update_team()
	{
		$('body').on('click','#updateTeamBtn',function()
		{
			var team_id   = $("#teamIdEdit").val();
	        var team_name = $("#teamNameEdit").val();
	        var team_info = $("#teamInfoEdit").val();
	        $.ajax({
				type:'POST',
				url:'/supervisor/update_team',
				data:{
					team_id: team_id,
					team_name: team_name,
					team_info: team_info,
					},
				dataType:'text',
				success: function(data)
	            {
	            	$('#team_update_success').html(data);
				    setTimeout(function()
				    {
						location.reload();
					}, 1000);
	            }
			});
		       
		});
		$('body').on('click','#save_team',function(){
			var team_name = $('#team_name').val();
			var team_des = $('#team_des').val();
			
			$.ajax({
				type:'POST',
				url:'/supervisor/add_team',
				data:{team_name: team_name,team_des:team_des},
				dataType:'text',
				success: function(data)
	            {
	            	$('#team_success').html(data);
				    setTimeout(function()
				    {
						location.reload();
					}, 1000);
	            }
			});
		});
	}
	function view_member()
	{
		$('body').on('click','.viewMem',function()
	    {
	    	var team_id = $(this).data('id');
		    $.ajax({
				type:'POST',
				url:'/supervisor/manage_user/view_all_members',
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
	function assign_agent()
	{
		$('body').on('click','#agentAssigned',function(){
			var agent_id_assign = $('#agent_id_assign').val();
			var teamAssigned = $('#teamAssigned').val();
			$.ajax({
				type:'POST',
				url:'/supervisor/assign_agent',
				data:{agent_id_assign: agent_id_assign,teamAssigned:teamAssigned},
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
	function update_agent()
	{
		$('body').on('click','#save_agent',function(){
			var team_id = $('#team_id').val();
			var prefix = $('#prefix').val();
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var email = $('#email').val();
			var password = $('#password').val();
			var primary = $('#primary').val();
			var secondary = $('#secondary').val();
			var other_info = $('#other_info').val();

			$.ajax({
				type:'POST',
				url:'/supervisor/add_agent',
				data:{
					team_id: team_id,
					prefix: prefix,
					first_name: first_name,
					last_name: last_name,
					email: email,
					password: password,
					primary: primary,
					secondary: secondary,
					other_info: other_info
				     },
				dataType:'text',
				success: function(data)
	            {
	            	$('#agent_success').html(data);
					setTimeout(function(){
					   location.reload();
					}, 1000);
	            }
	        });
		});
	}

}




$(document).ready(function()
{
	//modal
	$(".actionbox").change(function () {
	if ($(this).val() == "assign") {
        
        var agent_id = $(this).data("id");
        var agent_name = $(this).data("name");
        $("#agent_id_assign").val(agent_id);
        $("#agent_name_assign").val(agent_name);
        $('#assignAgent').modal('show');
      }
    if ($(this).val() == "delete") {
    	var agent_id = $(this).data("id");
        $("#delete_agent_id").val(agent_id);
        $('#deleteAgent').modal('show');
      }
   });
	//modal act
    $('#agentDeleted').click(function(){
		var delete_agent_id = $('#delete_agent_id').val();
		alert();
		
		$.ajax({
			type:'POST',
			url:'/supervisor/delete_agent',
			data:{delete_agent_id: delete_agent_id},
			dataType:'text',

		}).done(function(data){
			    $('#deleteAgent').modal('hide');
				$('#agent_delete_success').html(data);
			});
	});

    $('#agentAssigned').click(function(){
		var agent_id_assign = $('#agent_id_assign').val();
		var teamAssigned = $('#teamAssigned').val();
		
		
		$.ajax({
			type:'POST',
			url:'/supervisor/assign_agent',
			data:{agent_id_assign: agent_id_assign,teamAssigned:teamAssigned},
			dataType:'text',

		}).done(function(data){
				$('#assign_success').html(data);
			});
	});

	$('#save_team').click(function(){
		var team_name = $('#team_name').val();
		var team_des = $('#team_des').val();
		
		$.ajax({
			type:'POST',
			url:'/supervisor/add_team',
			data:{team_name: team_name,team_des:team_des},
			dataType:'text',

		}).done(function(data){
				$('#team_success').html(data);
			});
	});

	$('#save_agent').click(function(){
		var team_id = $('#team_id').val();
		var prefix = $('#prefix').val();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var primary = $('#primary').val();
		var secondary = $('#secondary').val();
		var other_info = $('#other_info').val();

		alert('');
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

		}).done(function(data){
				$('#agent_success').html(data);
			});
	});
});
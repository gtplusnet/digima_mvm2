

$(document).ready(function()
{
	$(".tab-content").on("click",".save_admin",function()
	{
		var full_name = $('#full_name').val();
		var email = $('#email').val();

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/add_admin_submit',
			data:{full_name: full_name,email: email},
			dataType:'text',
		}).done(function(data)
		{
			$(".admin_container").load("/general_admin/manage_user/add/general_admin .admin_container");	
			$(".alert_container").show();
			// $("#myModal").modal("hide");
			$('#showHereSuccess').html(data);
		});
	});
});

$(document).ready(function()
{
	$(".tab-content").on("submit",".edit_admin_form",function()
	{
		var serialized_data = $(this).serialize();
		console.log(serialized_data);
		
		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/edit_admin_submit',
			data:serialized_data,
			dataType:'text',
		}).done(function(data)
		{
			$(".admin_container").load("/general_admin/manage_user/add/general_admin .admin_container");	
			$(".alert_container").show();
			$("#myModalEdit").modal("hide");
		});
		// return false;
	});
});



$(document).ready(function(){
	$(".tab-content").on("click",".save_supervisor",function()
	{
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var email = $('#email').val();

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/add_supervisor_submit',
			data:{first_name: first_name,last_name: last_name,email: email},
			dataType:'text',
		}).done(function(data)
		{
			$(".supervisor_container").load("/general_admin/manage_user/add/supervisor .supervisor_container");	
			$(".alert_supervisor").show();
			// $("#myModal").modal("hide");
			$('#showHereSuccess1').html(data);
		});
	});
});


$(document).ready(function()
{
	$(".tab-content").on("submit",".edit_supervisor_form",function()
	{
		var serialized_data = $(this).serialize();
		console.log(serialized_data);
		// var admin_id = $(this).attr("admin_id");
		// var full_name = $('#full_name'+ admin_id).val();
		// var email = $('#email' + admin_id).val();
		// var token = $('#token').val();
		// alert(full_name);

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/edit_supervisor_submit',
			data:serialized_data,
			dataType:'text',
		}).done(function(data)
		{
			// $(".supervisor_container").load("/general_admin/manage_user/add/supervisor .supervisor_container");	
			// $(".alert_supervisor").show();
			// // $("#myModal").modal("hide");
			$('#showHere2').html(data);
		});
		
	});
});
$(document).ready(function(){
	$(".tab-content").on("click","#save_team",function()
	{
		var team_name = $('#team_name').val();
		var team_information = $('#team_information').val();


		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/add_team_submit',
			data:{team_name: team_name,team_information: team_information},
			dataType:'text',
		}).done(function(data)
		{
			$(".team_container").load("/general_admin/manage_user/add/team .team_container");	
			$(".alert_container").show();
			// $("#myModal").modal("hide");
			$('#showHereSuccess2').html(data);
		});
	});
});
$(document).ready(function()
{
	$(".tab-content").on("submit",".edit_team_form",function()
	{
		var serialized_data = $(this).serialize();
		console.log(serialized_data);

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/edit_team_submit',
			data:serialized_data,
			dataType:'text',
		}).done(function(data)
		{
			$(".team_container").load("/general_admin/manage_user/add/team .team_container");	
			$(".alert_team").show();
			$("#myModal").modal("hide");
		});
		// return false;
	});
});

$(document).ready(function(){
	$(".tab-content").on("click","#save_agent",function()
	{
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var primary_phone = $('#primary_phone').val();
		var secondary_phone = $('#secondary_phone').val();
		var other_info = $('#other_info').val();

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/add_agent_submit',
			data:{first_name: first_name,last_name: last_name, email: email,password: password,primary_phone: primary_phone,secondary_phone: secondary_phone,other_info: other_info},
			dataType:'text',
		}).done(function(data)
		{
			$(".agent_container").load("/general_admin/manage_user/add/agent .agent_container");	
			$(".alert_team").show();
			// $("#myModal").modal("hide");
			$('#showHereSuccess').html(data);
		});
	});
});

$(document).ready(function()
{
	$(".tab-content").on("submit",".edit_agent_form",function()
	{
		var serialized_data = $(this).serialize();
		console.log(serialized_data);

		$.ajax({
			type:'POST',
			url:'/general_admin/manage_user/edit_agent_submit',
			data:serialized_data,
			dataType:'text',
		}).done(function(data)
		{
			// $(".team_agent").load("/general_admin/manage_user/add/agent .agent_container");	
			// $(".alert_agent").show();
			// $("#myModal").modal("hide");
		});
		// return false;
	});
});


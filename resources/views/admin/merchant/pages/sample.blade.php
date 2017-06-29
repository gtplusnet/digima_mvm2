<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="my-form" class="my-form">
		
		<input type="text" name="input_1" class="input_1" value="input1" readonly >
		<input type="text" name="input2" class="input_2" value="input2" readonly >	
		<button type="button" class="onEdit" >Edit</button>
	</form>
</body>
</html>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	

	$('.onEdit').unbind('click');
	$('.onEdit').bind('click', function(){
		$('.my-form input').removeAttr('readonly');	
	});

</script>
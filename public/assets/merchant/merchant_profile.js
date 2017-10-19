
$(document).click(function(){

	$('#save_other_info').click(function(){
		var company_profile = $('#company_profile').val();
		var company_information = $('#company_information').val();
		var business_website = $('#company_website').val();
		var year_established = $('#company_established').val();
		var business_id = $('#business_id_other').val();
		// alert(business_id);
		
		$.ajax({
			type:'GET',
			url:'/merchant/add_other_info',
			data:{
				company_profile: company_profile,
				company_information: company_information,
				business_website: business_website,
				year_established: year_established,
				business_id: business_id
				},
			dataType:'json',
		}).done(function(data){
			 return false;
				// $('#showHere_others1232').html("james");
			});
	});
});


// $(document).ready(function() {
//         $("#company_profile").on('change', function() {
//           //Get count of selected files
//           var countFiles = $(this)[0].files.length;
//           var imgPath = $(this)[0].value;
//           var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
//           var image_holder = $("#image-holder");
//           image_holder.empty();
//           if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
//             if (typeof(FileReader) != "undefined") {
//               //loop for each file selected for uploaded.
//               for (var i = 0; i < countFiles; i++) 
//               {
//                 var reader = new FileReader();
//                 reader.onload = function(e) {
//                   $("<img />", {
//                     "src": e.target.result,
//                     "class": "thumb-image"
//                   }).appendTo(image_holder);
//                 }
//                 image_holder.show();
//                 reader.readAsDataURL($(this)[0].files[i]);
//               }
//             } else {
//               alert("This browser does not support FileReader.");
//             }
//           } else {
//             alert("Pls select only images");
//           }
//         });
//       });





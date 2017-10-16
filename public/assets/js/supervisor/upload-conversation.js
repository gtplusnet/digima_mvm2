$(document).ready(function () {
    
    $(document).on("click", "#selAudioBtn", function () {
        var bId = $(this).data("bid");
        var cId = $(this).data("cid");
        $("#businessId").val(bId);
        $("#contactId").val(cId);
        $(this).html("Selecting Audio File..");
        $(this).attr("class", "btn btn-warning btn-rounded");
    });

    $(document).on("click", ".closeBtn", function (){
        $("*#selAudioBtn*").html("Select Audio File..");
        $("*#selAudioBtn*").attr("class", "btn btn-primary btn-rounded");
    });

    $(document).on('click', '#uploadBtn', function () {
        var name = document.getElementById("convoFile").files[0].name;
        var businessId = document.getElementById("businessId").value;
        var contactId = document.getElementById("contactId").value;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (ext != 'mp3') {
            toastr.warning('Please select an audio file.');
        } else {
            var f = document.getElementById("convoFile").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 1073741824) {
                toastr.warning("Cannot upload audio, file size is very big.");
            } else {
                form_data.append("file", document.getElementById('convoFile').files[0]);
                form_data.append("businessId", businessId);
                form_data.append("contactId", contactId);
                $.ajax({
                    url: "/agent/upload-convo",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#uploadModal').modal('hide');
                        toastr.success("Audio file uploaded successfully!");
                        $("*#selAudioBtn*").html("Select Audio File..");
                        $("*#selAudioBtn*").attr("class", "btn btn-primary btn-rounded");
                    }
                });
            }
        }
    });

    //Toastr Plugin Options
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    //End of Toastr Plugin Options
});
$(document).ready(function () {
    $(document).on('click', '#uploadButton', function () {
        var name = document.getElementById("convoFile").files[0].name;
        var businessId = document.getElementById("businessId").value;
        var contactId = document.getElementById("contactId").value;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (ext != 'mp3') {
            alert("Please upload an audio file.");
        } else {
            var f = document.getElementById("convoFile").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Audio File Size is very big");
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
                        alert("Audio file uploadead successfully!");
                    }
                });
            }
        }
    });
});
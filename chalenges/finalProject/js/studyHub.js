<!--Show the subtitles-->


function open_close(x) {
    if (x.style.display == "") {
        x.style.display = "none";
    } else if (x.style.display == "none") {
        x.style.display = "";
    }
};

function showContent(tb_small_type_id) {



    $.ajax({

        type: 'POST',
        url: 'leftshowMore.php',
        data: {
            "tb_small_type_id": tb_small_type_id
        },
        dataType: 'json',
        beforeSend: function () {
            $("#loading").empty();
            $("#loading").append("<li id='loading'>loading...</li>");
        },
        success: function (json) {

            var detail = eval(json);

            $.each(json, function (index, item) {
                var tb_forum_small_type_content_path = json[index].tb_forum_small_type_content_path;
                var tb_small_type_file_path = "<embed id='pdfSupport' src='" + tb_forum_small_type_content_path + "' type='application/pdf'/>";
                $("#loading").empty();
                $("#pdfSupport").remove();
                var mypdfSupport = document.getElementById("pdfContent")
                mypdfSupport.innerHTML = tb_small_type_file_path;
            });


        },
        complete: function () {

        },
        error: function (e) {

            alert("Error!" + e.responseText);
        }
    });
};

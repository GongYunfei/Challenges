var curPage = 1; //current page
var total, pageSize;
var totalPage;
//retrieve data from database
function getData(page) {
    $.ajax({
        type: 'POST',
        url: 'right.php',
        data: {
            'pageNum': page - 1
        },
        dataType: 'json',
        beforeSend: function () {
            $("#list ul").append("<li id='loading'>loading...</li>");
        },
        success: function (json) {
            $("#list ul").empty();
            total = json.total; //calculate the total records
            pageSize = json.pageSize; //records/page
            curPage = page; //current page
            totalPage = json.totalPage; //total pages
            var li = "";
            var list = json.list;
            $.each(list, function (index, array) {
                li += "<li class='ui-state-default'><a href='#' align='center'><img src='" + array['material_icon_path'] + "'></a><h2>" + array['material_description'] + "</h2></li>";
            });
            $("#list ul").append(li);
        },
        complete: function () {
            getPageBar();
        },
        error: function (e) {
            alert("Error!" + e.responseText);
        }
    });
}


function getPageBar() {

    if (curPage > totalPage) curPage = totalPage;

    if (curPage < 1) curPage = 1;
    pageStr = "<span>Total</span>" + total + "<span>Records</span> found in our database <span> </br></n>" + curPage + "/" + totalPage + "</span>";

    $("#pagecount").html(pageStr);
}

$(function () {
    getData(1);
    $(document).on('click', '#pagecount span a', function (event) {
        event.preventDefault();
        var rel = $(this).attr("rel");
        if (rel) {
            getData(rel);
        }
    });
});
$(document).ready(function () {
    $(".video-list li").click(function () {
        var obj = $(this);
        var vid = obj.attr("vid");
        $(".js_videoCon").hide();
        $("#js_videoCon_" + vid).show();
    });
});

$(function () {
    $(".videoController").draggable({
        snap: true,
        stack: ".videoController"
    });
});

$(function () {
    $("#sortable").sortable();
    $("#sortable").disableSelection();
});

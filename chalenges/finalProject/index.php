<!doctype html>
<!--

Date: 05/04/2019

-->

<!---------------------------------------------------------connect database------------------------------------------->
<?php include("conn/conn.php");
      
?>

------------------------------------------------------------------------------------------------------------------------
<html lang="en">
	
<head>
<!-- param, meta, styles, scripts -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>2830 StudyHub</title>
<link href="http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="jquery-ui-1.11.4.DotLuv/jquery-ui.min.css" rel="stylesheet">
<script src="jquery-ui-1.11.4.DotLuv/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4.DotLuv/jquery-ui.js"></script>
    
<!------------------------------------------------------------AJAX method getting data to refresh the webpage 获取数据以刷新网页的AJAX方法---------------------------------------->
<script> 
var curPage = 1; //current page
var total, pageSize;
var totalPage;
//retrieve data from database
//从数据库检索数据
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
    
//-----------------------------------------------------------------Dynamically play the video 动态播放视频--------------------------------------------------
$(document).ready(function () {
    $(".video-list li").click(function () {
        var obj = $(this);
        var vid = obj.attr("vid");
        $(".js_videoCon").hide();
        $("#js_videoCon_" + vid).show();
    });
});
//
//----------------------------------------------------------------Draggable and sortable 可拖动的,合适的---------------------------------------------------------
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
</script>

</head>
<body>
	
<header>
	
    <nav class="navBar navRight">
        <ul>
		    <li><img class="logo" src="images/studyHub.png" alt="studyHub" /></li>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="studyHub.php">StudyHub</a></li>
			<li><a href="materialHub.php">MaterialHub</a></li>
            <li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>    
</header>
<div class="wrapper">
	 <div class="sidebar">
		<img class="leftBarIcon" src="images/study-fuel-600.png">
		<div class="sBlock">
<!--Retrieve data from the database and show LeftBar 从数据库中检索数据并显示LeftBar-->
        <?php include("left.php");?>	
        </div>
<img src="images/pic1.jpg">
    </div> 
	
    <div class="contentBody">

        <embed id="js_videoCon_1" class="js_videoCon" src="flv/flv1.mp4">
        <embed id="js_videoCon_2" class="js_videoCon" style="display:none" src="flv/flv2.mp4">
        <embed id="js_videoCon_3" class="js_videoCon" style="display:none" src="flv/flv3.mp4">
		<embed id="js_videoCon_4" class="js_videoCon" style="display:none" src="flv/flv4.mp4">
		<embed id="js_videoCon_5" class="js_videoCon" style="display:none" src="https://www.youtube.com/embed/eIVEJ4MA4iw">
    
    <nav class="navBar navLeft">
        <ul class="video-list">
            <li class="videoController"  video="1" vid="1"><img class="functionSelect" src="images/modellingResource.png"></li>
            <li class="videoController"  video="2" vid="2"><img class="functionSelect" src="images/studyHubshow.png"></li>
			<li class="videoController"  video="2" vid="3"><img class="functionSelect" src="images/material.jpg"></li>
            <li class="videoController"  video="3" vid="4"><img class="functionSelect" src="images/success.png"></li>
			<li class="videoController"  video="4" vid="5"><img class="functionSelect" src="images/teaching.png"></li>
        </ul>
    </nav>

</div>
	 <div class="sidebarRight">
		 <img src="images/pic2.jpg">
		<div class="sBlock">
<!--Retrieve data from the database and show rightBar 从数据库检索数据并显示右栏-->
		   	<div id="list">
    	<ul id="sortable"></ul>
    </div>
   	<div id="pagecount"></div>	
       
        </div>

    </div> 
    <div class="clearfloat"></div>
</div>
	
<footer>
    <p class="copyright">Copyright &copy; <a href="https://github.com/helenwang1610">Honglei Wang's GitHub</a> 
    </p>
	
</footer>
</body>
</html>

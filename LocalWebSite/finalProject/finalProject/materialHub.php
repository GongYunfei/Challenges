<!doctype html>
<!--

Date: 05/04/2019


-->
<?php include("conn/conn.php");
	  include("loginCheckMH.php")
?>

<html lang="en">

<head>
    <!-- param, meta, styles, scripts -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2830 StudyHub</title>
    <link href="http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="css/materialHub.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.DotLuv/jquery-ui.min.css" rel="stylesheet">
    <script src="jquery-ui-1.11.4.DotLuv/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.DotLuv/jquery-ui.js"></script>

    <script>
        var curPage = 1; //current page
        var total, pageSize;
        var totalPage;
        var material_description;
        var material_icon_path;
        var material_file_path;
        var material_id;

        //retrieve data from database
        function getData(page) {
            $.ajax({
                type: 'POST',
                url: 'right.php',
                data: {
                    'pageNum': page - 1
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#list ul").append("<li id='loading'>loading...</li>");
                },
                success: function(json) {
                    $("#list ul").empty();
                    total = json.total; //calculate the total records
                    pageSize = json.pageSize; //records/page
                    curPage = page; //current page
                    totalPage = json.totalPage; //total pages
                    var li = "";
                    var list = json.list;
                    $.each(list, function(index, array) {
                        li += "<li><a href='#' align='center'><img src='" + array['material_icon_path'] + "' onclick=showMore('" + array['material_id'] + "')></a><h2>" + array['material_description'] + "</h2 ></li>";
                        console.log(array['material_id'])
                    });
                    $("#list ul").append(li);

                },
                complete: function() {
                    getPageBar();
                },
                error: function(e) {
                    alert("Error!" + e.responseText);
                }
            });
        }


        function getPageBar() {

            if (curPage > totalPage) curPage = totalPage;

            if (curPage < 1) curPage = 1;
            pageStr = "<p></p><p>Total(" + total + ")Records found in our database. " + curPage + "/" + totalPage + "</p>";


            //Page 1?
            if (curPage == 1) {
                pageStr += "<p>First Page<span><span>Previous Page</p>";
            } else {
                pageStr += "<p><a href='javascript:void(0)' rel='1'>First Page</a><span><span><a href='javascript:void(0)' rel='" + (curPage - 1) + "'>Previous Page</a></p>";
            }

            //Last Page?
            if (curPage >= totalPage) {
                pageStr += "<p>Next Page<span><span>Last Page</p>";
            } else {
                pageStr += "<p><a href='javascript:void(0)' rel='" + (parseInt(curPage) + 1) + "'>Next Page</a><span><span><a href='javascript:void(0)' rel='" + totalPage + "'><span> Last Page</a></p>";
            }

            $("#pagecount").html(pageStr);
        }

        $(function() {
            getData(1);
            $(document).on('click', '#pagecount span a', function(event) {
                event.preventDefault();
                var rel = $(this).attr("rel");
                if (rel) {
                    getData(rel);
                }
            });
        });
        $(function() {
            $("#tabs").tabs();
        });

        function showMore(material_id) {
            material_id = parseInt(material_id);

            $.ajax({
                type: 'POST',
                url: 'showMore.php',
                data: {
                    "material_id": material_id
                },
                dataType: 'json',
                beforeSend: function() {

                    $("#tabs-1").append("<li id='loading'>loading...</li>");
                },
                success: function(json) {

                    var detail = eval(json);
                    $.each(json, function(index, item) {
                        var material_description = json[index].material_description;
                        var material_icon_path = json[index].material_icon_path;
                        material_icon_path = "<img src='" + material_icon_path + "'>";
                        var material_file_path = json[index].material_file_path;
                        material_file_path = "<a id='downloadFile' href='" + material_file_path + "'><img id='#downLoad' src='images/download.png' align='right' /></a>";
                        $("#tabs-1").empty();
                        $("#tabs-2").empty();
                        $("#downloadFile").empty();
                        $("#tabs-1").append(material_description);
                        $("#tabs-2").append(material_icon_path);
                        $("#downloadFile").append(material_file_path);
                    });


                },
                complete: function() {

                },
                error: function(e) {
                    alert("Error!" + e.responseText);
                }
            });
        };

    </script>



</head>

<body>

    <!--********************************Header Area***************************************-->
    <header>

        <nav class="navBar navRight">
            <ul>
                <li><img class="logo" src="images/studyHub.png" alt="studyHub" /></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="studyHub.php">StudyHub</a></li>
                <li class="active"><a href="">MaterialHub</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!--********************************Main Wrapper***************************************-->

    <div class="wrapper">


        <!--********************************Left Side Bar Area***************************************-->
        <div class="sidebar">

            <div class="sBlock">
                <!--Retrieve data from the database and show contents-->
                <!--Read data from server dynamically refresh page -->
                <div id="list">

                    <ul></ul>
                </div>
                <div id="pagecount"></div>
            </div>
        </div>

        <!--********************************Content  Area***************************************-->
        <div class="contentBody centerPosition">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Description</a></li>
                    <li><a href="#tabs-2">Preview</a></li>
                </ul>
                <div id="tabs-1">
                </div>
                <div id="tabs-2">
                    <img src="">
                </div>
            </div>
            <a id="downloadFile" href=""></a>
        </div>


        <div class="clearfloat"></div>
    </div>
    <!--********************************Footer  Area***************************************-->
    <footer>
        <p class="copyright">
            Copyright &copy; <a class="copyright" href="https://github.com/helenwang1610">Honglei Wang's GitHub</a>
        </p>

    </footer>
</body>


</html>

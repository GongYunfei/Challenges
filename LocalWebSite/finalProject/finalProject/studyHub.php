<!doctype html>
<!--

Date: 05/04/2019

-->
<?php include("conn/conn.php");
      include("loginCheckSH.php")
?>

<html lang="en">

<head>
    <!-- param, meta, styles, scripts -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2830 StudyHub</title>
    <link href="http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="css/studyHub.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.DotLuv/jquery-ui.min.css" rel="stylesheet">
    <script src="jquery-ui-1.11.4.DotLuv/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.DotLuv/jquery-ui.js"></script>
    <script>
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
                url: 'detailsShow.php',
                data: {
                    "tb_small_type_id": tb_small_type_id
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#loading").empty();
                    $("#loading").append("<li id='loading'>loading...</li>");
                },
                success: function(json) {

                    var detail = eval(json);

                    $.each(json, function(index, item) {
                        var tb_forum_small_type_content_path = json[index].tb_forum_small_type_content_path;
                        var tb_small_type_file_path = "<embed id='pdfSupport' src='" + tb_forum_small_type_content_path + "' type='application/pdf'/>";
                        $("#loading").empty();
                        $("#pdfSupport").remove();
                        var mypdfSupport = document.getElementById("pdfContent")
                        mypdfSupport.innerHTML = tb_small_type_file_path;
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


    <header>

        <nav class="navBar navRight">
            <ul>
                <li><img class="logo" src="images/studyHub.png" alt="studyHub" /></li>
                <li><a href="index.php">Home</a></li>
                <li class="active"><a href="studyHub.php">StudyHub</a></li>
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

                <!--Retrieve data from the database and show LeftBar-->


                <?php 
				$query=mysqli_query($conn, "select * from tb_forum_big_type");
				while($myrow=mysqli_fetch_array($query)){  
					$querys=mysqli_query($conn, "select * from tb_forum_small_type where tb_big_type_content='$myrow[tb_big_type_content]'");
					$myrows=mysqli_fetch_array($querys);
			?>
                <table>
                    <tr>
                        <td class="leftBarTable" onClick="javascript:open_close(id_a<?php echo $myrow['tb_big_type_id'];?>)"><a href="#">
                                <?php echo $myrow['tb_big_type_content'];?></a>
                        </td>
                    </tr>
                </table>
                <table id="id_a<?php echo $myrow['tb_big_type_id'];?>" style="display:none">
                    <?php 
		$query_1=mysqli_query($conn, "select * from tb_forum_small_type where tb_big_type_content='$myrow[tb_big_type_content]' ");
		while($myrow_1=mysqli_fetch_array($query_1)){
	?>
                    <tr>
                        <td> </td>
                        <td class="leftBarSubtable" onClick="javascript:showContent('<?php echo $myrow_1['tb_small_type_id'];?>')">
                            <a href="#">
                                <img src="images/p.png">
                                <?php echo $myrow_1['tb_small_type_content'];?></a>
                        </td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td></td>
                    </tr>
                </table>
                <?php  }?>


            </div>
            <img src="images/pic1.jpg">
        </div>

        <div id="pdfContent" class="contentBody rightPosition">
            <ul>
                <li id="loading"></li>
            </ul>
            <embed id="pdfSupport" src="" />
        </div>

        <div class="clearfloat"></div>
    </div>
    <footer>
        <p class="copyright">
            Copyright &copy; <a href="https://github.com/helenwang1610">Honglei Wang's GitHub</a>
        </p>

    </footer>
</body>

</html>

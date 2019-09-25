<?php include("conn/conn.php");?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LeftSideBar</title>
    <!--    <link href="css/leftSideBarstyle.css" rel="stylesheet" type="text/css">-->
    <link href="http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="jquery-ui-1.11.4.DotLuv/jquery-ui.min.css" rel="stylesheet">
    <script src="jquery-ui-1.11.4.DotLuv/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.11.4.DotLuv/jquery-ui.js"></script>
</head>


<!--Show the subtitles-->

<script>
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
            beforeSend: function() {

                $("#pdfSupport").append("<li id='loading'>loading...</li>");
            },
            success: function(json) {

                var detail = eval(json);
                $.each(json, function(index, item) {
                    var tb_forum_small_type_content_path = json[index].tb_forum_small_type_content_path;
                    var tb_small_type_file_path = "<embed id='pdfSupport' src='" + tb_forum_small_type_content_path + "' type='application/pdf'/>";
                    $("#pdfSupport").empty();
                    $("#pdfSupport").append(tb_small_type_file_path);
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

<body>



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



</body>

</html>

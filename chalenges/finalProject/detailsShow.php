<?php

include("conn/conn.php");


$tb_small_type_id = empty($_POST['tb_small_type_id']) ? '' : $_POST['tb_small_type_id'];




$query = "select tb_forum_small_type_content_path from tb_forum_small_type where tb_small_type_id= '$tb_small_type_id'";
$result = mysqli_query($conn, $query);

$list = mysqli_fetch_all($result,MYSQLI_ASSOC);

$arr = content_path ($list);

mysqli_close($conn); 

echo $arr;

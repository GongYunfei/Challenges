<?php
header("Content-Type: text/html;charset=utf-8");
//error_reporting(E_ALL); 
//ini_set('display_errors', true);
//date_default_timezone_set("USA/Chicago");   
include("conn/conn.php");


$page = empty($_POST['pageNum']) ? '' : $_POST['pageNum'];
$query = "SELECT material_id FROM tb_forum_material";
$result = mysqli_query($conn, $query);
$total = mysqli_num_rows($result);


$pageSize = 6; // 8 records/page
$totalPage = ceil($total/$pageSize); //total pages


$startPage = $page*$pageSize;
$arr['total'] = $total;
$arr['pageSize'] = $pageSize;
$arr['totalPage'] = $totalPage;

$query = "select material_id,material_description,material_icon_path from tb_forum_material order by material_id asc limit $startPage,$pageSize";
$result = mysqli_query($conn, $query);
$list = mysqli_fetch_all($result,MYSQLI_ASSOC);

foreach ($list as $key => $val) {
    $arr['list'][] = array(
        'material_id' => $val['material_id'],
        'material_description' => $val['material_description'],
        'material_icon_path' => $val['material_icon_path'],
     );
}
mysqli_close($conn); 
echo json_encode($arr);
?>

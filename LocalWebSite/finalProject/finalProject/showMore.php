<?php
//header("Content-Type : text/html");
//error_reporting(E_ALL); 
//ini_set('display_errors', true);
//date_default_timezone_set("USA");   
include("conn/conn.php");

//define('DBHOST', 'localhost');
//define('DBNAME', 'db_forum');
//define('DBUSER', 'root');
//define('DBPWD', '');
//define('DBPREFIX', 'tb_');
//define('DBCHARSET', 'utf8');
//define('CONN', '');
//define('TIMEZONE', 'USA');

//try{
//    $db = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPWD);
//    echo "Connected!";
//    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    $db->query('SET NAMES utf8;');
//}catch(PDOException  $e ){
//    echo "Error: ".$e;
//}

$material_id = empty($_POST['material_id']) ? '' : $_POST['material_id'];





$query = "select material_description,material_icon_path,material_file_path from tb_forum_material where material_id= '$material_id'";
$result = mysqli_query($conn, $query);
$list = mysqli_fetch_all($result,MYSQLI_ASSOC);
$arr = json_encode($list);
mysqli_close($conn); 
echo $arr;

//    $arr[] = array(
//       
//        'material_description' => $list['material_description'],
//        'material_icon_path' => $list['material_icon_path'],
//        'material_file_path' => $list['material_file_paht'],
//     );
//
//
//echo json_encode($arr);
?>

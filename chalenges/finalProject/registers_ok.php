<?php include_once("conn/conn.php");
$tb_forum_user=trim($_POST['tb_forum_user']);
$sql=mysqli_query($conn, "select tb_forum_user from tb_forum_user where tb_forum_user='$tb_forum_user'");
$info=mysqli_fetch_array($sql);
if($info!=false){
  echo "<script language='javascript'>alert('Sorry, your username has been used, please choose another one!');history.back();</script>"; 
  exit; 
}
$tb_forum_user=trim($_POST['tb_forum_user']);
$tb_forum_pass=md5($_POST['tb_forum_pass']);
$tb_forum_truepass=$_POST['tb_forum_pass'];
$tb_forum_email=trim($_POST['tb_forum_email']);
$tb_forum_qq=trim($_POST['tb_forum_qq']);
$tb_forum_pass_problem=trim($_POST['tb_forum_pass_problem']);
$tb_forum_pass_result=trim($_POST['tb_forum_pass_result']);
$tb_forum_date=date("Y-m-d h:i:s");
$tb_forum_speciality=$_POST['tb_forum_speciality'];
$tb_forum_picture=$_POST['tb_forum_picture'];
$tb_forum_type=1;
$tb_forum_grade=10;
$query=mysqli_query($conn, "insert into tb_forum_user(tb_forum_user,tb_forum_pass,tb_forum_type,tb_forum_email,tb_forum_truepass,tb_forum_date,tb_forum_picture,tb_forum_qq,tb_forum_grade,tb_forum_pass_problem,tb_forum_pass_result,tb_forum_speciality) values('$tb_forum_user','$tb_forum_pass','$tb_forum_type','$tb_forum_email','$tb_forum_truepass','$tb_forum_date','$tb_forum_picture','$tb_forum_qq','$tb_forum_grade','$tb_forum_pass_problem','$tb_forum_pass_result','$tb_forum_speciality')");
if($query==true){ 
	$_SESSION["tb_forum_user"] = null;
	unset($_SESSION["tb_forum_user"] );
  	$_SESSION["tb_forum_user"]=$tb_forum_user; 	
	echo "<script>alert('Well done!');window.location.href='index.php';</script>";
}else{
  	echo "<script language='javascript'>alert('Sorry£¬register failure!');history.back();</script>"; 
  	exit;
}
?>
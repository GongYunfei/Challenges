<?php
//获取上传文件对应的字典
$fileInfo=$_FILES["upFile"];
print_r($fileInfo);
//获取上传文件的名称
echo "<br>";
$fileName=$fileInfo["name"];
echo $fileName;
//获取上传文件的临时保存路径
echo "<br>";
$filePath=$fileInfo["tmp_name"];
echo $filePath;
//移动文件
move_uploaded_file($filePath,"./source/".$fileName);
?>
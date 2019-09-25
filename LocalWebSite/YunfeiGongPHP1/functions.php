<?php
function sayHi($myFunction,$myName){
	
		      if($myFunction =='sayHi') {
				  if($myName){
						  echo 'Hi '.$myName.',what can I do for you?';
					}
			      else{
				          echo 'Hi,How about give me your name?';
			        }
			  
    }
}

function showList(){
	$file=fopen("list.txt","r")or exit("Unable to open file!");
	// 读取文件每一行，直到文件结尾
	while(!feof($file))
	{
		echo fgets($file). "<br>";
	}
	fclose($file);
}

function showTop($myFunction){
	if($myFunction){
					if($myFunction =='sayHi') {
						  echo 'You are using function:sayHi';
					} else if($myFunction =='showPic') {
							echo 'You are using function:showPic';
					} else if($myFunction =='showList') {
							echo 'You are using function:showList';
					}else if($myFunction =='hamming') {
							echo 'You are using function:hamming';
					}else if($myFunction =='hammingSeq') {
							echo 'You are using function:hammingSeq';
					}else if($myFunction =='Anagram') {
							echo 'You are using function:Anagram';
					}
				}
				 else {
					echo 'Welcome to my php app!';
				}
}

function showBottom($myFunction){
	if($myFunction =='sayHi'){
				sayHi($myFunction,$_GET['myName']);
			}else if($myFunction =='showPic'){
				echo '<img src="cool.jpg">';
			}else if($myFunction =='showList'){
				showList();
			}else if($myFunction =='hamming'){
				
			}else if($myFunction =='hammingSeq'){
				
			}else if($myFunction =='Anagram'){
				$anagram=new anagrams;
				$flag=$anagram->justAnagram($_GET['a'],$_GET['b']);
					if($flag){
						echo 'an anagram!';
					}else{
						echo 'not an anagram!';
					}
				
			}
}
/*

class anagrams {
	
//定义字符偏移量
$alpha=array(
              array('a','A'),
              array('b','B'),
              array('c','C'),
              array('d','D'),
              array('e','E'),
              array('f','F'),
              array('g','G'),
              array('h','H'),
              array('i','I'),
              array('j','J'),
              array('k','K'),
              array('l','L'),
              array('m','M'),
              array('n','N'),
              array('o','O'),
              array('p','P'),
              array('q','Q'),
              array('r','R'),
              array('s','S'),
              array('t','T'),
              array('u','U'),
              array('v','V'),
              array('w','W'),
              array('x','X'),
              array('y','Y'),
              array('z','Z'),
              );
 
//获取串的第一个字符值
function firstValue($char){
    global $alpha;
    foreach($alpha as $key=>$set){
        if(in_array($char,$set)){
            return $key;
        }
    }
    return false;
}
 
//计算偏移量
function calcOffset($num,$min){
    return $num-$min;
}
 
//获取串的最小字符值,偏移量数组
function calcCond($str){
    if(!$str){
        return false;
    }else{
	    global $alpha;
	    $length=strlen($str);
	    $min=firstValue(substr($str,0,1));
	    $sort=array();
	    $sort[0]=$min;
	    for($i=1;$i<$length;$i++){
	        $temp=substr($str,$i,1);
		    foreach($alpha as $key=>$set){
		        if(in_array($temp,$set)){
			        if($key<=$min){
			            $min=$key;
			        }
			        $sort[]=$key;
			        continue;
		        }
		    }
	    }
	    if(sort($sort)){
	        if(array_map('calcOffset',$sort,array_fill(0,count($sort)-1,$min))){
	            return array($min,$sort);
	        }
	    }
        return false;
    }
}
 
//判断anagram
function justAnagram($a,$b){
    if($a===$b){
        return true;
    }else{
	    if(strlen($a)!=strlen($b)){
	        return false;
	    }else{
	        $rsA=calcCond($a);
	        $rsB=calcCond($b);
	        for($i=0;$i<count($rsA);$i++){
	            if($rsA[$i]!=$rsB[$i])
	                return false;
	        }
	        return true;
	    }
    }
}
	
}

*/
?>
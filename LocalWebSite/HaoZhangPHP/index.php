<!DOCTYPE html>

<!-- name: Hao Zhang
     date: 08/07/2019
 -->

<html lang="en">
    
 <head>
   
	 
    <title>My First PHP Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="HaoZhangPHP.css">
     
 </head>
    
 <body>
     
 <?php
      
     //index.php should have a landing page with some text
     //error check to make sure all necessary parameters are correct
     
     if(isset($_GET['myFunction'])){
       $fna = $_GET['myFunction'];
}
     else
     {$fna = 0;}
    
    /*
    
    
    */
     
    if(!$fna){
        echo "<div class='wrapper'>";
        echo "<h1 class='showFunctionName'>Welcome to my first php app</h1>";
        echo "<br>";
        echo "</div>";
    }
     else{
         echo "<div class='wrapper'>";
         echo "<h1 class='showFunctionName'>You are using funtion: {$fna}</h1>";
         echo "<br>";
         echo "</div>";
     
     
     //sayHi
         
     if (!strcmp($fna, "sayHi")){
         
         sayHi();
         
         
    }
    
    //showPic
    else if (!strcmp($fna, "showPic")){
        
        showPic();
       
        
    }
    
    //showList
    else if (!strcmp($fna, "showList")){
        
        showList();
      
    }
         
    //hamming
    else if (!strcmp($fna, "hamming")){
        
        //error check to make sure x input and  a number.
        
        if (isset($_GET['x'])){
            $x = $_GET['x'] +0;
            if (is_numeric($x)){
                  
                if (hamming($x)==1){
                    echo "<div class='wrapper'>";
                    echo "{$_GET['x']} is a Hamming Number.";
                    echo "</div>";
                    }
                    else{
                        echo "<div class='wrapper'>";
                        echo "{$_GET['x']} is not a Hamming Number.";
                        echo "</div>";
                    }
            }
                else {
                    echo "<div class='wrapper'>";
                    echo "{$x} is not a number!";
                    echo "</div>";
                }
        }
            else {
                echo "<div class='wrapper'>";
                echo "Please input x!";
                echo "</div>";
            }
    }
    
    //hammingSeq
    else if (!strcmp($fna, "hammingSeq")){
        
        //error check to make sure x input and  a number.
        
        if (isset($_GET['x'])){
            $x = $_GET['x'] + 0;
            if (is_numeric($x)){
                hammingSeq();}
                else {
                    echo "<div class='wrapper'>";
                    echo "{$x} is not a number!";
                    echo "</div>";
                }
        }
            else {
                echo "<div class='wrapper'>";
                echo "Please input x!";
                echo "</div>";
            }
    }
    
    //Anagram
    else if (!strcmp($fna, "anagram")){
       
       anagram();
           
    }

    //Undefined function
     else{
          echo "<div class='wrapper'>";
          echo "'$fna' is an undefined function!";
          echo "<br>";
          echo "Please input the funciton name again!";
          echo "</div>";
     }
    }
     
function sayHi(){
    
         echo "<div class='wrapper'>";
         //error check to make sure all necessary parameters are correct
         if(isset($_GET['myName']))
           {$myName = $_GET['myName'];
            echo "<h3>Hi, $myName. What can I do for you?</h3>";
            echo "<br>";
            echo "</div>";
           }
         else 
           {
             echo "<h3> Hi. How about you give me your name?</h3>";
             echo "</div>";
          }
         
}
     
 function hamming ($i){
     
     do{

         if ($i%2==0){
       
             $i = $i/2;
            
         }
         elseif ($i%3==0){
   
             $i = $i/3;
            
         }
         elseif ($i%5==0){

             $i = $i/5;
            
         }
         else{
             $i = -1;
         }

         
     }while(($i!=1)&&($i!=-1));
     
     return $i;
    
  }
     
 function hammingSeq(){
     
     if (hamming($_GET['x'])==1){
          echo "<div class='wrapper'>";
          for ($i=2;$i<=$_GET['x'];$i++)
          {
           if ((hamming($i)==1)&&($i!=$_GET['x'])){
             echo "{$i},";
                }
              elseif(hamming($i)==1)  {
                  echo "{$i}";
              }
          }
          echo "</div>";
     }
     else
     {
         echo "<div class='wrapper'>";
         echo "{$_GET['x']} is not a Hamming Number.";
         echo "</div>";
     }
         
    
   
 }
     
function showPic(){
    
    if(file_exists("cool.gif")) {
    echo "<div class='wrapper'>";
    echo '<img src="cool.gif" />';
    echo "</div>";
    }
    else {
        echo "<div class='wrapper'>";
        echo '"cool.gif" does not exist!';
        echo "<br>";
        echo 'Cannot Open "cool.gif"';
        echo "</div>";
    }
}
     
function showList(){
    
    ////error check to make sure the file can be open
    
    if (file_exists("list.txt"))
    {
      $myfile = fopen("list.txt", "r");
      echo "<div class='wrapper'>";
      echo "<ul>";
      while($content = fgets($myfile)){
        echo "<li>";
        echo $content;
        echo "</li>";
    }
    fclose($myfile);
     echo "</ul>";
     echo "</div>";
    }
    else {
        echo "<div class='wrapper'>";
        echo '"list.txt" does not exist!';
        echo "<br>";
        echo 'Cannot Open "list.txt"!';
        echo "</div>";
    }
}

 function anagram(){

     //error check to make sure all necessary parameters are correct
        
        if (isset($_GET['a'])&&isset($_GET['b'])){
            $a = $_GET['a'];
            $b = $_GET['b'];
            $aLength = strlen($a);
            $bLength = strlen($b);
            $is_Anagram = 1;
            if ($aLength == $bLength){
                for ($i=0;$i<$aLength-1;$i++)
                {
                  if ($a[$i]!=$b[$i+1]){
                      $is_Anagram = 0;
                  }
                if ($a[$aLength-1]!=$b[0]){
                      $is_Anagram = 0;
                  }
                }
            }
            else {
                $is_Anagram = 0;
                echo "<div class='wrapper'>";
                echo "{$a} 's length is not the same as {$b} 's!";
                echo "<br>";
                echo "The two strings are not anagram!";
                echo "</div>";
                }
            }
            
        
            else {
                echo "<div class='wrapper'>";
                echo "Please input the two words  correctly!";
                echo "</div>";
            }
          if ($is_Anagram == 1) {
                echo "<div class='wrapper'>";
                echo "{$a} and {$b} are anagram!";
                echo "</div>";
              }
              else {
                  echo "<div class='wrapper'>";
                echo "{$a} and {$b} are not anagram!";
                echo "</div>";
              }
    }
     
     
 
     
    ?> 
     
 </body>
</html>
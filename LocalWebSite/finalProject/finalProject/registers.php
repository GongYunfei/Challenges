<!doctype html>
<!--

Date: 05/04/2019

-->
<html lang="en">
<head>
	
<head>
<!-- param, meta, styles, scripts -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">	

<title>Registration</title>
<link href="http://fonts.googleapis.com/css?family=Coda|Oranienbaum|Amarante" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">

<link href="jquery-ui-1.11.4.DotLuv/jquery-ui.min.css" rel="stylesheet">
	
<link href="css/register.css" rel="stylesheet" type="text/css">
<script src="jquery-ui-1.11.4.DotLuv/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4.DotLuv/jquery-ui.js"></script>
</head>

<body>
	
<header>
	<img class="logo" src="images/studyHub.png" alt="studyHub"/>
</header>

<div class=" wrapper w100">
	
		<h2 class="ui-widget-header">Register Center</h2>
	<div class="registerTable ui-widget-content">
       <table class="registerTable">
    <script>
function check_email(tb_forum_email){
	var str=tb_forum_email;
	var Expression=/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; 
	var objExp=new RegExp(Expression);
	if(objExp.test(str)==true){
		return true;
	}else{
		return false;
	}
}
function check_input(form){		    
	if(form.tb_forum_user.value==""){
		alert("Please fill in the username！");
		form.tb_forum_user.select();
		return(false);
	}
	if(form.tb_forum_pass.value==""){
		alert("Please fill in the password！");
		form.tb_forum_pass.focus();
		return(false);
	}
	if(form.tb_forum_email.value==""){
	    alert("Please fill in the email address!");
	    form.tb_forum_email.select();
	    return(false);
	}
	if(!check_email(form.tb_forum_email.value)){
	    alert("Please fill in the correct email!");
	    form.tb_forum_email.focus();
	    return(false);
	}
	if(form.tb_forum_qq.value==""){		
		alert("Please fill in your QQ number!");
		form.tb_forum_qq.select();
		return(false);			
	}
	if(isNaN(form.tb_forum_qq.value)==true){			
		alert("QQ number is made of numbers!");
		form.tb_forum_qq.select();
		return(false);
	}		   
	if(form.tb_forum_pass_problem.value==""){			
		alert("Please choose your password recovery questions!");
		form.tb_forum_pass_problem.focus();
		return(false);
	}
	if(form.tb_forum_pass_result.value==""){			
		alert("Please fill in the password recovery question!");
		form.tb_forum_pass_result.select();
		return(false);
	}
	if(form.tb_forum_validate.value==""){
		alert("Please fill in the verification code!");
		form.tb_forum_validate.select();
		return(false);			
	}
	if(form.num.value!=form.tb_forum_validate.value){
		alert("Your verification code is not correct, please input again!");
		form.num.select();
		return(false);			
	}		    
	return(true);
}
</script>
    <form action="registers_ok.php" method="post" name="form1" id="form1" onSubmit="return check_input(form1)">
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="cellText">username: </td>
            <td colspan="2">&nbsp;
                <input name="tb_forum_user" type="text" class="inputcss" id="tb_forum_user" size="55" />
                &nbsp;</td>
        </tr>
        <tr>
            <td class="cellText">password: </td>
            <td colspan="2">&nbsp;
                <input name="tb_forum_pass" type="password" id="tb_forum_pass" size="55"></td>
        </tr>
        <tr>
            <td class="cellText">email: </td>
            <td colspan="2">&nbsp;
                <input name="tb_forum_email" type="text" id="tb_forum_email" size="55" />
                &nbsp;(Please input correct email address!)</td>
        </tr>
        <tr>
            <td class="cellText">QQ: </td>
            <td colspan="2">&nbsp;
                <input name="tb_forum_qq" type="text" id="tb_forum_qq" size="55" />
                &nbsp;(QQ is made up of numbers!)</td>
        </tr>
        <tr>
            <td class="cellText">Choose your role icon:</td>
            <td class="cellText">&nbsp;
                <select name="tb_forum_picture" id="tb_forum_picture" onChange="javascript:tb_user_face.src=this.value">
                    <?php
					  for($i=0;$i<=11;$i++){
					  ?>
                    <option value="<?php echo "images/face/".$i.".gif"?>"><?php echo $i.".gif"?></option>
                    <?php
					  }
					  ?>
                </select></td>
            <td><img id=tb_user_face src="images/face/0.gif"></td>
        </tr>
        <tr>
            <td class="cellalignRight">Password recovery question:</td>
            <td colspan="2">&nbsp;
                <select name="tb_forum_pass_problem" id="tb_forum_pass_problem">
                    <option value="" selected="selected">Please choose a question</option>
                    <option value="What is your first school?">What's your first school?</option>
                    <option  value="What is your favourite sport?">What's your favourite sport?</option>
                    <option value="Who is your lover?">Who is your lover?</option>
                    <option value="What is your favourite novel?">What's your favourite novel?</option>
                    <option value="What is your favourite song?">What's your favourite song?</option>
                    <option value="Who is cs2830 teacher?">Who is cs2830 teacher?</option>
                    <option value="Where are you?">Where are you?</option>
                    <option value="What does MU mean?">What does MU mean?</option>
                    <option value="Who is your dad?">Who is your dad?</option>
                    <option value="What is your cs2830 grade?">What's your cs2830 grade?</option>
                </select></td>
        </tr>
        <tr>
            <td class="cellalignRight">Your answer: </td>
            <td colspan="2">&nbsp;
                <input name="tb_forum_pass_result" type="text" id="tb_forum_pass_result" size="55" />
                &nbsp;(Please remember your answer for recovering your passwor!)</td>
        </tr>
        <tr>
            <td><div class="cellalignRight">About yourself: </div></td>
            <td colspan="2">&nbsp;
                <textarea name="tb_forum_speciality" cols="70" rows="10" id="tb_forum_speciality"></textarea></td>
        </tr>
        <tr>
            <td class="cellText">verification code: </td>
            <td colspan="2"><table class="verificationTable">
                    <tr>
                        <td class="cell251">&nbsp;
                            <input name="tb_forum_validate" type="text" id="tb_forum_validate" size="30" /></td>
                        <td class="cell149" rowspan="2"><?php
							   $num=intval(mt_rand(1000,9999));
							   
							   for($i=0;$i<4;$i++)
							   {
							    echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
							   }
							?>
                            <input type="hidden" value="<?php echo $num;?>" name="num" /></td>
                    </tr>
                    <tr>
                        <td align="left">&nbsp;</td>
                    </tr>
                </table></td>
        </tr>
        <tr> <td colspan="3">
            <div class="registerButton">
                    <input class="ui-button-text buttonWidth" type="submit" name="submit"  value="submit" />
                    &nbsp;&nbsp;
                    <input class="ui-button-text buttonWidth" name="reset" type="reset"  value="reset" />
                </div>
			</td> </tr>
    </form>
</table>
	</div>
	<div class="clearfloat"></div>
	
	</div>
	<footer>
    <p class="copyright">Copyright &copy; <a href="https://github.com/helenwang1610">Honglei Wang's GitHub</a> 
    </p>
	
</footer>
</body>
</html>

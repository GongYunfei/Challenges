//改变标题
function changeTitle(){
    var title,a,b;
    title=prompt("请问想把网页的标题改成什么?"); 
    a=document.getElementById("h1");
	b=document.getElementById("tt");
    a.textContent=title;
    b.textContent=title;
}
//双击CSS自动显示           
function changeCss(){
    var a;
    a=document.getElementById("css");
    a.value="h2 {\ncolor: #FF6F61; \ntext-align: center;\n}\n\np {\n font-family: helvetica; \n font-size: 20px; \n border: 2px solid red; \n border-radius: 12px;\n}";
}
//双击HTML自动显示           
function changeHtml(){
    var a;
    a=document.getElementById("html");
    a.value="<h2> Welcome to my text editor!</h2>\n\n<p>You can test and create your own HTML and CSS in this text editor</p>";
}
//点击CSS按钮           
function tranCss(){
    var stylenewcreate = document.getElementById("styles");
    if(!stylenewcreate.innerHTML){
		if(document.getElementById("css").value != ""){
                stylenewcreate.innerHTML = document.getElementById("css").value; 
				}
                }
        else
            {
             stylenewcreate.innerHTML = "";
			 document.getElementById("toggle").style.backgroundColor="lightseagreen";		
            }
}
//点击HTML按钮            
function tranHtml(){
    var a,b;
    a=document.getElementById("html").value;
    b=document.getElementById("xsq");
    b.innerHTML = a;
}
//删除按钮功能
function del(){   
    var a = document.getElementById('xsq');
	var b = document.getElementById('html');
	var c = document.getElementById('css');
    a.innerHTML="";
	b.value="";
	c.value="";
	
}
//获得焦点时改变阴影和背景颜色            
function changeColor(a){
	
	a.style.boxShadow="0px 0px 10px 5px blue";
	a.style.backgroundColor="yellow";
}
//失去焦点时恢复阴影和背景颜色 
function recoverColor(b){
	
	b.style.boxShadow="0px 0px 10px 5px #aaa";
	b.style.backgroundColor="white";
}
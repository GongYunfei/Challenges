function obj2str(obj){
	obj.t=new Date().getTime();
	var res=[];
	for(var key in obj){
		res.push(key+"="+obj[key]);
	}
	return res.join("&");
}





function ajax(url,obj,success,error){
	            var str=obj2str(obj);
	            //创建异步对象
				var xmlhttp;
				//设置浏览器兼容
				if(window.XMLHttpRequest){
					//专门针对高版本浏览器
					xmlhttp=new XMLHttpRequest();
				}
				else{
					//专门针对低版本浏览器
					//xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				//设置请求方式和地址,为使浏览器GET方法获取实时更新数据，加入参数t=？
				xmlhttp.open("GET",url+"?"+str,true);
				//发送请求
				xmlhttp.send();
				//监听状态变化
				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState===4){
						//判断请求是否成功
						if(xmlhttp.status>=200&&xmlhttp.status<300||xmlhttp===304){
							//处理返回结果
							success(xmlhttp);
						}
						else{
							error(xmlhttp);
						}
						
					}
				}
}
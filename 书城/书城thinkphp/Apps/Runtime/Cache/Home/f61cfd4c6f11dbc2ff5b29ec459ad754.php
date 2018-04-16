<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>注册</title>
	<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css"/>
	<link rel="stylesheet" href="../../../Public/css/register.css" />
</head>
<body>
		<header>
	<div class="box">
		<span class="logo">书吧</span>
		<ul class="nav">
			<li class="home" id="home"><a href="###">网站首页</a></li>
			<li><a href="###">关于我们</a></li>
			<li><a href="###" id="show">图书展示</a></li>
			<li><a href="###">联系我们</a></li>
			<li><a href="###" id="car">购物车</a></li>
			<li class="add" id="add"><a href="###">添加图书</a></li>
		</ul>
	</div>
</header>
	<div class="wrap">
		<h1>注册</h1>
		<form action="" method="post" id="form">
			<input type="text" placeholder="用户名" class="user" name="b_login_name"/><br />
			<input type="password" placeholder="密码" class="pass" name="b_login_password"/><br />
			<input type="button" value="登陆" id="btn1"/>
			<input type="button" value="注册" id="btn"/>
		</form>
		
	</div>
	
	<footer>
	<ul class="help">
		<li>免费条款</li>
		<li>隐私保护</li>
		<li>咨询热点</li>
		<li>联系我们</li>
		<li>公司简介</li>
		<li>批发方案</li>
		<li>配送方式</li>
	</ul>
	<p>©2016-2999 SSS版权所有，并保留所有权利</p>
	
</footer>
</body>
<script src="../../../Public/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
	$("#add").on("click",function(){
			window.location.href = "../Add/addBook.html";
			
		})
		$("#home").on("click", function() {
			window.location.href = "../Main/main.html";
		})
	$("#show").on("click",function(){
		window.location.href = "../Show/books.html";
	})
	$("#btn").on("click",function(){
			var form =document.getElementById("form");
			var formData = new FormData(form);
			
//			form.append("c_name","luxp");
			$.ajax({
				type:"post",
				url:"<?php echo U("Home/Login/register");?>",
				async:true,
				dataType:"json",
				data:formData,
				contentType:false,//禁止jq修改数据类型
				processData:false,//禁止jq修改数据编码
				success:function(data){
					alert(data);
					if(data=="注册成功"){
						window.location.href = "../Main/main.html";
					}
					
				}
			});
		})
	$("#btn1").on("click",function(){
		window.location.href = "../Main/main.html";
	})
</script>
</html>
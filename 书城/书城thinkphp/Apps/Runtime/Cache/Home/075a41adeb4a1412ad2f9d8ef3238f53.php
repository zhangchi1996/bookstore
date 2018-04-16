<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>登录</title>
		<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css" />
		<link rel="stylesheet" href="../../../Public/css/home.css" />
		<style type="text/css">
			#userMess{
	display: none;
				position: absolute;
				right: 100px;
				top: 5px;
			}
		</style>
	</head>
	
	<body>
		<header>
			<div class="box">
				<span class="logo">书吧</span>
				<ul class="nav">
					<li class="home" id="home">
						<a href="###">网站首页</a>
					</li>
					<li>
						<a href="###">关于我们</a>
					</li>
					<li>
						<a href="###" id="show">图书展示</a>
					</li>
					<li>
						<a href="###">联系我们</a>
					</li>
					<li>
						<a href="###" id="car">购物车</a>
					</li>
					<li class="add" id="add">
						<a href="###">添加图书</a>
					</li>
					<li id="userMess">
						欢迎，<span id="user"></span>，<span id="quit">退出</span>
					</li>
				</ul>
			</div>
		</header>

		<div class="wrap">
			<div class="rBox" id="login_box">
				<h2>快速登录</h2>
				<form action="" method="post" id="form">
					<input class="text" type="text" name="b_login_name" placeholder="用户名" class="user" />
					<br>
					<input class="text" type="password" name="b_login_password" placeholder="密码" class="pass">
					<br>
					<input id="btn1" type="button" name="act" value="登录" />
					<input id="btn2" type="button" value="注册" />
				</form>

			</div>
			<div class="lBox">
				<h1>我的书城</h1>
				<p>
					这里拥有世界各地的书籍，只有你想不到，没有我们这里没有的图书。
				</p>
				<img src="../../../Public/img/1.jpeg" alt="images" />
			</div>
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
<script src="../../../Public/js/function.js" type="text/javascript" charset="utf-8"></script>
	
	<script type="text/javascript">
		var btn1 = document.querySelector("#btn1");
		var btn2 = document.querySelector("#btn2");
	
		btn2.onclick = function(){
			window.location.href = "../Login/registerHtml.html";
		}
	
		$("#quit").on("click",function(){
			window.location.href = "../Main/main.html";
			
			$.ajax({
				type:"post",
				url:"<?php echo U("Home/Main/quit");?>",
				async:true,
				data:{},
				success:function(data){
//					console.log(data);
				}
			});
		});
		$("#btn1").on("click",function(){
			var form =document.getElementById("form");
			var formData = new FormData(form);
//			form.append("c_name","luxp");
			$.ajax({
				type:"post",
				url:"<?php echo U("Home/Main/login");?>",
				async:true,
				dataType:"json",
				data:formData,
				contentType:false,//禁止jq修改数据类型
				processData:false,//禁止jq修改数据编码
				success:function(data){
					if (data[1]!="") {
						$("#userMess").css("display","block");
						$("#user").html(data[1]["b_login_name"]);
						$("#login_box").css("display","none");
						
					}
				}
			});
		})
		$.ajax({
			type: "post",
			url: "<?php echo U("Home/Add/is_login");?>",
			async: true,
			data: {},
			success: function(data) {
				if(data!=""){
					if(data["b_login_name"]) {
						$("#userMess").css("display", "block");
						$("#user").html(data["b_login_name"]);
						$("#login_box").css("display", "none");
					}else{
						$("#userMess").css("display", "none");
						$("#login_box").css("display", "block");
					}
				}else{
					$("#userMess").css("display", "none");
					$("#login_box").css("display", "block");
				}
				
			}
		});
		
	</script>
</html>
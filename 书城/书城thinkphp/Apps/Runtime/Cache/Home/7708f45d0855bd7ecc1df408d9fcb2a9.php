<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<title>Document</title>
		<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css"/>
		<link rel="stylesheet" type="text/css" href="../../../Public/css/add.css" />
		<link rel="stylesheet" href="../../../Public/css/show.css" />
		<style type="text/css">
			#userMess {
				display: none;
				position: absolute;
				right: 100px;
				top: 5px;
			}
			#showPic{
				height: 400px!important;
			}
		</style>
	</head>

	<body>
		<header>
			<div class="box">
				<span class="logo">书吧</span>
				<ul class="nav">
					<li class="home">
						<a href="###" id="home">网站首页</a>
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
					<li class="add">
						<a href="###" id="add">添加图书</a>
					</li>
					<li id="userMess">
						欢迎，<span id="user"></span>，<span id="quit">退出</span>
					</li>
				</ul>
			</div>
		</header>

		<div class="wrap">
			<div class="rBox">
				<h2 id="b_booklist_name"></h2>
				<p id="b_booklist_summery"></p>
				<ul class="intro">
					<li>作者：<span id="b_booklist_author"></span></li>
					<li>出版社：<span id="b_booklist_bookconcern"></span></li>
					<li>出版时间：<span id="b_booklist_time"></span></li>
					<li>国际标准书号ISBN：<span id="b_booklist_isbn"></span></li>
					<li>友情价格：<span id="b_booklist_price"></span></li>
				</ul>
				<a href="###" id="addnum">加入购物车</a>
				<a href="###" id="buy">购买</a>
			</div>
			<img src='' alt="book" id="showPic"/>
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
	<script src="../../../Public/js/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../../../Public/js/function.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
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
		
		$.ajax({
			type: "post",
			url: "<?php echo U("Home/Show/showlist");?>",
			async: true,
			success: function(data) {
				if(data != "") {
					$("#showPic").attr("src","../../../uploads/"+data[0]["b_booklist_pic"]);
					$('#b_booklist_name').html(data[0]["b_booklist_name"]);
					$('#b_booklist_time').html(data[0]["b_booklist_time"]);
					$('#b_booklist_author').html(data[0]["b_booklist_author"]);
					$('#b_booklist_bookconcern').html(data[0]["b_booklist_bookconcern"]);
					$('#b_booklist_isbn').html(data[0]["b_booklist_isbn"]);
					$('#b_booklist_summery').html(data[0]["b_booklist_summery"]);
					$('#b_booklist_price').html(data[0]["b_booklist_price"]);
				}
//				console.log(data);
			}
		});
		$("#quit").on("click", function() {
			window.location.href = "../Main/main.html";

			$.ajax({
				type: "post",
				url: "<?php echo U("Home/Main/quit");?>",
				async: true,
				data: {},
				success: function(data) {
					//					console.log(data);
				}
			});
		});
		$("#addnum").on("click",function(){
			var str = $("#showPic").attr("src");
			str = str.replace("../../../uploads/","");
			$.ajax({
				type: "post",
				url: "<?php echo U("Home/Car/addToCar");?>",
				async: true,
				data: {
					"b_car_bookname":$('#b_booklist_name').html(),
					"b_car_pic":str,
					"b_car_price":$('#b_booklist_price').html()
					
				},
				success: function(data) {
					if(data =="有用户"){
						alert("添加成功");
					}else{
						alert("请先登录");
						window.location.href = "../Main/main.html";
					}
				}
			});
		})
		$("#buy").on("click",function(){
			var str = $("#showPic").attr("src");
			str = str.replace("../../../uploads/","");
			console.log(str);
			$.ajax({
				type: "post",
				url: "<?php echo U("Home/Car/addToCar");?>",
				async: true,
				data: {
					"b_car_bookname":$('#b_booklist_name').html(),
					"b_car_pic":str,
					"b_car_price":$('#b_booklist_price').html()
				},
				success: function(data) {
					if(data =="有用户"){
						window.location.href = "../Car/carlist.html";
					}else{
						alert("请先登录");
						window.location.href = "../Main/main.html";
					}
					
				}
			});
			
		})
		
			
	
	</script>
</html>
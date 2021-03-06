<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>购物车</title>
	<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css"/>
	<link rel="stylesheet" href="../../../Public/css/shopping.css" />
	<style type="text/css">
		.wrap{
			low;
			margin: 50px auto;
			width: 1000px;
			text-align: center;
		}
		.list{
			border: 3px solid #EEE8E3;
		}
		table{
			margin: 10px auto 50px;
			width: 950px;
		}
		th:first-child{
			width: 200px;
		}
		th:nth-child(2){
			width: 300px;
		}
		img{
			width: 70px;
		}
		.active{
			border-color: red;
		}
		#userMess {
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
			<li class="home" ><a href="###" id="home">网站首页</a></li>
			<li><a href="###">关于我们</a></li>
			<li><a href="###" id="show">图书展示</a></li>
			<li><a href="###">联系我们</a></li>
			<li><a href="###" id="car">购物车</a></li>
			<li class="add" ><a href="###" id="add">添加图书</a></li>
			<li id="userMess">
				欢迎，<span id="user"></span>，<span id="quit">退出</span>
			</li>
		</ul>
	</div>
</header>
		
	<div class="wrap">
		<h1>购物车</h1>
		<div class="list">
			<table border="1" cellspacing="0" bordercolor="#ccc" id="tab">
				<tr class="first">
					<th>图书</th>
					<th>书名</th>
					<th>数量</th>
					<th>单价</th>
					<th>删除</th>
				</tr>
				
				
			</table>
			<span>数量：</span><span class="allNum"></span><span>个</span>
			<span style="margin-left: 40px;">总价：￥</span><span class="allPrice"></span>
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
		$.ajax({
		type: "post",
		url: "<?php echo U("Home/Car/showCar");?>",
		async: true,
		data: {},
		success: function(data) {
			var str="";
			for (i in data) {
//				console.log(data[i].b_car_pic);
				str+="<tr class=''><td><img src='../../../uploads/"+data[i].b_car_pic+"'/></td><td>"+data[i].b_car_bookname+"</td>"+
				"'<td><span class='num' id='n'>"+data[i].b_car_booknum+"</span>本</td><td class='price'>"+data[i].b_car_price+"</td><td><button class='del' onclick='quitCar("+data[i].b_car_bookid+")'>删除</button></td></tr>";
				
			}
			$("#tab").append(str);
		}
		});
//		allNums();
	
	var timer = setInterval(allPrice,100);
//	run();

	function allPrice(){
		var prices = document.getElementsByClassName("price");
		var nums = document.getElementsByClassName("num");
		var a=0;
		var b=0;
		for (var i=0;i<nums.length;i++) {
			a+=Number(nums[i].innerText);
			b+=Number(prices[i].innerText)*Number(nums[i].innerText);
		}
		$(".allNum").text(a);
		
		$(".allPrice").text(b);
	}
	function quitCar(id){
		
			$.ajax({
				type: "post",
				url: "<?php echo U("Home/Car/quitCar");?>",
				async: true,
				data: {
					"b_car_bookid":id
				},
				success: function(data) {
					window.location.href = "../Car/carlist.html";
				}
			});
	}

</script>
</html>
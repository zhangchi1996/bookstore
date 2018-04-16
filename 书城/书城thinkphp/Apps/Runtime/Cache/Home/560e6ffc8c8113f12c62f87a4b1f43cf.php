<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<title>添加图书</title>
		<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css" />
		<link rel="stylesheet" href="../../../Public/css/home.css" />
		<style type="text/css">
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
					<li class="home" id="home">
						<a href="###">网站首页</a>
					</li>
					<li>
						<a href="###">关于我们</a>
					</li>
					<li id="show">
						<a href="###">图书展示</a>
					</li>
					<li>
						<a href="###">联系我们</a>
					</li>
					<li id="car">
						<a href="###">购物车</a>
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
			<h1>添加图书</h1>
			<form action="" method="post" id="form">
				<p>
					<label>书名：</label>
					<input type="text" placeholder="书名" name="b_booklist_name" />
				</p>
				<p>
					<label>简介：</label>
					<input type="text" placeholder="简介" name="b_booklist_summery" />
				</p>
				<p>
					<label>作者：</label>
					<input type="text" placeholder="作者" name="b_booklist_author" />
				</p>
				<p>
					<label>出版社：</label>
					<input type="text" placeholder="出版社" name="b_booklist_bookconcern" />
				</p>
				<p>
					<label>出版日期：</label>
					<input type="date" placeholder="出版日期" name="b_booklist_time" />
				</p>
				<p>
					<label>价格：</label>
					<input type="text" placeholder="价格" name="b_booklist_price" />
				</p>
				<p>
					<label>ISBN：</label>
					<input type="text" placeholder="ISBN" name="b_booklist_isbn"/>
				</p>
				<p>
					<label>书籍图片：</label>
					<input type="file" name="b_booklist_pic" />
				</p>
				<p>
					<label></label>
					<input type="button" value="添加" id="btn"/>
				</p>
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
		$("#btn").on("click",function(){
			var form =document.getElementById("form");
			var formData = new FormData(form);
			
			$.ajax({
				type:"post",
				url:"<?php echo U("Home/Add/add");?>",
				async:true,
				data:formData,
				contentType:false,//禁止jq修改数据类型
				processData:false,//禁止jq修改数据编码
				success:function(data){

//					console.log(data);
//					window.location.href = "../Show/books.html";
				}
			});
		})
	</script>

</html>
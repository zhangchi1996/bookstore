<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>网上书城</title>
	<link rel="stylesheet" type="text/css" href="../../../Public/css/common.css"/>
	<link rel="stylesheet" href="../../../Public/css/books.css" />
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
		<ul class="list" id="list">
			
		</ul>
		
		<div id="pages">
			
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
	function get(myurl){
		var str="";
		$("#list").html("");
		$.ajax({
		type: "post",
		url: myurl,
		async: true,
		data: {},
		success: function(datas) {
			
				var data = datas[0];
				for(i in data){
					str+="<li><div  class='book_mess'><img src='../../../uploads/"+data[i].b_booklist_pic+"' /></div><h2>"+data[i].b_booklist_name+"</h2><p><span>￥"+data[i].b_booklist_price+"</span><a href='###' class='addToCar'"+
					"onclick='getId("+data[i].b_booklist_id+")'>购买</a></p></li>";
				}
				$("#list").append(str);
				$("#pages").html(datas[1]);
			}
		});
	}
	get("<?php echo U("Home/Show/show");?>");
	$("#pages").on("click",function(e){
		get(e.target.href);
		return false;
	})
//	var str="";
//	$.ajax({
//		type: "post",
//		url: "<?php echo U("Home/Show/show");?>",
//		async: true,
//		data: {},
//		success: function(data) {
//		
//			for(i in data){
//				str+="<li><div onclick='getId("+data[i].b_booklist_id+")' class='book_mess'><img src='../../../uploads/"+data[i].b_booklist_pic+"' /></div><h2>"+data[i].b_booklist_name+"</h2><p><span>￥"+data[i].b_booklist_price+"</span><a href='###' class='addToCar'>加入购物车</a></p></li>";
//			}
//			$("#list").append(str);
////			getClassEle();
//		}
//	});
		
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
	
		function getId(a){	
//			window.location.href = "../Show/books_mess.html";
			$.ajax({
				type: "post",
				url: "<?php echo U("Home/Show/addid");?>",
				async: true,
				data: {
					"b_booklist_id":a
				},
				success: function(data) {
					window.location.href = "../Show/books_mess.html";
				}
			});
//			window.location.href = "../Show/books_mess.html";
		}
	
//			var book_mess = document.getElementsByClassName("book_mess");
//			 console.log(book_mess);
//			for (let i =0;i<book_mess.length;i++) {
//				book_mess[i].onclick = function(){
//				console.log(this.getAttribute("a"));
//				}
//			}
//var c = document.images;		//这是一个 HTMLCollection 对象
//var img0 = c.item(0);
//console.log(document.images)
		
</script>
</html>
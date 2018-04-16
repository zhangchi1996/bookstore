<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
	
	/*
	 * 在 thinkphp 中，类里面定义的方法称为 action
	 * Home 称为 module(模块)
	 * Controller 下面的类称为 controller(控制器)
	 * 模块 - 控制器 - action
	 * 要访问某个action，通过url传参访问
	 * 比如普通模式： http://localhost/index.php?m=Home&c=index&a=test
	 * mca这种参数是由框架作者自定义的。
	 * */
//	 public function test()
//	 {
//	 	echo "hello world";
//	 }
//	 /**
//	  * show - 访问后输出欢迎光临
//	  */
//	public function show()
//	{
//		echo "Welcome to my big_house !";
//	}
	/*
	 * 显示一个注册表单
	 * 
	 *  */
//	 public function register()
//	 {
//	 	# 显示一个表单，首先需要有一个视图
//	 	# display方法： 读取模板视图。使用数据填充后输出
//	 	$this->display("register");
//	 }
	 # 将聊天的搬过来
	 # 1. 新建一个Controller，命名chat
	 # 2. chatcontroller拥有一个index方法，用来显示首页
	 # 遵守规范：
	 # IndexController - 控制器，文件名由 IndexController + . + class + . + php 组成，
	 # 也就是说文件的第一部分就是控制器的名称，类名是class IndexController，在浏览器
	 # 地址栏里调用c，是c=Index(也就是去掉了后面的Controller)
	 
	 
}
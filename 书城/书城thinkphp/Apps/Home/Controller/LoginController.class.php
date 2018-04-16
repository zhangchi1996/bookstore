<?php
	namespace Home\Controller;
	use Think\Controller;
	use Home\Model\LoginModel;
	
	class LoginController extends Controller{
		public function _initialize() {
			$this->LoginModel = new LoginModel();
		}
		
		public function register(){
			session_start();
			if (IS_POST) { 
				$fields = array(
					"b_login_name" => 	I("post.b_login_name"),
					"b_login_password" => md5(I("post.b_login_password"))
				);
				$arr["b_login_name"]=I("post.b_login_name");
				$datas = $this->LoginModel->where($arr)->select();
//				print_r($datas);
				if(!empty(I("post.b_login_name"))){
					if(!empty($datas)){
						$mess= "用户名已存在";
					}else{
						
						$this->LoginModel->add($fields);
						$mess=  "注册成功";
					}
				} else {
					$mess=  "用户名为空";
				}
				$this->ajaxReturn($mess);
			} 
			$this->display("registerHtml");
		}
	}
?>
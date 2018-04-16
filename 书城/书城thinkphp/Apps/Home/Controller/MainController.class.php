<?php
namespace Home\Controller;
	use Think\Controller;
	use Home\Model\MainModel;
		class MainController extends Controller{
		public function _initialize() {
			$this->MainModel = new MainModel();
		}
		public function login(){
			session_start();
//			session_destroy();
			if(IS_POST){
				$u=I('Post.b_login_name');
            		$p=I('Post.b_login_password'); 
//          		echo $u;            
            		$data['b_login_name']=$u;
            		$data['b_login_password']=md5($p);   //md5加密
				$list=$this->MainModel->where($data)->find();
//				print_r($list);
				if($list){
					$_SESSION['b_login_name'] = I("post.b_login_name");
					$_SESSION['b_login_id'] = $list["b_login_id"]; 
//					print_r($_SESSION);
   					$message[1]=$_SESSION;
                    $message[0]= "登陆成功";
           		 }else{
           		 	$message[1]=$_SESSION;
                    $message[0] = "登陆失败";
           		 } 
           		 $this->ajaxReturn($message);
			}
			 $this->display("main");
			
		}
		public function is_login(){
			session_start();
			if($_SESSION!=""){
				$this->ajaxReturn($_SESSION);
			}
			$this->display("main");
		}
		public function quit(){
			session_start();
			session_destroy();
			
			if($_SESSION==""){
				$message = "退出成功";
				$this->ajaxReturn($message);
			}
			 $this->display("main");
		}
		
	}

?>
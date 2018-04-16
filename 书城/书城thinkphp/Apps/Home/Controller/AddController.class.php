<?php
namespace Home\Controller;
	use Think\Controller;
	use Home\Model\AddModel;
	class AddController extends Controller{
		public function _initialize() {
			$this->AddModel = new AddModel();
		}
		public function is_login(){
			session_start();
			if($_SESSION!=""){
				$this->ajaxReturn($_SESSION);
			}
			$this->display("addBook");
		}
		public function add(){
			function upload($uploadfile,$path){
				$picname = mt_rand(1000,9999);
				$picname.= $uploadfile['name'];
				if(move_uploaded_file($uploadfile['tmp_name'],$path.$picname)){
					return $picname;
				} else {
					return false;
				}
			}
			if (IS_POST) { 
				if(!empty($_FILES)) {
					$filename = upload($_FILES['b_booklist_pic'],"uploads/");	
				}
				$fields = array(
					"b_booklist_name" =>I("post.b_booklist_name"),
					"b_booklist_summery" =>I("post.b_booklist_summery"),
					"b_booklist_author" =>I("post.b_booklist_author"),
					"b_booklist_bookconcern" =>I("post.b_booklist_bookconcern"),
					"b_booklist_time" =>I("post.b_booklist_time"),
					"b_booklist_price" =>I("post.b_booklist_price"),
					"b_booklist_isbn" =>I("post.b_booklist_isbn"),
					"b_booklist_pic" =>$filename
				);
			
				print_r($fields);
				$this->ajaxReturn($this->AddModel->add($fields));
			} 
			$this->display("addBook");
		}
		
	}
?>
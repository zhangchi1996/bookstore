<?php
	namespace Home\Controller;
	use Think\Controller;
	use Home\Model\ShowModel;
	class ShowController extends Controller{
		public function _initialize() {
			$this->ShowModel = new ShowModel();
		}
		public function show(){
			if(IS_POST){
				$count = $this->ShowModel->count();
				$pageSize = 2;
				$page = new \Think\Page($count, $pageSize);
				$datas = $this->ShowModel->limit($page->firstRow, $page->listRows)->select();
				$pageNav = $page->show();
				
				$data = array($datas,$pageNav);
				$this->ajaxReturn($data);
			}
			$this->display("books");
		}
		public function addid(){
			session_start();
			if(IS_POST){
				$_SESSION["b_booklist_id"]=$_POST['b_booklist_id'];
			}
			$this->display("books");
		}
		public function showlist(){
			session_start();
			if(IS_POST){
				$map["b_booklist_id"]=$_SESSION["b_booklist_id"];
				$datas = $this->ShowModel->where($map)->select();
				$this->ajaxReturn($datas);
			}
			
			$this->display("books_mess");
		}
		public function quitid(){
			session_start();
			session_destroy();
			if(IS_POST){
				$message = "退出成功";
				$this->ajaxReturn($message);
			}
			$this->display("books_mess");
		}
		
	}
?>
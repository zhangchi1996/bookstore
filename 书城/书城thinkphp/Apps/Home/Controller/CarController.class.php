<?php
	namespace Home\Controller;
	use Think\Controller;
	use Home\Model\CarModel;
	include "../../../Public/php/mysql_connect.php";
	include "../../../Public/php/mysql_connect.php";
	include "../../../Public/php/mysql_connect.php";
	class CarController extends Controller{
		public function _initialize() {
			$this->CarModel = new CarModel();
		}
		
		public function addToCar(){
			session_start();
			if(IS_POST){
				if(!empty($_SESSION["b_login_name"])){
					$field=array(
						"b_car_bookid"=>$_SESSION["b_booklist_id"],
						"b_car_username"=>$_SESSION["b_login_name"]
					);
					$datas=$this->CarModel->where($field)->select();
//					$num = $datas[0]["b_car_booknum"];
					if($datas){
						$num=$datas[0]["b_car_booknum"]+1;
						$datas = $this->CarModel->where($field)->save(["b_car_booknum"=>$num]);
						
						$mess = "添加成功";
						
					}else{
						$fields = array(
							"b_car_bookid"=>$_SESSION["b_booklist_id"],
							"b_car_username"=>$_SESSION["b_login_name"],
							"b_car_booknum"=>1,
							"b_car_bookname"=>$_POST["b_car_bookname"],
							"b_car_pic"=>$_POST["b_car_pic"],
							"b_car_price"=>$_POST["b_car_price"]
							
						);
						$data=$this->CarModel->add($fields);
						$mess = "添加成功";
					}
					$message = "有用户";
				}else{
					$message = "无用户";
				}
				$this->ajaxReturn($message);
			}
			$this->display("carlist");
			
		}
		public function showCar(){
			session_start();
			if(IS_POST){
				$map["b_car_username"]=$_SESSION["b_login_name"];
				$datas=$this->CarModel->where($map)->select();
				$this->ajaxReturn($datas);
			}
			$this->display("carlist");
		}
		public function quitCar(){
			if(IS_POST){
				$field=array(
						"b_car_bookid"=>$_POST["b_car_bookid"],
						"b_car_username"=>$_SESSION["b_login_name"]
				);
				$datas=$this->CarModel->where($field)->delete();
			}
			$this->display("carlist");
		}
		
	}
?>
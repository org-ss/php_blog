<?php

include('../model/Photo.php');

class AdminPhotoController{
	#照片的分页显示
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$utime = $user['u_lasttime'];
		$uid = $user['u_id'];

		$index = 3;

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 0;
		}

		$photoModel = new Photo();
		$photos = $photoModel->page($page);
		$num = $photoModel->getCount();
		if($num%5==0){
			$num = $num/5;
		}else{
			$num = $num/5+1;
		}
		$page = $page+1;

		include('../view/admin/photo/photo_list.php');
	}
	#删除某张图片
	public function deletePhoto(){
		$p_id = $_GET['p_id'];
		$photoModel = new Photo();
		$photoModel->delete($p_id);

		self::home();
	}
	#跳转到添加图片页面
	public function addPhoto(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];
		$utime = $user['u_lasttime'];
		$index = 3;

		include('../view/admin/photo/photo_add.php');
	}
	#执行添加图片操作
	public function do_addPhoto(){
		$tmp_name = $_FILES['p_photo']['tmp_name'];
		$filename = $_FILES['p_photo']['name'];
		$clean_filename = iconv("utf-8", "gbk", $filename);
		if(!file_exists("../public/images/photos/".$clean_filename)){
			move_uploaded_file($tmp_name, "../public/images/photos/".$clean_filename);
		}

		$uid = $_GET['uid'];
		$photoModel = new Photo();
		$photoModel->save($clean_filename,$uid);
		self::home();
	}
	#删除所有文章
	public function deleteAllPhoto(){
		$photoModel = new Photo();
		$photoModel->deleteAll();
		self::home();
	}
}
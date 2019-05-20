<?php

include('../model/Photo.php');

class AdminPhotoController{
	public function home(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];

		$index = 3;


		$photoModel = new Photo();
		$photos = $photoModel->showAll($uid);
		include('../view/admin/photo/photo_list.php');
	}

	public function deletePhoto(){
		$p_id = $_GET['p_id'];
		$photoModel = new Photo();
		$photoModel->delete($p_id);

		self::home();

	}

	public function addPhoto(){
		$user = $_SESSION['user'];
		$name = $user['u_name'];
		$headimg = $user['u_photo'];
		$uid = $user['u_id'];

		$index = 3;

		include('../view/admin/photo/photo_add.php');
	}

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
}
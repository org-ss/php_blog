<?php
include_once('Model.php');

class Photo extends Model{

	#展示所有图片
	public function showAll($uid){
        $statment=$this->pdo->prepare("select p.*,u.u_name uname from photos p join users u on p.p_uid=u.u_id where p_uid=?");
        $statment->execute([$uid]);
        $photos=$statment->fetchAll();
        return $photos;
    }

    #展示最新的5张图片
    public function find5Record($uId){
		$statment = $this->pdo->prepare("select p.*,u.u_name uname from photos p 
			join users u on p.p_uid=u.u_id where p.p_uid=? 
			order by p_date limit 5;");
		$statment->execute([$uId]);
		$photos = $statment->fetchAll();
		return $photos;
	}

	#添加照片
	public function save($p_name,$p_uid){
		$statment = $this->pdo->prepare("insert into photos values(default,?,default,?)");
		$statment->execute([$p_name,$p_uid]);
		return $this->pdo->lastInsertId();
	}

	#删除某张照片
	public function delete($p_id){
		$statment = $this->pdo->prepare("delete from photos where p_id=?");
		$statment->execute([$p_id]);
	}

	#删除所有照片
	public function deleteAll(){
		$statement = $this->pdo->query("delete from photos");
	}

	#获取表格中的记录条数
	public function getCount(){
		$statement = $this->pdo->prepare("select * from photos");
		$statement->execute();#返回结果集中的一个字段
		$num = $statement->rowCount();
		return $num;
	}

	#将表格中的数据按照5条/页的格式显示
	public function page($page){
		$page = $page*5;
		$sql = "select p.*,u.u_name uname from photos p join users u on p.p_uid=u.u_id order by p_id limit ".$page.",5";
		$statement = $this->pdo->query($sql);
		$result = $statement->fetchAll();
		return $result;
	}
}
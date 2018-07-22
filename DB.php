<?php 
class DB{
	private $pdo;
	private function getInitiate(){
		if(!$this->pdo){
			$servername='localhost';
			$dbname='mybk';
			$username='root'; 
			$password='root';
			$this->pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

		}
    return $this->pdo;
	}

	public function getAllBook(){
	$stmt=$this->getInitiate()->query('SELECT * FROM bookinfo');
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
	}
	public function getAllCategories(){
	$stmt=$this->getInitiate()->query('SELECT * FROM category');
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
	}
	public function findBook($bid){
	$stmt=$this->getInitiate()->prepare('SELECT * FROM bookinfo WHERE bid=:bid');
	$stmt->execute(
			array(
               ':bid'=>$bid
			)
		  );
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	return $result;
	}
	public function findCateByBook($bid){
	$stmt=$this->getInitiate()->prepare('SELECT * FROM relation WHERE bid=:bid');
	$stmt->execute(
			array(
               ':bid'=>$bid
			)
    	);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
	}
	public function findBookByCate($cid){
	$stmt=$this->getInitiate()->prepare('SELECT * FROM relation WHERE cid=:cid');
		$stmt->execute(
			array(
               ':cid'=>$cid
			)
    	);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;	
	}

}

$db=new DB();
// print_r($db->findBookByCate(3));

 ?>
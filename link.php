<?php 

require_once './vendor/autoload.php';
require_once './DB.php';
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array());

$book=$db->getAllBook();
$category=$db->getAllCategories();

if($_GET&&array_key_exists('cid', $_GET)){
	$cid=$_GET['cid'];
	$findBook=$db->findBookByCate($cid);
	$bookCate=array();
	foreach($findBook as $value){
      $bid=$value['bid'];
      $bookCate[]=$book[$bid-1];    
	}
}
echo $twig->render(
	'link.html.twig', 
	array(
		'name' =>'Shirley',
		'book' => $book,
		'category'=> $category,
		'findBook'=>$findBook,
		'bookCate'=>$bookCate
	)
);



 ?>
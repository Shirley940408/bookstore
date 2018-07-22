<?php 

require_once './vendor/autoload.php';
require_once './DB.php';
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array());
$Book=$db->getAllBook();
$Cate=$db->getAllCategories();
// $Findbook=$db->findBook('bid')


if($_GET&&array_key_exists('bid', $_GET)){
 $bid=$_GET['bid'];
 $Findbook=$db->findBook($bid);
 $FindCate=$db->findCateByBook($bid);
 $categorySpec=array();
 foreach($FindCate as $value){
 	$cid=$value['cid'];
 	$categorySpec[]=$Cate[$cid-1]['cname'];
 }
}

echo $twig->render(
	'book.html.twig', 
	array(
		'name' => 'Shirley',
		'book' => $Book,
		'category'=> $Cate,
		'findbook'=> $Findbook,
		'findCategory'=>$categorySpec

	)
);
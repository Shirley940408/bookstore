<?php 

require_once './vendor/autoload.php';
require_once './DB.php';
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array());

echo $twig->render(
	'main.html.twig', 
	array(
		'name' => 'Shirley',
		'book' => $db->getAllBook(),
		'category'=> $db->getAllCategories()
	)
);



 ?>
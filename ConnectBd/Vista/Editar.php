<?php 
        require_once '../Controlador/ProductoController.php';  
	$controlador = new ProductoController();
	if(isset($_GET['id'])){
             echo $_GET['id'];
		//$row = $controlador->ver($_GET['id']);
	}else{
		//header('Location: index.php');
	}
/*
	if(isset($_POST['enviar'])){
		$controlador->eliminar($_GET['id']);
		header('Location: index.php');
	}*/
?>


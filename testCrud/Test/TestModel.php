<?php

//require_once '../Modelo/ProductoModel.php';
//creamos el objeto
//$objeto = new ProductoModel();

//imprimimos los datos
//var_dump($objeto->gxyz");
 //$objeto->setNombre("xyz");
 //$objeto->setMarca("xyz");
 //$objeto->setPrecio(23);
 //$objeto->setId(16);
 //echo $objeto->updateProducto();

$test = array('test' =>['test' =>['id'=> 1,'nombre'=> 'jaime']],
[['id'=> 1,'nombre'=> 'jaime']]);

foreach ($test as $value) {
    foreach ($value as $x){
        echo $x['id'];
        echo $x['nombre']; 
    }
}

//echo $objeto->setProducto();
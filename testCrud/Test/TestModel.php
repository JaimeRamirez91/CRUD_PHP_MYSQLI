<?php

require_once '../Modelo/ProductoModel.php';
//creamos el objeto
$objeto = new ProductoModel();

//imprimimos los datos
//var_dump($objeto->gxyz");
 //$objeto->setNombre("xyz");
 //$objeto->setMarca("xyz");
 //$objeto->setPrecio(23);
 //$objeto->setId(16);
 echo $objeto->updateProducto();

//echo $objeto->setProducto();
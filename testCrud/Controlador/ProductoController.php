<?php
//libreria
require_once '../Modelo/ProductoModel.php';

class ProductoController {
    //Muestra el listado de productos
     public function listarProductos(){
           $objProducto = new ProductoModel();
           $resultado = $objProducto->getProductos();
           return $resultado;    
      }
      
      public function agregarProductos($nombre, $marca, $precio){
           $objProducto = new ProductoModel();
           //mandar los datos
           $objProducto->setNombre($nombre);
           $objProducto->setMarca($marca);
           $objProducto->setPrecio($precio);
           
           //Guardar los datos en Base de Datos
           $respuesta = $objProducto->setProducto();   
           return $respuesta;
      } 
      
      public function eliminarProductos($identificador){
             $objProducto = new ProductoModel();
             $objProducto->setId($identificador);
             $respuesta = $objProducto->deleteProducto();
             return $respuesta;
      }
      public function ModificarProductos($nombre, $marca, $precio, $identificador){
             $objProducto = new ProductoModel();
             $objProducto->setId($identificador);
             $objProducto->setNombre($nombre);
             $objProducto->setMarca($marca);
             $objProducto->setPrecio($precio);
             $respuesta = $objProducto->updateProducto();
             return $respuesta;
      }
    
}
//test
$objeto = new ProductoController();

//echo $objeto->agregarProductos("jaime", "x", 1);
//echo $objeto->eliminarProductos(100);
//var_dump($objeto->listarProductos());
//echo $objeto->ModificarProductos("x", "y", 6, 16);

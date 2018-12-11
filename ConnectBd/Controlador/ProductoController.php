<?php
require_once '../Modelo/ProductoModel.php';
class ProductoController{
     
      public function getProductos(){
           $objProducto = new ProductoModel();
           $objProducto-> get_productos();
           return $objProducto;    
      }
       public function setProductos($valores, $insert){
           $resultado = " ";
           $objProducto = new ProductoModel();
           $error = $objProducto->insertar("productos", $valores, $insert);
           /*if($insert != null){
               $resultado = $insert;
           }*/
           return $error;
       }
       
}

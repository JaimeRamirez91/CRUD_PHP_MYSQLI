<?php
require_once '../Modelo/movilModel.php';
class MovilController {
    
    public function getMoviles(){
           $objMoviles = new movilModel();
           $objMoviles->get_moviles();
           return $objMoviles;    
      }
      
    public function setMoviles($valores, $insert){
           $resultado = " ";
           $objMoviles = new movilModel();
           $error =  $objMoviles->insertar("moviles", $valores, $insert);
           /*if($insert != null){
               $resultado = $insert;
           }*/
           return $error;
       }   
      
}

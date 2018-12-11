<?php
//imporrtando conexión php
require ('../Modelo/bd/Conexion.php');
class movilModel extends Conexion{
    
    public function get_moviles(){
        
                $consulta=$this->db->query("select * from moviles;");
                
                while($filas = $consulta->fetch_array(MYSQLI_ASSOC)){
                         $this->moviles[] = $filas;
                    }
                return $this->moviles;
     }
     
     //Insert
            public function insertar($tabla, $valores, $insert){
                $error;
                //cadena
                $cadena = 'INSERT INTO '. $tabla.' ('. $valores.') VALUES('. $insert.')';
                //Verificacion de insercion
                if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                     $error =  "Dato agregado"."<br>";
                } else {
                    $error = "Error: " . $cadena . "<br>" . $this->db->error;
                }
                return $error;
            }
            
}

<?php   
        //imporrtando conexión php
        require ('../Modelo/bd/Conexion.php');
        //Modelo producto
        class ProductoModel extends Conexion{
            
            public function get_productos(){
                $consulta=$this->db->query("select * from productos;");
                
                while($filas=$consulta->fetch_array(MYSQLI_ASSOC)){
                         $this->productos[] = $filas;
                    }
                return $this->productos;
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
            
            //Eliminar
            public function eliminar($tabla, $id){
                //cadena
                $cadena = 'DELETE FROM '. $tabla.' where id='.$id.';';
                
                //Verificacion de insercion
                if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                    echo "Dato eliminado"."<br>";
                } else {
                    echo "Error: " . $cadena . "<br>" . $this->db->error."Registro no encontrado.<br>";
                }  
            }
        }

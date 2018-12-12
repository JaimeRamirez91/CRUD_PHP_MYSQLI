<?php   
        //imporrtando conexión php
        require ('../Modelo/bd/Conexion.php');
       
        //Modelo producto
        class ProductoModel extends Conexion{  
            
            //Atributos
            private $id = null;
            private $nombre = null;
            private $marca = null;
            private $precio = null;
            

            //metodos de acceso
            function getId() {
                return $this->id;
            }
            function getMarca() {
                       return $this->marca;
           }
            function getPrecio() {
                       return $this->precio;
           }
            function getNombre() {
                       return $this->nombre;
           }
            function setNombre($nombre) {
                       $this->nombre = $nombre;
           }
            function setMarca($marca) {
                       $this->marca = $marca;
           }
            function setPrecio($precio) {
                       $this->precio = $precio;
           }
            function setId($id) {
                     $this->id = $id;
            }

              
            //Seleccionamos todos los productos
            public function getProductos(){
                //Consulta 
                $consulta = $this->db->query("select * from productos;");
                //validacion
                $this->productos = [['id'=>" ",'nombre'=>" ",'precio'=> " ", 'marca'=>" "]];
                //recorido
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){
                     //inserción en el vector
                        $this->productos[] = $filas;
                }

                 //retorno de los productos
                 return $this->productos;    
            } 
            
             //Insert
            public function setProducto(){
                //validación datos vacios
                //var_dump($this->nombre);
                if($this->nombre != null and $this->precio !=NULL and $this->marca != NULL ){
                        //datos a insertar
                        $insert = ' "'.$this->getNombre().'", "'.$this->getMarca().'", '. $this->getPrecio()." ";
                         //cadena
                        $cadena = 'INSERT INTO productos'.' (nombre, marca, precio) VALUES('. $insert.')';
                         //Verificacion de insercion
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Dato agregado"."<br>";
                        } else {
                            $mensaje = "Error: " . $cadena . "<br>" . $this->db->error;
                        }

                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios."; 
                }
                //Retorno 
                return $mensaje;
            }
            
            //Eliminar productos
            public function deleteProducto(){
                if($this->id != null){
                        //cadena
                        $cadena = 'DELETE FROM productos where id='.$this->id.';';
                        //Verificacion de insercion
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Dato eliminado"."<br>";
                        } else {
                             $mensaje = "Error: " . $cadena . "<br>" . $this->db->error."Registro no encontrado.<br>";
                        }  
 
                } else {
                  $mensaje = "Por favor enviar el parametro para eliminar el producto";    
                }
                return $mensaje;
            }
            
            public function updateProducto(){
                 //validación datos vacios
                //var_dump($this->nombre);
                if($this->nombre != null and $this->precio != NULL and $this->marca != NULL and $this->id != null){
                        //datos a insertar
                        $SET = ' SET nombre = "'.$this->getNombre().'",  marca = "'.$this->getMarca().'", precio = '.$this->getPrecio()."";
                         //cadena
                        $cadena = 'UPDATE productos '. $SET .' WHERE id ='. $this->id.';';
                        //Verificacion de insercion
                        if ($this->db->query($cadena) === TRUE and $this->db->affected_rows==true) {
                             $mensaje =  "Dato Modificado"."<br>";
                        } else {
                            $mensaje = "Error: x" . $cadena . "<br>" . $this->db->error;
                        }

                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios."; 
                }
                //Retorno 
                return $mensaje;    
            }
        }   
        
    




        

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
                $productos = array();
                $consulta = $this->db->query("select * from productos;");//Consulta
                //recorido
                while( $filas = $consulta->fetch_array(MYSQLI_ASSOC)){
                     //inserción en el vector
                     array_push($productos, 
                                array('fila'  => [
                                                  'id'=> $filas['id'], 
                                                  'nombre'=> $filas['nombre'],
                                                  'marca'=> $filas['marca'],
                                                  'precio'=> $filas['precio']
                                                  ]
                                      )
                                );
                }

                 //retorno de los productos
                 return $productos;    
            } 
            
             //Insert
            public function setProducto(){
                //validación datos vacios
                if($this->nombre != null and $this->precio !=NULL and $this->marca != NULL ){
                        //cadena insertcion
                        $cadena = "INSERT INTO productos (nombre, marca, precio) VALUES('$this->nombre','$this->marca',$this->precio )";
                        //Insercion
                        $resultado = $this->db->query($cadena);
                        //validación
                        if ($resultado === TRUE) {
                            $mensaje =  "Dato agregado";
                        } else {
                            $mensaje = "Error: $cadena <br>".$this->db->error;
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
                        $cadena = "DELETE FROM productos where id = $this->id";
                        //insercion
                        $resultado  = $this->db->query($cadena);
                        //validacion 
                        if ($resultado === TRUE) {
                             $mensaje =  "Dato eliminado <br>";
                        } else {
                             $mensaje = "Error:  $cadena <br> $this->db->error Registro no encontrado.<br>";
                        }  
 
                } else {
                  $mensaje = "Por favor enviar el parametro para eliminar el producto";    
                }
                return $mensaje;
            }
            
            public function updateProducto(){
                 //validación datos vacios
                if($this->nombre != null and $this->precio != NULL and $this->marca != NULL and $this->id != null){
                        //cadena
                        $cadena = "UPDATE productos SET nombre = '$this->nombre', marca = '$this->marca', precio = $this->precio  WHERE id = $this->id";
                        //insercion
                        $resultado = $this->db->query($cadena);
                        //validación
                        if ($resultado === TRUE) {
                                $mensaje =  "Dato Modificado"."<br>";
                        } else {
                                $mensaje = "Error: $cadena<br> $this->db->error";
                        }
                }else{
                    $mensaje = "Error no ha enviado todos los datos necesarios."; 
                }
                //Retorno 
                return $mensaje;    
            }
        }   
  
 



        

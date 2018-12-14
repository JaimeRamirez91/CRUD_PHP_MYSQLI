<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
        <?php
            require '../Controlador/ProductoController.php';
            $objetoProducto = new ProductoController();
            //validacion que existan Y/o esten vacios
             if (isset($_POST['precio']) and $_POST['nombre'] and $_POST['marca']) {
                $mensaje =  $objetoProducto->agregarProductos($_POST['nombre'], $_POST['marca'], $_POST['precio']);
             } else{
                 $mensaje = "";
             }
        ?>
    </head>
    <body>  
        <section class="container-fluid" > <!--inicio contenedor principal--->
        <?php 
            //importamos el menu
            include '../Vistas/Plantillas/ManuPlantilla.php';
            //validamos
            if($mensaje!= null){
                   echo "<div class='alert alert-success col-lg-6 offset-3 alert-custom'>
                       <strong>REGISTRO AGREGADO: ".$_POST["nombre"]." </strong> de forma satisfactoria
                       </div>";
            }
                 
        ?>
            <section class="offset-lg-3 col-lg-6 col-md-10" id="cntFormProducto"> <!--inicio contenedor form-->
                 <section class="row" >
                     <h3 class="col-lg-12 text-white">AGREGAR PRODUCTOS</h3>
                 </section>       
                 <form action="" method="post" ><!--formulario add productos -->
                     <div class="form-group">
                         <label class="text-white">Nombre: </label>
                         <input type="text"  class="form-control" name="nombre" placeholder="Nombre producto" required="" autofocus="1">
                     </div>
                     <div class="form-group">
                           <label class="text-white">Precio:</label>
                           <input type="number"  class="form-control" name="precio" placeholder="Precio producto" required="">
                     </div>
                     <div class="form-group">
                             <label class="text-white">Marca:</label>
                             <input type="text" name="marca"  class="form-control" placeholder="Marca producto" required="">
                     </div>
                     <div class="form-group col-10 offset-3">
                            <input  class="btn btn-outline-success btn-custom-form" type="submit"> 
                            <input  class="btn btn-outline-danger btn-custom-form" type="reset">   
                     </div>
                        
                 </form> <!--fin formulario add productos--> 
            </section> <!--fin contenedor form-->
            
        </section> <!-- Fin contenedor principal-->
    </body>
</html>

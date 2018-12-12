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
         <?php
             require_once '../Controlador/ProductoController.php';
             //Validación
            $obj = new ProductoController();
            $id = "";
            if (isset($_GET['id']) and isset($_GET['nombre']) and isset($_GET['marca']) and isset($_GET['precio'])){
                 $id     = $_GET['id'];
                 $nombre = $_GET['nombre'];
                 $marca  = $_GET['marca'];
                 $precio = $_GET['precio'];
            }
            if(isset($_POST['nombreMod']) and isset($_POST['marcaMod']) and isset($_POST['precioMod'])){
              $mensaje = $obj->ModificarProductos($_POST['nombreMod'], $_POST['marcaMod'], $_POST['precioMod'], $id);
              header('Location: ProductoListaView.php?mensaje=1');
              
            }
        ?>
        <style>
            h1{
                text-align: center;
                font-size: 40px;
                margin-top: 10%;
            }
            form{
                margin: 0 auto;
                width: 50%;
                margin-top: 20px;
            }
            form input{
                width: 100%;
                margin: 5px;
            }
        </style>
    </head>
    <body>
            <!--formulario add productos -->
        <form action="" method="post">
            Nombre:<input type="text" name="nombreMod" placeholder="Nombre producto" required="" autofocus="1" value="<?php echo $nombre?>">
            Precio:<input type="number" name="precioMod" placeholder="Precio producto" required="" value="<?php echo $precio?>">
            Marca:<input type="text" name="marcaMod" placeholder="Marca producto" required="" value="<?php echo $marca?>">
            <input type="submit">  
        </form> 
    </body>
</html>

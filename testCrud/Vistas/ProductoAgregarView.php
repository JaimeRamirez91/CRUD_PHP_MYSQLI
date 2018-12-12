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
            require '../Controlador/ProductoController.php';
            $objetoProducto = new ProductoController();
            //validacion que existan Y/o esten vacios
             if (isset($_POST['precio']) and $_POST['nombre'] and $_POST['marca']) {
                $mensaje =  $objetoProducto->agregarProductos($_POST['nombre'], $_POST['marca'], $_POST['precio']);
             } else{
                 $mensaje = "";
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
            section{
                margin: 0 auto;
                width: 50%;
            }
        </style> 
        
    </head>
    <body>
         <?php
           echo "<h2>".$mensaje."</h2>";
         ?>
        <h1>AGREGAR PRODUCTOS</h1>
        <section>
             <button  onclick="window.location.href='ProductoListaView.php'">Ver productos</button>
        </section>
        <!--formulario add productos -->
        <form action="" method="post">
            Nombre:<input type="text" name="nombre" placeholder="Nombre producto" required="" autofocus="1">
            Precio:<input type="number" name="precio" placeholder="Precio producto" required="">
            Marca:<input type="text" name="marca" placeholder="Marca producto" required="">
            <input type="submit">  
        </form>  
    </body>
</html>

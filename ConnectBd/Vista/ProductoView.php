<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <?php require_once '../Controlador/ProductoController.php';
            //Validación
            if (isset( $_POST['precio']) and $_POST['nombre'] and $_POST['marca']) {
                 $datos = " ";
                 $obj = new ProductoController();
                 
                 $datos = ' "'.$_POST['nombre'].'", '.$_POST['precio'] .', "'.$_POST['marca'].'"';
                 
                 $resultado = $obj->setProductos("nombre, precio, marca", $datos ); 
                 
                 // Redirecciona a la página que deseas
                 header('Location: /vista/ProductoView.php');
                 echo $resultado;
  
            }
            
            function test(){
                echo "test";
            }
            
         ?>
        <style>
            h1{
                text-align: center;
                font-size: 40px;
                margin-top: 10%;
            }
            table, th, td{
                 border: 1px solid black;
                 margin: 0 auto;
                 margin-top: 1%;
                 text-align: center;
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
        <h1>Tabla Productos</h1>
        <table>
            <a href="eliminar.php?id=1"></a>
        <?php
            $obj = new ProductoController();
            $productos =  $obj->getProductos();
            if($productos != null){   
              foreach ($productos as $datos ){
                  
                    echo '<tr> <td> Correlativo </td> <td> Nombre </td>  '
                    .'<td> Precio </td> <td> Marca </td> <td> Acciones </td> '
                     . ' </tr>';
                   
                  foreach($datos as $x ) {
                            echo '<tr>'
                                 .'<td>'. $x['id'].'</td>'
                                 .'<td>'. $x['nombre'].'</td>'
                                 .'<td>'. $x['precio'].'</td>'
                                 .'<td>'. $x['marca'].'</td>'
                                 .'<td>'.'<a href="editar.php?id='.$x['id'].'&nombre='.$x['nombre'].'">Editar</a> |'
                                 .'<a href="eliminar.php?id='.$x['id'].'">Eliminar</a>'.'</td>' 
                                 .'</tr>';
                        }
                    }
            }else{
                  echo "null";
            }
        ?>
        </table>
        
        <!--formulario add productos -->
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre producto" required="" autofocus="1">
            <input type="number" name="precio" placeholder="Precio producto" required="">
            <input type="text" name="marca" placeholder="Marca producto" required="">
            <input type="submit">  
        </form>  
    </body>
</html>

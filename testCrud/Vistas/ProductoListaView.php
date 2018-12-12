<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
            require_once '../Controlador/ProductoController.php';
            //objeto
            $objProducto = new ProductoController();
            if(isset($_GET['mensaje'])){
                switch ($_GET['mensaje']) {
                    case 1:
                         echo "!!Producto Modificado!!";
                     break;
                     case 2:
                         echo "!!Producto Eliminado!!";
                     break;

                    default:
                        echo "!!Opción incorrecta!!";
                        break;
                }
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
            table{
                 width: 50%;
            }
            section{
                margin: 0 auto;
                width: 50%;
            }
        </style>
    </head>
    <body>
        <h1>Tabla Productos</h1>
        <section>
             <button  onclick="window.location.href='ProductoAgregarView.php'">Agregar Producto</button>
        </section>
       
        <table> 
            <?php
               // var_dump($objProducto->listarProductos());
               $producto = $objProducto->listarProductos();
               //acceso a los arreglos de forma individual
               $contador = 0;
               foreach ($producto as $arreglos) {
                   echo '<tr> <td> Correlativo </td> <td> Nombre </td>  '
                    .'<td> Precio </td> <td> Marca </td> <td> Acciones </td>'
                     . ' </tr>';
                   //acceso a los elementos del arreglo de forma individual
                   
                   foreach ($arreglos as $elemento) {
                    if($contador == 0){
                        $contador += 1;
                    }else{
                        echo '<tr>'
                                 .'<td>'.$elemento['id'].'</td>'
                                 .'<td>'.$elemento['nombre'].'</td>'
                                 .'<td>'.$elemento['precio'].'</td>'
                                 .'<td>'.$elemento['marca'].'</td>'
                                 .'<td>'.'<a href="ProductoModificarView.php?id='.$elemento['id'].'&nombre='.$elemento['nombre'].'&marca='.$elemento['marca'].'&precio='.$elemento['precio'].'">Editar</a> |'
                                 .'<a href="ProductoEliminarView.php?id='.$elemento['id'].'&nombre='.$elemento['nombre'].'">Eliminar</a>'.'</td>' 
                                 .'</tr>';  
                    }
                               
               }
               }
            ?>
        </table>    
    </body>
</html>

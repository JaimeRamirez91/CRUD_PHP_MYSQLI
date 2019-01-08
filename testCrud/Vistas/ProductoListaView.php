<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="asets/css/bootstrap.css">
         <link rel="stylesheet" href="asets/css/estilos.css">
         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
         <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
         <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <?php
            require_once '../Controlador/ProductoController.php';
            //objeto
            $objProducto = new ProductoController();
            
        ?>
        <style>
          /*  h1{
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
            }*/
        </style>
    </head>
    <body>
    <section class="container-fluid">
        <?php  
            //barra de navegación        
            include '../Vistas/Plantillas/ManuPlantilla.php'; 
            if(isset($_GET['mensaje'])){
                switch ($_GET['mensaje']) {
                    case 1:
                         echo "<div class='alert alert-primary col-lg-6 offset-3 alert-custom'>
                              <strong>REGISTRO MODIFIOCADO </strong> de forma satisfactoria
                              </div>";
                     break;
                     case 2:
                         echo "<div class='alert alert-danger col-lg-6 offset-3 alert-custom'>
                              <strong>REGISTRO MELIMINADO </strong> de forma satisfactoria
                              </div>";
                     break;

                    default:
                        echo "!!Opción incorrecta!!";
                        break;
                }
            }
        ?> 
        
        <section class="row">
            <div class=" offset-2 col-8" id="cntTablaProductos">
                <h1 id="productoH1">Tabla Productos</h1>
                <table id="tbProductos" class="table"> 
                    <?php
                        $producto = $objProducto->listarProductos();
                       //$producto = $objProducto->listarProductos();
                       //var_dump($producto);
                       //acceso a los arreglos de forma individual
                       $contador = 0;
                       echo '<thead class="table table-bordered table-striped table-hover bg-info"> '
                                . '<tr> <th scope="col"> Correlativo </th> <th scope="col"> Nombre </th>  '
                                .'<th scope="col"> Precio </th> <th scope="col"> Marca </th scope="col"> <th scope="col"> Acciones </th>'
                                . ' </tr> </thead>';
                           
                       foreach ($producto as $arreglos) {
                           //acceso a los elementos del arreglo de forma individual

                           foreach ($arreglos as $elemento) {
                                 echo "<tbody>";
                                 echo '<tr>'
                                         .'<td>'.$elemento['id'].'</td>'
                                         .'<td>'.$elemento['nombre'].'</td>'
                                         .'<td>'.$elemento['precio'].'</td>'
                                         .'<td>'.$elemento['marca'].'</td>'
                                         .'<td>'.'<a href="ProductoModificarView.php?id='.$elemento['id'].'&nombre='.$elemento['nombre'].'&marca='.$elemento['marca'].'&precio='.$elemento['precio'].'">Editar</a> | '
                                         .'<a href="ProductoEliminarView.php?id='.$elemento['id'].'&nombre='.$elemento['nombre'].'">Eliminar</a>'.'</td>' 
                                         .'</tr>';  
                            

                       }
                       }
                       echo "</tbody> ";
                       
                    ?>
              </table> 
               
            </div>
            
        </section>
        
    </section>
        <script>
            $(document).ready(function() {
            $('#tbProductos').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ ",
                    "zeroRecords": "Datos no encontrados - upss",
                    "info": "Mostar paginas _PAGE_ de _PAGES_",
                    "infoEmpty": "Datos no encontrados",
                    "infoFiltered": "(Filtrados por _MAX_ total registros)",
                    "search":         "Buscar:",
                    "paginate": {
                            "first":      "First",
                            "last":       "Anterior",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                    },
                    
                }
            } );
} );
           
        </script>
    </body>
</html>

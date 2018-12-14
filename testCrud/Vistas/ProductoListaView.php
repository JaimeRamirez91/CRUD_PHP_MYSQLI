<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="asets/css/bootstrap.css">
         <link rel="stylesheet" href="asets/css/estilos.css">
         <script type="text/javascript" src="../Vistas/asets/js/paginator.js"></script>
          <script type="text/javascript" src="../Vistas/asets/js/table.js"></script>
         
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
                       // var_dump($objProducto->listarProductos());
                       $producto = $objProducto->listarProductos();
                       //acceso a los arreglos de forma individual
                       $contador = 0;
                       foreach ($producto as $arreglos) {
                           echo '<thead class="table table-bordered table-striped table-hover bg-info"> '
                                . '<tr> <th scope="col"> Correlativo </th> <th scope="col"> Nombre </th>  '
                                .'<th scope="col"> Precio </th> <th scope="col"> Marca </th scope="col"> <th scope="col"> Acciones </th>'
                                . ' </tr> </thead>';
                           //acceso a los elementos del arreglo de forma individual

                           foreach ($arreglos as $elemento) {
                            if($contador == 0){
                                $contador += 1;
                                echo "<tbody>";
                            }else{
                                
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
                       }
                       echo "</tbody> ";
                       
                    ?>
              </table> 
               <br>
               <nav class='pagination justify-content-center'>
                   <li class="page-item disabled"><a class="page-link" href="#">Previus</a></li>
                   <li class="page-item active"><a class="page-link" href="#">1</a></li>
                   <li class="page-item"><a class="page-link" href="#">2</a></li>
                   <li class="page-item"><a class="page-link" href="#">3</a></li>
                   <li class="page-item"><a class="page-link" href="#">Next</a></li>
               </nav>
            </div>
            
        </section>
        
    </section>
    </body>
</html>

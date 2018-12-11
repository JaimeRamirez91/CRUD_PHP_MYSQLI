<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <?php require_once '../Controlador/MovilController.php'; 
           $obj = new MovilController();
           if (isset( $_POST['nombre'])){
                 $datos = " ";
          
                 $datos = ' "'.$_POST['nombre'].'"';
                 
                 $resultado = $obj->setMoviles("nombre", $datos ); 
                 
                 // Redirecciona a la página que deseas
               //  header('Location: /vista/ProductoView.php');
                 echo $resultado;
  
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
         <h1>Tabla Moviles</h1>
        <table>
            <?php
               $moviles = $obj->getMoviles();
               echo '<tr> <td> Correlativo <td> <td> Nombre <td> </tr>';
               
               foreach ($moviles as $arreglos) {
                   foreach ($arreglos as $elementos) {
                       echo '<tr>'
                                 .'<td>'. $elementos['id'].'<td>'
                                 .'<td>'. $elementos['nombre'].'<td>'     
                            .'</tr>';
                   }
               }
              // var_dump($moviles);

            ?>
        </table>
        <!--formulario add productos -->
        <form action="" method="post">
            <input type="text" name="nombre" placeholder="Nombre movil" required="" autofocus="1">
            <input type="submit">
        </form> 
    </body>
</html>

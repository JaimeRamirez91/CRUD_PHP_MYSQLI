<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require_once '../Controlador/ProductoController.php';
            //crear el objeto
            $obj = new ProductoController();
            $id = "";
            //Validación
            if (isset($_GET['id']) and isset($_GET['nombre'])){
                 $id = $_GET['id'];  
                 $producto = $_GET['nombre'];
            }
            //Validación
            if(isset($_POST['enviar'])){
              $mensaje = $obj->eliminarProductos($id);
              echo $mensaje;
              header('Location: ProductoListaView.php?mensaje=2');
            }
            
         ?>
    </head>
    <body>
                ¿Usted de verdad quiere eliminar el producto <?php echo $producto?>?
                <br><br>

                <form action="" method="POST">
                        <input type="submit" name="enviar" value="Eliminar">
                </form>
    </body>
</html>

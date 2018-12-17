<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="asets/css/bootstrap.css">
        <link rel="stylesheet" href="asets/css/estilos.css">
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
        <section class="container-fluid">
            <section class=" offset-2 col-8 cntEliminar">
                ¿Usted de verdad quiere eliminar el producto <?php echo $producto?>?
                <br><br>

                <form action="" method="POST">
                    <input type="submit" name="enviar" value="Eliminar" class="btn btn-outline-danger">
                    <a href="ProductoListaView.php" class="btn btn-outline-success">Cancelar</a>  
                </form>
                
            </section>
        </section>
               
    </body>
</html>

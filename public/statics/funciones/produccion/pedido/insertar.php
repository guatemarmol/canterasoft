<?php include_once '../../../on-database.php' ?>

<?php
    
            $numeroPedido = $_POST['numeroPedido'];    
            $consulta = "SELECT * FROM pedido WHERE numeroPedido='$numeroPedido'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $numeroPedido = $_POST['numeroPedido'];
            $nitClientePedido = $_POST['nitClientePedido'];
            $direccionEntregaPedido = $_POST['direccionEntregaPedido'];
            $fechaEmisionPedido = $_POST['fechaEmisionPedido'];
            $fechaEntregaPedido = $_POST['fechaEntregaPedido'];
            $fechaPedido = $_POST['fechaPedido'];
            $horaPedido = $_POST['horaPedido'];
         
         $actualizar ="UPDATE pedido SET nitClientePedido='$nitClientePedido', direccionEntregaPedido='$direccionEntregaPedido', fechaEmisionPedido='$fechaEmisionPedido', fechaEntregaPedido='$fechaEntregaPedido', fechaPedido='$fechaPedido', horaPedido='$horaPedido' WHERE numeroPedido='$numeroPedido'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(numeroPedido) numeroPedido FROM pedido";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $numeroPedido = $tabla['numeroPedido'];
        $numeroPedido++; 
         
        $nitClientePedido = $_POST['nitClientePedido'];
        $direccionEntregaPedido = $_POST['direccionEntregaPedido'];
        $fechaEmisionPedido = $_POST['fechaEmisionPedido'];
        $fechaEntregaPedido = $_POST['fechaEntregaPedido'];
        $fechaPedido = $_POST['fechaPedido'];
        $horaPedido = $_POST['horaPedido'];

        $agregar ="INSERT INTO pedido (numeroPedido, nitClientePedido, direccionEntregaPedido, fechaEmisionPedido, fechaEntregaPedido, fechaPedido, horaPedido)
                            VALUES ('$numeroPedido','$nitClientePedido','$direccionEntregaPedido','$fechaEmisionPedido','$fechaEntregaPedido','$fechaPedido','$horaPedido')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
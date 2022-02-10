<?php include_once '../../../on-database.php' ?>

<?php
    
            $numeroPedidoLineaPedido = $_POST['numeroPedidoLineaPedido'];    
            $consulta = "SELECT * FROM lineaPedido WHERE numeroPedidoLineaPedido='$numeroPedidoLineaPedido'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $numeroPedidoLineaPedido = $_POST['numeroPedidoLineaPedido'];
            $lineaPedido = $_POST['lineaPedido'];
            $codigoProductoLineaPedido = $_POST['codigoProductoLineaPedido'];
            $cantidadEnPesoLineaPedido = $_POST['cantidadEnPesoLineaPedido'];
            $fechaLineaPedido = $_POST['fechaLineaPedido'];
            $horaLineaPedido = $_POST['horaLineaPedido'];
         
         $actualizar ="UPDATE lineaPedido SET lineaPedido='$lineaPedido', codigoProductoLineaPedido='$codigoProductoLineaPedido', cantidadEnPesoLineaPedido='$cantidadEnPesoLineaPedido', fechaLineaPedido='$fechaLineaPedido', horaLineaPedido='$horaLineaPedido'  WHERE numeroPedidoLineaPedido='$numeroPedidoLineaPedido'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $numeroPedidoLineaPedido = $_POST['numeroPedidoLineaPedido'];
        $lineaPedido = $_POST['lineaPedido'];
        $codigoProductoLineaPedido = $_POST['codigoProductoLineaPedido'];
        $cantidadEnPesoLineaPedido = $_POST['cantidadEnPesoLineaPedido'];
        $fechaLineaPedido = $_POST['fechaLineaPedido'];
        $horaLineaPedido = $_POST['horaLineaPedido'];

        $agregar ="INSERT INTO lineaPedido (numeroPedidoLineaPedido, lineaPedido, codigoProductoLineaPedido, cantidadEnPesoLineaPedido, fechaLineaPedido, horaLineaPedido)
                            VALUES ('$numeroPedidoLineaPedido','$lineaPedido','$codigoProductoLineaPedido','$cantidadEnPesoLineaPedido','$fechaLineaPedido','$horaLineaPedido')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
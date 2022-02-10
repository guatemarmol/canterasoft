<?php 

        $numeroPedidoLineaPedido = $_REQUEST['numeroPedidoLineaPedido'];
        if ($numeroPedidoLineaPedido != ""){
                                
            $consulta = "SELECT * FROM lineaPedido WHERE numeroPedidoLineaPedido='$numeroPedidoLineaPedido'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $numeroPedidoLineaPedido1 = $fila['numeroPedidoLineaPedido'];
            $lineaPedido = $fila['lineaPedido'];
            $codigoProductoLineaPedido = $fila['codigoProductoLineaPedido'];
            $cantidadEnPesoLineaPedido = $fila['cantidadEnPesoLineaPedido'];
            $fechaLineaPedido = $fila['fechaLineaPedido'];
            $horaLineaPedido = $fila['horaLineaPedido'];
       
        }elseif($numeroPedidoLineaPedido == ""){
                                
        }
?>
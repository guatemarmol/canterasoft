<?php 

        $numeroPedido = $_REQUEST['numeroPedido'];
        if ($numeroPedido != ""){
                                
            $consulta = "SELECT * FROM pedido WHERE numeroPedido='$numeroPedido'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $numeroPedido1 = $fila['numeroPedido'];
            $nitClientePedido = $fila['nitClientePedido'];
            $direccionEntregaPedido = $fila['direccionEntregaPedido'];
            $fechaEmisionPedido = $fila['fechaEmisionPedido'];
            $fechaEntregaPedido = $fila['fechaEntregaPedido'];
            $fechaPedido = $fila['fechaPedido'];
            $horaPedido = $fila['horaPedido'];
       
        }elseif($numeroPedido == ""){
                                
        }
?>
<?php
include_once '../../../on-database.php';

    $codPedido = $_POST['codPedido'];
    $consulta = "UPDATE cotizacion SET autorizacion = 'Autorizado' 
                    WHERE codPedido = '$codPedido';";
    $ejecutar = mysqli_query($con, $consulta);

    $consulta2 = "UPDATE ordenPedido SET autorizacion = 'Autorizado' 
                    WHERE codPedido = '$codPedido';";
    $ejecutar2 = mysqli_query($con, $consulta2);

    if (!$con -> query("UPDATE ordenPedidoProducto 
                        SET autorizacion = 'Autorizado'
                        WHERE codigoPedido = '$codPedido' AND autorizacion = 'Pendiente';")) {
        echo "<center><strong><h4>¡Error en el Ingreso!<BR></strong></h4></center>";
    }else{
        echo "<center><strong><h4>¡ Pedido Autorizado !<BR></h4></center>";
    }
?>
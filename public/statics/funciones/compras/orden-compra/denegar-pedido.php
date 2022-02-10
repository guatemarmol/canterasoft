<?php
    include_once '../../../on-database.php';

    $codPedido = $_POST['codigo'];
    
    $consulta = "UPDATE ordenPedido SET autorizacion = 'Denegado', statusPedido = 'Desactivado' 
                    WHERE codigo = '$codPedido';";
    $ejecutar = mysqli_query($con, $consulta);

    if (!$con -> query("UPDATE ordenPedidoProducto 
                        SET autorizacion = 'Denegado', estado = 'Desactivado'
                        WHERE codigoPedido = '$codPedido';")) {
        echo "<center><strong><h4>¡Error en el Ingreso!<BR></strong></h4></center>";
    }else{
        echo "<center><strong><h4>¡ Pedido Denegado !<BR></h4></center>";
    }
?>
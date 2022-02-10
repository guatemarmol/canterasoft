<?php
    include_once '../../../on-database.php';

    $codPedido = $_POST['codPedido'];
    $codPedProd = $_POST['idPedProd'];
    
    $consulta = "UPDATE cotizacion SET autorizacion = 'Autorizado' 
                    WHERE codPedido = '$codPedido'
                    AND codPedProd = $codPedProd;";
    $ejecutar = mysqli_query($con, $consulta);

    $consulta2 = "UPDATE ordenPedido SET statusPedido = 'Revisado' 
                    WHERE codPedido = '$codPedido';";
    $ejecutar2 = mysqli_query($con, $consulta2);

    if (!$con -> query("UPDATE ordenPedidoProducto 
                        SET autorizacion = 'Autorizado'
                        WHERE codigoPedido = '$codPedido' 
                        AND idPedProd = $codPedProd;")) {
        echo "<center><strong><h4>¡Error en el Ingreso!<BR></strong></h4></center>";
    }else{
        echo "<center><strong><h4>¡ Suministros Autorizados !<BR></h4></center>";
    }
?>
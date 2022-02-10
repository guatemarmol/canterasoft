<?php
include_once '../../../on-database.php';

$codPedido = $_POST['codPedido'];
$codProducto = $_POST['idPedidoProd'];

if (!$con -> query("UPDATE ordenPedidoProducto SET autorizacion = 'Denegado', estado ='Desactivado' 
                    WHERE codigoPedido = '$codPedido' AND idPedProd = $codProducto;")) {
    echo "<center><strong><h4>¡Error en el Ingreso!<BR></strong></h4></center>";
}else{
    echo "<center><strong><h4>¡ Producto Denegado !<BR></h4></center>";
}
?>
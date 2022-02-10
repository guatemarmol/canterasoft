<?php
include_once '../../../on-database.php';

$usuario = $_POST['nicknameBitacora'];
$proveedor = $_POST['proveedor'];
$precio = $_POST['precio'];
$descuento = $_POST['descuento'];
$codPedido = $_POST['codPedido'];
$idPedProd = $_POST['idPedidoProd'];
$producto = $_POST['producto'];
$nota = $_POST['notaCot'];
$cantidad = $_POST['cantidad'];
$fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));;

$consulta = "UPDATE ordenPedidoProducto SET estado = 'Cotizado' 
                WHERE codigoPedido = '$codPedido '
                AND idPedProd = $idPedProd;";
$ejecutar = mysqli_query($con, $consulta);

$precioFinal = $precio - $descuento;
$precioOrden = $precioFinal * $cantidad;

if (!$con -> query("INSERT INTO cotizacion VALUES (DEFAULT, $idPedProd, '$codPedido', $producto, $proveedor, $precio, $descuento,$precioFinal, $precioOrden ,'$nota', '$fecha', '$usuario', 'Pendiente');")) {
    echo "<center><strong><h4>¡Error en el Ingreso!<BR></strong></h4></center>";
}else{
    echo "<center><strong><h4>¡ Cotizacion Registrada !<BR></h4></center>";
}

$con->close();
?>
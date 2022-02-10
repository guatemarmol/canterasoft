<?php
include_once '../../../on-database.php';

$numero = $_POST['codigo'];

$consulta = "DELETE FROM ordenPedidoProducto WHERE codigoPedido = $numero;";
$consulta2 = "DELETE FROM ordenPedido WHERE codigo = $numero;";
$ejecutar = mysqli_query($con, $consulta);
$ejecutar2 = mysqli_query($con, $consulta2);
$con->close();
?>
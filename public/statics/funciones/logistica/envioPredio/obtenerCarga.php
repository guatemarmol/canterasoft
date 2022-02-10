<?php
include_once '../../../on-database.php';

$envio = $_POST['envio'];

$query = "SELECT * FROM envioPredioProducto WHERE codigoEnvio = $envio;";

$resultado = $con->query($query);

$items = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $items[] = $fila;
}

echo json_encode($items);
$con->close();
?>
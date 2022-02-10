<?php
include_once '../../../on-database.php';
$numero   = $_POST['codigo'];

$query = "SELECT * FROM ordenPedido WHERE codigo = $numero; ";

$resultado = $con->query($query);

$items = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $items[] = $fila;
}

echo json_encode($items);
$con->close();
?>
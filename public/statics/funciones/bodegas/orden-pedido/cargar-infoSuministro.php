<?php
include_once '../../../on-database.php';
$numero   = $_POST['codigo'];

$query = "SELECT P.descripcion, I.saldoActual, I.valorMinimo, I.valorMaximo, U.unidad, C.consMensual
            FROM (SELECT SUM(consumo) consMensual FROM historial_consumo WHERE MONTH(fecha) = MONTH(CURDATE()) AND producto = $numero) AS C,producto AS P
            INNER JOIN inventario AS I ON P.codigo = I.producto
            INNER JOIN unidadsuministros AS U ON U.codigo = P.unidadDeMedida 
            WHERE P.codigo = $numero;";

$resultado = $con->query($query);

$items = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $items[] = $fila;
}

echo json_encode($items);
$con->close();
?>
<?php
include_once '../../../on-database.php';

$query = "SELECT E.*, T.nombreComercial FROM envioPredio AS E
            INNER JOIN transportista AS T ON E.transportista = T.id 
            WHERE estado = 'Camino a Predio' OR fecha = CURDATE();";

$resultado = $con->query($query);

$items = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $items[] = $fila;
}

echo json_encode($items);
$con->close();
?>
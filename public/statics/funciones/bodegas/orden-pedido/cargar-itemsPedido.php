<?php
include_once '../../../on-database.php';
$numero   = $_POST['codigo'];

if(isset($_POST['cotizado'])){
    $query = "SELECT * FROM ordenPedidoProducto
                WHERE codigoPedido = '$numero' AND estado = 'Cotizado' ORDER BY idPedProd DESC;";
}else{
    $query = "SELECT * FROM ordenPedidoProducto WHERE codigoPedido = $numero ORDER BY idPedProd DESC; ";
}


$resultado = $con->query($query);

$items = array();

while($fila = mysqli_fetch_assoc($resultado)){
    $items[] = $fila;
    
}

echo json_encode($items);
$con->close();
?>
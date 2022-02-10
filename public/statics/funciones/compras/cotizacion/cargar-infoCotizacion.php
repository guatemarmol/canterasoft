<?php
    include_once '../../../on-database.php';
    
    $pedido = $_POST['pedido'];
    $pedProducto = $_POST['pedProducto'];
    
    $query = "SELECT * FROM cotizacion WHERE codPedido = '$pedido' AND codPedProd = $pedProducto;";
    
    $resultado = $con->query($query);
    
    $items = array();
    
    while($fila = mysqli_fetch_assoc($resultado)){
        $items[] = $fila;
    }
    
    echo json_encode($items);
    $con->close();
?>
<?php
    include_once '../../../on-database.php';
    $proveedor = $_POST['id'];
    
    $query = "SELECT * FROM proveedor WHERE codigo = $proveedor;";
    
    $resultado = $con->query($query);
    
    $items = array();
    
    while($fila = mysqli_fetch_assoc($resultado)){
        $items[] = $fila;
    }
    
    echo json_encode($items);
    $con->close();
?>
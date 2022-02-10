<?php
    include_once '../../../on-database.php';
    
    $producto = $_POST['producto'];
    
    $query = "SELECT R.codigo, A.rango, R.nombre FROM producto AS P 
                INNER JOIN categoriasuministros AS C ON P.categoria = C.codigo
                INNER JOIN proveedorCategoria AS A ON A.categoria = P.categoria
                INNER JOIN proveedor AS R ON R.codigo = A.proveedor
                WHERE P.codigo = $producto
                ORDER BY A.rango;";
    
    $resultado = $con->query($query);
    
    $items = array();
    
    while($fila = mysqli_fetch_assoc($resultado)){
        $items[] = $fila;
    }
    
    echo json_encode($items);
    $con->close();
?>
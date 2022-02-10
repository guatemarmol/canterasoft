<?php
    include_once '../../../on-database.php';
    $numero   = $_POST['codigo'];

    $query = "SELECT P.nombre, O.idPedProd, O.descripcion, O.autorizacion, O.cantidad, C.precio, C.descuento, C.precioFinal, 
                        C.precioOrden , C.nota, C.fecha, R.solicitante, A.area
                FROM ordenPedidoProducto AS O
                INNER JOIN ordenPedido AS R ON O.codigoPedido = R.codigo
                INNER JOIN `area` AS A ON R.bodega = A.codigo
                INNER JOIN cotizacion AS C ON O.codigoPedido = C.codPedido 
                INNER JOIN proveedor AS P ON C.proveedor = P.codigo
                AND O.idPedProd = C.codPedProd
                AND O.codigoPedido = '$numero'
                AND O.estado = 'Cotizado';";


    $resultado = $con->query($query);

    $items = array();

    while($fila = mysqli_fetch_assoc($resultado)){
        $items[] = $fila;
    }

    echo json_encode($items);
    $con->close();
?>
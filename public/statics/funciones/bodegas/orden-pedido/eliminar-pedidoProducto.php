<?php
    include_once '../../../on-database.php';
    
    $numero = $_POST['codigo'];

    $consulta = "DELETE FROM ordenPedidoProducto WHERE codigoPedido = '$numero';";
    $ejecutar = mysqli_query($con, $consulta);
    $con->close();
?>
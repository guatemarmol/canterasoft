<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$numero   = $_POST['numero'];
$consulta = "SELECT * FROM ingresoBodega WHERE numero='$numero'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {
    //////////////ACTUALIZAR///////////
    ///////////////////////////////////
    $numero       = $_POST['numero'];
    $fechaIngreso = $_POST['fechaIngreso'];
    $lineaIngreso = $_POST['lineaIngreso'];
    $ordenCompra  = $_POST['ordenCompra'];
    $lineaOrden   = $_POST['lineaOrden'];
    $factura      = $_POST['factura'];
    $fecha        = $_POST['fecha'];
    $hora         = $_POST['hora'];

    $actualizar = "UPDATE  ingresoBodega SET fechaIngreso='$fechaIngreso', lineaIngreso='$lineaIngreso', ordenCompra='$ordenCompra', lineaOrden='$lineaOrden', factura='$factura', fecha='$fecha', hora='$hora' WHERE numero='$numero'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {
    //////////////GUARDAR///////////
    ////////////////////////////////
    $consulta = "SELECT MAX(numero) numero FROM ingresoBodega";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $numero   = $tabla['numero'];
    $numero++;

    $fechaIngreso = $_POST['fechaIngreso'];
    $lineaIngreso = $_POST['lineaIngreso'];
    $ordenCompra  = $_POST['ordenCompra'];
    $lineaOrden   = $_POST['lineaOrden'];
    $factura      = $_POST['factura'];
    $fecha        = $_POST['fecha'];
    $hora         = $_POST['hora'];

    $agregar = "INSERT INTO ingresoBodega (numero, fechaIngreso, lineaIngreso, ordenCompra, lineaOrden, factura, fecha, hora)
                            VALUES ('$numero', '$fechaIngreso', '$lineaIngreso', '$ordenCompra', '$lineaOrden', '$factura', '$fecha', '$hora')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
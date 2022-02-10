<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$numero   = $_POST['numero'];
$consulta = "SELECT * FROM cheque WHERE numero='$numero'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {
    //////////////ACTUALIZAR///////////
    ///////////////////////////////////
    $numero1         = $_POST['numero'];
    $cuenta          = $_POST['cuenta'];
    $fechaCheque     = $_POST['fechaCheque'];
    $lineaCheque     = $_POST['lineaCheque'];
    $lineaContrasena = $_POST['lineaContrasena'];
    $monto           = $_POST['monto'];
    $fechaEntrega    = $_POST['fechaEntrega'];
    $fecha           = $_POST['fecha'];
    $hora            = $_POST['hora'];

    $actualizar = "UPDATE cheque SET cuenta='$cuenta', fechaCheque='$fechaCheque', lineaCheque='$lineaCheque', lineaContrasena='$lineaContrasena', monto='$monto', fechaEntrega='$fechaEntrega', fecha='$fecha', hora='$hora' WHERE numero='$numero'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {
    //////////////GUARDAR///////////
    ////////////////////////////////
    $consulta = "SELECT MAX(numero) numero FROM cheque";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $numero   = $tabla['numero'];
    $numero++;

    $cuenta          = $_POST['cuenta'];
    $fechaCheque     = $_POST['fechaCheque'];
    $lineaCheque     = $_POST['lineaCheque'];
    $lineaContrasena = $_POST['lineaContrasena'];
    $monto           = $_POST['monto'];
    $fechaEntrega    = $_POST['fechaEntrega'];
    $fecha           = $_POST['fecha'];
    $hora            = $_POST['hora'];

    $agregar = "INSERT INTO cheque (numero, cuenta, fechaCheque, lineaCheque, lineaContrasena, monto, fechaEntrega, fecha, hora)
                            VALUES ('$numero', '$cuenta', '$fechaCheque', '$lineaCheque', '$lineaContrasena', '$monto', '$fechaEntrega', '$fecha', '$hora')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
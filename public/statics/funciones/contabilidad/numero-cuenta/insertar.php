<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$numero   = $_POST['numero'];
$consulta = "SELECT * FROM numeroCuenta WHERE numero='$numero'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {
    //////////////ACTUALIZAR///////////
    ///////////////////////////////////
    $numero = $_POST['numero'];
    $banco  = $_POST['banco'];
    $moneda = $_POST['moneda'];
    $fecha  = $_POST['fecha'];
    $hora   = $_POST['hora'];

    $actualizar = "UPDATE numeroCuenta SET banco='$banco', moneda='$moneda', fecha='$fecha', hora='$hora' WHERE numero='$numero'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {
    //////////////GUARDAR///////////
    ////////////////////////////////
    $numero = $_POST['numero'];
    $banco  = $_POST['banco'];
    $moneda = $_POST['moneda'];
    $fecha  = $_POST['fecha'];
    $hora   = $_POST['hora'];

    $agregar = "INSERT INTO numeroCuenta (numero, banco, moneda, fecha, hora)
                            VALUES ('$numero', '$banco', '$moneda', '$fecha', '$hora')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
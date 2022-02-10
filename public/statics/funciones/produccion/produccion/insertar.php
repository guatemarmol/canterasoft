<?php include_once '../../../on-database.php'?>

<?php
$correlativo = $_POST['correlativo'];
$consulta    = "SELECT * FROM produccion WHERE correlativo='$correlativo'";
$ejecutar    = mysqli_query($con, $consulta);
$fila        = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $correlativo = $_POST['correlativo'];
    $lote        = $_POST['lote'];
    $productos   = $_POST['productos'];
    $estadoJumbo = $_POST['estadoJumbo'];
    $turno       = $_POST['turno'];
    $peso        = $_POST['peso'];
    $fecha       = $_POST['fecha'];
    $hora        = $_POST['hora'];
    $actualizar  = "UPDATE produccion SET productos='$productos', turno='$turno', lote='$lote', peso='$peso', estadoJumbo='$estadoJumbo', fecha='$fecha', hora='$hora' WHERE correlativo='$correlativo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $consulta    = "SELECT MAX(correlativo) correlativo FROM produccion";
    $ejecutar    = mysqli_query($con, $consulta);
    $tabla       = mysqli_fetch_array($ejecutar);
    $correlativo = $tabla['correlativo'];
    $correlativo++;
    if ($correlativo == 1) {
        $correlativo = "PRO-1000000000";
    } else if ($correlativo != 1) {
        $correlativo = $correlativo;
    }
    $lote        = $_POST['lote'];
    $productos   = $_POST['productos'];
    $estadoJumbo = $_POST['estadoJumbo'];
    $turno       = $_POST['turno'];
    $peso        = $_POST['peso'];
    $fecha       = $_POST['fecha'];
    $hora        = $_POST['hora'];
    $agregar     = "INSERT INTO produccion (correlativo, productos, turno, lote, peso, estadoJumbo, fecha, hora)
VALUES ('$correlativo', '$productos', '$turno','$lote', '$peso', '$estadoJumbo', '$fecha', '$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

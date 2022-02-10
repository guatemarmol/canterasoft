<?php include_once '../../../on-database.php'?>

<?php

$numeroFactura = $_POST['numeroFactura'];
$consulta      = "SELECT * FROM lineaFacturacion WHERE numeroFactura='$numeroFactura'";
$ejecutar      = mysqli_query($con, $consulta);
$fila          = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $numeroFactura         = $_POST['numeroFactura'];
    $lineaFacturacion      = $_POST['lineaFacturacion'];
    $correlativoProduccion = $_POST['correlativoProduccion'];
    $fecha                 = $_POST['fecha'];
    $hora                  = $_POST['hora'];

    $actualizar = "UPDATE lineaFacturacion SET lineaFacturacion='$lineaFacturacion', correlativoProduccion='$correlativoProduccion', fecha='$fecha', hora='$hora' WHERE numeroFactura='$numeroFactura'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $consulta      = "SELECT MAX(numeroFactura) numeroFactura FROM lineaFacturacion";
    $ejecutar      = mysqli_query($con, $consulta);
    $tabla         = mysqli_fetch_array($ejecutar);
    $numeroFactura = $tabla['numeroFactura'];
    $numeroFactura++;

    $lineaFacturacion      = $_POST['lineaFacturacion'];
    $correlativoProduccion = $_POST['correlativoProduccion'];
    $fecha                 = $_POST['fecha'];
    $hora                  = $_POST['hora'];

    $agregar = "INSERT INTO lineaFacturacion (numeroFactura, lineaFacturacion, correlativoProduccion, fecha, hora)
                            VALUES ('$numeroFactura','$lineaFacturacion','$correlativoProduccion','$fecha','$hora')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
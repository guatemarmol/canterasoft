<?php include_once '../../../on-database.php'?>
<?php
$correlativo = $_POST['correlativo'];
$consulta    = "SELECT * FROM laboratorio WHERE correlativo='$correlativo'";
$ejecutar    = mysqli_query($con, $consulta);
$fila        = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $correlativo           = $_POST['correlativo'];
    $correlativoProduccion = $_POST['correlativoProduccion'];
    $especificacion1       = $_POST['especificacion1'];
    $especificacion2       = $_POST['especificacion2'];
    $fecha                 = $_POST['fecha'];
    $hora                  = $_POST['hora'];
    $actualizar            = "UPDATE laboratorio SET correlativoProduccion='$correlativoProduccion', especificacion1='$especificacion1', especificacion2='$especificacion2', fecha='$fecha', hora='$hora' WHERE correlativo='$correlativo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta    = "SELECT MAX(correlativo) correlativo FROM laboratorio";
    $ejecutar    = mysqli_query($con, $consulta);
    $tabla       = mysqli_fetch_array($ejecutar);
    $correlativo = $tabla['correlativo'];
    $correlativo++;
    if ($correlativo == 1) {
        $correlativo = "LABO-0000000000";
    } else if ($correlativo != 1) {
        $correlativo = $correlativo;
    }
    $correlativoProduccion = $_POST['correlativoProduccion'];
    $especificacion1       = $_POST['especificacion1'];
    $especificacion2       = $_POST['especificacion2'];
    $fecha                 = $_POST['fecha'];
    $hora                  = $_POST['hora'];
    $agregar               = "INSERT INTO laboratorio (correlativo, correlativoProduccion, especificacion1, especificacion2, fecha, hora)
                            VALUES ('$correlativo','$correlativoProduccion','$especificacion1','$especificacion2','$fecha','$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

<?php include_once '../../../on-database.php'?>
<?php
$numero   = $_POST['numero'];
$consulta = "SELECT * FROM bajaJumbo WHERE numero='$numero'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $numero            = $_POST['numero'];
    $correlativo       = $_POST['correlativo'];
    $documentoRespaldo = $_POST['documentoRespaldo'];
    $fecha             = $_POST['fecha'];
    $hora              = $_POST['hora'];
    $actualizar        = "UPDATE  bajaJumbo SET correlativo='$correlativo', documentoRespaldo='$documentoRespaldo', fecha='$fecha', hora='$hora' WHERE numero='$numero'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta = "SELECT MAX(numero) numero FROM bajaJumbo";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $numero   = $tabla['numero'];
    $numero++;
    if ($numero == 1) {
        $numero = "BAJU-0000000000";
    } else if ($numero != 1) {
        $numero = $numero;
    }
    $correlativo       = $_POST['correlativo'];
    $documentoRespaldo = $_POST['documentoRespaldo'];
    $fecha             = $_POST['fecha'];
    $hora              = $_POST['hora'];
    $agregar           = "INSERT INTO bajaJumbo (numero, correlativo, documentoRespaldo, fecha, hora)
                            VALUES ('$numero', '$correlativo', '$documentoRespaldo','$fecha', '$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

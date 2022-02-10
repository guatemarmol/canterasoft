<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM bodega WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $codigo     = $_POST['codigo'];
    $nombre     = $_POST['nombre'];
    $ubicacion  = $_POST['ubicacion'];
    $encargado  = $_POST['encargado'];
    $fecha      = $_POST['fecha'];
    $hora       = $_POST['hora'];
    $actualizar = "UPDATE bodega SET nombre='$nombre', ubicacion='$ubicacion', encargado='$encargado', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta = "SELECT MAX(codigo) codigo FROM bodega";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;
    if ($codigo == 1) {
        $codigo = "BPRO-00000";
    } else if ($codigo != 1) {
        $codigo = $codigo;
    }
    $nombre    = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $encargado = $_POST['encargado'];
    $fecha     = $_POST['fecha'];
    $hora      = $_POST['hora'];
    $agregar   = "INSERT INTO bodega (codigo, nombre, ubicacion, encargado, fecha, hora)
                            VALUES ('$codigo', '$nombre', '$ubicacion', '$encargado', '$fecha', '$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

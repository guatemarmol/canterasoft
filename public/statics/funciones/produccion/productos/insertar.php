<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM productos WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $codigo           = $_POST['codigo'];
    $nombreEspecifico = $_POST['nombreEspecifico'];
    $especificacion1  = $_POST['especificacion1'];
    $especificacion2  = $_POST['especificacion2'];
    $precio1          = $_POST['precio1'];
    $precio2          = $_POST['precio2'];
    $precio3          = $_POST['precio3'];
    $costo            = $_POST['costo'];
    $fecha            = $_POST['fecha'];
    $hora             = $_POST['hora'];
    $actualizar       = "UPDATE productos SET nombreEspecifico='$nombreEspecifico', especificacion1='$especificacion1', especificacion2='$especificacion2', precio1='$precio1', precio2='$precio2', precio3='$precio3', costo='$costo', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta = "SELECT MAX(codigo) codigo FROM productos";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;
    $nombreEspecifico = $_POST['nombreEspecifico'];
    $especificacion1  = $_POST['especificacion1'];
    $especificacion2  = $_POST['especificacion2'];
    $precio1          = $_POST['precio1'];
    $precio2          = $_POST['precio2'];
    $precio3          = $_POST['precio3'];
    $costo            = $_POST['costo'];
    $fecha            = $_POST['fecha'];
    $hora             = $_POST['hora'];
    $agregar          = "INSERT INTO productos (codigo, nombreEspecifico, especificacion1, especificacion2, precio1, precio2, precio3, costo, fecha, hora)
                            VALUES ('$codigo', '$nombreEspecifico', '$especificacion1', '$especificacion2', '$precio1', '$precio2', '$precio3', '$costo', '$fecha', '$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

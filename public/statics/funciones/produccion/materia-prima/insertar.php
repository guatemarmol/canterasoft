<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM materiaPrima WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $codigo      = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $color       = $_POST['color'];
    $densidad    = $_POST['densidad'];
    $variable1   = $_POST['variable1'];
    $variable2   = $_POST['variable2'];
    $variable3   = $_POST['variable3'];
    $fecha       = $_POST['fecha'];
    $hora        = $_POST['hora'];
    $actualizar  = "UPDATE materiaPrima SET descripcion='$descripcion', color='$color', densidad='$densidad', variable1='$variable1', variable2='$variable2', variable3='$variable3', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta = "SELECT MAX(codigo) codigo FROM materiaPrima";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;
    if ($codigo == 1) {
        $codigo = "MPRI-00000";
    } else if ($codigo != 1) {
        $codigo = $codigo;
    }
    $descripcion = $_POST['descripcion'];
    $color       = $_POST['color'];
    $densidad    = $_POST['densidad'];
    $variable1   = $_POST['variable1'];
    $variable2   = $_POST['variable2'];
    $variable3   = $_POST['variable3'];
    $fecha       = $_POST['fecha'];
    $hora        = $_POST['hora'];
    $agregar     = "INSERT INTO materiaPrima (codigo, descripcion, color, densidad, variable1, variable2, variable3, fecha, hora)
                            VALUES ('$codigo', '$descripcion', '$color', '$densidad', '$variable1', '$variable2', '$variable3', '$fecha', '$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM transportista WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $codigo          = $_POST['codigo'];
    $nit             = $_POST['nit'];
    $nombreComercial = $_POST['nombreComercial'];
    $contacto        = $_POST['contacto'];
    $telefono        = $_POST['telefono'];
    $correo          = $_POST['correo'];
    $fecha           = $_POST['fecha'];
    $hora            = $_POST['hora'];
    $actualizar      = "UPDATE transportista SET nit='$nit', nombreComercial='$nombreComercial', contacto='$contacto', telefono='$telefono', correo='$correo', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta = "SELECT MAX(codigo) codigo FROM transportista";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;
    if ($codigo == 1) {
        $codigo = "TRAP-0000000000";
    } else if ($codigo != 1) {
        $codigo = $codigo;
    }
    $nit             = $_POST['nit'];
    $nombreComercial = $_POST['nombreComercial'];
    $contacto        = $_POST['contacto'];
    $telefono        = $_POST['telefono'];
    $correo          = $_POST['correo'];
    $fecha           = $_POST['fecha'];
    $hora            = $_POST['hora'];
    $agregar         = "INSERT INTO transportista (codigo, nit, nombreComercial, contacto, telefono, correo, fecha, hora)
                            VALUES ('$codigo','$nit','$nombreComercial','$contacto','$telefono','$correo','$fecha','$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

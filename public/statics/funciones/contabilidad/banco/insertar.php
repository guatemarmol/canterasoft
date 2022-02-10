<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM banco WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {
    //////////////ACTUALIZAR///////////
    ///////////////////////////////////
    $codigo    = $_POST['codigo'];
    $nombre    = $_POST['nombre'];
    $telefono1 = $_POST['telefono1'];
    $contacto1 = $_POST['contacto1'];
    $telefono2 = $_POST['telefono2'];
    $contacto2 = $_POST['contacto2'];
    $fecha     = $_POST['fecha'];
    $hora      = $_POST['hora'];

    $actualizar = "UPDATE banco SET nombre='$nombre', telefono1='$telefono1', contacto1='$contacto1', telefono2='$telefono2', contacto2='$contacto2', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {
    //////////////GUARDAR///////////
    ////////////////////////////////
    $consulta = "SELECT MAX(codigo) codigo FROM banco";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;

    $nombre    = $_POST['nombre'];
    $telefono1 = $_POST['telefono1'];
    $contacto1 = $_POST['contacto1'];
    $telefono2 = $_POST['telefono2'];
    $contacto2 = $_POST['contacto2'];
    $fecha     = $_POST['fecha'];
    $hora      = $_POST['hora'];

    $agregar = "INSERT INTO banco (codigo, nombre, telefono1, contacto1, telefono2, contacto2, fecha, hora)
                            VALUES ('$codigo', '$nombre', '$telefono1', '$contacto1', '$telefono2', '$contacto2', '$fecha', '$hora')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
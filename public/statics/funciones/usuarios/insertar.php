<?php include_once '../../on-database.php'?>

<?php
$usuario = $_POST['usuario'];
$query   = mysqli_query($con, "SELECT * FROM usuario WHERE usuario = '$usuario'");
$result  = mysqli_num_rows($query);

if ($result > 0) {

    $usuario      = $_POST['usuario'];
    $contrasena   = $_POST['contrasena'];
    $ccontrasena  = $_POST['contrasenaConfirmar'];
    $username     = $_POST['nombreMostrar'];
    $username0    = $_POST['apellidoMostrar'];
    $departamento = $_POST['puesto'];
    $rol          = $_POST['rol'];
    $fecha        = $_POST['fecha'];
    $hora         = $_POST['hora'];

    $update = "UPDATE usuario SET usuario='$usuario', contrasena='$contrasena', ccontrasena='$ccontrasena', username='$username', username0='$username0', departamento='$departamento', rol='$rol', fecha='$fecha', hora='$hora' WHERE usuario='$usuario'";

    mysqli_query($con, $update);

    if ($update = true) {
        echo "<center><strong><h4>¡Se Actualizo con Éxito!<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $consulta = "SELECT COUNT(usuario) usuario FROM usuario";
    $ejecutar = mysqli_query($con, $consulta);

    $tabla = mysqli_fetch_array($ejecutar);
    $num   = $tabla['usuario'];
    $num++;

    $usuario      = $_POST['usuario'];
    $contrasena   = $_POST['contrasena'];
    $ccontrasena  = $_POST['contrasenaConfirmar'];
    $username     = $_POST['nombreMostrar'];
    $username0    = $_POST['apellidoMostrar'];
    $departamento = $_POST['puesto'];
    $rol          = $_POST['rol'];
    $fecha        = $_POST['fecha'];
    $hora         = $_POST['hora'];
	
    $insert = "INSERT INTO usuario (usuario, contrasena, nombre, apellido, departamento, rol, fecha, hora)
                            VALUES ('$usuario','$contrasena','$username','$username0','$departamento',$rol,'$fecha','$hora')";	
    $response = mysqli_query($con, $insert);
			
    if ($response) {
        echo "<center><strong><h4>¡Se Agrego con Éxito!<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error, Verificalo! <BR></strong></h4></center>";
    }
}
?>
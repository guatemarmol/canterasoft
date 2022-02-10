<?php include_once '../../on-database.php'?>

<?php
session_start();

$usuario = $_POST['usuario'];
$query   = mysqli_query($con, "SELECT * FROM usuario WHERE usuario = '$usuario' ");
$result  = mysqli_num_rows($query);

if ($result > 0) {

    $usuario = $_POST['usuario'];
    $pass    = $_POST['pass'];
    $repass  = $_POST['repass'];

    $actualizar = "UPDATE usuario SET contrasena='$pass', ccontrasena='$repass' WHERE usuario='$usuario'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

}
?>
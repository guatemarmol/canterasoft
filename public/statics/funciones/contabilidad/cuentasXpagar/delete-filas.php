<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA----------------------------->
<!-------------------------------------------------------------->
<?php
$codigo   = $_POST['codigo1'];
$consulta = "SELECT * FROM cuentasXpagarSAP WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $tt = "DELETE FROM cuentasXpagarTT WHERE codigo='$codigo'";

    mysqli_query($con, $tt);

    $pp = "DELETE FROM cuentasXpagarPP WHERE codigo='$codigo'";

    mysqli_query($con, $pp);

    $sql = "DELETE FROM cuentasXpagarSAP WHERE codigo='$codigo'";

    mysqli_query($con, $sql);

    if ($sql = true) {
        echo "<center><strong><h4>¡ Se Elimino la Cuenta !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Eliminación, Verificalo!<BR></strong></h4></center>";
    }

} else {

    echo "<center><strong><h4>¡ No hay que Eliminar, Verificalo !<BR></h4></center>";
}
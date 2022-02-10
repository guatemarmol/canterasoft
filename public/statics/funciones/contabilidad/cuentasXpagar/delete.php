<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$codigo           = $_POST['codigo1'];
$fContabilizacion = $_POST['fContabilizacion'];
$fVencimiento     = $_POST['fVencimiento'];
$nReferencia      = $_POST['nReferencia'];
$consulta         = "SELECT * FROM cuentasXpagarSAP WHERE codigo='$codigo' AND fContabilizacion='$fContabilizacion' AND fVencimiento='$fVencimiento' AND nReferencia='$nReferencia' ";
$ejecutar         = mysqli_query($con, $consulta);
$fila             = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $sql = "DELETE FROM cuentasXpagarSAP WHERE codigo='$codigo' AND fContabilizacion='$fContabilizacion' AND fVencimiento='$fVencimiento' AND nReferencia='$nReferencia' ";

    mysqli_query($con, $sql);

    if ($sql = true) {
        echo "<center><strong><h4>¡ Se Elimino La Fila !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Eliminación, Verificalo!<BR></strong></h4></center>";
    }

} else {

    echo "<center><strong><h4>¡ No hay que Eliminar, Verificalo !<BR></h4></center>";
}
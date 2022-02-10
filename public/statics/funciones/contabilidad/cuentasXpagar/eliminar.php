<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$idC      = $_POST['idC'];
$consulta = "SELECT * FROM cuentasXpagarSAP WHERE codigo='$idC'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $tt = "DELETE FROM cuentasXpagarTT";
    mysqli_query($con, $tt);

    $pp = "DELETE FROM cuentasXpagarPP";
    mysqli_query($con, $pp);

    $diasCorriente = "DELETE FROM cuentasXpagarCorriente";
    mysqli_query($con, $diasCorriente);

    $diasUno = "DELETE FROM cuentasXpagarUno";
    mysqli_query($con, $diasUno);

    $diasDos = "DELETE FROM cuentasXpagarDos";
    mysqli_query($con, $diasDos);

    $diasTres = "DELETE FROM cuentasXpagarTres";
    mysqli_query($con, $diasTres);

    $diasCuatro = "DELETE FROM cuentasXpagarCuatro";
    mysqli_query($con, $diasCuatro);

    $diasCinco = "DELETE FROM cuentasXpagarCinco";
    mysqli_query($con, $diasCinco);

    $diasSaldo = "DELETE FROM cuentasXpagarSaldo";
    mysqli_query($con, $diasSaldo);

    $lote = "DELETE FROM cuentasXpagarLote";
    mysqli_query($con, $lote);

    $del = "DELETE FROM cuentasXpagarSAP";
    mysqli_query($con, $del);

    if ($del = true) {

        echo "<center><strong><h4>¡ Se Borro la Tabla de Cuentas por Pagar de SAP !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡ Hubo un Error al Borrar, Verificalo !<BR></strong></h4></center>";
    }

} else {
    echo '<h4>¡ No hay Cuentas por Pagar !</4>';
}
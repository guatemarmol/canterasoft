<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigoL'];
$consulta = "SELECT * FROM packingLocal WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $codigo        = $_POST['codigoL'];
    $tipo          = $_POST['tipo'];
    $nPackingList  = $_POST['nPackingListL'];
    $appd          = $_POST['appdL'];
    $transportista = $_POST['transportistaL'];
    $piloto        = $_POST['pilotoL'];
    $placa         = $_POST['placaL'];
    $fecha         = $_POST['fecha'];
    $hora          = $_POST['hora'];

    include 'inserar-filas-local.php';

    $actualizar = "UPDATE packingLocal SET tipo='$tipo', nPackingList='$nPackingList', apdd='$appd', transporte='$transportista', piloto='$piloto', placa='$placa', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);

    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $consulta = "SELECT MAX(codigo) codigo FROM packingLocal";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;
    $tipo          = $_POST['tipo'];
    $nPackingList  = $_POST['nPackingListL'];
    $appd          = $_POST['appdL'];
    $transportista = $_POST['transportistaL'];
    $piloto        = $_POST['pilotoL'];
    $placa         = $_POST['placaL'];
    $fecha         = $_POST['fecha'];
    $hora          = $_POST['hora'];

    include 'inserar-filas-local.php';

    $agregar = "INSERT INTO packingLocal (codigo, tipo, nPackingList, apdd, transporte, piloto, placa, fecha, hora)
VALUES ( '$codigo','$tipo','$nPackingList','$appd','$transportista','$piloto','$placa','$fecha','$hora')";
    mysqli_query($con, $agregar);

    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }

}

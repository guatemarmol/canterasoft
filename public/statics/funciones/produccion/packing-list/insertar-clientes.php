<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigoC'];
$consulta = "SELECT * FROM packingCliente WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $codigo        = $_POST['codigoC'];
    $tipo          = $_POST['tipo'];
    $nPedido       = $_POST['numPedidoC'];
    $cliente       = $_POST['nomClienteC'];
    $nOrdenCompra  = $_POST['nOrdenCompraC'];
    $nPackingList  = $_POST['nPackingListC'];
    $transportista = $_POST['transportistaC'];
    $piloto        = $_POST['pilotoC'];
    $placa         = $_POST['placaC'];
    $plataforma    = $_POST['plataformaC'];
    $fecha         = $_POST['fecha'];
    $hora          = $_POST['hora'];

    include 'inserar-filas-cliente.php';

    $actualizar = "UPDATE packingCliente SET tipo='$tipo', nPedido='$nPedido', cliente='$cliente', nOrdenCompra='$nOrdenCompra', nPackingList='$nPackingList', transporte='$transportista', piloto='$piloto', placa='$placa', plataforma='$plataforma', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);

    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $consulta = "SELECT MAX(codigo) codigo FROM packingCliente";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;

    $tipo          = $_POST['tipo'];
    $nPedido       = $_POST['numPedidoC'];
    $cliente       = $_POST['nomClienteC'];
    $nOrdenCompra  = $_POST['nOrdenCompraC'];
    $nPackingList  = $_POST['nPackingListC'];
    $transportista = $_POST['transportistaC'];
    $piloto        = $_POST['pilotoC'];
    $placa         = $_POST['placaC'];
    $plataforma    = $_POST['plataformaC'];
    $fecha         = $_POST['fecha'];
    $hora          = $_POST['hora'];

    include 'inserar-filas-cliente.php';

    $agregar = "INSERT INTO packingCliente(codigo, tipo, nPedido, cliente, nOrdenCompra, nPackingList, transporte, piloto, placa, plataforma, fecha, hora)
VALUES ('$codigo','$tipo','$nPedido','$cliente','$nOrdenCompra','$nPackingList','$transportista','$piloto','$placa','$plataforma','$fecha','$hora')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }

}

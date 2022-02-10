<?php include_once '../on-database.php'
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Packing List | CanteraSoft</title>
    <link rel="shortcut icon" type="../image/x-icon" href="../images/icono.ico"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
</head>
    <?php include_once '../partials/funciones-css.php'
    ?>
    <?php include_once '../partials/menu.html'
    ?>
<body onload="relojCalendarioP()">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 espacio">

                <form name="form" class="form" id="form" method="POST" action="">

<?php
$codigo    = $_REQUEST['codigo'];
$consultaC = "SELECT * FROM packingCliente WHERE codigo='$codigo'";
$ejecutarC = mysqli_query($con, $consultaC);
$filaC     = mysqli_fetch_array($ejecutarC);

$codigoC     = $filaC['codigo'];
$tipoC       = $filaC['tipo'];
$clienteC    = $filaC['cliente'];
$transporteC = $filaC['transporte'];

$consultaL = "SELECT * FROM packingLocal WHERE codigo='$codigo'";
$ejecutarL = mysqli_query($con, $consultaL);
$filaL     = mysqli_fetch_array($ejecutarL);

$codigoL     = $filaL['codigo'];
$tipoL       = $filaL['tipo'];
$transporteL = $filaL['transporte'];

if ($codigoC != "") {

    $consultaC1     = "SELECT * FROM packingCliente WHERE codigo='$codigoC'";
    $ejecutarC1     = mysqli_query($con, $consultaC1);
    $filaC1         = mysqli_fetch_array($ejecutarC1);
    $codigoC1       = $filaC1['codigo'];
    $tipoC1         = $filaC1['tipo'];
    $nPedidoC1      = $filaC1['nPedido'];
    $clienteC1      = $filaC1['cliente'];
    $nOrdenCompraC1 = $filaC1['nOrdenCompra'];
    $nPackingListC1 = $filaC1['nPackingList'];
    $transporteC1   = $filaC1['transporte'];
    $pilotoC1       = $filaC1['piloto'];
    $placaC1        = $filaC1['placa'];
    $plataformaC1   = $filaC1['plataforma'];
    $fechaC1        = $filaC1['fecha'];
    $horaC1         = $filaC1['hora'];
    //echo '<h4>Si hay Cliente</h4>';
} else if ($codigoL != "") {

    $consultaL1     = "SELECT * FROM packingLocal WHERE codigo='$codigoL'";
    $ejecutarL1     = mysqli_query($con, $consultaL1);
    $filaL1         = mysqli_fetch_array($ejecutarL1);
    $codigoL1       = $filaL1['codigo'];
    $tipoL1         = $filaL1['tipo'];
    $nPackingListL1 = $filaL1['nPackingList'];
    $apddL1         = $filaL1['apdd'];
    $transporteL1   = $filaL1['transporte'];
    $pilotoL1       = $filaL1['piloto'];
    $placaL1        = $filaL1['placa'];
    $fechaL1        = $filaL1['fecha'];
    $horaL1         = $filaL1['hora'];
    //echo '<h4>Si hay Local</h4>';
} else {

}
?>

                    <?php include_once 'packing-list.html'?>

                </form>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-1 col-lg-1 espacio">
            </div>
        </div>
    </div>
    <span class="ir-arriba icon-eject"></span>
    <script type="text/javascript" src="../js/produccion/packing-list.js"></script>
    <?php include_once '../partials/funciones-js.php'?>
</body>
<footer>
    <?php require_once '../partials/footer.html'?>
</footer>
<?php include_once '../../../on-database.php'?>

<?php

$codigoEmpresa = $_POST['codigoEmpresa'];
$consulta      = "SELECT * FROM empresa WHERE codigoEmpresa='$codigoEmpresa'";
$ejecutar      = mysqli_query($con, $consulta);
$fila          = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $codigoEmpresa             = $_POST['codigoEmpresa'];
    $razonSocialEmpresa        = $_POST['razonSocialEmpresa'];
    $nitEmpresa                = $_POST['nitEmpresa'];
    $direccionFiscalEmpresa    = $_POST['direccionFiscalEmpresa'];
    $direccionOficinaEmpresa   = $_POST['direccionOficinaEmpresa'];
    $representanteLegalEmpresa = $_POST['representanteLegalEmpresa'];
    $giroNegocioEmpresa        = $_POST['giroNegocioEmpresa'];
    $fechaEmpresa              = $_POST['fechaEmpresa'];
    $horaEmpresa               = $_POST['horaEmpresa'];

    $actualizar = "UPDATE empresa SET razonSocialEmpresa='$razonSocialEmpresa', nitEmpresa='$nitEmpresa', direccionFiscalEmpresa='$direccionFiscalEmpresa' , direccionOficinaEmpresa='$direccionOficinaEmpresa', representanteLegalEmpresa='$representanteLegalEmpresa', giroNegocioEmpresa='$giroNegocioEmpresa', fechaEmpresa='$fechaEmpresa', horaEmpresa='$horaEmpresa'WHERE codigoEmpresa='$codigoEmpresa'";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $consulta      = "SELECT MAX(codigoEmpresa) codigoEmpresa FROM empresa";
    $ejecutar      = mysqli_query($con, $consulta);
    $tabla         = mysqli_fetch_array($ejecutar);
    $codigoEmpresa = $tabla['codigoEmpresa'];
    $codigoEmpresa++;

    $razonSocialEmpresa        = $_POST['razonSocialEmpresa'];
    $nitEmpresa                = $_POST['nitEmpresa'];
    $direccionFiscalEmpresa    = $_POST['direccionFiscalEmpresa'];
    $direccionOficinaEmpresa   = $_POST['direccionOficinaEmpresa'];
    $representanteLegalEmpresa = $_POST['representanteLegalEmpresa'];
    $giroNegocioEmpresa        = $_POST['giroNegocioEmpresa'];
    $fechaEmpresa              = $_POST['fechaEmpresa'];
    $horaEmpresa               = $_POST['horaEmpresa'];

    $agregar = "INSERT INTO empresa (codigoEmpresa, razonSocialEmpresa, nitEmpresa, direccionFiscalEmpresa, direccionOficinaEmpresa, representanteLegalEmpresa, giroNegocioEmpresa, fechaEmpresa, horaEmpresa)
                            VALUES ('$codigoEmpresa','$razonSocialEmpresa','$nitEmpresa','$direccionFiscalEmpresa','$direccionOficinaEmpresa','$representanteLegalEmpresa','$giroNegocioEmpresa','$fechaEmpresa','$horaEmpresa')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
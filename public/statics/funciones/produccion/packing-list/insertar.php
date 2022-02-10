<?php include_once '../../../on-database.php'?>
<?php
$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM packinList WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);
if ($fila > 0) {
    $codigo      = $_POST['codigo'];
    $tipo        = $_POST['tipo'];
    $cliente     = $_POST['cliente'];
    $direccion   = $_POST['direccion'];
    $ordenCompra = $_POST['ordenCompra'];
    $transporte  = $_POST['transporte'];
    $piloto      = $_POST['piloto'];
    $placa       = $_POST['placa'];
    $furgon      = $_POST['furgon'];
    $fecha       = $_POST['fecha'];
    $hora        = $_POST['hora'];
    $actualizar  = "UPDATE packinList SET tipo='$tipo', cliente='$cliente', direccion='$direccion', ordenCompra='$ordenCompra', transporte='$transporte', piloto='$piloto', placa='$placa', furgon='$furgon', fecha='$fecha', hora='$hora' WHERE codigo='$codigo'";
    mysqli_query($con, $actualizar);
    if ($actualizar = true) {
        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
} else {
    $consulta = "SELECT MAX(codigo) codigo FROM packinList";
    $ejecutar = mysqli_query($con, $consulta);
    $tabla    = mysqli_fetch_array($ejecutar);
    $codigo   = $tabla['codigo'];
    $codigo++;
    if ($codigo == 1) {
        $codigo = "PALI-0000000000";
    } else if ($codigo != 1) {
        $codigo = $codigo;
    }
    $tipo        = $_POST['tipo'];
    $cliente     = $_POST['cliente'];
    $direccion   = $_POST['direccion'];
    $ordenCompra = $_POST['ordenCompra'];
    $transporte  = $_POST['transporte'];
    $piloto      = $_POST['piloto'];
    $placa       = $_POST['placa'];
    $furgon      = $_POST['furgon'];
    $fecha       = $_POST['fecha'];
    $hora        = $_POST['hora'];
    $agregar     = "INSERT INTO packinList ( codigo, tipo, cliente, direccion, ordenCompra, transporte, piloto, placa, furgon, fecha, hora)
VALUES ( '$codigo', '$tipo', '$cliente', '$direccion', '$ordenCompra', '$transporte','$piloto', '$placa', '$furgon', '$fecha', '$hora')";
    mysqli_query($con, $agregar);
    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$codigo   = $_POST['codigo1'];
$consulta = "SELECT * FROM cuentasXpagarSAP WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {
    ////////////////////DEPENDIENDO EL TIPO ES LA ACCION///////////////////////
    ///////////////////////////////////////////////////////////////////////////
    $tipo = $_POST['tipo'];
    ////////////////////SI ES PP///////////////////////
    ///////////////////////////////////////////////////
    if ($tipo === 'PP') {
        $codigo   = $_POST['codigo1'];
        $lote     = $_POST['lote'];
        $consulta = "SELECT * FROM cuentasXpagarLote WHERE codigo='$codigo' AND lote='$lote'";
        $ejecutar = mysqli_query($con, $consulta);
        $fila     = mysqli_fetch_array($ejecutar);

        if ($fila > 0) {
            echo "<center><strong><h4>¡ Ya esta aplico el Pago !<BR></h4></center>";

        } else {

            $codigo0           = $_POST['codigo1'];
            $fContabilizacion0 = $_POST['fContabilizacion'];
            $fVencimiento0     = $_POST['fVencimiento'];
            $saldoVencido0     = $_POST['saldoVencido'];
            $nReferencia0      = $_POST['nReferencia'];

            $consulta1 = "SELECT * FROM cuentasXpagarSAP WHERE codigo='$codigo0' AND fContabilizacion='$fContabilizacion0' AND fVencimiento='$fVencimiento0' AND nReferencia='$nReferencia0' ";
            $ejecutar1 = mysqli_query($con, $consulta1);
            $i         = 0;
            while ($fila1 = mysqli_fetch_array($ejecutar1)) {
                $codigo1           = $fila1['codigo'];
                $fContabilizacion1 = $fila1['fContabilizacion'];
                $fVencimiento1     = $fila1['fVencimiento'];
                $saldoVencido1     = $fila1['saldoVencido'];
                $nReferencia1      = $fila1['nReferencia'];
                $i++;
            }

            if ($codigo0 === $codigo1 && $nReferencia0 === $nReferencia1 && $saldoVencido0 === $saldoVencido1) {
                //echo 'Igual..!';
                $delPP = "DELETE FROM cuentasXpagarSAP WHERE codigo='$codigo1' AND fContabilizacion='$fContabilizacion1' AND fVencimiento='$fVencimiento1' AND saldoVencido='$saldoVencido1' ";
                mysqli_query($con, $delPP);

                $lote         = $_POST['lote'];
                $saldoVencido = $_POST['saldoVencido'];
                $lote         = "INSERT INTO cuentasXpagarLote (codigo, lote, saldoVencido) VALUES ('$codigo', '$lote', '$saldoVencido')";
                mysqli_query($con, $lote);

                if ($delPP = true) {
                    echo "<center><strong><h4>¡ Se aplico el Pago !<BR></h4></center>";

                } else {
                    echo "<center><strong><h4>¡ Hubo un Error no se aplico, Verificalo !<BR></strong></h4></center>";
                }

            } else if ($codigo0 === $codigo1 && $nReferencia0 === $nReferencia1 && $saldoVencido0 < $saldoVencido1) {
                //echo 'Menor..!';
                $consulta4 = "SELECT * FROM cuentasXpagarSAP WHERE codigo='$codigo1' AND fContabilizacion='$fContabilizacion1' AND fVencimiento='$fVencimiento1' AND nReferencia='$nReferencia1'";
                $ejecutar4 = mysqli_query($con, $consulta4);
                $i         = 0;
                while ($fila4 = mysqli_fetch_array($ejecutar4)) {
                    $codigo4           = $fila4['codigo'];
                    $fContabilizacion4 = $fila4['fContabilizacion'];
                    $fVencimiento4     = $fila4['fVencimiento'];
                    $nReferencia4      = $fila4['nReferencia'];
                    $saldo4            = $fila4['saldoVencido'];
                    $i++;
                }
                $saldo = $_POST['saldoVencido'];
                $resta = $saldo4 - $saldo;

                $actualizar = "UPDATE cuentasXpagarSAP SET saldoVencido='$resta' WHERE codigo='$codigo4' AND fContabilizacion='$fContabilizacion4' AND fVencimiento='$fVencimiento4' AND nReferencia='$nReferencia4'";
                mysqli_query($con, $actualizar);

                $lote         = $_POST['lote'];
                $saldoVencido = $_POST['saldoVencido'];
                $lote         = "INSERT INTO cuentasXpagarLote (codigo, lote, saldoVencido) VALUES ('$codigo', '$lote', '$saldoVencido')";
                mysqli_query($con, $lote);

                if ($actualizar = true) {
                    echo "<center><strong><h4>¡ Se aplico el pago parcial !<BR></h4></center>";

                } else {
                    echo "<center><strong><h4>¡Hubo un Error no se agrego, Verificalo!<BR></strong></h4></center>";
                }

            } else if ($codigo0 === $codigo1 && $nReferencia0 === $nReferencia1 && $saldoVencido0 > $saldoVencido1) {
                //echo 'Mayor..!';
                echo "<center><strong><h4>¡ La cantidad supera la Factura Actual !<BR></strong></h4></center>";

            } else {
                echo 'No existe Factura...!';
            }

        }

    } else {
        $codigo           = $_POST['codigo1'];
        $nombreAcreedor   = $_POST['nombreAcreedor'];
        $descripcion      = $_POST['descripcion'];
        $nReferencia      = $_POST['nReferencia'];
        $tipo             = $_POST['tipo'];
        $fContabilizacion = $_POST['fContabilizacion'];
        $fVencimiento     = $_POST['fVencimiento'];
        $saldoVencido     = $_POST['saldoVencido'];

        $agregar = "INSERT INTO cuentasXpagarSAP (codigo, nombreAcreedor, descripcion, nReferencia, tipo, fContabilizacion, fVencimiento, saldoVencido)
    VALUES ('$codigo', '$nombreAcreedor', '$descripcion', '$nReferencia', '$tipo', '$fContabilizacion', '$fVencimiento', '$saldoVencido')";

        mysqli_query($con, $agregar);

        if ($agregar = true) {
            echo "<center><strong><h4>¡ Se Agrego la Nueva Factura !<BR></h4></center>";

        } else {
            echo "<center><strong><h4>¡Hubo un Error no se agrego, Verificalo!<BR></strong></h4></center>";
        }
    }

} else {

    $codigo           = $_POST['codigo1'];
    $nombreAcreedor   = $_POST['nombreAcreedor'];
    $descripcion      = $_POST['descripcion'];
    $nReferencia      = $_POST['nReferencia'];
    $tipo             = $_POST['tipo'];
    $fContabilizacion = $_POST['fContabilizacion'];
    $fVencimiento     = $_POST['fVencimiento'];
    $saldoVencido     = $_POST['saldoVencido'];

    $agregar = "INSERT INTO cuentasXpagarSAP (codigo, nombreAcreedor, descripcion, nReferencia, tipo, fContabilizacion, fVencimiento, saldoVencido)
    VALUES ('$codigo', '$nombreAcreedor', '$descripcion', '$nReferencia', '$tipo', '$fContabilizacion', '$fVencimiento', '$saldoVencido')";

    mysqli_query($con, $agregar);

    if ($agregar = true) {
        echo "<center><strong><h4>¡ Se Agrego el Nuevo Acreedor !<BR></h4></center>";

    } else {
        echo "<center><strong><h4>¡Hubo un Error no se agrego, Verificalo!<BR></strong></h4></center>";
    }
}

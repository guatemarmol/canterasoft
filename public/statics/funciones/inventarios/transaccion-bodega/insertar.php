<?php include_once '../../../on-database.php'?>

<?php

$numeroTransaccion = $_POST['numeroTransaccion'];
$consulta          = "SELECT * FROM transaccionBodegaInventarios WHERE numeroTransaccion='$numeroTransaccion'";
$ejecutar          = mysqli_query($con, $consulta);
$fila              = mysqli_fetch_array($ejecutar);

if ($fila > 0) {

    $numeroTransaccion   = $_POST['numeroTransaccion'];
    $suministro          = $_POST['suministro'];
    $tipoTransaccion     = $_POST['tipoTransaccion'];
    $cantidadTransaccion = $_POST['cantidadTransaccion'];
    $fechamodificacion   = $_POST['fecha'];
    $horamodificacion    = $_POST['hora'];

    $actualizar = "UPDATE transaccionBodegaInventarios SET suministro='$suministro', tipoTransaccion='$tipoTransaccion', cantidadTransaccion='$cantidadTransaccion', fechamodificacion='$fechamodificacion', horamodificacion='$horamodificacion' WHERE numeroTransaccion='$numeroTransaccion';";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        if ($tipoTransaccion == 'Entrada')
        {
            $select = "UPDATE 
                      `inventario` 
                       SET
                      `saldoActual` = `saldoActual` + $cantidadTransaccion
                       WHERE `producto` = '$suministro' ;";
            mysqli_query($con, $select);
            if ($select = true)
            {
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
            }
            else
            {
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
            }
        }
        else if ($tipoTransaccion == 'Salida')
        {
            $consulta = "SELECT saldoActual,valorMinimo  FROM suministrobodega WHERE `producto` = '$suministro';";
            $ejecutar = mysqli_query($con, $consulta);
            $tabla = mysqli_fetch_array($ejecutar);
            $saldo = $tabla['saldo'];
            $resta = floatval($saldo) - $cantidadTransaccion;

            if ($resta >= 0)
            {
                $select = "UPDATE 
                      `suministrobodega` 
                       SET
                      `saldoActual` = $resta
                       WHERE `producto` = '$suministro' ;";
                mysqli_query($con, $select);
                if ($select = true)
                {
                    echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
                }
                else
                {
                    echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
                }
            }
            else
            {
                echo "<center><strong><h4>¡ No se puede realizar esta transaccion !<BR></h4></center>";
            }

        }
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    $suministro          = $_POST['suministro'];
    $tipoTransaccion     = $_POST['tipoTransaccion'];
    $cantidadTransaccion = floatval($_POST['cantidadTransaccion']);
    $horaTransaccion     = $_POST['hora'];

    $agregar = "INSERT INTO transaccionBodegaInventarios(suministro, tipoTransaccion, cantidadTransaccion, fechaTransaccion, horaTransaccion)
                            VALUES ('$suministro', '$tipoTransaccion', '$cantidadTransaccion', current_date(), '$horaTransaccion');";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        if ($tipoTransaccion == 'Entrada')
        {
            $select = "UPDATE 
                      `inventario` 
                       SET
                      `saldoActual` = `saldoActual` + $cantidadTransaccion
                       WHERE `producto` = '$suministro' ;";
            mysqli_query($con, $select);
            if ($select = true)
            {
                echo "<center><strong><h4>¡ Se Inserto con Éxito !<BR></h4></center>";
            }
            else
            {
                echo "<center><strong><h4>¡Hubo un Error en la Inserción, Verificalo!<BR></strong></h4></center>";
            }
        }
        else if ($tipoTransaccion == 'Salida')
        {
            $consulta = "SELECT saldoActual,valorMinimo  FROM inventario WHERE `producto` = '$suministro';";
            $ejecutar = mysqli_query($con, $consulta);
            $tabla = mysqli_fetch_array($ejecutar);
            $saldo = $tabla['saldoActual'];
            $resta = floatval($saldo) - floatval($cantidadTransaccion);

            if ($resta >= 0)
            {
                $select = "UPDATE 
                      `inventario` 
                       SET
                      `saldoActual` = $resta
                       WHERE `producto` = '$suministro' ;";
                mysqli_query($con, $select);
                if ($select = true)
                {
                    echo "<center><strong><h4>¡ Se Inserto con Éxito !<BR></h4></center>";
                }
                else
                {
                    echo "<center><strong><h4>¡Hubo un Error en la Inserción, Verificalo!<BR></strong></h4></center>";
                }
            }
            else
            {

                echo "<center><strong><h4>¡ No se puede realizar esta transaccion !<BR></h4></center>";
            }

        }
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
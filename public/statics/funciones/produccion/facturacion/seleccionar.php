<?php 

        $numeroFactura = $_REQUEST['numeroFactura'];
        if ($numeroFactura != ""){
                                
            $consulta = "SELECT * FROM facturacion WHERE numeroFactura='$numeroFactura'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $numeroFactura1 = $fila['numeroFactura'];
            $empresa = $fila['empresa'];
            $division = $fila['division'];
            $nitCliente = $fila['nitCliente'];
            $fechaFacturacion = $fila['fechaFacturacion'];
            $codigoFlete = $fila['codigoFlete'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
       
        }elseif($numeroFactura == ""){
                                
        }
?>
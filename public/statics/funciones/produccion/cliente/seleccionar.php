<?php 

        $codigoCliente = $_REQUEST['codigoCliente'];
        if ($codigoCliente != ""){
                                
            $consulta = "SELECT * FROM cliente WHERE codigoCliente='$codigoCliente'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoCliente1 = $fila['codigoCliente'];
            $nitCliente = $fila['nitCliente'];
            $nombreComercialCliente = $fila['nombreComercialCliente'];
            $nombreContactoCliente = $fila['nombreContactoCliente'];
            $pbxCliente = $fila['pbxCliente'];
            $telefonoCliente = $fila['telefonoCliente'];
            $correoCliente = $fila['correoCliente'];
            $direccionFiscalCliente = $fila['direccionFiscalCliente'];
            $direccionEntrega1Cliente = $fila['direccionEntrega1Cliente'];
            $direccionEntrega2Cliente = $fila['direccionEntrega2Cliente'];
            $direccionEntrega3Cliente = $fila['direccionEntrega3Cliente'];
            $fechaCliente = $fila['fechaCliente'];
            $horaCliente = $fila['horaCliente'];
       
        }elseif($codigoCliente == ""){
                                
        }
?>
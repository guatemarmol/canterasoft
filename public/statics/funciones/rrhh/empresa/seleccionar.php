<?php 

        $codigoEmpresa = $_REQUEST['codigoEmpresa'];
        if ($codigoEmpresa != ""){
                                
            $consulta = "SELECT * FROM empresa WHERE codigoEmpresa='$codigoEmpresa'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoEmpresa1 = $fila['codigoEmpresa'];
            $razonSocialEmpresa = $fila['razonSocialEmpresa'];
            $nitEmpresa = $fila['nitEmpresa'];
            $direccionFiscalEmpresa = $fila['direccionFiscalEmpresa'];
            $direccionOficinaEmpresa = $fila['direccionOficinaEmpresa'];
            $representanteLegalEmpresa = $fila['representanteLegalEmpresa'];
            $giroNegocioEmpresa = $fila['giroNegocioEmpresa'];
            $fechaEmpresa = $fila['fechaEmpresa'];
            $horaEmpresa = $fila['horaEmpresa'];
       
        }elseif($codigoEmpresa == ""){
                                
        }
?>
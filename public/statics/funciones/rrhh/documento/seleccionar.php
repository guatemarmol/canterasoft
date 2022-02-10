<?php 

        $codigoDocumento = $_REQUEST['codigoDocumento'];
        if ($codigoDocumento != ""){
                                
            $consulta = "SELECT * FROM documento WHERE codigoDocumento='$codigoDocumento'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoDocumento1 = $fila['codigoDocumento'];
            $descripcionDocumento = $fila['descripcionDocumento'];
            $fechaDocumento = $fila['fechaDocumento'];
            $horaDocumento = $fila['horaDocumento'];
       
        }elseif($codigoDocumento == ""){
                                
        }
?>
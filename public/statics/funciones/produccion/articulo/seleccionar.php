<?php 

        $codigoArticuloBodega = $_REQUEST['codigoArticuloBodega'];
        if ($codigoArticuloBodega != ""){
                                
            $consulta = "SELECT * FROM articuloBodega WHERE codigoArticuloBodega='$codigoArticuloBodega'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoArticuloBodega1 = $fila['codigoArticuloBodega'];
            $nombreEspecificoProducto = $fila['nombreEspecificoProducto'];
            $nombreBodega = $fila['nombreBodega'];
            $saldoArticuloBodega = $fila['saldoArticuloBodega'];
            $maximoArticuloBodega = $fila['maximoArticuloBodega'];
            $minimoArticuloBodega = $fila['minimoArticuloBodega'];
            $fechaArticuloBodega = $fila['fechaArticuloBodega'];
            $horaArticuloBodega = $fila['horaArticuloBodega'];
       
        }elseif($codigoArticuloBodega == ""){
                                
        }
?>
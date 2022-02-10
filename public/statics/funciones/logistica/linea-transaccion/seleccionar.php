<?php 

        $numero = $_REQUEST['numero'];
        if ($numero != ""){
                                
            $consulta = "SELECT * FROM lineaTransaccion WHERE numero='$numero'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $numero = $fila['numero'];
            $linea = $fila['linea'];
            $producto = $fila['producto'];
            $bodega = $fila['bodega'];
            $correlativoProduccion = $fila['correlativoProduccion'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
       
        }elseif($numero == ""){
                                
        }
?>
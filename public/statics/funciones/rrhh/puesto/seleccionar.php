<?php 

        $codigoPuesto = $_REQUEST['codigoPuesto'];
        $consulta = "SELECT * FROM puesto WHERE codigoPuesto='$codigoPuesto'";
        $ejecutar = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_array($ejecutar);

        if ($fila > 0){
                                
            $codigoPuesto1 = $fila['codigoPuesto'];
            $nombrePuesto = $fila['nombrePuesto'];
            $fechaPuesto = $fila['fechaPuesto'];
            $horaPuesto = $fila['horaPuesto'];
       
        }else{
                                
        }
?>
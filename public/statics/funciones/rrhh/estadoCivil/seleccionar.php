<?php 

        $codigoEstadoCivil = $_REQUEST['codigoEstadoCivil'];
        if ($codigoEstadoCivil != ""){
                                
            $consulta = "SELECT * FROM estadoCivil WHERE codigoEstadoCivil='$codigoEstadoCivil'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoEstadoCivil1 = $fila['codigoEstadoCivil'];
            $descripcionEstadoCivil = $fila['descripcionEstadoCivil'];
            $fechaEstadoCivil = $fila['fechaEstadoCivil'];
            $horaEstadoCivil = $fila['horaEstadoCivil'];
       
        }elseif($codigoEstadoCivil == ""){
                                
        }
?>
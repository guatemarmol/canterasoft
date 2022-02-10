<?php 

        $codigoSubDivision = $_REQUEST['codigoSubDivision'];
        if ($codigoSubDivision != ""){
                                
            $consulta = "SELECT * FROM subDivision WHERE codigoSubDivision='$codigoSubDivision'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoSubDivision1 = $fila['codigoSubDivision'];
            $nombreSubDivision = $fila['nombreSubDivision'];
            $fechaSubDivision = $fila['fechaSubDivision'];
            $horaSubDivision = $fila['horaSubDivision'];
       
        }elseif($codigoSubDivision == ""){
                                
        }
?>
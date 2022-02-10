<?php 

        $codigoDivision = $_REQUEST['codigoDivision'];
        if ($codigoDivision != ""){
                                
            $consulta = "SELECT * FROM division WHERE codigoDivision='$codigoDivision'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoDivision1 = $fila['codigoDivision'];
            $nombreDivision = $fila['nombreDivision'];
            $descripcionDivision = $fila['descripcionDivision'];
            $nombreEncargado = $fila['nombreEncargado'];
            $fechaDivision = $fila['fechaDivision'];
            $horaDivision = $fila['horaDivision'];

            }elseif($codigoDivision == ""){

            }
?>
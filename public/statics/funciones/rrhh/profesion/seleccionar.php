<?php 

        $codigoProfesion = $_REQUEST['codigoProfesion'];
        if ($codigoProfesion != ""){
                                
            $consulta = "SELECT * FROM profesion WHERE codigoProfesion='$codigoProfesion'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoProfesion1 = $fila['codigoProfesion'];
            $descripcionProfesion = $fila['descripcionProfesion'];
            $fechaProfesion = $fila['fechaProfesion'];
            $horaProfesion = $fila['horaProfesion'];
       
        }elseif($codigoProfesion == ""){
                                
        }
?>
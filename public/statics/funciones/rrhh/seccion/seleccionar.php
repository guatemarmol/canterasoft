<?php 

        $codigoSeccion = $_REQUEST['codigoSeccion'];
        if ($codigoSeccion != ""){
                                
            $consulta = "SELECT * FROM seccion WHERE codigoSeccion='$codigoSeccion'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoSeccion1 = $fila['codigoSeccion'];
            $nombreSeccion = $fila['nombreSeccion'];
            $fechaSeccion = $fila['fechaSeccion'];
            $horaSeccion = $fila['horaSeccion'];
       
        }elseif($codigoSeccion == ""){
                                
        }
?>
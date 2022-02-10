<?php 

        $codigoEncargado = $_REQUEST['codigoEncargado'];
        if ($codigoEncargado != ""){
                                
            $consulta = "SELECT * FROM encargado WHERE codigoEncargado='$codigoEncargado'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigoEncargado1 = $fila['codigoEncargado'];
            $nombreEncargado = $fila['nombreEncargado'];
            $telefonoEncargado = $fila['telefonoEncargado'];
            $correoEncargado = $fila['correoEncargado'];
            $domicilioEncargado = $fila['domicilioEncargado'];
            $fechaEncargado = $fila['fechaEncargado'];
            $horaEncargado = $fila['horaEncargado'];
       
        }elseif($codigoEncargado == ""){
                                
        }
?>
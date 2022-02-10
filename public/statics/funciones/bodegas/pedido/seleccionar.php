<?php 

        $numero = $_REQUEST['numero'];
        if ($numero != ""){
                                
            $consulta = "SELECT * FROM  pedidoBodegas WHERE numero='$numero'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $numero1 = $fila['numero'];
            $empresa = $fila['empresa'];
            $divison = $fila['divison'];
            $encargado = $fila['encargado'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
       
        }elseif($numero == ""){
                                
        }
?>
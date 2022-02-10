<?php 

        $codigo = $_REQUEST['codigo'];
        if ($codigo != ""){
                                
            $consulta = "SELECT * FROM   monedaCompras WHERE codigo='$codigo'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigo1 = $fila['codigo'];
            $nombre = $fila['nombre'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
       
        }elseif($codigo == ""){
                                
        }
?>
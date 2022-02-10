<?php 

        $codigo = $_REQUEST['codigo'];
        if ($codigo != ""){
                                
            $consulta = "SELECT * FROM  tipoPedidoBodegas WHERE codigo='$codigo'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

            $codigo1 = $fila['codigo'];
            $descripcion = $fila['descripcion'];
            $fecha = $fila['fecha'];
            $hora = $fila['hora'];
       
        }elseif($codigo == ""){
                                
        }
?>
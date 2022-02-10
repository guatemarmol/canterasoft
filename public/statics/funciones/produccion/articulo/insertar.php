<?php include_once '../../../on-database.php' ?>

<?php
    
            $codigoArticuloBodega = $_POST['codigoArticuloBodega'];    
            $consulta = "SELECT * FROM articuloBodega WHERE codigoArticuloBodega='$codigoArticuloBodega'";
            $ejecutar = mysqli_query($con, $consulta);
            $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $codigoArticuloBodega = $_POST['codigoArticuloBodega'];
            $nombreEspecificoProducto = $_POST['nombreEspecificoProducto'];
            $nombreBodega = $_POST['nombreBodega'];
            $saldoArticuloBodega = $_POST['saldoArticuloBodega'];
            $maximoArticuloBodega = $_POST['maximoArticuloBodega'];
            $minimoArticuloBodega = $_POST['minimoArticuloBodega'];
            $fechaArticuloBodega = $_POST['fechaArticuloBodega'];
            $horaArticuloBodega = $_POST['horaArticuloBodega'];
         
         $actualizar ="UPDATE articuloBodega SET nombreEspecificoProducto='$nombreEspecificoProducto', nombreBodega='$nombreBodega', saldoArticuloBodega='$saldoArticuloBodega', maximoArticuloBodega='$maximoArticuloBodega', minimoArticuloBodega='$minimoArticuloBodega', fechaArticuloBodega='$fechaArticuloBodega', horaArticuloBodega='$horaArticuloBodega' WHERE codigoArticuloBodega='$codigoArticuloBodega'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{
         
        $consulta = "SELECT MAX(codigoArticuloBodega) codigoArticuloBodega FROM articuloBodega";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoArticuloBodega = $tabla['codigoArticuloBodega'];
        $codigoArticuloBodega++; 

        $nombreEspecificoProducto = $_POST['nombreEspecificoProducto'];
        $nombreBodega = $_POST['nombreBodega'];
        $saldoArticuloBodega = $_POST['saldoArticuloBodega'];
        $maximoArticuloBodega = $_POST['maximoArticuloBodega'];
        $minimoArticuloBodega = $_POST['minimoArticuloBodega'];
        $fechaArticuloBodega = $_POST['fechaArticuloBodega'];
        $horaArticuloBodega = $_POST['horaArticuloBodega'];

        $agregar ="INSERT INTO articuloBodega (codigoArticuloBodega, nombreEspecificoProducto, nombreBodega, saldoArticuloBodega, maximoArticuloBodega, minimoArticuloBodega, fechaArticuloBodega, horaArticuloBodega)
                            VALUES('$codigoArticuloBodega','$nombreEspecificoProducto','$nombreBodega','$saldoArticuloBodega','$maximoArticuloBodega','$minimoArticuloBodega','$fechaArticuloBodega','$horaArticuloBodega' )";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
 }
?>
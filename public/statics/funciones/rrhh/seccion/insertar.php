<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoSeccion = $_POST['codigoSeccion'];    
    $consulta = "SELECT * FROM seccion WHERE codigoSeccion='$codigoSeccion'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoSeccion = $_POST['codigoSeccion'];
        $nombreSeccion = $_POST['nombreSeccion'];
        $fechaSeccion = $_POST['fechaSeccion'];
        $horaSeccion =  $_POST['horaSeccion'];
         
        $actualizar ="UPDATE seccion SET nombreSeccion='$nombreSeccion', fechaSeccion='$fechaSeccion', horaSeccion='$horaSeccion' WHERE codigoSeccion='$codigoSeccion'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{
         
        $consulta = "SELECT MAX(codigoSeccion) codigoSeccion FROM seccion";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoSeccion = $tabla['codigoSeccion'];
        $codigoSeccion++;
         
        $nombreSeccion = $_POST['nombreSeccion'];
        $fechaSeccion = $_POST['fechaSeccion'];
        $horaSeccion =  $_POST['horaSeccion'];

        $agregar ="INSERT INTO seccion (codigoSeccion, nombreSeccion, fechaSeccion, horaSeccion)
                            VALUES ('$codigoSeccion','$nombreSeccion','$fechaSeccion','$horaSeccion')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
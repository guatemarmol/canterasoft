<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoSubDivision = $_POST['codigoSubDivision'];    
    $consulta = "SELECT * FROM subDivision WHERE codigoSubDivision='$codigoSubDivision'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoSubDivision = $_POST['codigoSubDivision'];
        $nombreSubDivision = $_POST['nombreSubDivision'];
        $fechaSubDivision = $_POST['fechaSubDivision'];
        $horaSubDivision = $_POST['horaSubDivision'];
         
         $actualizar ="UPDATE subDivision SET nombreSubDivision='$nombreSubDivision', fechaSubDivision='$fechaSubDivision', horaSubDivision='$horaSubDivision' WHERE codigoSubDivision='$codigoSubDivision'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoSubDivision) codigoSubDivision FROM subDivision";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoSubDivision = $tabla['codigoSubDivision'];
        $codigoSubDivision++; 
         
        $nombreSubDivision = $_POST['nombreSubDivision'];
        $fechaSubDivision = $_POST['fechaSubDivision'];
        $horaSubDivision = $_POST['horaSubDivision'];

        $agregar ="INSERT INTO subDivision (codigoSubDivision, nombreSubDivision, fechaSubDivision, horaSubDivision)
                            VALUES ('$codigoSubDivision','$nombreSubDivision','$fechaSubDivision','$horaSubDivision')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
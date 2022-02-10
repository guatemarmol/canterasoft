<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoPuesto = $_POST['codigoPuesto'];    
    $consulta = "SELECT * FROM puesto WHERE codigoPuesto='$codigoPuesto'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoPuesto = $_POST['codigoPuesto'];
        $nombrePuesto = $_POST['nombrePuesto'];
        $fechaPuesto = $_POST['fechaPuesto'];
        $horaPuesto =  $_POST['horaPuesto'];
         
         $actualizar ="UPDATE puesto SET nombrePuesto='$nombrePuesto', fechaPuesto='$fechaPuesto', horaPuesto='$horaPuesto' WHERE codigoPuesto='$codigoPuesto'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoPuesto) codigoPuesto FROM puesto";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoPuesto = $tabla['codigoPuesto'];
        $codigoPuesto++; 
         
        $nombrePuesto = $_POST['nombrePuesto'];
        $fechaPuesto = $_POST['fechaPuesto'];
        $horaPuesto =  $_POST['horaPuesto'];

        $agregar ="INSERT INTO puesto (codigoPuesto, nombrePuesto, fechaPuesto, horaPuesto)
                            VALUES ('$codigoPuesto','$nombrePuesto','$fechaPuesto','$horaPuesto')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se a Agregado con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
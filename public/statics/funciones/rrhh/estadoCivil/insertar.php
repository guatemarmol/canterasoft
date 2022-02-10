<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoEstadoCivil = $_POST['codigoEstadoCivil'];    
    $consulta = "SELECT * FROM estadoCivil WHERE codigoEstadoCivil='$codigoEstadoCivil'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoEstadoCivil = $_POST['codigoEstadoCivil'];
        $descripcionEstadoCivil = $_POST['descripcionEstadoCivil'];
        $fechaEstadoCivil = $_POST['fechaEstadoCivil'];
        $horaEstadoCivil = $_POST['horaEstadoCivil'];
         
         $actualizar ="UPDATE estadoCivil SET descripcionEstadoCivil='$descripcionEstadoCivil', fechaEstadoCivil='$fechaEstadoCivil', horaEstadoCivil='$horaEstadoCivil' WHERE codigoEstadoCivil='$codigoEstadoCivil'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoEstadoCivil) codigoEstadoCivil FROM estadoCivil";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoEstadoCivil = $tabla['codigoEstadoCivil'];
        $codigoEstadoCivil++;
         
        $descripcionEstadoCivil = $_POST['descripcionEstadoCivil'];
        $fechaEstadoCivil = $_POST['fechaEstadoCivil'];
        $horaEstadoCivil = $_POST['horaEstadoCivil'];

        $agregar ="INSERT INTO estadoCivil (codigoEstadoCivil, descripcionEstadoCivil, fechaEstadoCivil, horaEstadoCivil)
                            VALUES ('$codigoEstadoCivil','$descripcionEstadoCivil','$fechaEstadoCivil','$horaEstadoCivil')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se a Agregado con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
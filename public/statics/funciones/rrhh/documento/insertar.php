<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoDocumento = $_POST['codigoDocumento'];    
    $consulta = "SELECT * FROM documento WHERE codigoDocumento='$codigoDocumento'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoDocumento = $_POST['codigoDocumento'];
        $descripcionDocumento = $_POST['descripcionDocumento'];
        $fechaDocumento = $_POST['fechaDocumento'];
        $horaDocumento = $_POST['horaDocumento'];
         
         $actualizar ="UPDATE documento SET descripcionDocumento='$descripcionDocumento', fechaDocumento='$fechaDocumento', horaDocumento='$horaDocumento' WHERE codigoDocumento='$codigoDocumento'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoDocumento) codigoDocumento FROM documento";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoDocumento = $tabla['codigoDocumento'];
        $codigoDocumento++; 
         
        $descripcionDocumento = $_POST['descripcionDocumento'];
        $fechaDocumento = $_POST['fechaDocumento'];
        $horaDocumento = $_POST['horaDocumento'];

        $agregar ="INSERT INTO documento (codigoDocumento, descripcionDocumento, fechaDocumento, horaDocumento)
                            VALUES ('$codigoDocumento','$descripcionDocumento','$fechaDocumento','$horaDocumento')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
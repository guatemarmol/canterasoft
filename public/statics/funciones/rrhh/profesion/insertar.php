<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoProfesion = $_POST['codigoProfesion'];    
    $consulta = "SELECT * FROM profesion WHERE codigoProfesion='$codigoProfesion'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoProfesion = $_POST['codigoProfesion'];
        $descripcionProfesion = $_POST['descripcionProfesion'];
        $fechaProfesion = $_POST['fechaProfesion'];
        $horaProfesion = $_POST['horaProfesion'];
         
         $actualizar ="UPDATE profesion SET descripcionProfesion='$descripcionProfesion', fechaProfesion='$fechaProfesion', horaProfesion='$horaProfesion' WHERE codigoProfesion='$codigoProfesion'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoProfesion) codigoProfesion FROM profesion";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoProfesion = $tabla['codigoProfesion'];
        $codigoProfesion++;
         
        $descripcionProfesion = $_POST['descripcionProfesion'];
        $fechaProfesion = $_POST['fechaProfesion'];
        $horaProfesion = $_POST['horaProfesion'];

        $agregar ="INSERT INTO profesion (codigoProfesion, descripcionProfesion, fechaProfesion, horaProfesion)
                            VALUES ('$codigoProfesion','$descripcionProfesion','$fechaProfesion','$horaProfesion')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se a Agregado con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
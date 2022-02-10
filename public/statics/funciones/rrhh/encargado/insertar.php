<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoEncargado = $_POST['codigoEncargado'];    
    $consulta = "SELECT * FROM encargado WHERE codigoEncargado='$codigoEncargado'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoEncargado = $_POST['codigoEncargado'];
        $nombreEncargado = $_POST['nombreEncargado'];
        $telefonoEncargado = $_POST['telefonoEncargado'];
        $correoEncargado = $_POST['correoEncargado'];
        $domicilioEncargado = $_POST['domicilioEncargado'];
        $fechaEncargado = $_POST['fechaEncargado'];
        $horaEncargado = $_POST['horaEncargado'];
         
         $actualizar ="UPDATE encargado SET nombreEncargado='$nombreEncargado', telefonoEncargado='$telefonoEncargado', correoEncargado='$correoEncargado' , domicilioEncargado='$domicilioEncargado' , fechaEncargado='$fechaEncargado' , horaEncargado='$horaEncargado' WHERE codigoEncargado='$codigoEncargado'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoEncargado) codigoEncargado FROM encargado";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoEncargado = $tabla['codigoEncargado'];
        $codigoEncargado++;
         
        $nombreEncargado = $_POST['nombreEncargado'];
        $telefonoEncargado = $_POST['telefonoEncargado'];
        $correoEncargado = $_POST['correoEncargado'];
        $domicilioEncargado = $_POST['domicilioEncargado'];
        $fechaEncargado = $_POST['fechaEncargado'];
        $horaEncargado = $_POST['horaEncargado'];

        $agregar ="INSERT INTO encargado (codigoEncargado, nombreEncargado, telefonoEncargado, correoEncargado, domicilioEncargado, fechaEncargado, horaEncargado)
                            VALUES ('$codigoEncargado','$nombreEncargado','$telefonoEncargado','$correoEncargado','$domicilioEncargado','$fechaEncargado','$horaEncargado')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
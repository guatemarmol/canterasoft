<?php include_once '../../../on-database.php' ?>

<?php
    
    $numero = $_POST['numero'];    
    $consulta = "SELECT * FROM pedidoBodegas WHERE numero='$numero'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

            $numero = $_POST['numero'];
            $empresa = $_POST['empresa'];
            $divison = $_POST['divison'];
            $encargado = $_POST['encargado'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];

         $actualizar ="UPDATE pedidoBodegas SET  empresa='$empresa', divison='$divison', encargado='$encargado', fecha='$fecha', hora='$hora' WHERE numero='$numero'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(numero) numero FROM pedidoBodegas";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $numero = $tabla['numero'];
        $numero++; 

        $empresa = $_POST['empresa'];
        $divison = $_POST['divison'];
        $encargado = $_POST['encargado'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        $agregar ="INSERT INTO pedidoBodegas (numero, empresa, divison, encargado, fecha, hora)
                            VALUES ('$numero', '$empresa', '$divison', '$encargado','$fecha', '$hora')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
<?php include_once '../../../on-database.php' ?>

<?php
    
    $codigoDivision = $_POST['codigoDivision'];    
    $consulta = "SELECT * FROM division WHERE codigoDivision='$codigoDivision'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);

     if ($fila > 0){

        $codigoDivision = $_POST['codigoDivision'];
        $nombreDivision = $_POST['nombreDivision'];
        $descripcionDivision = $_POST['descripcionDivision'];
        $nombreEncargado = $_POST['nombreEncargado'];
        $fechaDivision = $_POST['fechaDivision'];
        $horaDivision = $_POST['horaDivision'];
         
        $actualizar ="UPDATE division SET nombreDivision='$nombreDivision',descripcionDivision='$descripcionDivision',nombreEncargado='$nombreEncargado' ,fechaDivision='$fechaDivision',horaDivision='$horaDivision' WHERE codigoDivision='$codigoDivision'";

        mysqli_query($con,$actualizar);
         
        if($actualizar = true){
                    
                echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
         
     }else{

        $consulta = "SELECT MAX(codigoDivision) codigoDivision FROM division";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoDivision = $tabla['codigoDivision'];
        $codigoDivision++; 
         
        $nombreDivision = $_POST['nombreDivision'];
        $descripcionDivision = $_POST['descripcionDivision'];
        $nombreEncargado = $_POST['nombreEncargado'];
        $fechaDivision = $_POST['fechaDivision'];
        $horaDivision = $_POST['horaDivision'];

        $agregar ="INSERT INTO division (codigoDivision,nombreDivision,descripcionDivision,nombreEncargado,fechaDivision,horaDivision)
                            VALUES ('$codigoDivision','$nombreDivision','$descripcionDivision','$nombreEncargado','$fechaDivision','$horaDivision')";

        mysqli_query($con,$agregar);
                                
        if($agregar = true){
                    
                echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
                echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
  }

?>
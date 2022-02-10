<?php include_once '../../../on-database.php' ?>
<?php
    $codigoDepartamento = $_POST['codigoDepartamento'];    
    $consulta = "SELECT * FROM departamento WHERE codigoDepartamento='$codigoDepartamento'";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);
    if ($fila > 0){
        $codigoDepartamento = $_POST['codigoDepartamento'];
        $nombreDepartamento = $_POST['nombreDepartamento'];
        $fechaDepartamento = $_POST['fechaDepartamento'];
        $horaDepartamento = $_POST['horaDepartamento'];
         $actualizar ="UPDATE departamento SET nombreDepartamento='$nombreDepartamento', fechaDepartamento='$fechaDepartamento', horaDepartamento='$horaDepartamento' WHERE codigoDepartamento='$codigoDepartamento'";
        mysqli_query($con,$actualizar);
        if($actualizar = true){
            echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
        }else{
            echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
        }
    }else{
        $consulta = "SELECT MAX(codigoDepartamento) codigoDepartamento FROM departamento";
        $ejecutar = mysqli_query($con, $consulta);
        $tabla = mysqli_fetch_array($ejecutar);
        $codigoDepartamento = $tabla['codigoDepartamento'];
        $codigoDepartamento++; 
        $nombreDepartamento = $_POST['nombreDepartamento'];
        $fechaDepartamento = $_POST['fechaDepartamento'];
        $horaDepartamento = $_POST['horaDepartamento'];
        $agregar ="INSERT INTO departamento (codigoDepartamento, nombreDepartamento, fechaDepartamento, horaDepartamento)
                            VALUES ('$codigoDepartamento','$nombreDepartamento','$fechaDepartamento','$horaDepartamento')";
        mysqli_query($con,$agregar);               
        if($agregar = true){
            echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
        }else{
            echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
        }
    }
?>
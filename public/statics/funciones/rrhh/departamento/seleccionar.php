<?php 
    $codigoDepartamento = $_REQUEST['codigoDepartamento'];
    if ($codigoDepartamento != ""){
        $consulta = "SELECT * FROM departamento WHERE codigoDepartamento='$codigoDepartamento'";
        $ejecutar = mysqli_query($con, $consulta);
        $fila = mysqli_fetch_array($ejecutar);

        $codigoDepartamento1 = $fila['codigoDepartamento'];
        $nombreDepartamento = $fila['nombreDepartamento'];
        $fechaDepartamento = $fila['fechaDepartamento'];
        $horaDepartamento = $fila['horaDepartamento'];
    }elseif($codigoDepartamento == ""){                       
    }
?>
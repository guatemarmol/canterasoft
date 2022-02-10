<?php 
    include_once '../../../on-database.php';
    $codigo = $_POST['codigo'] ;

    $query = "DELETE FROM ingresoMateriaPrima WHERE id_ingreso = {$codigo}";
    $result = mysqli_query($con, $query);

    if($result){
        echo "<center><strong><h4>¡El ingreso de materia prima se ha eliminado con éxito!<BR></strong></h4></center>";
    }
    else{
        echo "<center><strong><h4>¡El ingreso de materia prima no puede eliminarse!<BR></strong></h4></center>";
    }
?>
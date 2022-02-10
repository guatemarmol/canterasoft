<?php 
    include_once '../../../on-database.php';
    $codigo = $_POST['codigo'] ;

    $query = "DELETE FROM historial_consumo WHERE id = $codigo";
    $result = mysqli_query($con, $query);

    if($result){
        echo "<center><strong><h4>¡El consumo se ha eliminado con éxito!<BR></strong></h4></center>";
    }
    else{
        echo "<center><strong><h4>¡El consumo no puede eliminarse!<BR></strong></h4></center>";
    }
?>
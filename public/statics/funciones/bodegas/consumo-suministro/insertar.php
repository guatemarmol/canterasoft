<?php
include_once '../../../on-database.php';

$codigo = $_POST['codigo'] ;
$consumo = $_POST['consumo']; 
$producto = $_POST['producto'];

if($codigo != ''){
    $query = "UPDATE historial_consumo SET consumo = $consumo, producto = $producto WHERE id = $codigo";
    $result = mysqli_query($con, $query);
    if($result){
        echo 2;
    }
    else{
        echo 0;
    }
}
else{
    $query = "INSERT INTO historial_consumo(consumo, producto, fecha) VALUES($consumo, $producto, current_date())";
    $result = mysqli_query($con, $query);
    if($result){
        echo 1;
    }
    else{
        echo 0;
    }
}
?>

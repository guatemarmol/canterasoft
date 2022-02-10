<?php
include_once '../../../on-database.php';

$envio = $_POST['envio'];
$datos = $_POST['datos'];

for($i = 0 ; $i <= sizeof($datos)-1; $i++){
  $peso = $datos[$i];
  $producto = $datos[$i+1];
  $jumbo = $datos[$i+2];

  if (!$con -> query("INSERT INTO envioPredioProducto VALUES (DEFAULT, $envio, '$jumbo', '$producto', 'Blanco', $peso);")) {
    echo "error";
  }else{
    if(!$con -> query("UPDATE inventarioCarbonato SET estado = 'Camino a Predio' WHERE codigo = '$jumbo';")){
      echo "error";
    }else{
      echo "ok";
    }
  }
  $i += 2;
}

$con -> close();
?>
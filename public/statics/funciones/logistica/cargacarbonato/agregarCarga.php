<?php
include_once '../../../on-database.php';

$datos = $_POST['datos'];

for($i = 0 ; $i <= sizeof($datos)-1; $i++){
  $hora = $datos[$i];
  $piedra = $datos[$i+2];
  $camion = $datos[$i+3];
  
  if (!$con -> query("INSERT INTO cargaCarbonato VALUES (DEFAULT, $camion, '$piedra', SYSDATE(), '$hora');")) {
      echo "error";
  }else{
      echo "ok";
  }

  $i += 3;
}

$con -> close();
?>
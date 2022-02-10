<?php include_once '../../../on-database.php'?>
<?php

$camion = $_POST['camion'];
$piedra = $_POST['piedra'];
$peso = $_POST['tonelaje'];


$query= "INSERT INTO `cargacarbonato` (
  `camion`,
  `piedra`,
  `peso`,
  `fecha`,
  `hora`
) 
VALUES
  (
    '$camion',
    '$piedra',
    '$peso',
    current_date(),
    current_time()
  ) ;";


$ejecutar = mysqli_query($con, $query);

$query = "UPDATE 
 `maquinaria` 
SET
  `disponible` = '1' 
WHERE `id` = '$camion' ;";

$ejecutar = mysqli_query($con, $query);

if ($ejecutar = true) {

        echo "<center><strong><h4>¡ Se agrego camionada con exito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un error en el ingreso... Verificalo!<BR></strong></h4></center>";
    }




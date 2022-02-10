<?php include_once '../../../on-database.php'?>

<?php

$codigo   = $_POST['codigo'];
$consulta = "SELECT * FROM lugarusoMaquinaria WHERE codigo='$codigo'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {


    $placas         = $_POST['placas'];
    $status        = $_POST['status'];
    $descripcion   = $_POST['descripcion'];
    $lugarasignacion  = $_POST['lugarasignacion'];
    $tipomaquina        = $_POST['tipomaquina'];
    $ejes        = $_POST['ejes'];
    $marca         = $_POST['marca'];
    $modelo        = $_POST['modelo'];
    $serie         = $_POST['serie'];
    $ubicacion     = $_POST['ubicacion'];
    $comentario    = $_POST['comentario'];
    $fecha              = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
    $hora               = $_POST['hora'];
    

    $actualizar = "UPDATE 
  `canterasoft`.`lugarusoMaquinaria` 
SET
  `placas` = '$placas',
  `status` = '$status',
  `descripcion` = '$descripcion',
  `lugarasignacion` = '$lugarasignacion',
  `tipomaquina` = '$tipomaquina',
  `ejes` = '$ejes',
  `marca` = '$marca',
  `modelo` = '$modelo',
  `serie` = '$serie',
  `ubicacion` = '$ubicacion',$
  `comentario` = '$comentario',
  `fechamodificacion` = '$fecha',
  `horamodificacion` = '$hora' 
WHERE `codigo` = '$codigo' ;";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {

    
    $placas         = $_POST['placas'];
    $status        = $_POST['status'];
    $descripcion   = $_POST['descripcion'];
    $lugarasignacion  = $_POST['lugarasignacion'];
    $tipomaquina        = $_POST['tipomaquina'];
    $ejes        = $_POST['ejes'];
    $marca         = $_POST['marca'];
    $modelo        = $_POST['modelo'];
    $serie         = $_POST['serie'];
    $ubicacion     = $_POST['ubicacion'];
    $comentario    = $_POST['comentario'];
    $fecha              = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
    $hora               = $_POST['hora'];

    $agregar = "INSERT INTO `canterasoft`.`lugarusoMaquinaria` (
  `placas`,
  `status`,
  `descripcion`,
  `lugarasignacion`,
  `tipomaquina`,
  `ejes`,
  `marca`,
  `modelo`,
  `serie`,
  `ubicacion`,
  `comentario`,
  `fecha`,
  `hora`
) 
VALUES
  (
    '$placas',
    '$status',
    '$descripcion',
    '$lugarasignacion',
    '$tipomaquina',
    '$ejes',
    '$marca',
    '$modelo',
    '$serie',
    '$ubicacion',
    '$comentario',
    '$fecha',
    '$hora'
  ) ;";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
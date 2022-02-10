<?php include_once '../../../on-database.php'?>

<?php
    $codigo        = $_POST['codigo'];
    $status        = $_POST['status'];
    $descripcion   = $_POST['descripcion'];
    $codigolugar         = $_POST['lugarasignacion'];
    $placa               = $_POST['placas'];
    $codigotipo          = $_POST['tipomaquina'];
    $marca         = $_POST['marca'];
    $modelo        = $_POST['modelo'];
    $serie         = $_POST['serie'];
    $ubicacion     = $_POST['ubicacion'];
    $ejes          = $_POST['ejes'];
    $comentario    = $_POST['comentario'];
    
    

    $actualizar = "UPDATE 
`maquinaria` 
SET
  `placa` = '$placa',
  `status` = '$status',
  `descripcion` = '$descripcion',
  `codigolugar` = '$codigolugar',
  `codigotipo` = '$codigotipo',
  `ejes` = '$ejes',
  `marca` = '$marca',
  `modelo` = '$modelo',
  `serie` = '$serie',
  `ubicacion` = '$ubicacion',
  `comentario` = '$comentario' 
WHERE `id` = '$codigo'";

    mysqli_query($con, $actualizar);

    if ($actualizar == true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }
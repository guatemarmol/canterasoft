<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
    //////////////GUARDAR///////////
    ////////////////////////////////
    $bodega       = $_POST['bodega'];
    $producto    = $_POST['producto'];
    $ubicacion        = $_POST['area'];
    $saldoActual = $_POST['cantidad'];
    $valorMinimo    = $_POST['valorminimo'];
    $valorMaximo          = $_POST['valormaximo'];

    $agregar = "INSERT INTO `inventario` (
  `bodega`,
  `producto`,
  `ubicacion`,
  `saldoInicial`,
  `saldoActual`,
  `valorMinimo`,
  `valorMaximo`,
  `fechaUpdate`
) 
VALUES
  (
    '$bodega',
    '$producto',
    '$ubicacion',
    '$saldoActual',
    '$saldoActual',
    '$valorMinimo',
    '$valorMaximo',
    current_date()
  ) ;

";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }


?>
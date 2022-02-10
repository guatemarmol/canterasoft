<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$numero   = $_POST['numero'];
$consulta = "SELECT * FROM suministrobodega WHERE codigosuministro='$numero'";
$ejecutar = mysqli_query($con, $consulta);
$fila     = mysqli_fetch_array($ejecutar);

if ($fila > 0) {
    //////////////ACTUALIZAR///////////
    ///////////////////////////////////
    $codigobodega       = $_POST['bodegasuministro'];
    $codigocategoria    = $_POST['categoriasuministro'];
    $descripcion        = $_POST['descripcionsuministro'];
    $codigounidadmedida = $_POST['unidadmedidasuministro'];
    $colorsuministro    = $_POST['colorsuministro'];
    $ubicacion          = $_POST['ubicacionsuministro'];
    $equivalente1       = $_POST['equivalente1suministro'];
    $equivalente2       = $_POST['equivalente2suministro'];
    $fechaultimoingreso = $_POST['ultimafecha'];
    $saldo              = $_POST['saldosuministro'];
    $valorminimo        = $_POST['saldominimosuministro'];
    $valormaximo        = $_POST['saldomaximosuministro'];
    $fecha              = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
    $hora               = $_POST['hora'];

    $actualizar = "UPDATE  suministrobodega
    SET codigobodega = '$codigobodega',
  codigocategoria = '$codigocategoria',
  descripcion = '$descripcion',
  color = '$colorsuministro',
  codigounidadmedida = '$codigounidadmedida',
  ubicacion = '$ubicacion',
  equivalente1 = '$equivalente1',
  equivalente2 = '$equivalente2',
  fechaultimoingreso = '$fechaultimoingreso',
  saldoinicial = '$saldo',
  valorminimo = '$valorminimo',
  valormaximo = '$valormaximo',
  fechamodificacion = '$fecha',
  horamodificacion = '$hora'
WHERE codigosuministro = '$numero' ;";

    mysqli_query($con, $actualizar);

    if ($actualizar = true) {

        echo "<center><strong><h4>¡ Se Actualizo con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en la Actualización, Verificalo!<BR></strong></h4></center>";
    }

} else {
    //////////////GUARDAR///////////
    ////////////////////////////////
    $consulta = "SELECT MAX(codigosuministro) numero FROM suministrobodega";
    $ejecutar = mysqli_query($con, $consulta);
    $fila = mysqli_fetch_array($ejecutar);
    $numero = $fila['numero'];
    $numero++;
    $codigobodega       = $_POST['bodegasuministro'];
    $codigocategoria    = $_POST['categoriasuministro'];
    $descripcion        = $_POST['descripcionsuministro'];
    $codigounidadmedida = $_POST['unidadmedidasuministro'];
    $colorsuministro    = $_POST['colorsuministro'];
    $ubicacion          = $_POST['ubicacionsuministro'];
    $equivalente1       = $_POST['equivalente1suministro'];
    $equivalente2       = $_POST['equivalente2suministro'];
    $fechaultimoingreso = $_POST['ultimafecha'];
    $saldo              = $_POST['saldosuministro'];
    $valorminimo        = $_POST['saldominimosuministro'];
    $valormaximo        = $_POST['saldomaximosuministro'];
    $fecha              = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
    $hora               = $_POST['hora'];

    $agregar = "INSERT INTO suministrobodega(
  codigosuministro,
  codigobodega,
  codigocategoria,
  descripcion,
  codigounidadmedida,
  color,
  ubicacion,
  equivalente1,
  equivalente2,
  fechaultimoingreso,
  saldoinicial,
  saldo,
  valorminimo,
  valormaximo,
  fechacreacion,
  horacreacion
) VALUES
  (
    '$numero',
    '$codigobodega',
    '$codigocategoria',
    '$descripcion',
    '$codigounidadmedida',
    '$colorsuministro',
    '$ubicacion',
    '$equivalente1',
    '$equivalente2',
    '$fechaultimoingreso',
    '$saldo',
    '$saldo',
    '$valorminimo',
    '$valormaximo',
    '$fecha',
    '$hora'
  );";

    mysqli_query($con, $agregar);

    if ($agregar = true) {

        echo "<center><strong><h4>¡ Se Agrego con Éxito !<BR></h4></center>";
    } else {
        echo "<center><strong><h4>¡Hubo un Error en el Ingreso, Verificalo!<BR></strong></h4></center>";
    }
}

?>
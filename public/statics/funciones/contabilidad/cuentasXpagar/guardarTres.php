<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------TABLA-------------------------------->
<!-------------------------------------------------------------->
<?php
$resultado = mysqli_query($con, "SELECT COUNT(*) AS codigo FROM cuentasXpagarSAP");
$row       = mysqli_fetch_assoc($resultado);

if ($row['codigo'] == '0') {
    echo 'No hay datos que Actualizar';
    return false;
} else {
//////////////////////////////////////////
    $diasTres = "DELETE FROM cuentasXpagarTres";
    mysqli_query($con, $diasTres);
//////////////////////////////////////////

    $items1 = $_POST['codigoFinal4'];
    $items2 = $_POST['tres'];

    while (true) {
        $item1 = current($items1);
        $item2 = current($items2);

        $cod = (($item1 !== false) ? $item1 : ", &nbsp;");
        $tre = (($item2 !== false) ? $item2 : ", &nbsp;");

        $valores = '("' . $cod . '","' . $tre . '"),';

        $valoresQ = substr($valores, 0, -1);

        $sql = "INSERT INTO cuentasXpagarTres (codigo, tres)
    VALUES $valoresQ";

        $sqlRes = $con->query($sql) or mysql_error();

        $item1 = next($items1);
        $item2 = next($items2);

        if ($item1 === false && $item2 === false) {
            break;
        }
    }

    echo '<h4>¡ Se Actualizo con Exito Los Dias al 46 - 60 !</h4>';

}
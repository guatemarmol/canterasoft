
<!-------------------------CONEXION------------------------------->
<!---------------------------------------------------------------->
<?php include_once '../../../on-database.php'?>
<!-------------------------CONSULTA------------------------------->
<!---------------------------------------------------------------->
<?php
$resultado = mysqli_query($con, "SELECT COUNT(*) AS codigo FROM cuentasXpagarSAP");
$row       = mysqli_fetch_assoc($resultado);

if ($row['codigo'] == '0') {
    echo 'No hay datos que Actualizar';
    return false;
} else {
//////////////////////////////////////////
    $diasUno = "DELETE FROM cuentasXpagarUno";
    mysqli_query($con, $diasUno);
//////////////////////////////////////////

    $items1 = $_POST['codigoFinal2'];
    $items2 = $_POST['uno'];

    while (true) {
        $item1 = current($items1);
        $item2 = current($items2);

        $cod = (($item1 !== false) ? $item1 : ", &nbsp;");
        $cr  = (($item2 !== false) ? $item2 : ", &nbsp;");

        $valores = '("' . $cod . '","' . $cr . '"),';

        $valoresQ = substr($valores, 0, -1);

        $sql = "INSERT INTO cuentasXpagarUno (codigo, uno)
    VALUES $valoresQ";

        $sqlRes = $con->query($sql) or mysql_error();

        $item1 = next($items1);
        $item2 = next($items2);

        if ($item1 === false && $item2 === false) {
            break;
        }
    }

    echo '<h4>¡ Se Actualizo con Exito Los Dias al 01 - 30 !</h4>';

}
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
    $fin = "DELETE FROM cuentasXpagarPP";
    mysqli_query($con, $fin);
//////////////////////////////////////////
    $items1 = $_POST['codigoFinalP'];
    $items2 = $_POST['nombreAcreedor'];
    $items3 = $_POST['descripcion'];
    $items4 = $_POST['tipo'];
    $items5 = $_POST['saldoVencido'];

    while (true) {
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);
        $item5 = current($items5);

        $cod = (($item1 !== false) ? $item1 : ", &nbsp;");
        $nom = (($item2 !== false) ? $item2 : ", &nbsp;");
        $des = (($item3 !== false) ? $item3 : ", &nbsp;");
        $tip = (($item4 !== false) ? $item4 : ", &nbsp;");
        $sal = (($item5 !== false) ? $item5 : ", &nbsp;");

        $valores = '("' . $cod . '","' . $nom . '","' . $des . '","' . $tip . '","' . $sal . '"),';

        $valoresQ = substr($valores, 0, -1);

        $sql = "INSERT INTO cuentasXpagarPP (codigo, nombreAcreedor, descripcion, tipo, saldoVencido)
VALUES $valoresQ";

        $sqlRes = $con->query($sql) or mysql_error();

        $item1 = next($items1);
        $item2 = next($items2);
        $item3 = next($items3);
        $item4 = next($items4);
        $item5 = next($items5);

        if ($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false) {
            break;
        }
    }

    echo '<h4>¡ Se Actualizo con Exito el Saldo Vencido PP !</h4>';

}

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
    $sl = "DELETE FROM cuentasXpagarSaldo";
    mysqli_query($con, $sl);
//////////////////////////////////////////

    $items1 = $_POST['codigoS'];
    $items2 = $_POST['nombreAcreedor'];
    $items3 = $_POST['descripcion'];
    $items4 = $_POST['saldoVencido'];

    while (true) {
        $item1 = current($items1);
        $item2 = current($items2);
        $item3 = current($items3);
        $item4 = current($items4);

        $cod = (($item1 !== false) ? $item1 : ", &nbsp;");
        $nom = (($item2 !== false) ? $item2 : ", &nbsp;");
        $des = (($item3 !== false) ? $item3 : ", &nbsp;");
        $sal = (($item4 !== false) ? $item4 : ", &nbsp;");

        $valores = '("' . $cod . '","' . $nom . '","' . $des . '","' . $sal . '"),';

        $valoresQ = substr($valores, 0, -1);

        $sql = "INSERT INTO cuentasXpagarSaldo (codigo, nombreAcreedor, descripcion, saldoVencido)
VALUES $valoresQ";

        $sqlRes = $con->query($sql) or mysql_error();

        $item1 = next($items1);
        $item2 = next($items2);
        $item3 = next($items3);
        $item4 = next($items4);

        if ($item1 === false && $item2 === false && $item3 === false && $item4 === false) {
            break;
        }
    }

    echo '<h4>¡ Se Actualizo con Exito !</h4>';

}

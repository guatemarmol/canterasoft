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
    $diasDos = "DELETE FROM cuentasXpagarDos";
    mysqli_query($con, $diasDos);
//////////////////////////////////////////

    $items1 = $_POST['codigoFinal3'];
    $items2 = $_POST['dos'];

    while (true) {
        $item1 = current($items1);
        $item2 = current($items2);

        $cod = (($item1 !== false) ? $item1 : ", &nbsp;");
        $cr  = (($item2 !== false) ? $item2 : ", &nbsp;");

        $valores = '("' . $cod . '","' . $cr . '"),';

        $valoresQ = substr($valores, 0, -1);

        $sql = "INSERT INTO cuentasXpagarDos (codigo, dos)
    VALUES $valoresQ";

        $sqlRes = $con->query($sql) or mysql_error();

        $item1 = next($items1);
        $item2 = next($items2);

        if ($item1 === false && $item2 === false) {
            break;
        }
    }

    echo '<h4>¡ Se Actualizo con Exito Los Dias al 31 - 45 !</h4>';

}
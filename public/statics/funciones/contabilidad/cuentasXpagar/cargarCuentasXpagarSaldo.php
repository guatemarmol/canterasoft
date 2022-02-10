
<div class="contenedor row" style="display: none;">
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal0 row" id="formFinal0" name="formFinal0">
<h4>Cuentas Saldo Vencido</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Codigo</td>
            <td id="tit">Nombre</td>
            <td id="tit">Descripción</td>
            <td id="tit">Total</td>
        </tr>
    </thead>
<tbody>
<?php
$sql = "SELECT tt.codigo,
tt.nombreAcreedor,
tt.descripcion,
(tt.saldoVencido-pp.saldoVencido)
FROM cuentasXpagarTT AS tt
INNER JOIN cuentasXpagarPP AS pp
ON tt.codigo=pp.codigo
GROUP BY tt.codigo
UNION ALL
SELECT codigo, nombreAcreedor, descripcion, saldoVencido FROM cuentasXpagarTT WHERE codigo NOT IN(SELECT codigo FROM cuentasXpagarPP)
ORDER BY codigo";
$result = mysqli_query($con, $sql);
while ($ver = mysqli_fetch_row($result)) {
    $datos = $ver[0] . "||" .
        $ver[1] . "||" .
        $ver[2] . "||" .
        $ver[3];

    if ($ver[3] < 0) {
        $ver[3] = $ver[3] * -1;
    }
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoS[]" value="<?php echo $ver[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="nombreAcreedor[]" value="<?php echo $ver[1] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="descripcion[]"  value="<?php echo $ver[2] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="saldoVencido[]" value="<?php echo $ver[3] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
</div>
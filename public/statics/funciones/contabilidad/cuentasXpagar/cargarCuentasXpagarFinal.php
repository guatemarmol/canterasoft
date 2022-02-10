
<div class="contenedor row" style="display: none;">
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinalT row" id="formFinalT" name="formFinalT">
<h4>Cuentas TT</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Codigo</td>
            <td id="tit">Nombre</td>
            <td id="tit">Descripción</td>
            <td id="tit">Tipo</td>
            <td id="tit">Total</td>
        </tr>
    </thead>
    <tbody>
    <?php
$sqlT = "SELECT codigo, nombreAcreedor, descripcion, tipo, SUM(saldoVencido)
FROM cuentasXpagarSAP WHERE tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$resultT = mysqli_query($con, $sqlT);
while ($verT = mysqli_fetch_row($resultT)) {
    $datosT = $verT[0] . "||" .
        $verT[1] . "||" .
        $verT[2] . "||" .
        $verT[3] . "||" .
        $verT[4];

    if ($verT[4] < 0) {
        $verT[4] = $verT[4] * -1;
    }
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinalT[]" value="<?php echo $verT[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="nombreAcreedor[]" value="<?php echo $verT[1] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="descripcion[]" value="<?php echo $verT[2] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="tipo[]" value="<?php echo $verT[3] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="saldoVencido[]" value="<?php echo $verT[4] ?>"></td>
    </tr>
<?php
}
?>
    </tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinalP row" id="formFinalP" name="formFinalP">
<h4>Cuentas PP</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Codigo</td>
            <td id="tit">Nombre</td>
            <td id="tit">Descripción</td>
            <td id="tit">Tipo</td>
            <td id="tit">Total</td>
        </tr>
    </thead>
    <tbody>
    <?php
$sqlP = "SELECT codigo, nombreAcreedor, descripcion, tipo, SUM(saldoVencido)
FROM cuentasXpagarSAP WHERE tipo<>'CB' AND tipo<>'PC' AND tipo<>'SI' AND tipo<>'PR' AND tipo<>'TT' AND tipo<>'AS' AND tipo<>''
GROUP BY codigo ORDER BY codigo";
$resultP = mysqli_query($con, $sqlP);
while ($verP = mysqli_fetch_row($resultP)) {
    $datosP = $verP[0] . "||" .
        $verP[1] . "||" .
        $verP[2] . "||" .
        $verP[3] . "||" .
        $verP[4];

    if ($verP[4] < 0) {
        $verP[4] = $verP[4] * -1;
    }
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinalP[]" value="<?php echo $verP[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="nombreAcreedor[]" value="<?php echo $verP[1] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="descripcion[]" value="<?php echo $verP[2] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="tipo[]" value="<?php echo $verP[3] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="saldoVencido[]" value="<?php echo $verP[4] ?>"></td>
    </tr>
<?php
}
?>
    </tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal1 row" id="formFinal1" name="formFinal1">
<h4>Cuentas Corriente</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Código</td>
            <td id="tit">Corriente</td>
        </tr>
    </thead>
<tbody>
<?php
$sql0 = "SELECT codigo, SUM(saldoVencido)
FROM cuentasXpagarSAP
WHERE DATEDIFF(fVencimiento, CURDATE()) >= 0 AND DATEDIFF(CURDATE(), fVencimiento) <= 30
AND tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$result0 = mysqli_query($con, $sql0);
while ($ver0 = mysqli_fetch_row($result0)) {
    $datos0 = $ver0[0] . "||" .
        $ver0[1];
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinal1[]" value="<?php echo $ver0[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="corriente[]" value="<?php echo $ver0[1] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal2 row" id="formFinal2" name="formFinal2">
<h4>Cuentas 01 - 30</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Código</td>
            <td id="tit">01 -  30</td>
        </tr>
    </thead>
<tbody>
<?php
$sql1 = "SELECT codigo, SUM(saldoVencido)
FROM cuentasXpagarSAP
WHERE DATEDIFF(CURDATE(), fVencimiento) >= 01 AND DATEDIFF(CURDATE(), fVencimiento) <= 30
AND tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$result1 = mysqli_query($con, $sql1);
while ($ver1 = mysqli_fetch_row($result1)) {
    $datos1 = $ver1[0] . "||" .
        $ver1[1];
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinal2[]" value="<?php echo $ver1[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="uno[]" value="<?php echo $ver1[1] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal3 row" id="formFinal3" name="formFinal3">
<h4>Cuentas 31 - 45</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Código</td>
            <td id="tit">31 - 45</td>
        </tr>
    </thead>
<tbody>
<?php
$sql2 = "SELECT codigo, SUM(saldoVencido)
FROM cuentasXpagarSAP
WHERE DATEDIFF(CURDATE(), fVencimiento) >= 31 AND DATEDIFF(CURDATE(), fVencimiento) <= 45
AND tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$result2 = mysqli_query($con, $sql2);
while ($ver2 = mysqli_fetch_row($result2)) {
    $datos2 = $ver2[0] . "||" .
        $ver2[1];
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinal3[]" value="<?php echo $ver2[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="dos[]" value="<?php echo $ver2[1] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal4 row" id="formFinal4" name="formFinal4">
<h4>Cuentas 46 - 60</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Código</td>
            <td id="tit">46 - 60</td>
        </tr>
    </thead>
<tbody>
<?php
$sql3 = "SELECT codigo, SUM(saldoVencido)
FROM cuentasXpagarSAP
WHERE DATEDIFF(CURDATE(), fVencimiento) >= 46 AND DATEDIFF(CURDATE(), fVencimiento) <= 60
AND tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$result3 = mysqli_query($con, $sql3);
while ($ver3 = mysqli_fetch_row($result3)) {
    $datos3 = $ver3[0] . "||" .
        $ver3[1];
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinal4[]" value="<?php echo $ver3[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="tres[]" value="<?php echo $ver3[1] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal5 row" id="formFinal5" name="formFinal5">
<h4>Cuentas 61 - 90</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Código</td>
            <td id="tit">61 - 90</td>
        </tr>
    </thead>
<tbody>
<?php
$sql4 = "SELECT codigo, SUM(saldoVencido)
FROM cuentasXpagarSAP
WHERE DATEDIFF(CURDATE(), fVencimiento) >= 61 AND DATEDIFF(CURDATE(), fVencimiento) <= 90
AND tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$result4 = mysqli_query($con, $sql4);
while ($ver4 = mysqli_fetch_row($result4)) {
    $datos4 = $ver4[0] . "||" .
        $ver4[1];
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinal5[]" value="<?php echo $ver4[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="cuatro[]" value="<?php echo $ver4[1] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
<!--------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------->
<form class="formFinal6 row" id="formFinal6" name="formFinal6">
<h4>Cuentas 91 - 120</h4>
<table >
    <thead>
        <tr>
            <td id="tit">Código</td>
            <td id="tit">91 - 120</td>
        </tr>
    </thead>
<tbody>
<?php
$sql5 = "SELECT codigo, SUM(saldoVencido)
FROM cuentasXpagarSAP
WHERE DATEDIFF(CURDATE(), fVencimiento) >= 91
AND tipo<>'CB' AND tipo<>'PC' AND tipo<>'PP' AND tipo<>'SI' AND tipo<>''
GROUP BY codigo
ORDER BY codigo";
$result5 = mysqli_query($con, $sql5);
while ($ver5 = mysqli_fetch_row($result5)) {
    $datos5 = $ver5[0] . "||" .
        $ver5[1];
    ?>
    <tr>
        <td><input class="orilla" readonly="on" type="text" name="codigoFinal6[]" value="<?php echo $ver5[0] ?>"></td>
        <td><input class="orilla" readonly="on" type="text" name="cinco[]" value="<?php echo $ver5[1] ?>"></td>
    </tr>
<?php
}
?>
</tbody>
</table>
</form>
</div>
<style type="text/css">
    table, td{
        border: solid 1px #000;
        border-collapse: collapse;
        text-align: center;
    }
    thead{
        background-color: #cccccc;
        color: #000;
        text-align: center;
        font-weight: bold;
        /*height: 30px;*/
        padding: 4px;
    }
    .orilla{
        border: solid 1px transparent;
        background-color: transparent;
        cursor: pointer;
    }
    #tit{
        height: 35px;
        color: #000;
    }
</style>

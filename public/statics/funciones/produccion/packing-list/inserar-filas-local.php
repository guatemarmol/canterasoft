<?php include_once '../../../on-database.php'?>
<?php
$barrasL0   = $_POST['barrasL0'];
$idL0       = $_POST['idL0'];
$productoL0 = $_POST['productoL0'];
$loteL0     = $_POST['loteL0'];
$pesoL0     = $_POST['pesoL0'];
$fechaL0    = $_POST['fecha'];
$horaL0     = $_POST['hora'];

$agregar0 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL0','$idL0','$productoL0','$loteL0','$pesoL0','$fechaL0','$horaL0')";

mysqli_query($con, $agregar0);

$barrasL1 = $_POST['barrasL1'];
if ($barrasL1 != '') {

    $barrasL1   = $_POST['barrasL1'];
    $idL1       = $_POST['idL1'];
    $productoL1 = $_POST['productoL1'];
    $loteL1     = $_POST['loteL1'];
    $pesoL1     = $_POST['pesoL1'];
    $fechaL1    = $_POST['fecha'];
    $horaL1     = $_POST['hora'];

    $agregar1 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL1','$idL1','$productoL1','$loteL1','$pesoL1','$fechaL1','$horaL1')";

    mysqli_query($con, $agregar1);

} else {

}

$barrasL2 = $_POST['barrasL2'];
if ($barrasL2 != '') {

    $barrasL2   = $_POST['barrasL2'];
    $idL2       = $_POST['idL2'];
    $productoL2 = $_POST['productoL2'];
    $loteL2     = $_POST['loteL2'];
    $pesoL2     = $_POST['pesoL2'];
    $fechaL2    = $_POST['fecha'];
    $horaL2     = $_POST['hora'];

    $agregar2 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL2','$idL2','$productoL2','$loteL2','$pesoL2','$fechaL2','$horaL2')";

    mysqli_query($con, $agregar2);

} else {

}

$barrasL3 = $_POST['barrasL3'];
if ($barrasL3 != '') {

    $barrasL3   = $_POST['barrasL3'];
    $idL3       = $_POST['idL3'];
    $productoL3 = $_POST['productoL3'];
    $loteL3     = $_POST['loteL3'];
    $pesoL3     = $_POST['pesoL3'];
    $fechaL3    = $_POST['fecha'];
    $horaL3     = $_POST['hora'];

    $agregar3 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL3','$idL3','$productoL3','$loteL3','$pesoL3','$fechaL3','$horaL3')";

    mysqli_query($con, $agregar3);

} else {

}

$barrasL4 = $_POST['barrasL4'];
if ($barrasL4 != '') {

    $barrasL4   = $_POST['barrasL4'];
    $idL4       = $_POST['idL4'];
    $productoL4 = $_POST['productoL4'];
    $loteL4     = $_POST['loteL4'];
    $pesoL4     = $_POST['pesoL4'];
    $fechaL4    = $_POST['fecha'];
    $horaL4     = $_POST['hora'];

    $agregar4 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL4','$idL4','$productoL4','$loteL4','$pesoL4','$fechaL4','$horaL4')";

    mysqli_query($con, $agregar4);

} else {

}

$barrasL5 = $_POST['barrasL5'];
if ($barrasL5 != '') {

    $barrasL5   = $_POST['barrasL5'];
    $idL5       = $_POST['idL5'];
    $productoL5 = $_POST['productoL5'];
    $loteL5     = $_POST['loteL5'];
    $pesoL5     = $_POST['pesoL5'];
    $fechaL5    = $_POST['fecha'];
    $horaL5     = $_POST['hora'];

    $agregar5 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL5','$idL5','$productoL5','$loteL5','$pesoL5','$fechaL5','$horaL5')";

    mysqli_query($con, $agregar5);

} else {

}

$barrasL6 = $_POST['barrasL6'];
if ($barrasL6 != '') {

    $barrasL6   = $_POST['barrasL6'];
    $idL6       = $_POST['idL6'];
    $productoL6 = $_POST['productoL6'];
    $loteL6     = $_POST['loteL6'];
    $pesoL6     = $_POST['pesoL6'];
    $fechaL6    = $_POST['fecha'];
    $horaL6     = $_POST['hora'];

    $agregar6 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL6','$idL6','$productoL6','$loteL6','$pesoL6','$fechaL6','$horaL6')";

    mysqli_query($con, $agregar6);

} else {

}

$barrasL7 = $_POST['barrasL7'];
if ($barrasL7 != '') {

    $barrasL7   = $_POST['barrasL7'];
    $idL7       = $_POST['idL7'];
    $productoL7 = $_POST['productoL7'];
    $loteL7     = $_POST['loteL7'];
    $pesoL7     = $_POST['pesoL7'];
    $fechaL7    = $_POST['fecha'];
    $horaL7     = $_POST['hora'];

    $agregar7 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL7','$idL7','$productoL7','$loteL7','$pesoL7','$fechaL7','$horaL7')";

    mysqli_query($con, $agregar7);

} else {

}

$barrasL8 = $_POST['barrasL8'];
if ($barrasL8 != '') {

    $barrasL8   = $_POST['barrasL8'];
    $idL8       = $_POST['idL8'];
    $productoL8 = $_POST['productoL8'];
    $loteL8     = $_POST['loteL8'];
    $pesoL8     = $_POST['pesoL8'];
    $fechaL8    = $_POST['fecha'];
    $horaL8     = $_POST['hora'];

    $agregar8 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL8','$idL8','$productoL8','$loteL8','$pesoL8','$fechaL8','$horaL8')";

    mysqli_query($con, $agregar8);

} else {

}

$barrasL9 = $_POST['barrasL9'];
if ($barrasL9 != '') {

    $barrasL9   = $_POST['barrasL9'];
    $idL9       = $_POST['idL9'];
    $productoL9 = $_POST['productoL9'];
    $loteL9     = $_POST['loteL9'];
    $pesoL9     = $_POST['pesoL9'];
    $fechaL9    = $_POST['fecha'];
    $horaL9     = $_POST['hora'];

    $agregar9 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL9','$idL9','$productoL9','$loteL9','$pesoL9','$fechaL9','$horaL9')";

    mysqli_query($con, $agregar9);

} else {

}

$barrasL10 = $_POST['barrasL10'];
if ($barrasL10 != '') {

    $barrasL10   = $_POST['barrasL10'];
    $idL10       = $_POST['idL10'];
    $productoL10 = $_POST['productoL10'];
    $loteL10     = $_POST['loteL10'];
    $pesoL10     = $_POST['pesoL10'];
    $fechaL10    = $_POST['fecha'];
    $horaL10     = $_POST['hora'];

    $agregar10 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL10','$idL10','$productoL10','$loteL10','$pesoL10','$fechaL10','$horaL10')";

    mysqli_query($con, $agregar10);

} else {

}

$barrasL11 = $_POST['barrasL11'];
if ($barrasL11 != '') {

    $barrasL11   = $_POST['barrasL11'];
    $idL11       = $_POST['idL11'];
    $productoL11 = $_POST['productoL11'];
    $loteL11     = $_POST['loteL11'];
    $pesoL11     = $_POST['pesoL11'];
    $fechaL11    = $_POST['fecha'];
    $horaL11     = $_POST['hora'];

    $agregar11 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL11','$idL11','$productoL11','$loteL11','$pesoL11','$fechaL11','$horaL11')";

    mysqli_query($con, $agregar11);

} else {

}

$barrasL12 = $_POST['barrasL12'];
if ($barrasL12 != '') {

    $barrasL12   = $_POST['barrasL12'];
    $idL12       = $_POST['idL12'];
    $productoL12 = $_POST['productoL12'];
    $loteL12     = $_POST['loteL12'];
    $pesoL12     = $_POST['pesoL12'];
    $fechaL12    = $_POST['fecha'];
    $horaL12     = $_POST['hora'];

    $agregar12 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL12','$idL12','$productoL12','$loteL12','$pesoL12','$fechaL12','$horaL12')";

    mysqli_query($con, $agregar12);

} else {

}

$barrasL13 = $_POST['barrasL13'];
if ($barrasL13 != '') {

    $barrasL13   = $_POST['barrasL13'];
    $idL13       = $_POST['idL13'];
    $productoL13 = $_POST['productoL13'];
    $loteL13     = $_POST['loteL13'];
    $pesoL13     = $_POST['pesoL13'];
    $fechaL13    = $_POST['fecha'];
    $horaL13     = $_POST['hora'];

    $agregar13 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL13','$idL13','$productoL13','$loteL13','$pesoL13','$fechaL13','$horaL13')";

    mysqli_query($con, $agregar13);

} else {

}

$barrasL14 = $_POST['barrasL14'];
if ($barrasL14 != '') {

    $barrasL14   = $_POST['barrasL14'];
    $idL14       = $_POST['idL14'];
    $productoL14 = $_POST['productoL14'];
    $loteL14     = $_POST['loteL14'];
    $pesoL14     = $_POST['pesoL14'];
    $fechaL14    = $_POST['fecha'];
    $horaL14     = $_POST['hora'];

    $agregar14 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL14','$idL14','$productoL14','$loteL14','$pesoL14','$fechaL14','$horaL14')";

    mysqli_query($con, $agregar14);

} else {

}

$barrasL15 = $_POST['barrasL15'];
if ($barrasL15 != '') {

    $barrasL15   = $_POST['barrasL15'];
    $idL15       = $_POST['idL15'];
    $productoL15 = $_POST['productoL15'];
    $loteL15     = $_POST['loteL15'];
    $pesoL15     = $_POST['pesoL15'];
    $fechaL15    = $_POST['fecha'];
    $horaL15     = $_POST['hora'];

    $agregar15 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL15','$idL15','$productoL15','$loteL15','$pesoL15','$fechaL15','$horaL15')";

    mysqli_query($con, $agregar15);

} else {

}

$barrasL16 = $_POST['barrasL16'];
if ($barrasL16 != '') {

    $barrasL16   = $_POST['barrasL16'];
    $idL16       = $_POST['idL16'];
    $productoL16 = $_POST['productoL16'];
    $loteL16     = $_POST['loteL16'];
    $pesoL16     = $_POST['pesoL16'];
    $fechaL16    = $_POST['fecha'];
    $horaL16     = $_POST['hora'];

    $agregar16 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL16','$idL16','$productoL16','$loteL16','$pesoL16','$fechaL16','$horaL16')";

    mysqli_query($con, $agregar16);

} else {

}

$barrasL17 = $_POST['barrasL17'];
if ($barrasL17 != '') {

    $barrasL17   = $_POST['barrasL17'];
    $idL17       = $_POST['idL17'];
    $productoL17 = $_POST['productoL17'];
    $loteL17     = $_POST['loteL17'];
    $pesoL17     = $_POST['pesoL17'];
    $fechaL17    = $_POST['fecha'];
    $horaL17     = $_POST['hora'];

    $agregar17 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL17','$idL17','$productoL17','$loteL17','$pesoL17','$fechaL17','$horaL17')";

    mysqli_query($con, $agregar17);

} else {

}

$barrasL18 = $_POST['barrasL18'];
if ($barrasL18 != '') {

    $barrasL18   = $_POST['barrasL18'];
    $idL18       = $_POST['idL18'];
    $productoL18 = $_POST['productoL18'];
    $loteL18     = $_POST['loteL18'];
    $pesoL18     = $_POST['pesoL18'];
    $fechaL18    = $_POST['fecha'];
    $horaL18     = $_POST['hora'];

    $agregar18 = "INSERT INTO filasPackingListLocal(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasL18','$idL18','$productoL18','$loteL18','$pesoL18','$fechaL18','$horaL18')";

    mysqli_query($con, $agregar18);

} else {

}

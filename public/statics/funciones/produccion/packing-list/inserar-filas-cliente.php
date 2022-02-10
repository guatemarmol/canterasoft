<?php include_once '../../../on-database.php'?>
<?php
$barrasC0   = $_POST['barrasC0'];
$idC0       = $_POST['idC0'];
$productoC0 = $_POST['productoC0'];
$loteC0     = $_POST['loteC0'];
$pesoC0     = $_POST['pesoC0'];
$fechaC0    = $_POST['fecha'];
$horaC0     = $_POST['hora'];

$agregar0 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC0','$idC0','$productoC0','$loteC0','$pesoC0','$fechaC0','$horaC0')";

mysqli_query($con, $agregar0);

$barrasC1 = $_POST['barrasC1'];
if ($barrasC1 != '') {

    $barrasC1   = $_POST['barrasC1'];
    $idC1       = $_POST['idC1'];
    $productoC1 = $_POST['productoC1'];
    $loteC1     = $_POST['loteC1'];
    $pesoC1     = $_POST['pesoC1'];
    $fechaC1    = $_POST['fecha'];
    $horaC1     = $_POST['hora'];

    $agregar1 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC1','$idC1','$productoC1','$loteC1','$pesoC1','$fechaC1','$horaC1')";

    mysqli_query($con, $agregar1);

} else {

}

$barrasC2 = $_POST['barrasC2'];
if ($barrasC2 != '') {

    $barrasC2   = $_POST['barrasC2'];
    $idC2       = $_POST['idC2'];
    $productoC2 = $_POST['productoC2'];
    $loteC2     = $_POST['loteC2'];
    $pesoC2     = $_POST['pesoC2'];
    $fechaC2    = $_POST['fecha'];
    $horaC2     = $_POST['hora'];

    $agregar2 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC2','$idC2','$productoC2','$loteC2','$pesoC2','$fechaC2','$horaC2')";
    mysqli_query($con, $agregar2);

} else {

}

$barrasC3 = $_POST['barrasC3'];
if ($barrasC3 != '') {

    $barrasC3   = $_POST['barrasC3'];
    $idC3       = $_POST['idC3'];
    $productoC3 = $_POST['productoC3'];
    $loteC3     = $_POST['loteC3'];
    $pesoC3     = $_POST['pesoC3'];
    $fechaC3    = $_POST['fecha'];
    $horaC3     = $_POST['hora'];

    $agregar3 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC3','$idC3','$productoC3','$loteC3','$pesoC3','$fechaC3','$horaC2')";
    mysqli_query($con, $agregar3);

} else {

}

$barrasC4 = $_POST['barrasC4'];
if ($barrasC4 != '') {

    $barrasC4   = $_POST['barrasC4'];
    $idC4       = $_POST['idC4'];
    $productoC4 = $_POST['productoC4'];
    $loteC4     = $_POST['loteC4'];
    $pesoC4     = $_POST['pesoC4'];
    $fechaC4    = $_POST['fecha'];
    $horaC4     = $_POST['hora'];

    $agregar4 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC4','$idC4','$productoC4','$loteC4','$pesoC4','$fechaC4','$horaC4')";
    mysqli_query($con, $agregar4);

} else {

}

$barrasC5 = $_POST['barrasC5'];
if ($barrasC5 != '') {

    $barrasC5   = $_POST['barrasC5'];
    $idC5       = $_POST['idC5'];
    $productoC5 = $_POST['productoC5'];
    $loteC5     = $_POST['loteC5'];
    $pesoC5     = $_POST['pesoC5'];
    $fechaC5    = $_POST['fecha'];
    $horaC5     = $_POST['hora'];

    $agregar5 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC5','$idC5','$productoC5','$loteC5','$pesoC5','$fechaC5','$horaC5')";
    mysqli_query($con, $agregar5);

} else {

}

$barrasC6 = $_POST['barrasC6'];
if ($barrasC6 != '') {

    $barrasC6   = $_POST['barrasC6'];
    $idC6       = $_POST['idC6'];
    $productoC6 = $_POST['productoC6'];
    $loteC6     = $_POST['loteC6'];
    $pesoC6     = $_POST['pesoC6'];
    $fechaC6    = $_POST['fecha'];
    $horaC6     = $_POST['hora'];

    $agregar6 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC6','$idC6','$productoC6','$loteC6','$pesoC6','$fechaC6','$horaC6')";
    mysqli_query($con, $agregar6);

} else {

}

$barrasC7 = $_POST['barrasC7'];
if ($barrasC7 != '') {

    $barrasC7   = $_POST['barrasC7'];
    $idC7       = $_POST['idC7'];
    $productoC7 = $_POST['productoC7'];
    $loteC7     = $_POST['loteC7'];
    $pesoC7     = $_POST['pesoC7'];
    $fechaC7    = $_POST['fecha'];
    $horaC7     = $_POST['hora'];

    $agregar7 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC7','$idC7','$productoC7','$loteC7','$pesoC7','$fechaC7','$horaC7')";
    mysqli_query($con, $agregar7);

} else {

}

$barrasC8 = $_POST['barrasC8'];
if ($barrasC8 != '') {

    $barrasC8   = $_POST['barrasC8'];
    $idC8       = $_POST['idC8'];
    $productoC8 = $_POST['productoC8'];
    $loteC8     = $_POST['loteC8'];
    $pesoC8     = $_POST['pesoC8'];
    $fechaC8    = $_POST['fecha'];
    $horaC8     = $_POST['hora'];

    $agregar8 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC8','$idC8','$productoC8','$loteC8','$pesoC8','$fechaC8','$horaC8')";
    mysqli_query($con, $agregar8);

} else {

}

$barrasC9 = $_POST['barrasC9'];
if ($barrasC9 != '') {

    $barrasC9   = $_POST['barrasC9'];
    $idC9       = $_POST['idC9'];
    $productoC9 = $_POST['productoC9'];
    $loteC9     = $_POST['loteC9'];
    $pesoC9     = $_POST['pesoC9'];
    $fechaC9    = $_POST['fecha'];
    $horaC9     = $_POST['hora'];

    $agregar9 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC9','$idC9','$productoC9','$loteC9','$pesoC9','$fechaC9','$horaC9')";
    mysqli_query($con, $agregar9);

} else {

}

$barrasC10 = $_POST['barrasC10'];
if ($barrasC10 != '') {

    $barrasC10   = $_POST['barrasC10'];
    $idC10       = $_POST['idC10'];
    $productoC10 = $_POST['productoC10'];
    $loteC10     = $_POST['loteC10'];
    $pesoC10     = $_POST['pesoC10'];
    $fechaC10    = $_POST['fecha'];
    $horaC10     = $_POST['hora'];

    $agregar10 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC10','$idC10','$productoC10','$loteC10','$pesoC10','$fechaC10','$horaC10')";
    mysqli_query($con, $agregar10);

} else {

}

$barrasC11 = $_POST['barrasC11'];
if ($barrasC11 != '') {

    $barrasC11   = $_POST['barrasC11'];
    $idC11       = $_POST['idC11'];
    $productoC11 = $_POST['productoC11'];
    $loteC11     = $_POST['loteC11'];
    $pesoC11     = $_POST['pesoC11'];
    $fechaC11    = $_POST['fecha'];
    $horaC11     = $_POST['hora'];

    $agregar11 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC11','$idC11','$productoC11','$loteC11','$pesoC11','$fechaC11','$horaC11')";
    mysqli_query($con, $agregar11);

} else {

}

$barrasC12 = $_POST['barrasC12'];
if ($barrasC12 != '') {

    $barrasC12   = $_POST['barrasC12'];
    $idC12       = $_POST['idC12'];
    $productoC12 = $_POST['productoC12'];
    $loteC12     = $_POST['loteC10'];
    $pesoC12     = $_POST['pesoC10'];
    $fechaC12    = $_POST['fecha'];
    $horaC12     = $_POST['hora'];

    $agregar12 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC12','$idC12','$productoC12','$loteC12','$pesoC12','$fechaC12','$horaC12')";
    mysqli_query($con, $agregar12);

} else {

}

$barrasC13 = $_POST['barrasC13'];
if ($barrasC13 != '') {

    $barrasC13   = $_POST['barrasC13'];
    $idC13       = $_POST['idC13'];
    $productoC13 = $_POST['productoC13'];
    $loteC13     = $_POST['loteC13'];
    $pesoC13     = $_POST['pesoC13'];
    $fechaC13    = $_POST['fecha'];
    $horaC13     = $_POST['hora'];

    $agregar13 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC13','$idC13','$productoC13','$loteC13','$pesoC13','$fechaC13','$horaC13')";
    mysqli_query($con, $agregar13);

} else {

}

$barrasC14 = $_POST['barrasC14'];
if ($barrasC14 != '') {

    $barrasC14   = $_POST['barrasC14'];
    $idC14       = $_POST['idC14'];
    $productoC14 = $_POST['productoC14'];
    $loteC14     = $_POST['loteC14'];
    $pesoC14     = $_POST['pesoC14'];
    $fechaC14    = $_POST['fecha'];
    $horaC14     = $_POST['hora'];

    $agregar14 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC14','$idC14','$productoC14','$loteC14','$pesoC14','$fechaC14','$horaC14')";
    mysqli_query($con, $agregar14);

} else {

}

$barrasC15 = $_POST['barrasC15'];
if ($barrasC15 != '') {

    $barrasC15   = $_POST['barrasC15'];
    $idC15       = $_POST['idC15'];
    $productoC15 = $_POST['productoC15'];
    $loteC15     = $_POST['loteC15'];
    $pesoC15     = $_POST['pesoC15'];
    $fechaC15    = $_POST['fecha'];
    $horaC15     = $_POST['hora'];

    $agregar15 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC15','$idC15','$productoC15','$loteC15','$pesoC15','$fechaC15','$horaC15')";
    mysqli_query($con, $agregar15);

} else {

}

$barrasC16 = $_POST['barrasC16'];
if ($barrasC16 != '') {

    $barrasC16   = $_POST['barrasC16'];
    $idC16       = $_POST['idC16'];
    $productoC16 = $_POST['productoC16'];
    $loteC16     = $_POST['loteC16'];
    $pesoC16     = $_POST['pesoC16'];
    $fechaC16    = $_POST['fecha'];
    $horaC16     = $_POST['hora'];

    $agregar16 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC16','$idC16','$productoC16','$loteC16','$pesoC16','$fechaC16','$horaC16')";
    mysqli_query($con, $agregar16);

} else {

}

$barrasC17 = $_POST['barrasC17'];
if ($barrasC17 != '') {

    $barrasC17   = $_POST['barrasC17'];
    $idC17       = $_POST['idC17'];
    $productoC17 = $_POST['productoC17'];
    $loteC17     = $_POST['loteC17'];
    $pesoC17     = $_POST['pesoC17'];
    $fechaC17    = $_POST['fecha'];
    $horaC17     = $_POST['hora'];

    $agregar17 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC17','$idC17','$productoC17','$loteC17','$pesoC17','$fechaC17','$horaC17')";
    mysqli_query($con, $agregar17);

} else {

}

$barrasC18 = $_POST['barrasC18'];
if ($barrasC18 != '') {

    $barrasC18   = $_POST['barrasC18'];
    $idC18       = $_POST['idC18'];
    $productoC18 = $_POST['productoC18'];
    $loteC18     = $_POST['loteC18'];
    $pesoC18     = $_POST['pesoC18'];
    $fechaC18    = $_POST['fecha'];
    $horaC18     = $_POST['hora'];

    $agregar18 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC18','$idC18','$productoC18','$loteC18','$pesoC18','$fechaC18','$horaC18')";
    mysqli_query($con, $agregar18);

} else {

}

$barrasC19 = $_POST['barrasC19'];
if ($barrasC19 != '') {

    $barrasC19   = $_POST['barrasC19'];
    $idC19       = $_POST['idC19'];
    $productoC19 = $_POST['productoC19'];
    $loteC19     = $_POST['loteC19'];
    $pesoC19     = $_POST['pesoC19'];
    $fechaC19    = $_POST['fecha'];
    $horaC19     = $_POST['hora'];

    $agregar19 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC19','$idC19','$productoC19','$loteC19','$pesoC19','$fechaC19','$horaC19')";
    mysqli_query($con, $agregar19);

} else {

}

$barrasC20 = $_POST['barrasC20'];
if ($barrasC20 != '') {

    $barrasC20   = $_POST['barrasC20'];
    $idC20       = $_POST['idC20'];
    $productoC20 = $_POST['productoC20'];
    $loteC20     = $_POST['loteC20'];
    $pesoC20     = $_POST['pesoC20'];
    $fechaC20    = $_POST['fecha'];
    $horaC20     = $_POST['hora'];

    $agregar20 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC20','$idC20','$productoC20','$loteC20','$pesoC20','$fechaC20','$horaC20')";
    mysqli_query($con, $agregar20);

} else {

}

$barrasC21 = $_POST['barrasC21'];
if ($barrasC21 != '') {

    $barrasC21   = $_POST['barrasC21'];
    $idC21       = $_POST['idC21'];
    $productoC21 = $_POST['productoC21'];
    $loteC21     = $_POST['loteC21'];
    $pesoC21     = $_POST['pesoC21'];
    $fechaC21    = $_POST['fecha'];
    $horaC21     = $_POST['hora'];

    $agregar21 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC21','$idC21','$productoC21','$loteC21','$pesoC21','$fechaC21','$horaC21')";
    mysqli_query($con, $agregar21);

} else {

}

$barrasC22 = $_POST['barrasC22'];
if ($barrasC22 != '') {

    $barrasC22   = $_POST['barrasC22'];
    $idC22       = $_POST['idC22'];
    $productoC22 = $_POST['productoC22'];
    $loteC22     = $_POST['loteC22'];
    $pesoC22     = $_POST['pesoC22'];
    $fechaC22    = $_POST['fecha'];
    $horaC22     = $_POST['hora'];

    $agregar22 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC22','$idC22','$productoC22','$loteC22','$pesoC22','$fechaC22','$horaC22')";
    mysqli_query($con, $agregar22);

} else {

}

$barrasC23 = $_POST['barrasC23'];
if ($barrasC23 != '') {

    $barrasC23   = $_POST['barrasC23'];
    $idC23       = $_POST['idC23'];
    $productoC23 = $_POST['productoC23'];
    $loteC23     = $_POST['loteC23'];
    $pesoC23     = $_POST['pesoC23'];
    $fechaC23    = $_POST['fecha'];
    $horaC23     = $_POST['hora'];

    $agregar23 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC23','$idC23','$productoC23','$loteC23','$pesoC23','$fechaC23','$horaC23')";
    mysqli_query($con, $agregar23);

} else {

}

$barrasC24 = $_POST['barrasC24'];
if ($barrasC24 != '') {

    $barrasC24   = $_POST['barrasC24'];
    $idC24       = $_POST['idC24'];
    $productoC24 = $_POST['productoC24'];
    $loteC24     = $_POST['loteC24'];
    $pesoC24     = $_POST['pesoC24'];
    $fechaC24    = $_POST['fecha'];
    $horaC24     = $_POST['hora'];

    $agregar24 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC24','$idC24','$productoC24','$loteC24','$pesoC24','$fechaC24','$horaC24')";
    mysqli_query($con, $agregar24);

} else {

}

$barrasC25 = $_POST['barrasC25'];
if ($barrasC25 != '') {

    $barrasC25   = $_POST['barrasC25'];
    $idC25       = $_POST['idC25'];
    $productoC25 = $_POST['productoC25'];
    $loteC25     = $_POST['loteC25'];
    $pesoC25     = $_POST['pesoC25'];
    $fechaC25    = $_POST['fecha'];
    $horaC25     = $_POST['hora'];

    $agregar25 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC25','$idC25','$productoC25','$loteC25','$pesoC25','$fechaC25','$horaC25')";
    mysqli_query($con, $agregar25);

} else {

}

$barrasC26 = $_POST['barrasC26'];
if ($barrasC26 != '') {

    $barrasC26   = $_POST['barrasC26'];
    $idC26       = $_POST['idC26'];
    $productoC26 = $_POST['productoC26'];
    $loteC26     = $_POST['loteC26'];
    $pesoC26     = $_POST['pesoC26'];
    $fechaC26    = $_POST['fecha'];
    $horaC26     = $_POST['hora'];

    $agregar26 = "INSERT INTO filasPackingListCliente(codigo, barras, id, producto, lote, peso, fecha, hora)
    VALUES ('$codigo','$barrasC26','$idC26','$productoC26','$loteC26','$pesoC26','$fechaC26','$horaC26')";
    mysqli_query($con, $agregar26);

} else {

}

<?php include_once '../../../on-database.php'?>

<?php
$numero = $_POST['numero'];
// sql to delete a record
$sql = "DELETE FROM suministrobodega WHERE codigosuministro='$numero'";

if ($conn->query($sql) === true) {
    echo "Dato eliminado exitosamente!";
} else {
    echo "Hubo un error al eliminar el dato " . $conn->error;
}

<?php
global $conexion;
$conexion = mysqli_connect("192.169.167.230", "canterasoft", "!C@anter@Soft#20022020!", "canterasoft");

if ($conexion) {
    //echo "Conección con Exito !<br/>";
} else {
    echo "Conección sin Exito, Verificalo ! <br/>";
}

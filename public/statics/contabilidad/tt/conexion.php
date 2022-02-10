<?php
global $conexion;
$conexion = mysqli_connect("198.71.231.51", "canterasoft", "!C@anter@Soft#20022020!", "canterasoft");

if ($conexion) {
    //echo "Conección con Exito !<br/>";
} else {
    echo "Conección sin Exito, Verificalo ! <br/>";
}

<?php
include_once '../../on-database.php';

$query = "SELECT M.descripcion, P.fecha, P.horaLlegada, P.horaDescarga,  P.horaVacInicio, P.horaVacFinal, P.statusCamion
                FROM plantaCarbonatoCamion AS P 
                INNER JOIN maquinaria AS M 
                ON P.codigoCamion = M.id
                
                ORDER BY P.fecha DESC;";

$resultado = $con->query($query);

$tabla = "";
echo '<br>';
while($fila = $resultado->fetch_assoc()){
    $fechaR = explode(" ", $fila['fecha']);
    $tabla .= "<tr>
                    <td><a id='fila0' >".$fechaR[0]."</a></td>
                    <td><a id='fila0' >".$fila['descripcion']."</a></td>
                    <td><a id='fila0' >".$fila['horaLlegada']."</a></td>
                    <td><a id='fila1' >".$fila['horaDescarga']."</a></td>
                    <td><a id='fila2' >".$fila['horaVacInicio']."</a></td>
                    <td><a id='fila2' >".$fila['horaVacFinal']."</a></td>   
                    <td><a id='fila3' >".$fila['statusCamion']."</a></td>
                </tr>";
}

echo $tabla;
$con->close();
?>
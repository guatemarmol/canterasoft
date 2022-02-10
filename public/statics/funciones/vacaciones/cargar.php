<?php

    $salida = "";
    $query = "SELECT * FROM vacaciones ORDER BY codigo DESC";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class='datagrid'>
    			<thead>
    				<tr id='titulo' class='tituloTabla'>
    					<td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Código</td>
    					<td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Empleado</td>
    					<td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Nombre</td>
                        <td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Apellido</td>
                        <td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Inicio</td>
                        <td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Fiinal</td>
                        <td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Monto</td>
                        <td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Descuento</td>
                        <td class='col-xs-12 col-sm-2 col-md-2 col-lg-2'>Total</td>
    				</tr>
    			</thead>
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['codigo'];
    		$salida.="<tr class='celda'>
    					<td><a href='vacaciones.php?codigo=$codigo'>".$fila['codigo']."</a></td>
    					<td><a href='vacaciones.php?codigo=$codigo'>".$fila['empleado']."</a></td>
    					<td><a href='vacaciones.php?codigo=$codigo'>".$fila['nombres']."</a></td>
                        <td><a href='vacaciones.php?codigo=$codigo'>".$fila['apellidos']."</a></td>	
                        <td><a href='vacaciones.php?codigo=$codigo'>".$fila['fechaInicio']."</a></td>
                        <td><a href='vacaciones.php?codigo=$codigo'>".$fila['fechaFinal']."</a></td>
                        <td><a href='vacaciones.php?codigo=$codigo'>".$fila['monto']."</a></td>
                        <td><a href='vacaciones.php?codigo=$codigo'>".$fila['descuento']."</a></td>
                        <td><a href='vacaciones.php?codigo=$codigo'>".$fila['total']."</a></td>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
        
    	$salida.=" ";
    }

    echo $salida;
    $con->close();

?>
<?php

    $salida = "";
    $query = "SELECT * FROM cliente ORDER BY codigoCliente DESC";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%'  id='tablaCliente'>
    			<thead>
    				<tr id='titulo' class='table-active'>
    					<td id='M0'>Código Cliente</td>
                        <td id='M0'>Nombre Comercial</td>
    					<td id='M1'>NIT</td>
                        <td id='M3'>Nombre Contacto</td>
                        <td id='M4'>Teléfono</td>
                        <td id='M5'>PBX</td>
                        <td id='M6'>Correo Electronico</td>
                        <td id='M7'>Dirección Fiscal</td>
                        <td id='M8'>Dirección Entrega 1</td>
                        <td id='M9'>Dirección Entrega 2</td>
                        <td id='M10'>Dirección Entrega 3</td>
                        <td id='M11'>Fecha</td>
                        <td id='M12'>Hora</td>
                        <td id='M13'>Alta</td>
                        <td id='M14'>Baja</td>
    				</tr>
    			</thead> 
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['codigoCliente'];
    		$salida.="<tr class='celda'>
    					<td><a id='fila0' href='cliente.php?codigoCliente=$codigo'>".$fila['codigoCliente']."</a></td>
                        <td><a id='fila0' href='cliente.php?codigoCliente=$codigo'>".$fila['nombreComercialCliente']."</a></td>
                        <td><a id='fila1' href='cliente.php?codigoCliente=$codigo'>".$fila['nitCliente']."</a></td>
                        <td><a id='fila3' href='cliente.php?codigoCliente=$codigo'>".$fila['nombreContactoCliente']."</a></td>	
                        <td><a id='fila4' href='cliente.php?codigoCliente=$codigo'>".$fila['pbxCliente']."</a></td>
                        <td><a id='fila5' href='cliente.php?codigoCliente=$codigo'>".$fila['telefonoCliente']."</a></td>
                        <td><a id='fila6' href='cliente.php?codigoCliente=$codigo'>".$fila['correoCliente']."</a></td>
    					<td><a id='fila7' href='cliente.php?codigoCliente=$codigo'>".$fila['direccionFiscalCliente']."</a></td>
                        <td><a id='fila8' href='cliente.php?codigoCliente=$codigo'>".$fila['direccionEntrega1Cliente']."</a></td>
                        <td><a id='fila9' href='cliente.php?codigoCliente=$codigo'>".$fila['direccionEntrega2Cliente']."</a></td>	
                        <td><a id='fila10' href='cliente.php?codigoCliente=$codigo'>".$fila['direccionEntrega3Cliente']."</a></td>
                        <td><a id='fila11' href='cliente.php?codigoCliente=$codigo'>".$fila['fechaCliente']."</a></td>
                        <td><a id='fila12' href='cliente.php?codigoCliente=$codigo'>".$fila['horaCliente']."</a></td>
                        <td><a id='fila13' href='cliente.php?codigoCliente=$codigo'>+</a></td>
                        <td><a id='fila14' href='cliente.php?codigoCliente=$codigo'>x</a></td>
    				</tr>";
    	}
    	$salida.="</tbody></table>";
    }else{
        
    	$salida.=" ";
    }

    echo $salida;
    $con->close();

?>

<script>

$(document).ready(function() {
    $('#tablaCliente').DataTable( {
        
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
            //'pdfHtml5'
        ],
        language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                 "info": " _PAGE_ of _PAGES_",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
        scrollX: true,
    } );
    
} );

</script>
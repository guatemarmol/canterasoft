<?php

    $salida = "";
    $query = "SELECT * FROM pedido ORDER BY numeroPedido  DESC";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%'  id='tablaTurno'>
    			<thead>
    				<tr id='titulo' class='table-active'>
    					<td>Número Pedido</td>
    					<td>NIT del Cliente</td>
                        <td>Direccion Entrega</td>
                        <td>Fecha de Emisión</td>
                        <td>Fecha de Entrega</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Alta</td>
                        <td>Baja</td>
    				</tr>
    			</thead> 
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['numeroPedido'];
    		$salida.="<tr class='celda'>
    					<td><a id='fila0' href='pedido.php?numeroPedido=$codigo'>".$fila['numeroPedido']."</a></td>
    					<td><a id='fila1' href='pedido.php?numeroPedido=$codigo'>".$fila['nitClientePedido']."</a></td>
                        <td><a id='fila2' href='pedido.php?numeroPedido=$codigo'>".$fila['direccionEntregaPedido']."</a></td>
                        <td><a id='fila2' href='pedido.php?numeroPedido=$codigo'>".$fila['fechaEmisionPedido']."</a></td>	
                        <td><a id='fila3' href='pedido.php?numeroPedido=$codigo'>".$fila['fechaEntregaPedido']."</a></td>
                        <td><a id='fila0' href='pedido.php?numeroPedido=$codigo'>".$fila['fechaPedido']."</a></td>
                        <td><a id='fila0' href='pedido.php?numeroPedido=$codigo'>".$fila['horaPedido']."</a></td>
                        <td><a id='fila3' href='pedido.php?codigoTurno=$codigo'>+</a></td>
                        <td><a id='fila0' href='pedido.php?codigoTurno=$codigo'>x</a></td>
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
    $('#tablaTurno').DataTable( {
        
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
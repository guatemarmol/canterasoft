<?php

    $salida = "";
    $query = "SELECT * FROM lineaPedido ORDER BY numeroPedidoLineaPedido  DESC";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%'  id='tablaTurno'>
    			<thead>
    				<tr id='titulo' class='table-active'>
    					<td>Número Pedido</td>
    					<td>Linea de Pedido</td>
                        <td>Código Producto</td>
                        <td>Cantidad en Peso</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Alta</td>
                        <td>Baja</td>
    				</tr>
    			</thead> 
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['numeroPedidoLineaPedido'];
    		$salida.="<tr class='celda'>
    					<td><a id='fila0' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>".$fila['numeroPedidoLineaPedido']."</a></td>
    					<td><a id='fila1' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>".$fila['lineaPedido']."</a></td>
                        <td><a id='fila2' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>".$fila['codigoProductoLineaPedido']."</a></td>
                        <td><a id='fila3' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>".$fila['cantidadEnPesoLineaPedido']."</a></td>	
                        <td><a id='fila4' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>".$fila['fechaLineaPedido']."</a></td>
                        <td><a id='fila5' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>".$fila['horaLineaPedido']."</a></td>
                        <td><a id='fila6' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>+</a></td>
                        <td><a id='fila7' href='linea-pedido.php?numeroPedidoLineaPedido=$codigo'>x</a></td>
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
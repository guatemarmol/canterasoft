<?php

    $salida = "";
    $query = "SELECT * FROM facturacion ORDER BY numeroFactura  DESC";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%' ' id='tablaFacturacion'>
    			<thead>
    				<tr id='titulo' class='table-active'>
                        <td>Número Factura</td>
    					<td>Empresa</td>
    					<td>Divición</td>
                        <td>NIT Cliente</td>
                        <td>Fecha Facturación</td>
                        <td>Código Flete</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Alta</td>
                        <td>Baja</td>
    				</tr>
    			</thead> 
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['numeroFactura'];
    		$salida.="<tr class='celda'>
                        <td><a id='fila2' href='facturacion.php?numeroFactura=$codigo'>".$fila['numeroFactura']."</a></td>
    					<td><a id='fila0' href='facturacion.php?numeroFactura=$codigo'>".$fila['empresa']."</a></td>
    					<td><a id='fila1' href='facturacion.php?numeroFactura=$codigo'>".$fila['division']."</a></td>
                        <td><a id='fila2' href='facturacion.php?numeroFactura=$codigo'>".$fila['nitCliente']."</a></td>	
                        <td><a id='fila3' href='facturacion.php?numeroFactura=$codigo'>".$fila['fechaFacturacion']."</a></td>
                        <td><a id='fila0' href='facturacion.php?numeroFactura=$codigo'>".$fila['codigoFlete']."</a></td>
    					<td><a id='fila1' href='facturacion.php?numeroFactura=$codigo'>".$fila['fecha']."</a></td>
                        <td><a id='fila2' href='facturacion.php?numeroFactura=$codigo'>".$fila['hora']."</a></td>
                        <td><a id='fila2' href='facturacion.php?numeroFactura=$codigo'>+</a></td>
                        <td><a id='fila2' href='facturacion.php?numeroFactura=$codigo'>x</a></td>
                        	
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
    $('#tablaFacturacion').DataTable( {
        
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
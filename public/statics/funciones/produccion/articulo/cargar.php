<?php

    $salida = "";
    $query = "SELECT * FROM articuloBodega ORDER BY codigoArticuloBodega  DESC";
    $resultado = $con->query($query);
 
    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%'  id='tablaProductoArticuloBodega'>
    			<thead>
    				<tr id='titulo' class='table-active'>
                        <td>Código</td>
    					<td>Producto</td>
    					<td>Bodega</td>
                        <td>Saldo</td>
                        <td>Máximo</td>
                        <td>Mínimo</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Alta</td>
                        <td>Baja</td>
    				</tr>
    			</thead> 
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['codigoArticuloBodega'];
    		$salida.="<tr class='celda'>
                        <td><a id='fila0' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['codigoArticuloBodega']."</a></td>
    					<td><a id='fila1' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['nombreEspecificoProducto']."</a></td>
    					<td><a id='fila2' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['nombreBodega']."</a></td>
                        <td><a id='fila3' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['saldoArticuloBodega']."</a></td>
                        <td><a id='fila4' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['maximoArticuloBodega']."</a></td>	
                        <td><a id='fila5' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['minimoArticuloBodega']."</a></td>
                        <td><a id='fila6' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['fechaArticuloBodega']."</a></td>
                        <td><a id='fila7' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>".$fila['horaArticuloBodega']."</a></td>
                        <td><a id='fila8' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>+</a></td>
                        <td><a id='fila9' href='articulo-bodega.php?codigoArticuloBodega=$codigo'>x</a></td>
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
    $('#tablaProductoArticuloBodega').DataTable( {
        
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
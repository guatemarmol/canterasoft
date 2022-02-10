<?php

    $salida = "";
    $query = "SELECT * FROM costo ORDER BY codigoCosto  DESC";
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%' id='tablaCosto'>
    			<thead>
    				<tr id='titulo' class='table-active'>
    					<td>Código Costo</td>
    					<td>Valor Transporte</td>
                        <td>Energía Electrica</td>
                        <td>Mano de Obra</td>
                        <td>Comunicaciones</td>
                        <td>Depreciaciones</td>
    					<td>Prestaciones</td>
                        <td>Alquileres</td>
                        <td>Valor Total</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Alta</td>
                        <td>Baja</td>
    				</tr>
    			</thead>
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
            $codigo = $fila['codigoCosto'];
    		$salida.="<tr class='celda'>
    					<td><a id='fila0' href='costo.php?codigoCosto=$codigo'>".$fila['codigoCosto']."</a></td>
    					<td><a id='fila1' href='costo.php?codigoCosto=$codigo'>".$fila['valorTransporteInternoCosto']."</a></td>
                        <td><a id='fila2' href='costo.php?codigoCosto=$codigo'>".$fila['energiaElectricaCosto']."</a></td>
                        <td><a id='fila3' href='costo.php?codigoCosto=$codigo'>".$fila['manoObraCosto']."</a></td>	
                        <td><a id='fila4' href='costo.php?codigoCosto=$codigo'>".$fila['comunicacionesCosto']."</a></td>
                        <td><a id='fila5' href='costo.php?codigoCosto=$codigo'>".$fila['depreciacionesCosto']."</a></td>
    					<td><a id='fila6' href='costo.php?codigoCosto=$codigo'>".$fila['prestacionesCosto']."</a></td>
                        <td><a id='fila7' href='costo.php?codigoCosto=$codigo'>".$fila['alquileresCosto']."</a></td>	
                        <td><a id='fila8' href='costo.php?codigoCosto=$codigo'>".$fila['valorTotalCosto']."</a></td>
                        <td><a id='fila9' href='costo.php?codigoCosto=$codigo'>".$fila['fechaCosto']."</a></td>
    					<td><a id='fila10' href='costo.php?codigoCosto=$codigo'>".$fila['horaCosto']."</a></td>
                        <td><a id='fila01' href='costo.php?codigoCosto=$codigo'>+</a></td>
    					<td><a id='fila12' href='costo.php?codigoCosto=$codigo'>x</a></td>
                        	
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
    $('#tablaCosto').DataTable( {
        
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
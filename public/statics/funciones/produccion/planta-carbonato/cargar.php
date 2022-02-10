<?php

    $salida = "";
    $query = "SELECT produccion.codigo, descripcion AS producto, turno, peso, fecha, lote FROM produccion 
                INNER JOIN producto 
                ON producto.`codigo` = produccion.`producto` 
                WHERE produccion.area = 1 AND fecha = current_date()
                ORDER BY fecha DESC";    
    $resultado = $con->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table class='display nowrap table-bordered table-hover' style='width:100%'  id='tablaTurno'>
    			<thead>
    				<tr id='titulo' class='table-active'>
    					<td>Lote</td>
    					<td>Producto</td>
    					<td>Turno</td>
                        <td>Peso</td>
                        <td>Fecha</td>
                        <td id='M7'><span class='glyphicon glyphicon-trash'></span></td>
    				</tr>
    			</thead> 
    	<tbody>";
 
    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr class='celda'>
    					<td><a id='fila0' >".$fila['lote']."</a></td>
    					<td><a id='fila0' >".$fila['producto']."</a></td>
    					<td><a id='fila1' >".$fila['turno']."</a></td>
                        <td><a id='fila2' >".$fila['peso']."</a></td>
                        <td><a id='fila2' >".$fila['fecha']."</a></td>	
                        <td><button type='button' class='vutton' onclick='deleteProduct(".$fila['codigo'].")'><span class='glyphicon glyphicon-trash'></span></button></td>
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
<style type="text/css">
    .vutton{
        color: red;
        border-color: transparent;
        font-size: 12px;
        background-color: transparent;
    }
    .vutton:hover{
        color: darkred;
    }
    .nombre-tabla{
        background-color: #f7f7f7;
        padding: 5px;
        padding-left: 10px;
        border: solid 1px #f5f5f5;
        border-radius: 4px;
        text-align: left;
        font-weight: 700;
        margin-bottom: -31px;
        margin-top: 5px;
    }
    .dt-buttons{
        margin-top: -2px;
        margin-left: 5px;
    }
    .input-sm{
        margin-right: 5px;
    }
    table tr:nth-child(even) {
        background-color: #eee;
    }
    #fila1{
        font-size: 11px;
        font-weight: 600;
        /*text-transform: uppercase;*/
    }
    #fila2{
        font-size: 12px;
        /*text-transform: uppercase;*/
    }
    tfoot td{
        color: black;
        border: solid 1px transparent;
        font-size: 11px;
        font-weight: 700;
    }
    .selected{
        /*background-color: #eee;*/
        color: #000000;
        font-weight: 700;
    }
    .selected:hover{
        /*background-color: #eee;*/
        color: #000000;
        font-weight: 650;
    }
    @media (max-width: 375px) {
        #tabla-t_filter label{
            margin-top: 5px;
            float: left;
            width: 90%;
        }
        #tabla-t_filter label .input-sm{
            width: 90%;
        }
        #tabla-t_filter{
            margin-top: 10px;
        }
    }
</style>
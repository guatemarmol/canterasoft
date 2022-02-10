<?php include_once '../../../on-database.php' ?>

<div class="container-fluid">
    <div class="row" >
		<table class="display table-bordered table-hover" style="width:100%"  id="tablaDocumento">
			<thead>
				<tr id='titulo' class='table-active'>
					<td id="M0">Código</td>
					<td id="M1">Descripción</td>
					<td id="M2">Fecha</td>
                    <td id="M3">Hora</td>
                    <td id="M4">Alta</td>
                    <td id="M5">Baja</td>
				</tr>
			</thead>

			<tbody>
			<?php 

				$sql="SELECT * FROM documento ORDER BY codigoDocumento DESC";
				$result=mysqli_query($con,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
                           $ver[3];
			 ?>

			<tr>
				<td><a id="fila0" onclick="seleccionarDocumento('<?php echo $datos ?>')"><?php echo $ver[0] ?></a></td>
				<td><a id="fila1" onclick="seleccionarDocumento('<?php echo $datos ?>')"><?php echo $ver[1] ?></a></td>
				<td><a id="fila2" onclick="seleccionarDocumento('<?php echo $datos ?>')"><?php echo $ver[2] ?></a></td>
				<td><a id="fila3" onclick="seleccionarDocumento('<?php echo $datos ?>')"><?php echo $ver[3] ?></a></td>
				<td><a id="fila4" onclick="seleccionarDocumento('<?php echo $datos ?>')">+</a></td>
                <td><a id="fila5" onclick="seleccionarDocumento('<?php echo $datos ?>')">x</a></td>
			</tr>
			<?php 
		}
			 ?>
			 </tbody>
		</table>
    </div>
</div>

<script>

$(document).ready(function() {
    $('#tablaDocumento').DataTable( {
        
        dom: 'Bfrtip',
            buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5'
            //'pdfHtml5'
        ],
        "language": {
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
            }
    } );
    
} );

</script>
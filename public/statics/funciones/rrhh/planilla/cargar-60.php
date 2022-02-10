<?php include_once '../../../on-database.php' ?>

<div class="container-fluid">
    <div class="row" >
        <h3>Sueldo 60%</h3>
		<table class="display nowrap table-bordered table-hover" style="width:100%"  id="tablaPlanilla60">
			<thead>
				<tr id='titulo' class='table-active'>
					<td id="M0">No. Cuenta</td>
					<td id="M1">Empleado</td>
					<td id="M2">Sueldo 60%</td>
                    <td id="M3">Departamento</td>
                    <td id="M3">Fecha Planilla</td>
                    <td id="M3">Hora Planilla</td>
				</tr>
			</thead>

			<tbody>
			<?php 

				//$sql="SELECT * FROM planilla ORDER BY codigoEmpleado DESC";
                $sql= "SELECT cuentaBancaria, nombreEmpleado, apellidoEmpleado, liquido, nombreDepartamento, fechaPlanilla, horaPlanilla FROM empleado
                            INNER JOIN planilla
                            ON empleado.codigoEmpleado=planilla.codigoEmpleado WHERE estado = 'Activo'";
				$result=mysqli_query($con,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
                           $ver[2]."||".
                           $ver[3]."||".
                           $ver[4]."||".
                           $ver[5];
			 ?>

			<tr>
                <td><a id="fila0"><?php echo $ver[0] ?></a></td>
				<td><a id="fila1"><?php echo $ver[1] ?> <?php echo $ver[2] ?></a></td>
                <td><a id="fila2"><?php echo $ver[3] ?></a></td>
				<td><a id="fila3"><?php echo $ver[4] ?></a></td>
                <td><a id="fila4"><?php echo $ver[5] ?></a></td>
                <td><a id="fila5"><?php echo $ver[6] ?></a></td>
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
    $('#tablaPlanilla60').DataTable( {
        
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
                //"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
               "sInfo":           "Registros_START_ al _END_ de _TOTAL_ ",
                //"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoEmpty":      "0 Registros",
                 "info": " _PAGE_ of _PAGES_",
                "sInfoFiltered":   "",
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
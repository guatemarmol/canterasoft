<?php include_once '../../../on-database.php' ?>

<div class="container-fluid">
    <div class="row" >
		<table class="display nowrap table-bordered table-hover" style="width:100%"  id="tablaEmpresa">
			<thead>
				<tr id='titulo' class=' table-active'>
					    <td id="M0">Código Empresa</td>
    					<td id="M1">Razón Social</td>
                        <td id="M2">NIT</td>
                        <td id="M3">Dirección Fiscal</td>
                        <td id="M4">Dirección Oficina</td>
                        <td id="M5">Represenante Legal</td>
                        <td id="M6">Giro Negocio</td>
                        <td id="M7">Fecha</td>
                        <td id="M8">Hora</td>
                        <td id="M9">Alta</td>
                        <td id="M10">Baja</td>
				</tr>
			</thead>

			<tbody>
			<?php 

				$sql="SELECT * FROM empresa ORDER BY codigoEmpresa DESC";
				$result=mysqli_query($con,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
                           $ver[3]."||".
                           $ver[4]."||".
                           $ver[5]."||".
                           $ver[6]."||".
                           $ver[7]."||".
                           $ver[8];
			 ?>

			<tr>
				<td><a id="fila0" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[0] ?></a></td>
                <td><a id="fila1" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[1] ?></a></td>
				<td><a id="fila2" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[2] ?></a></td>
                <td><a id="fila3" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[3] ?></a></td>
                <td><a id="fila4" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[4] ?></a></td>
                <td><a id="fila5" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[5] ?></a></td>
                <td><a id="fila6" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[6] ?></a></td>
                <td><a id="fila7" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[7] ?></a></td>
                <td><a id="fila8" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'><?php echo $ver[8] ?></a></td>
				<td><a id="fila9" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'>+</a></td>
                <td><a id="fila10" href='empresa.php?codigoEmpresa=<?php echo $ver[0] ?>'>x</a></td>
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
    $('#tablaEmpresa').DataTable( {
           
        scrollX: true,
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
        }
        
    } );
    
} );
    
</script>
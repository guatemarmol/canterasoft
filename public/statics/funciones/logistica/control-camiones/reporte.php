<?php 

    include_once '../../../on-database.php';
	require '../../../../vendor/autoload.php';
	
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	
	$template = './template.xlsx';
	$reader = IOFactory::createReader('Xlsx');
	$spreadsheet = $reader->load($template);
	
	$sheet = $spreadsheet->getActiveSheet();
	
    $fecha = $_POST['date'];
    $hora = $_POST['hour'];

    $hora_file = str_replace(':', ' ', $_POST['hour']);
    $fecha_file = str_replace('/',' ',$_POST['date']);

    $sheet->setCellValue('A1', 'FECHA:'.$fecha);
    $sheet->setCellValue('A2', $hora);

    $reporteClientes = array('Descargando', 'Cargando', 'Por Cargar', 'Por Descarga', 'Cargada', 'Vacia');
    $camionClientes = array();
    foreach ($reporteClientes as $valor) {
        $query = getQuery(0, $valor, $hora);
        $result = mysqli_query($con, $query);
        foreach ($result as $descripcion) {
            array_push($camionClientes, $descripcion);
        }
    }

    $query = getQuery(1, 'Cargada', $hora);
    $camionCargada = mysqli_query($con, $query);

    $query = getQuery(1, 'Vacia', $hora);
    $camionVacio = mysqli_query($con, $query);
    
    writeReport($camionClientes, $camionCargada, $camionVacio);

    $writer = new Xlsx($spreadsheet);
	$writer->save("Ubicación de Equipos & Jumbos  $fecha_file - $hora_file.xlsx");
    echo "Ubicación de Equipos & Jumbos  $fecha_file - $hora_file.xlsx";


function getQuery($enTransito, $estado, $hora){
    return "SELECT COUNT(*) AS total, tipoCarga, estado, nombre, enTransito
            FROM controlCamion
            INNER JOIN ubicacionGPS
            ON ubicacionGPS.`codigo` = controlCamion.`ubicacion`
            WHERE (estado = '$estado') AND (enTransito = $enTransito) AND (fecha >= CURDATE()) AND (hora = '$hora')	
            GROUP BY tipoCarga, estado, nombre, enTransito
            ORDER BY nombre DESC";
}

function getColumn($index) {
    $dividend = $index;
    $columnName = '';
    $modulo = '';
    while ($dividend > 0) {
        $modulo = ($dividend - 1) % 26;
        $columnName =  chr(65 + $modulo) + $columnName;
        $dividend = (int)(($dividend - $modulo) / 26);
    }
    return $columnName;
}

function writeReport($clientes, $cargado, $vacio){
    global $sheet;
    $maxPipa = $maxPlataforma = $maxGondola = 9;
    foreach($clientes as $cliente){
        switch ($cliente['tipoCarga']) {
            case 'Pipa':
                $sheet->setCellValue('A'.$maxPipa,$cliente['estado']);
                $sheet->setCellValue('B'.$maxPipa,$cliente['nombre']);
                $sheet->setCellValue('C'.$maxPipa++,$cliente['total']);
                break;
            case 'Plataforma':
                $sheet->setCellValue('E'.$maxPlataforma,$cliente['estado']);
                $sheet->setCellValue('F'.$maxPlataforma,$cliente['nombre']);
                $sheet->setCellValue('G'.$maxPlataforma++,$cliente['total']);
                break;
            default:
                $sheet->setCellValue('I'.$maxGondola,$cliente['estado']);
                $sheet->setCellValue('J'.$maxGondola,$cliente['nombre']);
                $sheet->setCellValue('K'.$maxGondola++,$cliente['total']);
                break;
        }
    }

    ($maxPipa > $maxPlataforma && $maxPipa > $maxGondola) ? $maxPlataforma = $maxGondola = $maxPipa 
    : (($maxPlataforma > $maxGondola)  ? $maxPipa = $maxGondola = $maxPlataforma : $maxPipa = $maxPlataforma = $maxGondola);
    
    $sheet->setCellValue('B'.$maxPipa, 'Total en Clientes');
    $sheet->setCellValue('F'.$maxPipa, 'Total en Clientes');
    $sheet->setCellValue('J'.$maxPipa, 'Total en Clientes');
    
    $sheet->setCellValue('C'.$maxPipa, '=SUM(C9:C'.($maxPipa-1).')');
    $sheet->setCellValue('G'.$maxPipa, '=SUM(G9:G'.($maxPipa-1).')');
    $sheet->setCellValue('K'.$maxPipa, '=SUM(K9:K'.($maxPipa-1).')');

    $from = "A".$maxPipa; 
    $to = "K".$maxPipa;
    $sheet->getStyle("$from:$to")->getFont()->setBold(true);
    
    $maxPipa += 3; $maxPlataforma +=3; $maxGondola += 3;

    $sheet->setCellValue('A'.($maxPipa-1),'Transito a');
    $sheet->setCellValue('E'.($maxPipa-1),'Transito a');
    $sheet->setCellValue('I'.($maxPipa-1),'Transito a');

    $inicioSuma2 = $maxPipa;
    foreach($cargado as $cliente){
        switch ($cliente['tipoCarga']) {
            case 'Pipa':
                $sheet->setCellValue('A'.$maxPipa,$cliente['estado']);
                $sheet->setCellValue('B'.$maxPipa,$cliente['nombre']);
                $sheet->setCellValue('C'.$maxPipa++,$cliente['total']);
                break;
            case 'Plataforma':
                $sheet->setCellValue('E'.$maxPlataforma,$cliente['estado']);
                $sheet->setCellValue('F'.$maxPlataforma,$cliente['nombre']);
                $sheet->setCellValue('G'.$maxPlataforma++,$cliente['total']);
                break;
            default:
                $sheet->setCellValue('I'.$maxGondola,$cliente['estado']);
                $sheet->setCellValue('J'.$maxGondola,$cliente['nombre']);
                $sheet->setCellValue('K'.$maxGondola++,$cliente['total']);
                break;
        }
    }
    ($maxPipa > $maxPlataforma && $maxPipa > $maxGondola) ? $maxPlataforma = $maxGondola = $maxPipa 
    : (($maxPlataforma > $maxGondola)  ? $maxPipa = $maxGondola = $maxPlataforma : $maxPipa = $maxPlataforma = $maxGondola);
    
    $sheet->setCellValue('B'.$maxPipa, 'Por Salir');
    $sheet->setCellValue('F'.$maxPipa, 'Por Salir');
    $sheet->setCellValue('J'.$maxPipa, 'Por Salir');

    $row = $maxPipa - 1;
    $sheet->setCellValue('C'.$maxPipa, '=SUM(C'.$inicioSuma2.':C'.($row).')');
    $sheet->setCellValue('G'.$maxPipa, '=SUM(G'.$inicioSuma2.':G'.($row).')');
    $sheet->setCellValue('K'.$maxPipa, '=SUM(K'.$inicioSuma2.':K'.($row).')');

    $from = "A".$maxPipa; 
    $to = "K".$maxPipa;
    $sheet->getStyle("$from:$to")->getFont()->setBold(true);
    
    $maxPipa+=2; $maxPlataforma+=2; $maxGondola+=2;
    $inicioSuma3 = $maxPipa ;
    foreach($vacio as $cliente){
        switch ($cliente['tipoCarga']) {
            case 'Pipa':
                $sheet->setCellValue('A'.$maxPipa,$cliente['estado']);
                $sheet->setCellValue('B'.$maxPipa,$cliente['nombre']);
                $sheet->setCellValue('C'.$maxPipa++,$cliente['total']);
                break;
            case 'Plataforma':
                $sheet->setCellValue('E'.$maxPlataforma,$cliente['estado']);
                $sheet->setCellValue('F'.$maxPlataforma,$cliente['nombre']);
                $sheet->setCellValue('G'.$maxPlataforma++,$cliente['total']);
                break;
            default:
                $sheet->setCellValue('I'.$maxGondola,$cliente['estado']);
                $sheet->setCellValue('J'.$maxGondola,$cliente['nombre']);
                $sheet->setCellValue('K'.$maxGondola++,$cliente['total']);
                break;
        }
    }

    ($maxPipa > $maxPlataforma && $maxPipa > $maxGondola) ? $maxPlataforma = $maxGondola = $maxPipa 
    : (($maxPlataforma > $maxGondola)  ? $maxPipa = $maxGondola = $maxPlataforma : $maxPipa = $maxPlataforma = $maxGondola);

    $sheet->setCellValue('B'.$maxPipa, 'Total Vacias');
    $sheet->setCellValue('F'.$maxPipa, 'Total Vacias');
    $sheet->setCellValue('J'.$maxPipa, 'Total Vacias');
    
    $row = $maxPipa - 1;
    $sheet->setCellValue('C'.$maxPipa, '=SUM(C'.$inicioSuma3.':C'.($row).')');
    $sheet->setCellValue('G'.$maxPipa, '=SUM(G'.$inicioSuma3.':G'.($row).')');
    $sheet->setCellValue('K'.$maxPipa, '=SUM(K'.$inicioSuma3.':K'.($row).')');

    $from = "A".$maxPipa; 
    $to = "K".$maxPipa;
    $sheet->getStyle("$from:$to")->getFont()->setBold(true);

    $maxPipa++;

    $sheet->setCellValue('B'.$maxPipa, 'TOTAL PIPAS');
    $sheet->setCellValue('F'.$maxPipa, 'TOTAL PLATAFORMAS');
    $sheet->setCellValue('J'.$maxPipa, 'TOTAL GONDOLAS');

    $sheet->setCellValue('C'.$maxPipa, '=C'.($inicioSuma2-3).' + C'.($inicioSuma3 - 2).'+ C'.($maxPipa-1));
    $sheet->setCellValue('G'.$maxPipa, '=G'.($inicioSuma2-3).' + G'.($inicioSuma3 - 2).'+ G'.($maxPipa-1));
    $sheet->setCellValue('K'.$maxPipa, '=K'.($inicioSuma2-3).' + K'.($inicioSuma3 - 2).'+ K'.($maxPipa-1));
    
    $from = "A".$maxPipa; 
    $to = "K".$maxPipa;
    $sheet->getStyle("$from:$to")->getFont()->setBold(true);
}
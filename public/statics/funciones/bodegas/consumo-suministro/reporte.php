<?php 

    include_once '../../../on-database.php';
	require '../../../../vendor/autoload.php';
	
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Border;
	
	$template = './template.xlsx';
	$reader = IOFactory::createReader('Xlsx');
	$spreadsheet = $reader->load($template);
	
	$sheet = $spreadsheet->getActiveSheet();
	
    $initDate = $_POST['init'];
    $finishDate = $_POST['finish'];

    $sheet->setCellValue('B6', 'Del '.$initDate.' al '.$finishDate);

    $query = "SELECT descripcion as nombre, SUM(consumo) as total, MAX(consumo) maximo, MIN(consumo) minimo, ROUND(AVG(consumo),2) promedio  FROM historial_consumo 
                INNER JOIN producto ON producto.codigo = historial_consumo.producto
                WHERE (fecha BETWEEN '$initDate' AND '$finishDate')";
    $productos = mysqli_query($con, $query);

    $row = 10;
    foreach($productos as $producto){
        $sheet->setCellValue('B'.$row, $producto['nombre']);
        $sheet->setCellValue('C'.$row, $producto['total']);
        $sheet->setCellValue('D'.$row, $producto['minimo']);
        $sheet->setCellValue('E'.$row, $producto['maximo']);
        $sheet->setCellValue('F'.$row, $producto['promedio']);
        $row += 1;
    }

    $styles = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]
    ];
    $sheet->getStyle('B10:F'.($row))->applyFromArray($styles);

    $sheet->setCellValue('B'.$row, 'TOTAL');
    $sheet->setCellValue('C'.$row, '=SUM(C5:C'.($row - 1).')');
    $sheet->getStyle("B".$row.":C".$row)->getFont()->setBold(true);

    $writer = new Xlsx($spreadsheet);
	$writer->save("Historial de Consumos de $initDate a $finishDate.xlsx");
    echo "Historial de Consumos de $initDate a $finishDate.xlsx";
?>
<?php
    require  '../../../../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;

    $area = $_POST['area'];
    $noPedido = $_POST['noPedido'];
    $fecha = $_POST['fecha'];
    $encabezado = $_POST['encabezado'];
    $tabla = $_POST['tabla'];
    $utlima = $_POST['ultima'];
    $hecho = $_POST['hecho'];
    $solicitante = $_POST['solicitante'];
    $encargado = $_POST['encargado'];
    $noFilas = $_POST['noFilas'];
    $nombre = $_POST['nombre'];

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma');
    $sheet = $spreadsheet->getActiveSheet();

    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]
    ];

    $styleHeader = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ],
        'font' => [
            'bold' => true,
        ]
    ];


    $sheet->fromArray([$area], NULL, 'A4');
    $sheet->fromArray([$noPedido], NULL, 'A5');
    $sheet->fromArray([$fecha], NULL, 'A6');
    $sheet->fromArray([$encabezado], NULL, 'A9');

    $sheet ->getStyle('A9:K9')->applyFromArray($styleHeader);

    $sheet ->getStyle('J4:J6')->applyFromArray($styleArray);
    $sheet ->getStyle('K4:K6')->applyFromArray($styleArray);

    for ($i = 0; $i < $noFilas; $i++) {
        $sheet->fromArray([$tabla[$i]], NULL, 'A'.(10+$i));
        $sheet->getStyle('A'.(10+$i).':K'.(10+$i))->applyFromArray($styleArray);

        $sheet->getStyle('H'.(10+$i).':I'.(10+$i))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000066');
        
        $sheet ->getStyle('G'.(10+$i).':I'.(10+$i))->applyFromArray($styleHeader);

        $sheet->getStyle('G'.(10+$i))->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('H'.(10+$i))->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle('I'.(10+$i))->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    }

    for ($i = 0; $i < $noFilas; $i++) {
        if($sheet->getCell('G'.(10+$i))->getValue()  <  $sheet->getCell('H'.(10+$i))->getValue()){
            $sheet->getStyle('G'.(10+$i))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('b30000');
        }else{
            $sheet->getStyle('G'.(10+$i))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('86B300');
        }
    }

    $sheet->fromArray([$utlima], NULL, 'A'.(10+$noFilas));
    //$sheet->mergeCells('A'.(10+$noFilas).':K'.(10+$noFilas));
    $sheet ->getStyle('A'.(10+$noFilas).':K'.(10+$noFilas))->applyFromArray($styleArray);
    $sheet->getStyle('A'.(10+$noFilas).':K'.(10+$noFilas))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFF00');

    $sheet->fromArray([$hecho], NULL, 'A'.(10+$noFilas+3));
    $sheet->fromArray([$solicitante], NULL, 'A'.(10+$noFilas+4));
    $sheet->fromArray([$encargado], NULL, 'A'.(10+$noFilas+5));

    $spreadsheet->getActiveSheet()->getStyle('B'.(10+$noFilas+3))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $spreadsheet->getActiveSheet()->getStyle('B'.(10+$noFilas+4))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    $spreadsheet->getActiveSheet()->getStyle('B'.(10+$noFilas+5))->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

    foreach (range('A','K') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);  
    }
    $sheet->getStyle('A:K')->getAlignment()->setHorizontal('center');

    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Logo');
    $drawing->setPath('../../../images/logo/logo-reporte.jpg');
    $drawing->setCoordinates('A2');
    $drawing->setOffsetX(100);
    $drawing->getShadow()->setVisible(true);
    $drawing->getShadow()->setDirection(45);
    $drawing->setWorksheet($sheet);


    $writer = new Xlsx($spreadsheet);
    $writer->save($nombre.'.xlsx');
    echo $nombre.'.xlsx';
?>
<?php
    require  '../../../../vendor/autoload.php';
    include_once '../../../on-database.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;

    $query = "SELECT I.codigo, B.bodega, P.descripcion, A.area, I.saldoInicial, I.saldoActual, I.valorMinimo, I.valorMaximo, I.fechaUpdate
                    FROM inventario AS I
                    INNER JOIN bodegas AS B ON I.bodega = B.codigo
                    INNER JOIN producto AS P ON I.producto = P.codigo
                    INNER JOIN `area` AS A ON I.ubicacion = A.codigo;";
    
    $result = mysqli_query($con, $query);
    //$suministros = mysqli_fetch_row($result);


    $headerTable = ["Código", "Bodega", "Producto",	"Ubicación", "Saldo Inicial", "Saldo Actual", "Mínimo",	"Máximo", "Última Modificación"];

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


    $sheet->fromArray([$headerTable], NULL, 'B8');
    $sheet ->getStyle('B8:J8')->applyFromArray($styleHeader);

    $i = 9;
    while($s = mysqli_fetch_row($result)){
        $sheet->fromArray([$s[0],$s[1],$s[2],$s[3],$s[4],$s[5],$s[6],$s[7], $s[8]], NULL, 'B'.$i);
        $sheet->getStyle('B'.$i.':J'.$i)->applyFromArray($styleArray);
        $i++;
    }

    foreach (range('B','J') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);  
    }
    $sheet->getStyle('B:J')->getAlignment()->setHorizontal('center');

    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Logo');
    $drawing->setPath('../../../images/logo/logo-reporte.jpg');
    $drawing->setCoordinates('A2');
    $drawing->setOffsetX(100);
    $drawing->getShadow()->setVisible(true);
    $drawing->getShadow()->setDirection(45);
    $drawing->setWorksheet($sheet);
    
    $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing2->setName('Logo');
    $drawing2->setPath('../../../images/logo/grupoF.png');
    $drawing2->setCoordinates('H2');
    $drawing2->setHeight(100);
    $drawing2->setOffsetX(100);
    $drawing2->getShadow()->setVisible(true);
    $drawing2->getShadow()->setDirection(45);
    $drawing2->setWorksheet($sheet);

    $writer = new Xlsx($spreadsheet);
    $writer->save('MinimosMaximos.xlsx');
    echo 'MinimosMaximos.xlsx';
    
?>
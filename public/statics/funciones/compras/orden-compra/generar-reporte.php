<?php
    require  '../../../../vendor/autoload.php';
    include_once '../../../on-database.php';

    function enLetras($n){
        $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
        $izquierda = intval(floor($n));
        $derecha = intval(($n - floor($n)) * 100);
        //return strtoupper($formatterES->format($izquierda) . " con " . $formatterES->format($derecha)." centavos");
        return strtoupper($formatterES->format($izquierda) . " Y " .$derecha."/100");
    }


    $pedido = $_POST['codPedido'];
    $solicitante = $_POST['solicitante'];
    $area = $_POST['area'];
    $fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
    

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;

    $query = "SELECT P.nombre,  O.descripcion, O.unidadMedida, O.cantidad, C.precio, C.descuento, C.precioFinal, C.precioOrden
                FROM ordenPedidoProducto AS O
                INNER JOIN cotizacion AS C ON O.codigoPedido = C.codPedido 
                INNER JOIN proveedor AS P ON C.proveedor = P.codigo
                AND O.idPedProd = C.codPedProd
                AND O.autorizacion= 'Autorizado'
                AND O.codigoPedido = '$pedido';";
    
    $result = mysqli_query($con, $query);

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma');
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getPageMargins()->setRight(0.1);
    $sheet->getPageMargins()->setLeft(0.1);
    $sheet->getPageMargins()->setBottom(0.1);
    $sheet->getPageMargins()->setTop(0.1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

    $nombre = ["REPORTE DE COMPRAS"];
    
    $headerInfo = [" ORDEN DE COMPRA ", "", "CON CARGO A", "", "SOLICITANTE", "", "FECHA"];
    $infoData = [$pedido,"", $area, "", $solicitante, "", $fecha];

    $headerTable = ["No.","PROVEEDOR","DESCRIPCIÓN","PRECIO\nUNITARIO","DESCUENTO","PRECIO\nFINAL","SUB\nTOTAL\nQTZ"];
    
    $sheet->mergeCells('A7:G7');
    $sheet->mergeCells('A8:G8');

    $sheet->mergeCells('A9:B9');
    $sheet->mergeCells('C9:D9');
    $sheet->mergeCells('E9:F9');
    $sheet->mergeCells('A10:B10');
    $sheet->mergeCells('C10:D10');
    $sheet->mergeCells('E10:F10');

    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ]
    ];
    
    $styleOutline = [
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '000000'],
            ],
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ]
    ];

    $styleHeader = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => Border::BORDER_THIN,
                'color' => ['rgb' => '000000'],
            ],
        ],
        'alignment' => [
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ]
    ];

    $sheet->fromArray([$nombre], NULL, 'A7');
    $sheet->fromArray([$headerInfo], NULL, 'A9');
    $sheet->fromArray([$infoData], NULL, 'A10');
    $sheet->getStyle('A9:G9')->applyFromArray($styleHeader);
    $sheet->getStyle('A10:G10')->applyFromArray($styleArray);
    
    $sheet->fromArray([$headerTable], NULL, 'A12');
    $sheet->getStyle('A12:G12')->applyFromArray($styleHeader);
    
    
    $sheet->getStyle('A12:G12')->getAlignment()->setWrapText(true);
    $sheet->getColumnDimension('A')->setWidth(4);
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(40);

    $sumaTotal = 0;
    $i = 13; $noFilas = 1;

    while($s = mysqli_fetch_row($result)){
        $sheet->fromArray([$noFilas, $s[0], "$s[1] \n U/Medida: $s[2] \n Cantidad: $s[3]" ,$s[4], $s[5], $s[6], $s[7]], NULL, 'A'.$i);
        $sheet->getStyle('D'.$i.':G'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->getStyle('A'.$i.':G'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A'.$i.':G'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A'.$i.':G'.$i)->applyFromArray($styleHeader);
        $sumaTotal = $sumaTotal + $s[7];
        $i++; $noFilas++;
    }
    
    foreach (range('D','G') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);  
    }

    $sheet->getStyle('A:G')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('A17:G17')->getAlignment()->setWrapText(true);

    $subIva = $sumaTotal * 0.88;
    $subTotal = ["Total en\nLetras:",enLetras($sumaTotal),"","","","SubTotal", $subIva];
    $totalLetras = ["","","","","","Total", $sumaTotal];
   
    $sheet->mergeCells('A'.(13+$noFilas).':A'.(14+$noFilas));
    $sheet->mergeCells('B'.(13+$noFilas).':C'.(14+$noFilas));
    
    $sheet->getStyle('A'.(13+$noFilas).':E'.(14+$noFilas))->applyFromArray($styleOutline);
    $sheet->getStyle('F'.(13+$noFilas).':G'.(14+$noFilas))->applyFromArray($styleOutline);
    $sheet->getStyle('A'.(13+$noFilas).':G'.(14+$noFilas))->getAlignment()->setWrapText(true);

    $sheet->fromArray([$subTotal], NULL, 'A'.(13+$noFilas));
    $sheet->fromArray([$totalLetras], NULL, 'A'.(14+$noFilas));

    $sheet->getStyle('G'.(13+$noFilas).':G'.(14+$noFilas))->getNumberFormat()->setFormatCode('#,##0.00');
    
    $sheet->getColumnDimension('A')->setAutoSize(true);

    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Logo');
    $drawing->setPath('../../../images/logo/logo-reporte.jpg');
    $drawing->setCoordinates('A1');
    //$drawing->setOffsetX(5);
    $drawing->getShadow()->setVisible(true);
    $drawing->getShadow()->setDirection(45);
    $drawing->setWorksheet($sheet);
    
    $writer = new Xlsx($spreadsheet);
    $writer->save('ReportePedido-'.$pedido.'.xlsx');
    echo 'ReportePedido-'.$pedido.'.xlsx';
?>
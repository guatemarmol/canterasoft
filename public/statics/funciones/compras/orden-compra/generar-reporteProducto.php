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
 
    $fechaI = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fechaI'])));
    $fechaF = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fechaF'])));
    $fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));
    $producto = $_POST['producto'];
    $prodID = $_POST['prodID'];

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;

    if($fechaI != '1970-01-01'){
        $query = "SELECT P.nombre, O.unidadMedida, O.cantidad, C.precio, C.descuento, C.precioFinal, C.precioOrden
                    FROM ordenPedidoProducto AS O
                    INNER JOIN cotizacion AS C ON O.codigoPedido = C.codPedido 
                    INNER JOIN proveedor AS P ON C.proveedor = P.codigo
                    INNER JOIN ordenPedido AS R ON R.codigo = O.codigoPedido
                    INNER JOIN `area` AS A ON A.codigo = R.bodega
                    WHERE R.fecha >= '$fechaI'
                    AND R.fecha <= '$fechaF'
                    AND O.idPedProd = C.codPedProd
                    AND O.autorizacion= 'Autorizado'
                    AND O.codigoProducto = $prodID;";
    }else{
        $query = "SELECT P.nombre, O.unidadMedida, O.cantidad, C.precio, C.descuento, C.precioFinal, C.precioOrden
                    FROM ordenPedidoProducto AS O
                    INNER JOIN cotizacion AS C ON O.codigoPedido = C.codPedido 
                    INNER JOIN proveedor AS P ON C.proveedor = P.codigo
                    INNER JOIN ordenPedido AS R ON R.codigo = O.codigoPedido
                    INNER JOIN `area` AS A ON A.codigo = R.bodega
                    AND O.idPedProd = C.codPedProd
                    AND O.autorizacion= 'Autorizado'
                    AND O.codigoProducto = $prodID;";
    }
    
    
    $result = mysqli_query($con, $query);

    $spreadsheet = new Spreadsheet();
    $spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma');
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->getPageMargins()->setRight(0.1);
    $sheet->getPageMargins()->setLeft(0.1);
    $sheet->getPageMargins()->setBottom(0.1);
    $sheet->getPageMargins()->setTop(0.1);

    $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
    $sheet->getPageSetup()->setFitToWidth(1);
    $sheet->getPageSetup()->setFitToHeight(0);

    $nombre = ["REPORTE DE COMPRAS POR PRODUCTO"];
    
    $headerInfo = ["PRODUCTO", "", "PERÍODO", "", "FECHA"];

    if($fechaI != '1970-01-01'){
        $infoData = [$producto,"", "$fechaI - $fechaF", "", "$fecha",];
    }else{
        $infoData = [$producto,"", "    -    ", "", "$fecha",];
    }
    

    $headerTable = ["No.","PROVEEDOR","PRECIO\nUNITARIO","DESCUENTO","PRECIO\nFINAL","SUB\nTOTAL\nQTZ"];
    
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
    $sheet->getStyle('A9:F9')->applyFromArray($styleHeader);
    $sheet->getStyle('A10:F10')->applyFromArray($styleArray);
    
    $sheet->fromArray([$headerTable], NULL, 'A12');
    $sheet->getStyle('A12:F12')->applyFromArray($styleHeader);
    
    
    $sheet->getStyle('A12:F12')->getAlignment()->setWrapText(true);
    $sheet->getColumnDimension('A')->setWidth(4);

    $sumaTotal = 0;
    $i = 13; $noFilas = 1;

    while($s = mysqli_fetch_row($result)){
        $sheet->getStyle('D'.$i.':F'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
        $sheet->getStyle('A'.$i.':F'.$i)->applyFromArray($styleArray);
        $sheet->getStyle('A'.$i.':F'.$i)->getAlignment()->setWrapText(true);
        $sheet->getStyle('A'.$i.':F'.$i)->applyFromArray($styleHeader);
        $sheet->fromArray([$noFilas, "$s[0] \n U/Medida: $s[1] \n Cantidad: $s[2]",$s[3], $s[4], $s[5], $s[6]], NULL, 'A'.$i);
        $sumaTotal = $sumaTotal + $s[6];
        $i++; $noFilas++;
    }
    
    foreach (range('B','F') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);  
    }

    $sheet->getStyle('A:F')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('A17:F17')->getAlignment()->setWrapText(true);

    $subIva = $sumaTotal * 0.88;
    $subTotal = ["Total en\nLetras:",enLetras($sumaTotal),"","","SubTotal", $subIva];
    $totalLetras = ["","","","","Total", $sumaTotal];
   
    $sheet->mergeCells('A'.(13+$noFilas).':A'.(14+$noFilas));
    $sheet->mergeCells('B'.(13+$noFilas).':C'.(14+$noFilas));
    
    $sheet->getStyle('A'.(13+$noFilas).':D'.(14+$noFilas))->applyFromArray($styleOutline);
    $sheet->getStyle('E'.(13+$noFilas).':F'.(14+$noFilas))->applyFromArray($styleOutline);
    $sheet->getStyle('A'.(13+$noFilas).':F'.(14+$noFilas))->getAlignment()->setWrapText(true);

    $sheet->fromArray([$subTotal], NULL, 'A'.(13+$noFilas));
    $sheet->fromArray([$totalLetras], NULL, 'A'.(14+$noFilas));

    $sheet->getStyle('F'.(13+$noFilas).':F'.(14+$noFilas))->getNumberFormat()->setFormatCode('#,##0.00');
    
    $sheet->getColumnDimension('A')->setAutoSize(true);

    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Logo');
    $drawing->setPath('../../../images/logo/logo-reporte.jpg');
    $drawing->setCoordinates('A1');
    //$drawing->setOffsetX(5);
    $drawing->getShadow()->setVisible(true);
    $drawing->getShadow()->setDirection(45);
    $drawing->setWorksheet($sheet);

    $drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing2->setName('LogoFuteca');
    $drawing2->setPath('../../../images/logo/grupoF.png');
    $drawing2->setCoordinates('F1');
    $drawing2->setHeight(100);
    $drawing2->getShadow()->setVisible(true);
    $drawing2->getShadow()->setDirection(45);
    $drawing2->setWorksheet($sheet);
    
    $writer = new Xlsx($spreadsheet);
    $writer->save('ReporteProducto-'.$producto.'.xlsx');
    echo 'ReporteProducto-'.$producto.'.xlsx';
?>
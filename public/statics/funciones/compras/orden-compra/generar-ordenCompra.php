<?php   
    require  '../../../../vendor/autoload.php';
    include_once '../../../on-database.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\Style\Fill;
    use PhpOffice\PhpSpreadsheet\Style\Border;

    $pedido = $_POST['codPedido'];
    $solicitante = $_POST['solicitante'];
    $area = $_POST['area'];
    $fecha = date("Y-m-d", strtotime(str_replace('/', '-', $_POST['fecha'])));

    function enLetras($n){
        $formatterES = new NumberFormatter("es-ES", NumberFormatter::SPELLOUT);
        $izquierda = intval(floor($n));
        $derecha = intval(number_format(  ($n - floor($n)) ,2)  * 100);
        //return strtoupper($formatterES->format($izquierda) . " con " . $formatterES->format($derecha)." centavos");
        return strtoupper($formatterES->format($izquierda) . " Y " .$derecha."/100");
    }

    $queryProv = "SELECT C.proveedor, P.nombre, P.direccion
                    FROM ordenPedidoProducto AS O
                    INNER JOIN cotizacion AS C ON O.codigoPedido = C.codPedido 
                    INNER JOIN proveedor AS P ON C.proveedor = P.codigo
                    AND O.idPedProd = C.codPedProd
                    AND O.autorizacion= 'Autorizado'
                    AND O.codigoPedido = '$pedido';";
    
    $resultProv = mysqli_query($con, $queryProv);

    while($prov = mysqli_fetch_row($resultProv)){
        generarReporte($pedido, $prov[0], $prov[1], $prov[2], $con, $fecha, $area, $solicitante);
    }

    
    function generarReporte($pedido, $prov, $nombreProv, $direccion, $con, $fecha, $area, $solicitante){
        $border = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;

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
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,

            ]
        ];

        $allBorders = [
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
        ];

        $styleAlign = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,

            ]
        ];

        $query = "SELECT O.descripcion, O.unidadMedida, O.cantidad, C.precioFinal, C.precioOrden
                    FROM ordenPedidoProducto AS O
                    INNER JOIN cotizacion AS C ON O.codigoPedido = C.codPedido 
                    INNER JOIN proveedor AS P ON C.proveedor = P.codigo
                    AND O.idPedProd = C.codPedProd
                    AND O.autorizacion= 'Autorizado'
                    AND O.codigoPedido = '$pedido'
                    AND C.proveedor = $prov;";
        
        $result = mysqli_query($con, $query);

        $spreadsheet = new Spreadsheet();
        //$spreadsheet->getDefaultStyle()->getFont()->setName('Tahoma');
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->getPageMargins()->setRight(0.1);
        $sheet->getPageMargins()->setLeft(0.2);
        $sheet->getPageMargins()->setBottom(0.1);

        $sheet->getHeaderFooter()->setDifferentFirst(true);
        $sheet->getHeaderFooter()->setFirstHeader("GUATEMARMOL, SOCIEDAD ANONIMA \n 3 avenida 9-87 Zona 13 Lomas de Pamplona, Guatemala.");

        $ordenCompra = ["","                       PBX: 6628-8800","","","","","ORDEN DE COMPRA"];
        $pbx = ["","                       email: esperanza.ruiz@guatemarmol.com","","","","", $pedido];
        $emailNit = ["","","","","","NIT: 32551-1", "FORMA DE PAGO"];
        $fechaE = ["Fecha:",$fecha,"","","Moneda:","QTZ", "Contado"];
        $cargoArea = ["","","","","","","CON CARGO A"];
        $proveedor = ["Proveedor: ", strtoupper($nombreProv),"","","","","$area"];
        $solicita = ["","","","","","","SOLICITANTE"];
        $direccion = ["Dirección: ",strtoupper($direccion),"","","","","$solicitante"];

        $headerTable = ["No.", "DESCRIPCIÓN", "", "UNIDAD DE\nMEDIDA", "CANTIDAD", "PRECIO\nUNITARIO\nQTZ", "SUB\nTOTAL\nQTZ"];
        
        $sheet->mergeCells('B1:F1');
        $sheet->mergeCells('B2:F2');
        $sheet->mergeCells('B6:D6');
        $sheet->mergeCells('B8:D8');

        $sheet->fromArray([$ordenCompra], NULL, 'A1');
        $sheet->fromArray([$pbx], NULL, 'A2');
        $sheet->fromArray([$emailNit], NULL, 'A3');
        $sheet->fromArray([$fechaE], NULL, 'A4');
        $sheet->fromArray([$cargoArea], NULL, 'A5');
        $sheet->fromArray([$proveedor], NULL, 'A6');
        $sheet->fromArray([$solicita], NULL, 'A7');
        $sheet->fromArray([$direccion], NULL, 'A8');

        $sheet->fromArray([$headerTable], NULL, 'A10');
        $sheet->mergeCells('B10:C10');
        $sheet->getStyle('A10:G10')->applyFromArray($styleHeader);

        $sumaTotal = 0;
        $i = 11; $noFilas = 1;

        while($s = mysqli_fetch_row($result)){
            $sheet->getRowDimension($i)->setRowHeight(30);
            $sheet->mergeCells('B'.$i.':C'.$i);
            $sheet->getStyle('F'.$i.':G'.$i)->getNumberFormat()->setFormatCode('#,##0.00');
            $sheet->getStyle('A'.$i.':G'.($i))->getAlignment()->setWrapText(true);
            $sheet->fromArray([$noFilas, strtoupper($s[0]), "",$s[1], $s[2], number_format($s[3], 2), number_format($s[4], 2)] , NULL, 'A'.$i);
            $sheet->getStyle('A'.$i.':G'.$i)->applyFromArray($allBorders);
            $sumaTotal = $sumaTotal + $s[4];
            $i++; $noFilas++;
        }

        $sheet->mergeCells('A'.(10+$noFilas).':A'.(11+$noFilas));
        $sheet->mergeCells('B'.(10+$noFilas).':E'.(11+$noFilas));

        $sheet->getStyle('G'.(10+$noFilas).':G'.(11+$noFilas))->getNumberFormat()->setFormatCode('#,##0.00');

        $subIva = $sumaTotal * 0.88;
        $subTotal = ["Total en\nLetras:",enLetras(number_format( $sumaTotal, 2)),"","","","SubTotal", $subIva];
        $totalLetras = ["","","","","","Total", $sumaTotal];

        
        $sheet->fromArray([$subTotal], NULL, 'A'.(10+$noFilas));
        $sheet->fromArray([$totalLetras], NULL, 'A'.(11+$noFilas));
        $sheet->getStyle('B'.(10+$noFilas))->applyFromArray($styleAlign);

        //$sheet->getColumnDimension('B')->setAutoSize(true);
        foreach (range('D','G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);  
        }

        $sheet->getStyle('A:G')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A10:G10')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A'.(10+$noFilas))->getAlignment()->setWrapText(true);
        $sheet->getStyle('B'.(10+$noFilas))->getAlignment()->setWrapText(true);

        $sheet->getColumnDimension('C')->setWidth(0);
        $sheet->getColumnDimension('H')->setWidth(0);

        

        $sheet->getStyle('A4:F8')->applyFromArray($styleOutline);

        $sheet->getStyle('G1:G8')->applyFromArray($styleOutline);
        foreach(range(1,8) as $e){
            if(!( $e % 2)){
                $sheet->getStyle('G'.$e)->getBorders()->getBottom()->setBorderStyle($border);
            }
        }

        $sheet->getStyle('A4:F8')->applyFromArray($styleOutline);

        $sheet->getStyle('A'.(10+$noFilas).':G'.(11+$noFilas))->applyFromArray($styleOutline);
        $sheet->getStyle('A'.(10+$noFilas).':E'.(11+$noFilas))->applyFromArray($styleOutline);

        //----------------------------------------------------- CUADRO PIE DE PAGINA -----------------------------------------------------
        $sheet->mergeCells('A'.(15+$noFilas).':G'.(16+$noFilas));
        $sheet->getStyle('A'.(15+$noFilas).':G'.(16+$noFilas))->applyFromArray($styleOutline);
        $sheet->mergeCells('A'.(17+$noFilas).':C'.(18+$noFilas));
        $sheet->getStyle('A'.(17+$noFilas).':C'.(18+$noFilas))->applyFromArray($styleOutline);
        $sheet->mergeCells('D'.(17+$noFilas).':E'.(18+$noFilas));
        $sheet->getStyle('D'.(17+$noFilas).':E'.(18+$noFilas))->applyFromArray($styleOutline);
        $sheet->mergeCells('F'.(17+$noFilas).':G'.(18+$noFilas));
        $sheet->getStyle('F'.(17+$noFilas).':G'.(18+$noFilas))->applyFromArray($styleOutline);
        
        $sheet->mergeCells('A'.(19+$noFilas).':D'.(20+$noFilas));
        $sheet->mergeCells('E'.(19+$noFilas).':G'.(20+$noFilas));
        $sheet->mergeCells('A'.(21+$noFilas).':B'.(21+$noFilas));
        $sheet->mergeCells('A'.(22+$noFilas).':B'.(22+$noFilas));
        $sheet->mergeCells('E'.(21+$noFilas).':F'.(21+$noFilas));
        $sheet->mergeCells('E'.(22+$noFilas).':F'.(22+$noFilas));
        $sheet->getStyle('A'.(15+$noFilas).':G'.(22+$noFilas))->applyFromArray($styleOutline);
        
        
        foreach(range((23+$noFilas),(28+$noFilas)) as $e){
            $sheet->mergeCells('A'.$e.':G'.$e);
        }

        $observaciones = ["Observaciones:"];
        $hecho = ["Hecho Por: ","","","Vo. Bo.:","","Recibí Conforme: _______________________\nFecha: ________________________________"];
        $fecha = ["","","","","","Fecha:"];
        $cargo = ["CARGO:","","","","ABONO:"];
        $CTA = ["       CTA. _______________________         Q.","","","___________"," CTA.     _______________________", ""," Q.    ______________"];
        $CTA2 = ["       CTA. _______________________         Q.","","","___________"," CTA.     _______________________", ""," Q.    ______________"];
        $rogamos = ["ROGAMOS TOMAR NOTA DE LO SIGUIENTE"];
        $p = ["1o. Nuestras bodegas trabajan de 8 a 12 A.M. y de 2 a 4 P.M."];
        $s = ["2o. Sirvase presentar sus facturas en duplicado y acompañadas de esta Orden de Compra, con el Recibí Conforme debidamente firmado por nuestro
        empleado que recibió la mercadería o servicio."];
        $t = ["3o. Los artículos viajan por cuenta y riesgo del vendedor, salvo convenio expreso en contrario."];
        $c = ["4o. Si no es posible suministrar la totalidad del pedido háganoslo saber inmediatamente, devolviendo esta orden para hacerle las modificaciones del caso."];
        $q = ["5o. Los descuentos o bonificaciones en esta Orden de Compra, deberán ser abonados a la Compañia y en ningún caso directamente a la persona que efectuó."];

        $sheet->getColumnDimension('B')->setWidth(28);

        $sheet->fromArray([$observaciones], NULL, 'A'.(15+$noFilas));
        $sheet->fromArray([$hecho], NULL, 'A'.(17+$noFilas));
        $sheet->fromArray([$cargo], NULL, 'A'.(19+$noFilas)); 
        $sheet->fromArray([$CTA], NULL, 'A'.(21+$noFilas));
        $sheet->fromArray([$CTA2], NULL, 'A'.(22+$noFilas));
        $sheet->fromArray([$rogamos], NULL, 'A'.(23+$noFilas));
        $sheet->fromArray([$p], NULL, 'A'.(24+$noFilas));
        $sheet->fromArray([$s], NULL, 'A'.(25+$noFilas));
        $sheet->fromArray([$t], NULL, 'A'.(26+$noFilas));
        $sheet->fromArray([$c], NULL, 'A'.(27+$noFilas));
        $sheet->fromArray([$q], NULL, 'A'.(28+$noFilas));


        $sheet->getStyle('F'.(17+$noFilas))->getAlignment()->setWrapText(true);
        $sheet->getStyle('A'.(15+$noFilas).':G'.(22+$noFilas))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A'.(15+$noFilas).':G'.(22+$noFilas))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $sheet->getStyle('A'.(24+$noFilas).':G'.(28+$noFilas))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A'.(24+$noFilas).':G'.(28+$noFilas))->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $sheet->getStyle('A'.(25+$noFilas))->getAlignment()->setWrapText(true);

        //$sheet->getStyle('A'.(24+$noFilas).':A'.(28+$noFilas))->getFont()->setSize(7.5);
        $sheet->getStyle('A'.(24+$noFilas).':A'.(28+$noFilas))->getFont()->setSize(8);
        $sheet->getRowDimension((24+$noFilas))->setRowHeight(14);
        $sheet->getRowDimension((25+$noFilas))->setRowHeight(19);
        

        
        foreach(range('A','G') as $letra){
            $sheet->getStyle($letra.(11+$noFilas))->getBorders()->getBottom()->setBorderStyle($border);
        }

        $sheet->setBreak('H10', \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet::BREAK_COLUMN);
        //$sheet->getPageSetup()->setPrintArea('A1:G48');

        $writer = new Xlsx($spreadsheet);

        $writer->save(strtoupper($nombreProv).$pedido.'.xlsx');
        echo strtoupper($nombreProv).$pedido.'.xlsx|';
    }
?>
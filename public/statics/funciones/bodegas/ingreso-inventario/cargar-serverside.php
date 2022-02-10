<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'inventario';
 
// Table's primary key
$primaryKey = 'codigo';
 

 // Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
/*
$columns = array(
    array( 'db' => 'item', 'dt' => 0 ),
    array( 'db' => 'fechaingresoorden',  'dt' => 1 ),
    array( 'db' => 'corpo_cu',   'dt' => 2 ),
    array( 'db' => 'dato1',     'dt' => 3 ),
    array( 'db' => 'numeroorden',     'dt' => 4 ),
    array( 'db' => 'cliente',     'dt' => 5 ),
    array( 'db' => 'producto',     'dt' => 6 ),
    array( 'db' => 'descripcionproducto',     'dt' => 7 ),
    array( 'db' => 'cantidad',     'dt' => 8 ),
    array( 'db' => 'PU',     'dt' => 9 ),
    array( 'db' => 'montototal',     'dt' => 10 ),
    array( 'db' => 'fechaproduccion',     'dt' => 11 ),
    array( 'db' => 'fechaentrega',     'dt' => 12 ),
    array( 'db' => 'statusproduccion',     'dt' => 13 ),
    array( 'db' => 'fechasolicitud',     'dt' => 14 ),
    array( 'db' => 'fechaingresoarrend',     'dt' => 15 ),
    array( 'db' => 'fechaingresomaterialesplanta',     'dt' => 16 ),
    array( 'db' => 'fechainicioproduccion',     'dt' => 17 ),
   
); */

$columns = array(
    array( 'db' => '`a`.`codigo`', 'dt' => 0, 'field' => 'codigo' ), //0
    array( 'db' => '`b`.`bodega`',      'dt' => 1, 'field' => 'bodega' ), //1
    array( 'db' => '`p`.`descripcion`', 'dt' => 2,  'field' => 'descripcion'), //2
    array( 'db' => '`d`.`categoria`',  'dt' => 3, 'field' => 'categoria' ), //3
    array( 'db' => '`e`.`unidad`',      'dt' => 4, 'field' => 'unidad'), //4
    array( 'db' => '`c`.`area`',   'dt' => 5, 'field' => 'area'), //5
    array( 'db' => '`a`.`ubicacion2`',  'dt' => 6, 'field' => 'ubicacion2'), //6
    array( 'db' => '`p`.`equivalente1`','dt' => 7, 'field' => 'equivalente1'), //7
    array( 'db' => '`p`.`equivalente2`','dt' => 8,  'field' => 'equivalente2'), //8
    array( 'db' => '`p`.`color`',       'dt' => 9, 'field' => 'color'), //9
    array( 'db' => '`a`.`saldoinicial`','dt' => 10, 'field' => 'saldoinicial'), //10
    array( 'db' => '`a`.`saldoActual`', 'dt' => 11, 'field' => 'saldoActual'), //11
    array( 'db' => '`a`.`valorMinimo`', 'dt' => 12, 'field' => 'valorMinimo'), //12
    array( 'db' => '`a`.`valorMaximo`', 'dt' => 13, 'field' => 'valorMaximo'), //13
    array( 'db' => '`a`.`fechaUpdate`', 'dt' => 14, 'field' => 'fechaUpdate'), //14
);


// SQL server connection information
$sql_details = array(
    'user' => 'fun5testa_grupofutecagt',
    'pass' => 'S!st3m@2021',
    'db'   => 'fun5testa_guatemarmol',
    'host' => 'localhost'
);
 

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 



require 'ssp.class.php';
 


// $joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `currency_names` AS `cn` ON (`cn`.`id` = `c`.`id_currency`)";
//$joinQuery = "FROM `user` AS `u` JOIN `user_details` AS `ud` ON (`ud`.`user_id` = `u`.`id`)";
// 1 $extraWhere = "`u`.`salary` >= 90000";
// 2 $groupBy = "`u`.`office`";
// 3 $having = "`u`.`salary` >= 140000";

$joinQuery = "FROM `inventario` AS `a`
JOIN `bodegas` AS `b` ON (`a`.`bodega` = `b`.`codigo`)
JOIN `producto` AS `p` ON (`a`.`producto` = `p`.`codigo`)
JOIN `area` AS `c` ON (`a`.`ubicacion` = `c`.`codigo`)
JOIN `categoriasuministros` AS `d` ON (`p`.`categoria` = `d`.`codigo`) 
JOIN `unidadsuministros` AS `e` ON (`p`.`unidadDeMedida` = `e`.`codigo`)";

// $joinQuery = "FROM `user` AS `u` JOIN `user_details` AS `ud` ON (`ud`.`user_id` = `u`.`id`)";

echo json_encode(
       SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, "", "", "")
     ); 

/* echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
); */

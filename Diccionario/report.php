<?php
include('../Plugin/PHPExcel/Classes/PHPExcel.php');
include('../Config/connection.php');
include('../Functions/Function.php');
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
ini_set('memory_limit',-1);

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
//require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("WiseVisionCorp");

$servicio = $_POST["servicio"];
$data2 = getArbol2("SELECT subcomponente.display_subcomponente FROM arbol.subcomponente WHERE componente in (
SELECT componente.componente FROM arbol.componente WHERE site in (
SELECT site.site FROM arbol.site WHERE subservicio in (
SELECT subservicio.subservicio FROM arbol.subservicio WHERE tipo_servicio in (
SELECT tipo_servicio.tipo_servicio FROM arbol.tipo_servicio WHERE servicio = $servicio))))
UNION
SELECT transaccion.display_transaccion FROM arbol.transaccion WHERE producto in (
SELECT producto.producto FROM arbol.producto WHERE segmento in (
SELECT segmento.segmento FROM arbol.segmento WHERE agrupacion in (
SELECT agrupacion.agrupacion FROM arbol.agrupacion WHERE tipo_servicio in (
SELECT tipo_servicio.tipo_servicio FROM arbol.tipo_servicio WHERE servicio = $servicio))))
");
$count = 0;
$comp = "(";
while ($count < count($data2) ) {
$comp = $comp."'".$data2[$count][0]."',";
$count = $count + 1;
}
$comp = substr($comp,0,strlen($comp)-1).")";
$data = getall("AND componente.nombre in ".$comp);


	$objPHPExcel->createSheet(0);
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Diccionario");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,1,"Fabricante");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,1,"Tipo de Monitoreo");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,1,"Producto");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,1,"Componente");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,1,"Metrica");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,1,"Variable");
	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,1,"Envio Correo");

	$row = 2;
	$datar_len = sizeof($data);
	while ($row <= $datar_len+1){
		$column=1;
		$datac_len = sizeof($data[$row-2]);
		while ($column <= $datac_len-1){
			$dto =$data[$row-2][$column-1];

			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column-1,$row,$dto);
			//echo $data[$row-2][$column] ."<br />";
			$column = $column + 1;
		}
		$dto = "NO";
		$last = getCorreo($data[$row-2][$column-1],$servicio);
		if($last != null){
		$dto = "SI";
		}
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column-1,$row,$dto);
		$row = $row + 1;
	}
	$objPHPExcel->removeSheetByIndex(1);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition:attachment;filename="data.xls"');
header('Cache-Control:max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control:max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires:Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT'); // always modified
header ('Cache-Control:cache,must-revalidate'); // HTTP/1.1
header ('Pragma:public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
$objWriter->save('data.xlsx');
exit;
?>

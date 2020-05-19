<?php

include '../../php/conexion.php';
$conn = new PDO("pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASS);
$cod = $_GET["cod"];
$parametro1 = $_GET["parametro1"];
$parametro2 = $_GET["parametro2"];
try {
	// begin transaction, this is all one process
	$conn->beginTransaction();
	// call the function
	$stmt = $conn->prepare("select sel_busqueda_paciente(:cod, :parametro1, :parametro2)");
	$stmt->bindParam('cod', $cod, PDO::PARAM_STR);
	$stmt->bindParam('parametro1', $parametro1, PDO::PARAM_STR);
	$stmt->bindParam('parametro2', $parametro2, PDO::PARAM_STR);
	$stmt->execute();
	$cursors = $stmt->fetchAll();
	$stmt->closeCursor();
	// get each result set
	$results = array();
	foreach($cursors as $k=>$v){
		$stmt = $conn->query('FETCH ALL IN "'. $v[0] .'";');
		$results[$k] = $stmt->fetchAll();
		$stmt->closeCursor();
	}
	$conn->commit();
	unset($stmt);
	//echo json_encode($results);
	//print_r($results);// all record sets
	$stmt = null; // obligado para cerrar la conexión

} catch (\Throwable $th) {
	print $e->getMessage();
}
//==============================================================================
$cod1 = 3;
$cod_admi = $results[0][0]['cod_admi'];
$cod_contra = $results[0][0]['cod_contra'];

$conn1 = new PDO("pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASS);
try {
	// begin transaction, this is all one process
	$conn1->beginTransaction();
	// call the function
	$stmt1 = $conn1->prepare("select sel_busqueda_paciente(:cod, :parametro1, :parametro2)");
	$stmt1->bindParam('cod', $cod1, PDO::PARAM_STR);
	$stmt1->bindParam('parametro1', $cod_admi, PDO::PARAM_STR);
	$stmt1->bindParam('parametro2', $cod_contra, PDO::PARAM_STR);
	$stmt1->execute();
	$cursors1 = $stmt1->fetchAll();
	$stmt1->closeCursor();
	// get each result set
	$results1 = array();
	foreach($cursors1 as $k1=>$v1){
		$stmt1 = $conn1->query('FETCH ALL IN "'. $v1[0] .'";');
		$results1[$k1] = $stmt1->fetchAll();
		$stmt1->closeCursor();
	}
	$conn1->commit();
	unset($stmt1);
	//echo json_encode($results);
	//print_r($results);// all record sets
	$stmt1 = null; // obligado para cerrar la conexión

} catch (\Throwable $th1) {
	print $th1->getMessage();
}
//echo $results1[0][0]['cod_admi'];
// $tipo_id_pacien = $results[0][0]['tipo_id_pacien'];
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

class MYPDF extends TCPDF {
public function Header() {
    $headerData = $this->getHeaderData();
    $this->SetFont('helvetica', 'B', 8);
    $this->writeHTML($headerData['string']);
}
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setHeaderData($ln='', $lw=0, $ht='', 
$hs='<table cellspacing="0" cellpadding="1" border="0">
		<tr>
			<td></td>
			<td colspan="4" style="text-align:center">
				REPUBLICA DE COLOMBIA
				<br>
				<br>
				Ministerio de la Proteccion Social
				<br>
				Solicitud de recobro por concepto de medicamentos NO POS - CTC
				<br>
				MYT- 01
			</td>
			<td></td>
		</tr>
	</table>', 
$tc=array(0,0,0), $lc=array(0,0,0));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, PDF_MARGIN_TOP, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

$pdf->AddPage('L', 'A4');

//$pdf->Write(0, '', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$tbl = 
'<table cellspacing="3" cellpadding="1" border="0">
    <tr>
        <td colspan="2">
        	<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">I. Datos del recobro</td>
			    </tr>

			</table>
			<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">
						<table style="font-size:8px;" cellspacing="5" cellpadding="1" border="0">
						    <tr>
						        <td colspan="6">No. Consecutivo para radicación:</td>
						        <td colspan="2">'.$results1[0][0]['conse_radi'].'</td>
						    </tr>
						    <tr>
						        <td colspan="6">No. Consecutivo recobro:</td>
						        <td colspan="2">'.$results1[0][0]['conse_reco'].'</td>
						    </tr>
						    <tr>
						        <td colspan="6">Tipo de radicación:</td>
						        <td colspan="2">'.$results1[0][0]['tipo_radi'].'</td>
						    </tr>
						    <tr>
						        <td colspan="6">No. Radicación recobro anterior MYT-01:</td>
						        <td colspan="2">'.$results1[0][0]['radi_reco_ant'].'</td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>

						</table>
			        </td>
			    </tr>

			</table>

        </td>
        <td colspan="5">
        	<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">II. Datos de la entidad</td>
			    </tr>

			</table>
			<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">
						<table style="font-size:8px;" cellspacing="5" cellpadding="1" border="0">
						    <tr>
						        <td colspan="2">Código SNS:</td>
						        <td colspan="10">'.$results[0][0]["codmin"].'</td>
						    </tr>
						    <tr>
						        <td colspan="2">Razón social:</td>
						        <td colspan="10">'.$results[0][0]["nom_ase"].'</td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>

						</table>
			        </td>
			    </tr>

			</table>
        </td>
        <td colspan="2">
        	<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">V. Declaracion de la entidad</td>
			    </tr>

			</table>
			<table style="font-size:8px;" cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="6">
			        	Documento
			        </td>
			        <td colspan="2">
			        	N° Doc
			        </td>
			        <td colspan="2">
			        	N° Folio
			        </td>
			    </tr>

			</table>
			<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">
						<table style="font-size:8px;" cellspacing="5" cellpadding="1" border="0">
						    <tr>
						        <td colspan="6">Copia(s) de Acta(s) del CTC / TUTELA</td>
						        <td colspan="2">'.$results1[0][0]['ca_doc'].'</td>
						        <td colspan="2">'.$results1[0][0]['ca_folio'].'</td>
						    </tr>
						    <tr>
						        <td colspan="6">Facturas(s) del Proveedor(es) Cancelada(s)</td>
						        <td colspan="2">'.$results1[0][0]['fp_doc'].'</td>
						        <td colspan="2">'.$results1[0][0]['fp_folio'].'</td>
						    </tr>
						    <tr>
						        <td colspan="6">Formula(s) Médica(s)</td>
						        <td colspan="2">'.$results1[0][0]['of_doc'].'</td>
						        <td colspan="2">'.$results1[0][0]['of_folio'].'</td>
						    </tr>
						    <tr>
						        <td colspan="6">Documento que evidencie la entrega del medicame</td>
						        <td colspan="2">'.$results1[0][0]['si_doc'].'</td>
						        <td colspan="2">'.$results1[0][0]['si_folio'].'</td>
						    </tr>

						</table>
			        </td>
			    </tr>

			</table>
			<table style="font-size:8px;" cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="6">
			        	Totales
			        </td>
			        <td colspan="2">
					'.$results1[0][0]['total_doc'].'
			        </td>
			        <td colspan="2">
					'.$results1[0][0]['total_folio'].'
			        </td>
			    </tr>

			</table>
        </td>
    </tr>
    <tr>
        <td colspan="7">
        	<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">III. Datos del afiliado</td>
			    </tr>

			</table>
			<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">
						<table style="font-size:8px;" cellspacing="5" cellpadding="1" border="0">
						    <tr>
						        <td >Tipo de documento:</td>
						        <td colspan="2">'.$results[0][0]['tipo_id_pacien'].'</td>
						        <td>Nùmero de Documento:</td>
						        <td>'.$results[0][0]['cod_pacien'].'</td>
						        <td></td>
						        <td></td>
						        <td></td>
						    </tr>
						    <tr>
						        <td >Primer apellido: </td>
						        <td >'.$results[0][0]['apell1'].'</td>
						        <td>Segundo apellido:</td>
						        <td>'.$results[0][0]['apell2'].'</td>
						        <td>Primer Nombre :</td>
						        <td>'.$results[0][0]['nom1'].'</td>
						        <td>Segundo Nombre :</td>
						        <td>'.$results[0][0]['nom2'].'</td>
						    </tr>
						    <tr>
						        <td>Tipo de afiliación:</td>
						        <td colspan="2">'.$results[0][0]['tipoafiliado'].'</td>
						        <td colspan="2">Nivel de cuota moderadora:</td>
						        <td>'.$results[0][0]['nivel'].'</td>
						        <td></td>
						        <td></td>
						    </tr>
						</table>
			        </td>
			    </tr>

			</table>
        </td>
        <td colspan="2">
        	<table style="font-size:8px;" cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">Datos de la solicitud en la que se anexó la copia del Acta o del Recobro Anterior</td>
			    </tr>

			</table>
			<table cellspacing="0" cellpadding="1" border="1">
			    <tr>
			        <td colspan="2">
						<table style="font-size:8px;" cellspacing="5" cellpadding="1" border="0">
						    <tr>
						        <td colspan="6">No. Radicación recobro anterior reposa acta CTC MYT-01</td>
						        <td colspan="2">'.$results1[0][0]['radi_ant_reposa'].'</td>
						    </tr>
						    <tr>
						        <td></td>
						    </tr>
						</table>
			        </td>
			    </tr>

			</table>
        </td>
	</tr>
	<tr>
		<td colspan="12">
		</td>
	</td>
</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// $tbl = <<<EOD
// <table cellspacing="0" cellpadding="1" border="1">
//     <tr>
//         <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
//         <td>COL 2 - ROW 1</td>
//         <td>COL 3 - ROW 1</td>
//     </tr>
//     <tr>
//     	<td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
//     	 <td>COL 3 - ROW 2</td>
//     </tr>
//     <tr>
//        <td>COL 3 - ROW 3</td>
//     </tr>

// </table>
// EOD;

// $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------


//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

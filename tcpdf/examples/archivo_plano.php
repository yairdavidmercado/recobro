<?php

include '../../php/conexion.php';
$conn = new PDO("pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME, DB_USER, DB_PASS);
$cod = '10';
$parametro1 = $_GET["parametro1"];
$parametro2 = '';
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
	generar_file_plain($results);
	//echo json_encode($results);
	//print_r($results);// all record sets
	$stmt = null; // obligado para cerrar la conexión

} catch (\Throwable $th) {
	print $e->getMessage();
}

function generar_file_plain($results)
{
	$file = "TEC120NPOS20161031NI900005956.txt";
	$fh = fopen($file, 'w') or die("Se produjo un error al crear el archivo");

	if (count($results[0]) > 0) {
		$tipo1 = '';
		$tipo2 = '';
		$suma = 0;
		for ($i=1; $i < count($results[0]) ; $i++) { 
			$tipo1 = $results[0][0]["tipo"].','.$results[0][0]["tipo_id"].','.$results[0][0]["nit_proveedor"].','.$results[0][0]["f_inicio"].','.$results[0][0]["last_day"].','.$results[0][0]["cant_total"];
			for ($it=0; $it < $results[0][$i]["total_cuentas"] ; $it++) {
				$suma += 1;
				$tipo2 .= $results[0][$i]["tipo"].
				','.$suma.
				','.$results[0][$i]["tipo_id_pacien"].
				','.$results[0][$i]["id_pacien"].
				','.$results[0][$i]["apell1"].
				','.$results[0][$i]["apell2"].
				','.$results[0][$i]["nom1"].
				','.$results[0][$i]["nom2"].
				','.$results[0][$i]["tipo_id"].
				','.$results[0][$i]["nit_proveedor"].
				','.$results[0][$i]["nombre_proveedor"].
				','.$results[0][$i]["origen"].
				','.$results[0][$i]["prefijo"].
				','.$results[0][$i]["n_factura"].
				','.$results[0][$i]["fecha_factu"].
				','.$results[0][$i]["fecha_presenta_servicio"].
				','.$results[0][$i]["fecha_radica_factu"].
				','.$results[0][$i]["codigo_diag"].
				','.$results[0][$i]["tipo_serv"].
				','.$results[0][$i]["codigo_medi_serv"].
				','.$results[0][$i]["nombre_medi_serv"].
				','.$results[0][$i]["cantidad"].
				','.$results[0][$i]["valor_unit"].
				','.$results[0][$i]["valor_total"].
				','.$results[0][$i]["mecanismo"].
				PHP_EOL;
			}

		}

	}

	$texto = $tipo1.PHP_EOL.$tipo2;//json_encode($results[0]);
	
	fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
	fclose($fh);
	//echo json_encode($results[0]);
	header('Content-Description: File Transfer');
	header('Content-Disposition: attachment; filename='.basename($file));
	header('Expires: 0');
	header('Cache-Control: must-revalidate');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	header("Content-Type: text/plain");
	readfile($file);
}
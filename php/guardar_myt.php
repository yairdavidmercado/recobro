<?php

include 'conexion.php';
 
			$cod_admi1 			= $_POST["cod_admi1"];
			$cod_contra1		= $_POST["cod_contra1"];
			$tipo_radi1 		= $_POST["tipo_radi1"];
			$radi_reco_ant1 	= $_POST["radi_reco_ant1"];
			$ca_doc1 			= $_POST["ca_doc1"];
			$fp_doc1 			= $_POST["fp_doc1"];
			$of_doc1 			= $_POST["of_doc1"];
			$si_doc1 			= $_POST["si_doc1"];
			$ca_folio1 			= $_POST["ca_folio1"];
			$fp_folio1 			= $_POST["fp_folio1"];
			$of_folio1 			= $_POST["of_folio1"];
			$si_folio1 			= $_POST["si_folio1"];
			$radi_ant_reposa1 	= $_POST["radi_ant_reposa1"];
			$cod_usua1 			= $_POST["cod_usua1"];
 
 $conn = pg_connect("user=".DB_USER." password=".DB_PASS." port=".DB_PORT." dbname=".DB_NAME." host=".DB_HOST);

	try{
		if($conn){
		$result = pg_query($conn, "SELECT guardar_myt('".$cod_admi1."', '".$cod_contra1."', '".$tipo_radi1."', '".$radi_reco_ant1."', '".$ca_doc1."', '".$fp_doc1."', '".$of_doc1."', '".$si_doc1."', '".$ca_folio1."', '".$fp_folio1."', '".$of_folio1."', '".$si_folio1."', '".$radi_ant_reposa1."', '".$cod_usua1."')");
		$fch = pg_fetch_row($result);

		$response["success"] = true;
		if ($fch[0] == 1) {
			$response["message"] = "Registrado exitosamente.";
			$response["numero"] = $fch[0]; 
		}else{
			$response["message"] = "Actualizado exitosamente.";
			$response["numero"] = $fch[0]; 
		}
		echo json_encode($response);
		}
		else{
			$response["success"] = false;
			$response["message"] = "Ocurrio un error en la conexion";
			echo json_encode($response);
		}
	}catch(Exception $e){
		$response["success"] = false;
		$response["message"] = $e->getMessage();
		echo json_encode($response);
	}
	pg_close($conn);

?>

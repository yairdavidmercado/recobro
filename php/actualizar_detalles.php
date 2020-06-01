<?php

include 'conexion.php';
 
			$cod 			    = $_POST["cod"];
            $parametro1		    = $_POST["parametro1"];
            $parametro2		    = $_POST["parametro2"];
 
 $conn = pg_connect("user=".DB_USER." password=".DB_PASS." port=".DB_PORT." dbname=".DB_NAME." host=".DB_HOST);

	try{
		if($conn){
		$result = pg_query($conn, "SELECT actualizar_myt_detalles('".$cod."', '".$parametro1."', '".$parametro2."')");
		$fch = pg_fetch_row($result);

		if ($fch[0] == 1) {
            $response["success"] = true;
			$response["message"] = "Actualizado exitosamente.";
			$response["numero"] = $fch[0]; 
		}else{
            $response["success"] = false;
			$response["message"] = "No se han podido actualizar los datos.";
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

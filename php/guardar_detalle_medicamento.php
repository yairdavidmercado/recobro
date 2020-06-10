<?php

include 'conexion.php';

            $id1 			            = $_POST["id"];
			$cod_admi 			        = $_POST["cod_admi"];
			$cod_contra		            = $_POST["cod_contra"];
            $nombre                     = $_POST["nombre"];
            $presentacion               = $_POST["presentacion"];
            $f_uso1                     = $_POST["f_uso1"];
            $dia_autoriza               = $_POST["dia_autoriza"];
            $cantidad1                  = $_POST["cantidad1"];
            $valor_unit1                = $_POST["valor_unit1"]; 
            $valor_total1               = $_POST["cantidad1"]*$_POST["valor_unit1"];//$_POST["valor_total1"]; 
            $codigo_similar             = $_POST["codigo_similar"]; 
            $nombre_similar             = $_POST["nombre_similar"]; 
            $f_uso2                     = $_POST["f_uso2"];
            $timpo_dia                  = $_POST["timpo_dia"]; 
            $cantidad2                  = $_POST["cantidad2"]; 
            $valor_unit2                = $_POST["valor_unit2"]; 
            $valor_total2               = $_POST["cantidad2"]*$_POST["valor_unit2"];//$_POST["valor_total2"]; 

 $conn = pg_connect("user=".DB_USER." password=".DB_PASS." port=".DB_PORT." dbname=".DB_NAME." host=".DB_HOST);
	try{
		if($conn){
		$result = pg_query($conn, "SELECT guardar_myt_datos_medicamento('".$id1."', '".$cod_admi."', '".$cod_contra."', '".$nombre."', '".$presentacion."', '".$f_uso1."', '".$dia_autoriza."','".$cantidad1."', '".$valor_unit1."', '".$valor_total1."', '".$codigo_similar."', '".$nombre_similar."', '".$f_uso2."', '".$timpo_dia."', '".$cantidad2."', '".$valor_unit2."', '".$valor_total2."')");
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

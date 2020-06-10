<?php

include 'conexion.php';

            $id1 			            = $_POST["id"];
			$cod_admi1 			        = $_POST["cod_admi"];
			$cod_contra1		        = $_POST["cod_contra"];
            $n_acta_ctc1                = $_POST["n_acta_ctc"];
            $fecha_acta_ctc1            = $_POST["fecha_acta_ctc"];
            $fecha_soli_medica1         = $_POST["fecha_soli_medica"];
            $periodico1                 = $_POST["periodico"];
            $perio_sumi1                = $_POST["perio_sumi"];
            $n_factura1                 = $_POST["n_factura"];
            $fecha_presenta_servicio1   = $_POST["fecha_presenta_servicio"];
            $fecha_radica_factu1        = $_POST["fecha_radica_factu"];
            $codigo_diag1               = $_POST["codigo_diag"];
            $semanas1                   = $_POST["semanas"];
            $nit_proveedor1             = $_POST["nit_proveedor"];
            $nombre_proveedor1          = addslashes($_POST["nombre_proveedor"]);
            $codigo_medi_serv1          = $_POST["codigo_medi_serv"];
            $nombre_medi_serv1          = addslashes($_POST["nombre_medi_serv"]);
            $cantidad1                  = $_POST["cantidad"];
            $valor_unit1                = $_POST["valor_unit"];
            $valor_total1               = $_POST["cantidad"]*$_POST["valor_unit"];//$_POST["valor_total"];
            $valor_cuota_mode1          = $_POST["valor_cuota_mode"];
            $valor_valor_recobro1       = $_POST["valor_valor_recobro"];

 $conn = pg_connect("user=".DB_USER." password=".DB_PASS." port=".DB_PORT." dbname=".DB_NAME." host=".DB_HOST);
	try{
		if($conn){
		$result = pg_query($conn, "SELECT guardar_myt_detalle_recobro('".$id1."','".$cod_admi1."', '".$cod_contra1."', '".$n_acta_ctc1."', '".$fecha_acta_ctc1."', '".$fecha_soli_medica1."', '".$periodico1."', '".$perio_sumi1."', '".$n_factura1."', '".$fecha_presenta_servicio1."', '".$fecha_radica_factu1."', '".$codigo_diag1."', '".$semanas1."', '".$nit_proveedor1."', '$nombre_proveedor1', '".$codigo_medi_serv1."', '".$nombre_medi_serv1."', '".$cantidad1."', '".$valor_unit1."', '".$valor_total1."', '".$valor_cuota_mode1."', '".$valor_valor_recobro1."')");
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

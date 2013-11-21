<?php
	include 'config.php';
		
	$nitTaller    = isset($_GET['nitTaller'])?$_GET['nitTaller']:NUll;
	$nombre   = isset($_GET['nombre'])?$_GET['nombre']:NUll;
	$nickTaller = isset($_GET['nickTaller'])?$_GET['nickTaller']:NUll;
	$clave     = isset($_GET['clave'])?$_GET['clave']:NUll;
	$telefono     = isset($_GET['telefono'])?$_GET['telefono']:NUll;
	$direccion     = isset($_GET['direccion'])?$_GET['direccion']:NUll;
	$correo    = isset($_GET['correo'])?$_GET['correo']:NUll;
	$descripcion    = isset($_GET['descripcion'])?$_GET['descripcion']:NUll;
	
	try {
		$gbd = new PDO('mysql:host=localhost;dbname=samvidb', $dbuser, $dbpass);
		$count = $gbd->query("select count(nit_taller) from taller where nit_taller = '$nitTaller'");
		echo "count " . $count->rowcount();
		
		if ($count->rowcount() != 1) {
			$arr = array('error' => 'se encuentra registrado');
			echo json_encode($arr);
		} else {
			$sqlusuario = $gbd->prepare("INSERT INTO taller(
					nit_taller, 
					nombre_taller, 
					nick_taller, 
					clave_taller, 
					telefono_taller,
					direccion_taller,
					email_taller,
					descripcion_taller
					) 
					VALUES (
					:nitTaller,
					:nombre,
					:nickTaller,
					:clave,
					:telefono,
					:direccion,
					:correo,
					:descripcion
					 )");

			$sqlusuario->bindParam(':nitTaller', $nitTaller);
			$sqlusuario->bindParam(':nombre', $nombre);
			$sqlusuario->bindParam(':nickTaller', $nickTaller);
			$sqlusuario->bindParam(':correo', $correo);
			$sqlusuario->bindParam(':clave', $clave);
			$sqlusuario->bindParam(':telefono', $telefono);
			$sqlusuario->bindParam(':direccion', $direccion);
			$sqlusuario->bindParam(':descripcion', $descripcion);
			$sqlusuario->execute();
			
			$resultados["validacion"] = "ok";
		}
	} 	 catch(PDOException $e) {
		$resultados["validacion"] = "error";
	}
	
	$resultadosJson = json_encode($resultados);
	echo isset($_GET['jsoncallback'])?$_GET['jsoncallback']:NUll . '(' . $resultadosJson . ');';
?>

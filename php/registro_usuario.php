<?php
	include 'config.php';
		
	$cedula    = isset($_GET['cedula'])?$_GET['cedula']:NUll;
	$nombres   = isset($_GET['nombres'])?$_GET['nombres']:NUll;
	$apellidos = isset($_GET['apellidos'])?$_GET['apellidos']:NUll;
	$correo    = isset($_GET['correo'])?$_GET['correo']:NUll;
	$clave     = isset($_GET['clave'])?$_GET['clave']:NUll;
	
	try {
		$gbd = new PDO('mysql:host=localhost;dbname=samvidb', $dbuser, $dbpass);
		$count = $gbd->query("select count(cedula_usuario) from usuario where cedula_usuario = '$cedula'");
		echo "count " . $count->rowcount();
		
		if ($count->rowcount() != 1) {
			$arr = array('error' => 'se encuentra registrado');
			echo json_encode($arr);
		} else {
			$sqlusuario = $gbd->prepare("INSERT INTO usuario(
					cedula_usuario, 
					nombre_usuario, 
					apellidos_usuario, 
					email_usuario, 
					clave_usuario
					) 
					VALUES (
					:cedula,
					:nombres,
					:apellidos,
					:correo,
					:clave
					)");

			$sqlusuario->bindParam(':cedula', $cedula);
			$sqlusuario->bindParam(':nombres', $nombres);
			$sqlusuario->bindParam(':apellidos', $apellidos);
			$sqlusuario->bindParam(':correo', $correo);
			$sqlusuario->bindParam(':clave', $clave);
			$sqlusuario->execute();
			
			$resultados["validacion"] = "ok";
		}
	} 	 catch(PDOException $e) {
		$resultados["validacion"] = "error";
	}
	
	$resultadosJson = json_encode($resultados);
	echo isset($_GET['jsoncallback'])?$_GET['jsoncallback']:NUll . '(' . $resultadosJson . ');';
?>

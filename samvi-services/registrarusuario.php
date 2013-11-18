<?php
include 'config.php';

$nombres=$_GET['nombres'];
$apellidos=$_GET['apellidos'];
$cedula=$_GET['cedula'];
$correo=$_GET['correo'];
$clave=$_GET['clave'];

try {
	$gdb = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
        $count = $gbd->query("select count(str_numero) from Tercero where str_numero = '$cedula'");
     echo "count".$count->rowcount();
    if ($count->rowcount() != 0) {
        $arr = array('error' => 'se encuentra registrado');
        echo json_encode($arr);
    } else {

        $sqlusuario = $gbd->prepare("INSERT INTO Tercero(
                ID, 
                bl_tipo_naturaleza, 
                bl_cliente, 
                lb_proveedor, 
                st_fecha_registro, 
                bl_tipo_solicitud, 
                str_tipo_identificacion, 
                str_numero, 
                str_primer_apellido, 
                str_segundo_apellido, 
                str_primer_nombre, 
                str_segundo_nombre, 
                str_razon_social, 
                str_notas, 
                str_responsabilidades) 
                VALUES (
                NULL,
                :naturaleza,
                :tipocliente,
                :tipoproveedor,
                :fecharegistro,
                :tiposolicitud,
                :tipoidentificacion,
                :numerodocumento,
                :primerapellido,
                :segundoapellido,
                :primernombre,
                :segundonombre,
                :razonsocial,
                :notas,
                :responsabilidades
                 )");

        $sqlusuario->bindParam(':naturaleza', $nombres);
        $sqlusuario->bindParam(':tipocliente', $tipocliente);
        $sqlusuario->bindParam(':tipoproveedor', $tipoproveedor);
        $sqlusuario->bindParam(':fecharegistro', $fecharegistro);
        $sqlusuario->bindParam(':tiposolicitud', $tiposolicitud);
        $sqlusuario->bindParam(':tipoidentificacion', $tipoidentificacion);
        $sqlusuario->bindParam(':numerodocumento', $numerodocumento);
        $sqlusuario->bindParam(':primerapellido', $primerapellido);
        $sqlusuario->bindParam(':segundoapellido', $segundoapellido);
        $sqlusuario->bindParam(':primernombre', $primernombre);
        $sqlusuario->bindParam(':segundonombre', $segundonombre);
        $sqlusuario->bindParam(':razonsocial', $razonsocial);
        $sqlusuario->bindParam(':notas', $notas);
        $sqlusuario->bindParam(':responsabilidades', $responsabilidades);
        $sqlusuario->execute();
        
        $resultados["validacion"] = "ok";
    }
} catch(PDOException $e) {
	$resultados["validacion"] = "error";
}


$resultadosJson = json_encode($resultados);
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';
?>

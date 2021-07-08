<?php 
	
	require 'conector.php';
	$conectar = new Conectar();
    $conexion =  $conectar->conexion();
				
	$sql = "UPDATE t_docentes SET nombreDocente = ?, apellidoPaternoP = ?, apellidoMaternoP = ?, areaProfesor = ?,	fechaNacimiento = ?, rfc = ?, telefono = ? WHERE  idDocentes = {$_POST['edtDocente']}";
	$consulta = $conexion->prepare($sql);
	$consulta->bind_param('sssssss', $_POST['edtNombre'],$_POST['edtPaterno'],$_POST['edtMaterno'],$_POST['edtArea'],$_POST['edtFecha'],$_POST['edtRfc'],$_POST['edtTelefono']);

	if ($consulta->execute()) {
		$sql2 = "UPDATE t_usuario SET email = ? WHERE  datosDocente = {$_POST['edtDocente']}";
		$consulta2 = $conexion->prepare($sql2);
		$consulta2->bind_param('s', $_POST['edtEmail']);
		if($consulta2->execute()){
			echo '2';
		}else{
			echo '1';
		}
	}else{
		echo 'Error al actualizar';
	}
	$conexion->close();

?>
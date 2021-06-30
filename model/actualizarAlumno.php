<?php 
	
	require 'conector.php';
	$conectar = new Conectar();
    $conexion =  $conectar->conexion();
				
	$sql = "UPDATE t_alumnos SET nombreAlumno = ?, apellidoPaternoA = ?, apellidoMaternoA = ?, carrera = ?,	fechaNacimiento = ?, curp = ?, tel = ? WHERE  idAlumno = {$_POST['edtAlumno']}";
	$consulta = $conexion->prepare($sql);
	$consulta->bind_param('sssssss', $_POST['edtNombre'],$_POST['edtPaterno'],$_POST['edtMaterno'],$_POST['edtCarrera'],$_POST['edtFecha'],$_POST['edtCurp'],$_POST['edtTelefono']);

	if ($consulta->execute()) {
		echo '2';
	}else{
		echo 'Error al actualizar';
	}
	$conexion->close();

?>
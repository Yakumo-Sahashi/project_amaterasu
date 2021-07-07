<?php 
	require_once 'conector.php';
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();

	$id = $_POST['idDocente'];
	$sql = "SELECT email,idDocentes,rfc,areaProfesor,nombreDocente,apellidoPaternoP,apellidoMaternoP,fechaNacimiento,telefono 
            FROM t_usuario tu INNER JOIN 
            t_docentes td ON tu.datosDocente = td.idDocentes 
            WHERE tu.datosDocente ='$id'";
            
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    
    $resultado = $consulta->get_result();
    $resultado = $resultado->fetch_assoc();
        
	echo json_encode($resultado);
?>
<?php 
	require_once 'conector.php';
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();

	$id = $_POST['idAlumno'];
	$sql = "SELECT idUsuario,email,n_Control,nombreAlumno,apellidoPaternoA,apellidoMaternoA,fechaNacimiento,carrera,idAlumno, curp, tel 
            FROM t_usuario tu INNER JOIN 
            t_alumnos ta ON tu.datosAlumno = ta.idAlumno 
            WHERE tu.datosAlumno ='$id'";
            
    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    
    $resultado = $consulta->get_result();
    $resultado = $resultado->fetch_assoc();
        
	echo json_encode($resultado);
?>
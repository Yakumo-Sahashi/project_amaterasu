<?php
    require 'conector.php';
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();
    $id = $_POST['idDocente'];

    $correcto = 1;

    $sql = array("DELETE FROM t_horarios WHERE idDocente = ".$id,
                "DELETE FROM t_usuario WHERE datosDocente = ".$id,
                "DELETE FROM t_docentes WHERE idDocentes = ".$id);
    //$i = 3;
    for($i = 0; $i<count($sql); $i++){
        $consulta = $conexion->prepare($sql[$i]);
        if (!$consulta->execute()) {
           $correcto++;
           break;
        }
    }
	$conexion->close();
    echo $correcto;

?>
<?php
    require 'conector.php';
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();
    $id = $_POST['idAlumno'];

    $correcto = 1;

    $sql = array("DELETE FROM t_horarioalumno WHERE idAlumno = ".$id,
                "DELETE FROM t_calificaciones WHERE alumno_inscrito = ".$id,
                "DELETE FROM t_usuario WHERE datosAlumno = ".$id,
                "DELETE FROM t_alumnos WHERE idAlumno = ".$id);
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
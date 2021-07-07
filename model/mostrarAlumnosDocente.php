<?php 
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $sql = "SELECT n_Control,nombreAlumno,apellidoPaternoA,apellidoMaternoA,nombreMateria,aula,tm.carrera FROM t_horarioalumno ta INNER JOIN t_alumnos tal ON ta.idAlumno = tal.idAlumno INNER JOIN t_horarios th ON ta.idHorario = th.idHorario INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre WHERE th.idDocente = {$_SESSION['user']['datosDocente']} AND ts.estado = 'activo'";

    $consulta = $conexion->prepare($sql);

    $consulta->execute();

    $resultado = $consulta->get_result();

    

    while($datos = $resultado->fetch_assoc()){
        $cont_dt['data'][]=$datos;
    };
    
    $datosJSON = json_encode($cont_dt, JSON_UNESCAPED_UNICODE);
    
    echo $datosJSON;

    $conexion->close();
?>
<?php 
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $sql = "SELECT nombreDocente,apellidoPaternoP,apellidoMaternoP,aula,nombreMateria,tm.carrera FROM t_horarioalumno tah INNER JOIN t_alumnos ta ON tah.idAlumno = ta.idAlumno INNER JOIN t_horarios th ON tah.idHorario = th.idHorario INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre INNER JOIN t_docentes td ON th.idDocente = td.idDocentes WHERE tah.idAlumno = {$_SESSION['user']['datosAlumno']} AND ts.estado = 'activo'"; 
            

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
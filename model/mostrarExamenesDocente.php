<?php 
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $sql = "SELECT nombreMateria,tm.carrera,semestre,unidad,examen FROM t_horarios th INNER JOIN t_docentes td ON th.idDocente = td.idDocentes INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_examenes te ON te.fk_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre WHERE td.idDocentes =  {$_SESSION['user']['datosDocente']}";

    $consulta = $conexion->prepare($sql);

    $consulta->execute();

    $resultado = $consulta->get_result();

    

    while($datos = $resultado->fetch_assoc()){
        $datos['btn']='<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarDocenteModal" onclick="precargarExamen('."'".$datos['examen']."'".');" title="editar"><i class="fas fa-edit"></i></span> <span class="btn btn-danger btn-sm text-white borde-button" onclick="eliminarExmaen('."'".$datos['examen']."'".');" title="eliminar"><i class="fas fa-trash"></i></span>';
        $cont_dt['data'][]=$datos;
    };
    
    $datosJSON = json_encode($cont_dt, JSON_UNESCAPED_UNICODE);
    
    echo $datosJSON;

    $conexion->close();
?>
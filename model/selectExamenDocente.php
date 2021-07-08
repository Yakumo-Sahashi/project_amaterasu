<?php 
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $resultado = array();

    foreach ($conexion->query("SELECT idMateria,nombreMateria,carrera,unidades FROM t_horarios th INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_docentes td ON th.idDocente = td.idDocentes INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre  WHERE th.idDocente = {$_SESSION['user']['datosDocente']}") as $dt) {
        array_push($resultado, $dt);
    }

   
    $datosJSON = json_encode($resultado, JSON_UNESCAPED_UNICODE);
    
    echo $datosJSON;

    $conexion->close();
?>
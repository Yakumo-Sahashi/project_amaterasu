<?php 
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $carrera = $conexion->real_escape_string(htmlentities($_POST['carrera']));

    $sql = "SELECT t_materias.idMateria, t_materias.nombreMateria FROM t_materias INNER JOIN t_semestre WHERE t_materias.carrera = ? AND t_semestre.estado = 'activo' ";



    $consulta = $conexion->prepare($sql);

    $consulta->bind_param('s',$carrera);

    $consulta->execute();

    $resultado = $consulta->get_result();

    

    while($datos = $resultado->fetch_assoc()){
        $cont_dt['data'][]=$datos;
    };
    
    $datosJSON = json_encode($cont_dt, JSON_UNESCAPED_UNICODE);
    
    echo $datosJSON;

    $conexion->close();
?>
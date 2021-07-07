<?php 
    session_start();

    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $sql = "SELECT idUsuario,email,rol,estado FROM t_usuario";

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
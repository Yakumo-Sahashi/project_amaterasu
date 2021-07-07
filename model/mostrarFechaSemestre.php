<?php
    require_once 'conector.php';
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();

    $sql = "SELECT * FROM t_semestre WHERE estado= 'activo' OR estado= 'inactivo'";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    $resultado = $result->fetch_assoc();
    
    echo json_encode($resultado);

?>
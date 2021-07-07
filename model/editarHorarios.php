<?php 
    session_start();
    
    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $id = $_POST['idHorario'];

    $sql = "UPDATE t_horarios SET aula = ?, lunes = ?, martes = ?, miercoles = ?, jueves = ?, viernes = ?, id_materia = ?, idDocente = ? WHERE idHorario = '$id'";

    $insercion = $conexion->prepare($sql);                            
    $insercion->bind_param(
        'ssssssss',
        $_POST['aula'],
        $_POST['lunes'],
        $_POST['martes'],
        $_POST['miercoles'],
        $_POST['jueves'],
        $_POST['viernes'],
        $_POST['id_materia'],
        $_POST['idDocente']
    );    
    
    $resultado = $insercion->execute();
    
    echo $resultado;

    $conexion->close();
?>
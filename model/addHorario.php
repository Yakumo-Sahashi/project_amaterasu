<?php 
    session_start();
    
    require_once "conector.php";

    $obj = new Conectar();
    
    $conexion = $obj->conexion();

    $datosMateria = array(
        $_POST['aula'],
        $_POST['lunes'],
        $_POST['martes'],
        $_POST['miercoles'],
        $_POST['jueves'],
        $_POST['viernes'],
        $_POST['id_materia'],
        $_POST['idDocente']
    );

    $sql = "INSERT INTO t_horarios (aula,lunes,martes,miercoles,jueves,viernes,id_materia,idDocente) 
                        VALUES (?, ?, ? , ?, ?, ?, ?, ?)";

    $insercion = $conexion->prepare($sql);                            
    $insercion->bind_param(
        'ssssssss',
        $datosMateria[0],
        $datosMateria[1],
        $datosMateria[2],
        $datosMateria[3],
        $datosMateria[4],
        $datosMateria[5],
        $datosMateria[6],
        $datosMateria[7],
    );    
    
    $resultado = $insercion->execute();

    echo $resultado;

    $conexion->close();
?>
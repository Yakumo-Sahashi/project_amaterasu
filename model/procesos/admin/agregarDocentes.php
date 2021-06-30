<?php 
    require_once "../../adminDocentes.php";
    
    $fechaNacimiento = explode("-",$_POST['fechaNacimiento']);  
    $fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
    $datos = array(
        // 1           Pedro
        "nombre" => $_POST['nombre'],
        "apellidoPaterno" => $_POST['apellidoPaterno'],
        "apellidoMaterno" => $_POST['apellidoMaterno'],
        "rfc" => $_POST['rfc'], 
        "carrera" => $_POST['carrera'],
        "fechaNacimiento" => $fechaNacimiento
    );
    $docente =new Docentes();
    echo $docente->agregarDocente($datos);
?>
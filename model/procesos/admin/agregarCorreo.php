<?php 
    require_once "../../adminDocentes.php";

    $datos = array(
        // 1           Pedro
        "correo" => $_POST['correo']
    );
    $docente =new Docentes();
    echo $docente->agregarCorreo($datos);
?>
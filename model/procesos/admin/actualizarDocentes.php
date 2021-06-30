<?php

    require_once "../../adminDocentes.php";
    $docentes =new Docentes();
    /**$fechaNacimiento = explode("-",$_POST['fechaNacimientoA']);  
    $fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0]; */
    $datos = array(
        "idDocente" => $_POST['idDocenteA'],
        "nombre" => $_POST['nombreA'],
        "apellidoPaterno" => $_POST['apellidoPaternoA'],
        "apellidoMaterno" => $_POST['apellidoMaternoA'],
        "rfc" => $_POST['rfcA'], 
        "correo" => $_POST['correoA'],
        "telefono" => $_POST['telefonoA'],
        "carrera" => $_POST['carreraA'],
        "fechaNacimiento" => $_POST['fechaNacimientoA']
    );
    echo $docentes->actualizarDocentes($datos);
?>
<?php
    require_once "../../adminDocentes.php";
    $docentes = new Docentes();
    echo $docentes->eliminarDocentes($_POST['idDocente']);
?>
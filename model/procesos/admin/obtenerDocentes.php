<?php
   require_once "../../adminDocentes.php";
   $docentes =new Docentes();
   echo json_encode($docentes->obtenerDocentes($_POST['idDocente']));
?>
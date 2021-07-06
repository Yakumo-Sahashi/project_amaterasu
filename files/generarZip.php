<?php
    require_once '../app/config.php'; 
    require_once '../model/conector.php';
    session_start();
    
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();
    $conteo=0;
    $id = $_SESSION['user']['datosDocente'];

    $semestre = empty($_POST['semestre']) ? comprobarSemestre($conexion) : $_POST['semestre'];

    $tipoArchivo = array("docx","xlsx","pdf","jpg","mp3");

    $carpetaRol = $_SESSION['user']['rol'] == 2 ? "docente" : "alumno";

    $totales = array();

    $zip = new ZipArchive();

    $nombreZip = $semestre."-".$_SESSION['user']['email'];
    
    $zip->open($nombreZip,ZipArchive::CREATE);
    
    $dir = 'Semestre '.$semestre;
    $zip->addEmptyDir($dir);


    foreach ($conexion->query("SELECT nombreMateria FROM t_horarios th INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre INNER JOIN t_docentes td ON th.idDocente = td.idDocentes WHERE idDocente = '$id' AND ts.semestre = '$semestre'") as $mate){

        for( $i = 0 ; $i < count($tipoArchivo) ; $i++ ){
            
            $path = "docente/".$_SESSION['user']['datosDocente']."/".$semestre."/".$mate['nombreMateria']."/".$tipoArchivo[$i];

            if(file_exists($path)){//revisa si el archivo existe
                $directorio = opendir($path);//abre el directorio
                //echo $directorio;
                while ($archivo = readdir($directorio)){ //Devuelve el nombre de la entrada al directorio
                    if (!is_dir($archivo)){//Indica si el nombre del archivo es un directorio
                        $validacionTipo= strtolower(pathinfo($archivo, PATHINFO_EXTENSION));//validamos el tipo de archivo
                        $dir = 'Semestre '.$semestre."/".$mate['nombreMateria']."/".$tipoArchivo[$i];
                        $zip->addEmptyDir($dir);
                        if ($validacionTipo== $tipoArchivo[$i]) {
                            $zip->addFile($path.'/'.$archivo,$dir."/".$archivo);                                        
                        }
                    }
                }
            }                           
        }
    }

    $zip->close();
    echo ","."files/".$nombreZip;
    //header("location:".SERVIDOR."files/".$nombreZip);
    /* header("Content-type: application/octet-stream");
    header("Content-disposition: attachment; filename=".$semestre);
    // leemos el archivo creado
    readfile($semestre);
    unlink(SERVIDOR."files/".$semestre); */


   

    function comprobarSemestre($conexion){

        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
      
        $resultado = $consulta->get_result();
        $resultado = $resultado->fetch_assoc();
    
        return $resultado['semestre'];
    }

?>
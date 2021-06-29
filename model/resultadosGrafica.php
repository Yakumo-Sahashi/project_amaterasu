<?php 
    require_once '../app/config.php'; 
    require_once 'conector.php';
    session_start();
    
    $conectar = new Conectar();
    $conexion =  $conectar->conexion();
    $conteo=0;

    $carpetaRol = $_SESSION['user']['rol'] == 2 ? "docente" : "alumno";
    $semestre = comprobarSemestre($conexion);
    $id = $carpetaRol == "docente" ? $_SESSION['user']['datosDocente'] : $_SESSION['user']['datosAlumno'];

    $tipoArchivo = array("docx","xlsx","pdf","jpg","mp3");
    $totales = array();
    foreach ($conexion->query("SELECT nombreMateria FROM t_horarios th INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre INNER JOIN t_docentes td ON th.idDocente = td.idDocentes WHERE idDocente = '$id' AND ts.semestre = '$semestre'" ) as $data){
        for( $i = 0 ; $i < count($tipoArchivo) ; $i++ ){    
            $path = "files/".$carpetaRol."/".$_SESSION['user']['email']."/".$semestre."/".$data['nombreMateria']."/".$tipoArchivo[$i];

            if(file_exists("../".$path)){//revisa si el archivo existe
                $directorio = opendir("../".$path);//abre el directorio
                while ($archivo = readdir($directorio)){ //Devuelve el nombre de la entrada al directorio
                    if (!is_dir($archivo)){//Indica si el nombre del archivo es un directorio
                        $validacionTipo= strtolower(pathinfo($archivo, PATHINFO_EXTENSION));//validamos el tipo de archivo
                        if ($validacionTipo== $tipoArchivo[$i]) {
                            $conteo ++;                                                
                        }
                    }
                }
            } 
            $totales [$tipoArchivo[$i]] = $totales [$tipoArchivo[$i]] + $conteo;
            $conteo = 0;                                  
        }
    }

    echo json_encode($totales);

    function comprobarSemestre($conexion){

        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
        $consulta = $conexion->prepare($sql);
        $consulta->execute();
      
        $resultado = $consulta->get_result();
        $resultado = $resultado->fetch_assoc();
    
        return $resultado['semestre'];
      }
?>
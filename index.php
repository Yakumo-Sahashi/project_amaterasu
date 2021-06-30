<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página diseñada por el equipo AMATERASU"/>
    <?php require_once 'app/config.php';?>
    <?php require_once 'app/dependencias.php';?>
    <title>AMATERASU</title>
</head>
<body>
    <?php 
        session_start();
        require_once 'view/loader.php';
        require_once 'view/nav.php';
        
        if(isset($_GET['view'])){
            $url = explode("/", $_GET['view']);

            if(count($url)<2)

                switch($url[0]){
                    case 'home': 
                        require_once 'view/home.php';
                        break;
                //----------------admin-------------------------
                    case 'admin': 
                        require_once 'view/admin/panel.php';
                        break;    
                    case 'docentes': 
                        require_once 'view/admin/tablaDocentes.php';
                        break;
                    case 'materias': 
                        require_once 'view/admin/materias.php';
                        break;
                    case 'usuariosActivos': 
                        require_once 'view/admin/usuariosActivos.php';
                        break;
                    case 'registroAlumnos': 
                        require_once 'view/admin/tablaAlumno.php';
                        break;
                //----------------docente-------------------------
                    case 'docente': 
                        require_once 'view/docente/panel.php';
                        break;
                    case 'calificaciones': 
                        require_once 'view/docente/calificaciones.php';
                        break;
                    case 'materiasDocente': 
                        require_once 'view/docente/materias.php';
                        break;
                    case 'asignacionExamen': 
                        require_once 'view/docente/examenes.php';
                        break;
                    case 'alumnos': 
                        require_once 'view/docente/tablaAlumno.php';
                        break;
                //----------------alumno-------------------------
                    case 'alumno': 
                        require_once 'view/alumno/panel.php';
                        break;
                    case 'consultaCalificaciones': 
                        require_once 'view/alumno/calificaciones.php';
                        break;   
                    case 'horario': 
                        require_once 'view/alumno/materias.php';
                        break;   
                    case 'examenes': 
                        require_once 'view/alumno/examenes.php';
                        break;            
                //----------------general-------------------------
                    case 'login': 
                        require_once 'view/login/login.php';
                        break; 
                    case 'semestre': 
                        require_once 'view/calendario.php';
                        break;
                    case 'grafica': 
                        require_once 'view/grafica.php';
                        break;
                    case 'archivos': 
                        require_once 'view/archivos.php';
                        break;     
                    //----------------404-------------------------             
                    default:
                        require_once 'view/404.php';
                        break;

                }  
            else
                header("location:".SERVIDOR."404");        

        }else{
            require_once 'view/login/login.php';
        }
        require_once 'view/modalImagen.php';
    ?>
</body>
</html>
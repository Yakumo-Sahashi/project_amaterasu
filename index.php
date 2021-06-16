<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'app/config.php';?>
    <?php require_once 'app/dependencias.php';?>
    <title>AMATERASU</title>
</head>
<body>

    <?php require_once 'view/nav.php'?>
    <?php
        if(isset($_GET['view'])){
            $url = explode("/", $_GET['view']);

            switch($url[0]){
                case 'home': 
                    require_once 'view/home.php';
                    break;
                case 'subirDocentes': 
                    require_once 'view/admin/docentes.php';
                    break;
                case 'examenesAlumnos': 
                    require_once 'view/alumno/examenes.php';
                    break;
                case 'asignarCalificaciones': 
                        require_once 'view/docente/calificaciones.php';
                        break;
                default:
                    require_once 'view/404.php';
                    break;
            }           

        }else{
            require_once 'view/login/login.php';
        }
    ?>

</body>
</html>
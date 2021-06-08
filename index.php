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
    <?php require_once 'view/nav.php'?>
    <?php
        if(isset($_GET['view'])){
            $url = explode("/", $_GET['view']);

            switch($url[0]){
                case 'home': 
                    require_once 'view/home.php';
                    break;
                case 'administrador': 
                    require_once 'view/admin/panel.php';
                    break;
                case 'docente': 
                    require_once 'view/docente/panel.php';
                    break;
                case 'alumno': 
                    require_once 'view/alumno/panel.php';
                    break;
                case 'login': 
                    require_once 'view/login/login.php';
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
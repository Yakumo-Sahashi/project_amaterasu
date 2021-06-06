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
    <div class="container">
        <div class="row">
            <div class="col-2">
                <a class="btn btn-primary btn-block" href="home">Inicio</a>
            </div>
            <div class="col-2">
                <a class="btn btn-primary btn-block" href="login">Iniciar sesion</a>
            </div>
            <div class="col-2">
                <a class="btn btn-primary btn-block" href="registro">Registro</a>
            </div>
        </div>
    </div>
    <?php
        if(isset($_GET['view'])){
            $url = explode("/", $_GET['view']);

            switch($url[0]){
                case 'home': 
                    require_once 'view/home.php';
                    break;
                case 'login': 
                    require_once 'view/login/login.php';
                    break;

                default:
                    require_once 'view/404.php';
                    break;

            }           

        }else{
            require_once 'view/home.php';
        }
    ?>
</body>
</html>
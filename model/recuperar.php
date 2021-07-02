<?php
    require_once 'conector.php';
    require_once '../app/php_mailer/PHPMailerAutoload.php';
	$conectar = new Conectar();
    $conexion =  $conectar->conexion();

    $email = $conexion->real_escape_string(htmlentities($_POST['email']));

    $sql = "SELECT * FROM t_usuario WHERE email = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param('s',$email);
    $consulta->execute();

    $resultado = $consulta->get_result();
    $resultado = $resultado->fetch_assoc();
    $password = password_hash(generarPassword(10), PASSWORD_BCRYPT);
    if ($resultado){  

        $sql2 = "UPDATE t_usuario tu SET tu.password ='$password' WHERE email='$email'";
		$consulta2 = $conexion->prepare($sql2);
		if($consulta2->execute()){
			echo enviarEmail($email,$password);
		}else{
			echo '1';
		}
        $conexion->close();
    }else{
        echo 'Email no registrado!';
        $conexion->close();
    }

    function enviarEmail($mail,$pass){

        $correo_electronico = new PHPMailer();
        $correo_electronico -> isSMTP();
        $correo_electronico -> SMTPAuth = true;
        $correo_electronico -> SMTPSecure = 'tls';
        $correo_electronico -> Host ='smtp.gmail.com';
        $correo_electronico -> Port = '587';
        $correo_electronico -> Username = 'amaterasu.system.itma@gmail.com';
        $correo_electronico -> Password = 'proyectoAmaterasu04';
    
        $correo_electronico -> setFrom('amaterasu.system.itma@gmail.com', 'Sistema Amaterasu');
        $correo_electronico -> addAddress($mail, 'Recuperacion de cuenta');
        $correo_electronico -> Subject = 'Tu proceso de recuperacion de cuenta ha iniciado.';
        $correo_electronico -> Body = ' 
                                <img src="https://dthezntil550i.cloudfront.net/fc/latest/fc2007302306553480015773650/1280_960/78e46bcb-4dfe-4357-a18f-ae354afd3274.jpg" style="width: 300px; height: auto;">
                                <h2>Sistema Amaterasu</h2><br>
                                <h4>Tus nuevos datos de acceso son:</h4>
                                <br>
                                <p>Usuario:  '.$mail.'</p>
                                <p>Password:  '.$pass.'</p>
                                <p>Ingresa con tu cuenta nuevamente.</p>
                                <br>
                              ';
    
        $correo_electronico -> isHTML(true);
        
        if($correo_electronico -> send()){
    
          return "2";
    
        }else{
    
          return "404";
    
        }
        
    }

    function generarPassword($length) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    } 


?>
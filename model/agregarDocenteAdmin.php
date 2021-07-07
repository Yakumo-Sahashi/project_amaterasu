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

    if (!$resultado) {  

        $query = "INSERT INTO t_docentes (rfc,areaProfesor,nombreDocente,apellidoPaternoP,apellidoMaternoP,fechaNacimiento,telefono) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('sssssss',$_POST['rfc'],$_POST['area'],$_POST['nombre'],$_POST['paterno'],$_POST['materno'],$_POST['fechaNacimiento'],$_POST['telefono']);
     
        if($stmt->execute()){
            $idDocente = mysqli_insert_id($conexion);
            $password = generarPassword(10);//"temp1234";
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $dt1 = 2;
            $dt2 = 2;
            $dt3 = 0;
            $dt4 = 1;
            
            $query = "INSERT INTO t_usuario (email,password,estado,rol,admin,datosAlumno,datosDocente) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('ssiiiii',$_POST['email'],$pass,$dt1,$dt2,$dt3,$dt4,$idDocente);
            if($stmt->execute()){
                echo enviarEmail($_POST['email'],$password);
                //echo "2";
            }else{
                echo "".$idDocente;
            }            
        }else{
            echo "1";
        }
    }else {
        echo "El email ya esta registrado";
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
        $correo_electronico -> addAddress($mail, 'Bienvenido');
        $correo_electronico -> Subject = 'Tu proceso de aignacion como docente se ha completado.';
        $correo_electronico -> Body = ' 
                                <img src="https://dthezntil550i.cloudfront.net/fc/latest/fc2007302306553480015773650/1280_960/78e46bcb-4dfe-4357-a18f-ae354afd3274.jpg" style="width: 300px; height: auto;">
                                <h2>Sistema Amaterasu</h2><br>
                                <h4>Tus datos de acceso son:</h4>
                                <br>
                                <p>Usuario:  '.$mail.'</p>
                                <p>Password:  '.$pass.'</p>
                                <p>Ingresa con tu cuenta para ver tus funciones como docente.</p>
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
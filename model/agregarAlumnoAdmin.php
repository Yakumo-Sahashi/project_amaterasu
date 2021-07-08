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
        $semestre = comprobarSemestre($conexion);
        $control = generarNControl($conexion);
        $query = "INSERT INTO t_alumnos (n_Control,nombreAlumno,apellidoPaternoA,apellidoMaternoA,carrera,fechaNacimiento,curp,tel,fk_semestre) VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('sssssssss',$control, $_POST['nombre'],$_POST['paterno'],$_POST['materno'],$_POST['carrera'],$_POST['fechaNacimiento'],$_POST['curp'],$_POST['telefono'],$semestre);
     
        if($stmt->execute()){
            $idAlumno = mysqli_insert_id($conexion);
            $password = generarPassword(10);
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $dt1 = 2;
            $dt2 = 3;
            $dt3 = 0;
            $dt4 = 1;
            
            $query = "INSERT INTO t_usuario (email,password,estado,rol,admin,datosAlumno,datosDocente) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('ssiiiii',$_POST['email'],$pass,$dt1,$dt2,$dt3,$idAlumno,$dt4);
            if($stmt->execute()){
                echo enviarEmail($_POST['email'],$password,$control);
                //echo "2";
            }else{
                echo "".$idAlumno;
            }            
        }else{
            echo "1";
        }
    }else {
        echo "El email ya esta registrado";
    }

    function comprobarSemestre($conexion){
        $sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
		$consulta = $conexion->prepare($sql);
		$consulta->execute();
  
		$resultado = $consulta->get_result();
		$resultado = $resultado->fetch_assoc();

		return $resultado['idSemestre'];        
	}


    function generarNControl($conexion){
        date_default_timezone_set('America/Mexico_City');
	    $fecha = date("Y");
        $fin = $fecha[2].$fecha[3]; 

        $sql = "SELECT max(n_Control) FROM t_alumnos";
        $con = $conexion->prepare($sql);
        $con->execute();

        $result = $con->get_result();
		$result = $result->fetch_assoc();

        $y = "".$result['max(n_Control)'];

        $c = $y[0].$y[1];
        if($c == $fin){
            $ncontrol = $result['max(n_Control)']+1;
        }else{
            $ncontrol = $fin."1190001";
        }
        

		return $ncontrol;
		
	}

    function enviarEmail($mail,$pass,$control){

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
        $correo_electronico -> Subject = 'Tu proceso de registro como estudiante se ha completado.';
        $correo_electronico -> Body = ' 
                                <img src="https://dthezntil550i.cloudfront.net/fc/latest/fc2007302306553480015773650/1280_960/78e46bcb-4dfe-4357-a18f-ae354afd3274.jpg" style="width: 300px; height: auto;">
                                <h2>Sistema Amaterasu</h2><br>
                                <h4>Tus datos de acceso son:</h4>
                                <br>
                                <p>Usuario:  '.$mail.'</p>
                                <p>Password:  '.$pass.'</p>
                                <p>No. Control:  '.$control.'</p>
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
<?php
	require_once '../app/config.php'; 
	require_once 'conector.php';
	$conectar = new Conectar();
	$conexion =  $conectar->conexion();
	session_start();
	$registroErrores = array();
	$tipoArchivo = $_POST['tipo'];
	$carpeta = $_SESSION['user']['datosDocente'];
	$materia = $_POST['slMateria'];
	$errores = '';

	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){ //extraemos los archivos subidos uno a uno
		
		if($_FILES["archivo"]["name"][$key]) {// validamos que el archivo exista
				
			if($_FILES["archivo"]["size"][$key] <= 2000*1024){ //validamos el peso del archivo que no exceda los 2MB
				$filename = $_FILES["archivo"]["name"][$key]; //archivo con su nombre original
				$source = $_FILES["archivo"]["tmp_name"][$key];//archivo con nombre temporal
				
				if($_SESSION['user']['rol'] == 2){
					$directorio = '../files/docente/'.$carpeta;//ruta donde guardaremos el archivo 
				}else{
					$directorio = '../files/alumno/'.$carpeta;//ruta donde guardaremos el archivo 
				}

				$validacionTipo= strtolower(pathinfo($filename, PATHINFO_EXTENSION));
				//Devuelve un string con todos los caracteres alfabeticos convertidos a minusculas.
					//Devuelve informacion acerca de la ruta de un fichero
						//Debuelve la extension del archivo
				if ($validacionTipo == $tipoArchivo) { //validacion del tipo de extension
					
					if(!file_exists($directorio)){ //verifica que el directorio no exista 
						mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n".$directorio);
						//mkdir Intenta crear el directorio especificado por la variable directorio.	
							// 0777 significa el acceso mas amplio posible
					}
					$semestre = comprobarSemestre($conexion);
					carpertaSemestre($semestre,$directorio);
					$directorio = $directorio.'/'.$semestre;
					carpertaMateria($materia,$directorio);
					$directorio = $directorio.'/'.$materia;
					carpetaTipo($tipoArchivo,$directorio);
					$directorio = $directorio.'/'.$tipoArchivo;
					
					$dir=opendir($directorio); //abre el directorio 
					$target_path = $directorio.'/'.$filename; //concatenamos la ruta mas el alchivo				
					
					if (!file_exists($target_path)) {//revisa que no exista el archivo en la ruta señalada
						if(move_uploaded_file($source, $target_path)) {	//mueve el archivo subido a la direccion señalada
							//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
						} else {	
							array_push($registroErrores, "El archivo: ".$_FILES["archivo"]["name"][$key]." no se ha podido almacenar.");														
							//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
						}
						closedir($dir); //cerramos el directorio
					}else{
						array_push($registroErrores, "El archivo: ".$_FILES["archivo"]["name"][$key]." ya existe en el servidor.");							
					}
				}else{
					array_push($registroErrores, "La extension del archivo: ".$_FILES["archivo"]["name"][$key]." no es valida(".$tipoArchivo.").");					
				}
			}else{
				array_push($registroErrores, "El tamaño del archivo: ".$_FILES["archivo"]["name"][$key]." es mayor a 2MB.");						
				//echo "Ha ocurrido un error con el tamaño de archivo, por favor inténtelo de nuevo.<br>";
			}
		}else{
			array_push($registroErrores, "Debes subir minimo un archivo!");
		}
	}


	if (count($registroErrores) > 0) {
		for( $i = 0 ; $i < count($registroErrores) ; $i++ ){
			$errores = $errores."\n".$registroErrores[$i];
		}
		echo $errores;		
	}else{
		echo "1";			
	}

	function carpetaTipo($subcarpeta,$directorio){
		if(!file_exists($directorio.'/'.$subcarpeta)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$subcarpeta, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
		}
	}

	function carpertaMateria($materia,$directorio){
		if(!file_exists($directorio.'/'.$materia)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$materia, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
		}
	}

	function carpertaSemestre($semestre,$directorio){
		if(!file_exists($directorio.'/'.$semestre)){ //verifica que el directorio no exista 
			mkdir($directorio.'/'.$semestre, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
		}
	}

	function comprobarSemestre($conexion){

		$sql = "SELECT * FROM t_semestre WHERE estado = 'activo'";
		$consulta = $conexion->prepare($sql);
		$consulta->execute();
  
		$resultado = $consulta->get_result();
		$resultado = $resultado->fetch_assoc();

		return $resultado['semestre'];
	}
		
?>
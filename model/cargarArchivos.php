<?php
	session_start();

	

	$formato=0;
	$peso=0;
	$archivo_nombre=0;
	$error=0;
	$vacio=0;

	$tipoArchivo = $_POST['tipo'];
	$carpeta ="".$_SESSION['user']['email'];

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
					
					$dir=opendir($directorio); //abre el directorio 
					$target_path = $directorio.'/'.$filename; //concatenamos la ruta mas el alchivo
					
					
					if (!file_exists($target_path)) {//revisa que no exista el archivo en la ruta señalada
						if(move_uploaded_file($source, $target_path)) {	//mueve el archivo subido a la direccion señalada

							
							//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
						} else {	
							$error++;							
							//echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
						}
						closedir($dir); //cerramos el directorio
					}else{
						$archivo_nombre++;							
					}
				}else{
					$formato++;
					
				}

			}else{
				$peso++;							
				//echo "Ha ocurrido un error con el tamaño de archivo, por favor inténtelo de nuevo.<br>";
			}
		}else{
			$vacio=1;
		}
	}


		if ($formato > 0) {
			echo "El formato de alguna(s) imagen(es) no es valido. "."\n"."Solo es permitido JPG y PNG";	
		}else if ($peso > 0) {
			echo "El peso de alguna(s) imagen(es) excede el maximo aceptado."."\n"." Solo es permitido como maximo 2MG";	
		}else if ($archivo_nombre > 0) {
			echo "Alguna(s) imagen(es) ya existen en el servidor.";	

		}else if ($error > 0) {
			echo "Alguna(s) imagen(es) no pueden ser subidas al servidor. "."\n"."Posibles causas: "."\n"."*Formato de imagen incorrecto"."\n"."*El tamaño mayor a 2MB "."\n"."*Existente en el servidor.";		
		}else if($vacio==1){
			echo "No debes subir un almenos un archivo";
		}else {
			echo "1";			
		}
		
?>
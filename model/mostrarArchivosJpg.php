<?php 
  require_once '../app/config.php'; 
  require_once 'conector.php';
  session_start();

  $conectar = new Conectar();
	$conexion =  $conectar->conexion();
  $dis=1; 
  
  $semestre = empty($_POST['semestre']) ? comprobarSemestre($conexion) : $_POST['semestre'];

  $btnDescargar = $semestre == comprobarSemestre($conexion) ? true : false;
  
  $carpetaRol = $_SESSION['user']['rol'] == 2 ? "docente" : "alumno";
  
  $tipoArchivo = $_POST['tipo'];

  $materia = $_POST['materia'];
  
  $path = "files/".$carpetaRol."/".$_SESSION['user']['email']."/".$semestre."/".$materia."/jpg";

?>
<div class="row">
  <?php 
    if(file_exists("../".$path)){//revisa si el archivo existe
      $directorio = opendir("../".$path);//abre el directorio
      while ($archivo = readdir($directorio)){ //Devuelve el nombre de la entrada al directorio
        if (!is_dir($archivo)){//Indica si el nombre del archivo es un directorio
          $validacionTipo= strtolower(pathinfo($archivo, PATHINFO_EXTENSION));//validamos el tipo de archivo
          if ($validacionTipo== "jpg") {
  ?>                           
      <div class="col-md-2 text-center">
        <div class="contenerdor-btn">  
          <a href="<?=SERVIDOR;?><?=$path?>/<?=$archivo?>" target="_blank">
            <img loading="lazy" class="img-fluid" src="<?=SERVIDOR;?><?=$path?>/<?=$archivo?>" title="<?=$archivo?>">
          </a>
          <form id="del_archivo<?=$tipoArchivo?><?=$dis?>">
            <input type="hidden" name="archivo_dir" id="archivo_dir" value="../<?=$path;?>/<?=$archivo;?>">                        
            <div class="boton-emergente ml-1">
              <a href="<?=SERVIDOR;?><?=$path;?>/<?=$archivo;?>" class="btn btn-descarga btn-sm" title="Descargar" download><i class="fas fa-arrow-down"></i></a>                                                                                                     
              <?php if($btnDescargar):?>
              <button class="btn btn-eliminar btn-sm" type="button" onclick="eliminarArchivo(<?=$dis?>,'<?=$tipoArchivo?>','<?=$materia?>')" title="Eliminar"><i class="far fa-trash-alt"></i></button>           
              <?php endif?>
            </div>
          </form>
        </div>
        <p class="text-center text-muted"><?=$archivo?></p> 
      </div>                         
  <?php                                                
          }
        }
        $dis++;
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
</div>
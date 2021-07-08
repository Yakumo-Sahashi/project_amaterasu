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

  $idUss =  $_SESSION['user']['rol'] == 3 ?  $_SESSION['user']['datosAlumno'] : "";

  $materia = $_POST['materia'];

  if($carpetaRol == "docente"){
    $path = "files/docente/".$_SESSION['user']['datosDocente']."/".$semestre."/".$materia."/jpg";

  }else{
    $mail = emailDocente($conexion,$idUss,$semestre,$materia);
    $path = "files/docente/".$mail."/".$semestre."/".$materia."/jpg";
  }
  
  

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
              <button class="btn btn-eliminar btn-sm" type="button" <?php if($carpetaRol == "alumno"){echo 'disabled';}?> onclick="eliminarArchivo(<?=$dis?>,'<?=$tipoArchivo?>','<?=$materia?>')" title="Eliminar"><i class="far fa-trash-alt"></i></button>           
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

    function emailDocente($conexion,$id,$semestre,$materia){
      $query = "SELECT * FROM t_horarioalumno th INNER JOIN t_alumnos ta ON th.idAlumno = ta.idAlumno INNER JOIN t_horarios td ON th.idHorario = td.idHorario INNER JOIN t_materias tm ON td.id_materia = tm.idMateria INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre  WHERE ta.idAlumno = '$id' AND tm.nombreMateria = '$materia' AND ts.semestre = '$semestre'";
      $consulta = $conexion->prepare($query);
      $consulta->execute();
    
      $resultado = $consulta->get_result();
      $resultado = $resultado->fetch_assoc();
  
      return $resultado['idDocente'];
    }
  ?>
</div>
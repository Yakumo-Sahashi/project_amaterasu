<?php
    require_once 'model/conector.php';
    $conectar = new Conectar();
	$conexion =  $conectar->conexion();

    $direccion ="";
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}else{
        if($_SESSION['user']['rol'] == "1"){
			$direccion = "admin";
		}elseif($_SESSION['user']['rol'] == "2"){
            $direccion = "docente";
        }else{
            $direccion = "alumno";
        }
    }
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require ''.$direccion.'/navResponsive.php';?>  
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require ''.$direccion.'/datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="card-title text-center">
                        <h4><b>Listado de archivos</b></h4>
                    </div>
                    <div class="card card-contorno">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <select class="form-control mb-1" name="semestre" id="semestre">
                                                        <option value="">Semestre</option>
                                                        <?php foreach ($conexion->query('SELECT semestre,estado from t_semestre') as $dt):?>
                                                        <option value="<?=$dt['semestre']?>"><?=$dt['semestre']?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <select class="form-control mb-1" name="materia" id="materia">
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-3">                                    
                                                    <button class="btn btn-panel btn-block mb-1" data-toggle="modal" id="btnModal" data-target="#subirArchivos" disabled>Subir archivo <i class="fas fa-upload"></i></button>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-panel btn-block mb-1" type="button" id="btnZip" disabled>Descargar <i class="fas fa-download"></i></button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div role="tabpanel">
                                        <div class="card card-archivo mb-3">
                                            <ul class="nav nav-tabs py-3" role=tablist>
                                                <li class="nav-item mx-auto">
                                                    <a class="btn btn-primary active" href="#word" id="sec1-tab"
                                                        aria-controls="word" data-toggle="tab" role="tab" aria-selected="true" style="width: 120px;">Word</a>
                                                </li>
                                                <li class="nav-item mx-auto">
                                                    <a class="btn btn-success" href="#excel" id="sec2-tab" aria-controls="excel"
                                                        data-toggle="tab" role="tab" aria-selected="false" style="width: 120px;">Excel</a>
                                                </li>
                                                <li class="nav-item mx-auto">
                                                    <a class="btn btn-danger" href="#pdf" id="sec3-tab" aria-controls="pdf"
                                                        data-toggle="tab" role="tab" aria-selected="false" style="width: 120px;">PDF</a>
                                                </li>
                                                <li class="nav-item mx-auto">
                                                    <a class="btn btn-warning" href="#jpg" id="sec4-tab" aria-controls="jpg"
                                                        data-toggle="tab" role="tab" aria-selected="false" style="width: 120px;">JPG</a>
                                                </li>
                                                <li class="nav-item mx-auto">
                                                    <a class="btn btn-info" href="#mp3" id="sec5-tab" aria-controls="mp3"
                                                        data-toggle="tab" role="tab" aria-selected="false" style="width: 120px;">MP3</a>
                                                </li>                                            
                                            </ul>
                                        </div>
                                    
                                       <div class="card card-archivo">
                                            <div class="card-body">
                                                <div class="tab-content py-3">
                                                    <div class="tab-pane fade show active" id="word" role="tabpanel" aria-labelledby="sec1-tab">
                                                        <div class="row">
                                                            <div class="col-md-12" id="archivosWord"></div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="excel" role="tabpanel" aria-labelledby="sec2-tab">
                                                        <div class="row">
                                                            <div class="col-md-12" id="archivosExcel"></div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="sec3-tab">
                                                        <div class="row">
                                                            <div class="col-md-12" id="archivosPdf"></div>
                                                        </div>                                                
                                                    </div>
                                                    <div class="tab-pane fade" id="jpg" role="tabpanel" aria-labelledby="sec4-tab">
                                                        <div class="row">
                                                            <div class="col-md-12" id="archivosImg"></div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="mp3" role="tabpanel" aria-labelledby="sec5-tab">
                                                        <div class="row">
                                                            <div class="col-md-12" id="archivosMp3"></div>                                                            
                                                        </div>                                                
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-4 mt-4 mb-4">
                                    <a class="btn btn-blue btn-block" href="<?=$direccion?>">Volver al panel</a>
                                </div>
                                <div class="col-md-4 mt-4 mb-4">
                                    <a class="btn btn-blue btn-block" href="grafica">Grafica de archivos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal archivos-->
<div class="modal fade" id="subirArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center" id="exampleModalLabel">Carga de archivos</h4>
				<button class="close" data-dismiss="modal" aria-label="Cerrar" >
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
                <form action="model/cargarArchivos.php" method="post" enctype="multipart/form-data" id="subirArchivo">
					<div class="row justify-content-around">
                        <div class="col-md-11">
                            <p class="">
                                1. Elige un tipo de archivo.
                                <br>2. Carga uno o más archivos del tipo elegido.
                                <br>3. El tamaño no debe ser mayor a 2MB.
                            </p>
                        </div>
						<div class="col-md-11">
                            <input type="text" value="" id="slMateria" name="slMateria" hidden>
							<label for="tipo"><b>Elige el tipo de archivo</b></label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-folder"></i></span>
								</div>
								<select name="tipo" id="tipo" class="custom-select">				
									<option value="docx">Documento de Word (.docx)</option>
                                    <option value="xlsx">Hoja de calculo Excel (.xlsx)</option>
                                    <option value="pdf">Documento PDF (.pdf)</option>
                                    <option value="jpg">Imagen (.jpg)</option>
                                    <option value="mp3">Audio (.pm3)</option>
								</select>
			        		</div>
						</div>
                        <div class="col-md-11">
							<label for="archivo"><b>Elige el archivo(s)</b></label>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-folder-open"></i></span>
								</div>
								<input type="file" class="form-control" name="archivo[]" id="archivo" multiple>	
			        		</div>
						</div>
                        <div class="col-md-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-panel" id="btnSubir">Subir</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
					</div>	        
				</form>
			</div>
		</div>
	</div>					
</div>
<script src="<?=SERVIDOR?>controller/funciones_subir_archivos.js" type="module"></script>
<script src="<?=SERVIDOR?>controller/funciones_eliminar_archivo.js"></script>
<script src="<?=SERVIDOR?>controller/funciones_crear_zip.js" type="module"></script>
<?php
    require_once 'model/conector.php';
    $conectar = new Conectar();
	$conexion =  $conectar->conexion();
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "2"){
		echo '<script> window.location="alumno" </script>';
    }
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require_once 'navResponsive.php';?>
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require 'datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias justify-content-center mt-2">
                        <div class="col-md-8 text-center align-self-center">
                            <h3>Examenes asignados</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <span class="btn btn-blue btn-block" data-toggle="modal"
                                data-target="#subirArchivosModal">Subir Archivo</span>
                            <a href="docente" class="btn btn-blue btn-block"><b>Volver al Panel de Control</b></a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-archivo">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="accordion">
                                                <?php $cont = 1; foreach ($conexion->query("SELECT idMateria,nombreMateria,unidades FROM t_horarios th INNER JOIN t_materias tm ON th.id_materia = tm.idMateria INNER JOIN t_docentes td ON th.idDocente = td.idDocentes INNER JOIN t_semestre ts ON tm.m_semestre = ts.idSemestre  WHERE th.idDocente = {$_SESSION['user']['datosDocente']}") as $dt):?>
                                                <div class="card">
                                                    <div class="card-header" id="heading<?=$cont?>">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$cont?>" aria-expanded="true" aria-controls="collapse<?=$cont?>" onclick="mostrarDatos('examen','<?=$dt['unidades']?><?=$dt['nombreMateria']?>',<?=$cont?>)">
                                                                <?=$dt['nombreMateria']?>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse<?=$cont?>" class="collapse" arial-labelledby="heading<?=$cont?>" data-parent="#accordion">
                                                        <div class="card-body" id="archivos<?=$cont?>">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $cont++; endforeach?>
                                                <?php $conexion->close();?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal Subir examenes-->
<div class="modal fade" id="subirArchivosModal" tabindex="-1" aria-labelledby="verHorariosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel">
                    <b>Añadir Examenes</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmArchivo">
                    <div class="col-md-12">
                        <input type="text" value="examen" name="evaluacion" id="evaluacion" hidden>
                        <label for="">Materia y carrera</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            </div>
                            <select name="materia" id="materia" class="form-control">
                            </select>
                        </div>
                        <label for="">Unidad</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                            </div>
                            <select name="unidad" id="unidad" class="form-control" disabled>
                            </select>
                        </div>

                        <label for="">Eligue el tipo de archivo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder"></i></span>
                            </div>
                            <select name="tipo" id="tipo" class="custom-select">
                                <option value="docx">Documento de Word (.docx)</option>
                                <option value="pdf">Documento PDF (.pdf)</option>
                            </select>
                        </div>

                        <label for="">eligue el archivo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                            </div>
                            <input type="file" name="archivo" id="archivo" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer  justify-content-center">
                <button type="button" class="btn btn-blue-card" id="btnAgregar">Añadir</button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Visualizar Modal-->
<div class="modal fade" id="visualizarArchivoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel">
                    <b>Vista previa</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="archivoObtenido">


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Examenes-->
<div class="modal fade" id="editarInformacionModal" tabindex="-1" aria-labelledby="verHorariosModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel">
                    <b>Editar Informacion</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="col-md-12">
                        <label for="">Materia y carrera</label>
                        <select name="" id="" class="form-control">
                            <option value="">Materias</option>
                        </select>
                        <label for="">Unidad</label>
                        <select name="" id="" class="form-control">
                            <option value="">Unidad</option>
                        </select>
                        <label for="">Eligue el tipo de archivo</label>
                        <select name="" id="" class="form-control">
                            <option value="">Archivo</option>
                        </select>
                        <label for="">eligue el archivo</label>
                        <input type="file" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer  justify-content-center">
                <button type="button" class="btn btn-blue-card">Añadir</button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>

            </div>
        </div>
    </div>
</div>

<script src="<?=SERVIDOR?>controller/funciones_agregar_examen.js"></script>
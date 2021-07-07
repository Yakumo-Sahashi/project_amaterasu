<?php
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
                    <div class="row card-materias mt-3 justify-content-center">
                        <div class="col-md-7 align-self-center text-center">
                            <h2>Listado de materias</h2>                            
                        </div>
                        <div class="col-md-4 ">
                            <button class="btn btn-blue btn-block">Ver Horario</button>  
                            <a href="docente" class="btn btn-blue btn-block"><b>Volver al Panel de Control</b></a>                          
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl" id="tablaMaterias">
                                <thead class="table-head">
                                    <tr>
                                        <th>Materia</th>
                                        <th>Aula</th>
                                        <th>Carrera</th>
                                        <th>Semestre</th>
                                    </tr>
                                </thead>
                            <div class="text-center pb-4">
                                
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Ver Horarios-->
<div class="modal fade" id="verHorariosModal" tabindex="-1" aria-labelledby="verHorariosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="verHorariosModalLabel"><b>Instituto Tecnológico de Milpa Alta II</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <img src="<?=SERVIDOR;?>img/horario.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-blue-card"><b>Descargar</b></button>
            </div>
        </div>
    </div>
</div>

<script src="<?=SERVIDOR?>controller/funciones_cargar_materias_docente.js"></script>
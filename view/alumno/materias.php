<?php
/* if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}else{
        if($_SESSION['user']['rol'] == "3"){
			echo '<script> window.location="alumno" </script>';
		}
    } */
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <?php require_once 'datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias mx-1 my-1">
                        <div class="col-md-6 mt-3 px-4">
                            <div class="input-group ">
                                <span class="input-group-prepend">
                                    <div class="input-group-text bg-transparent border border-dark border-right-0">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </span>
                                <input class="form-control py-2 border border-dark border-left-0 border" type="search" />
                            </div>
                        </div>
                        <div class="col-md-3 mt-3">
                            <span class="btn btn-blue-card btn-block"><b>Buscar</b></span>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Aula</th>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Ver Horarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quimica</td>
                                        <td>Javier</td>
                                        <td>industrial</td>
                                        <td>5</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#verHorariosModal"><i class="fas fa-edit"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>Sis. Web</td>
                                        <td>Enrique</td>
                                        <td>Sistemas</td>
                                        <td>6</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#verHorariosModal"><i class="fas fa-edit"></i></span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center pb-4">
                                <span class="btn btn-blue-card"><b>Volver al Panel de Control</b></span>
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
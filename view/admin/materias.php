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
                        <div class="col-md-3 mt-3">
                            <span class="btn btn-blue-card btn-block" data-toggle="modal" data-target="#añadirMateriaModal"><b>Añadir</b></span>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Prof. Asignado</th>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Editar Horarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quimica</td>
                                        <td>Javier</td>
                                        <td>industrial</td>
                                        <td>5</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarMateriaModal"><i class="fas fa-edit"></i></span></td>
                                    </tr>
                                    <tr>
                                        <td>Sis. Web</td>
                                        <td>Enrique</td>
                                        <td>Sistemas</td>
                                        <td>6</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarMateriaModal"><i class="fas fa-edit"></i></span></td>
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

<!-- Modal Añadir-->
<div class="modal fade" id="añadirMateriaModal" tabindex="-1" aria-labelledby="añadirMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="añadirMateriaModalLabel"><b>Añadir Materia</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <h5><b>Elige la materia y carrera</b></h5>
                            <select name="" id="" class="form-control">
                                <option value="">Quimica - Industrial</option>
                                <option value="">Sis. Web - Sistemas</option>
                                <option value="">Física - Gestión</option>
                            </select>
                            <h5 class="py-3"><b>Elige el semestre</b></h5>
                            <select name="" id="" class="form-control">
                                <option value="">1 - 2021</option>
                                <option value="">2- 2021</option>
                                <option value="">1 - 2022</option>
                            </select>
                            <h5 class="py-3"><b>Elige el docente</b></h5>
                            <select name="" id="" class="form-control">
                                <option value="">Enrique Calderas</option>
                                <option value="">Roldán Aquino</option>
                                <option value="">Gabriel Domínguez</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h5><b>Horarios</b></h5>
                            <label for="lunes">Lunes</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="lunes" id="lunes">
                            <label for="martes">Martes</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="martes" id="martes">
                            <label for="miercoles">Miercoles</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="miercoles" id="miercoles">
                            <label for="jueves">Jueves</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="jueves" id="jueves">
                            <label for="viernes">Viernes</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="viernes" id="viernes">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-blue-card"><b>Añadir</b></button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar-->
<div class="modal fade" id="editarMateriaModal" tabindex="-1" aria-labelledby="editarMateriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Editar Materia</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <h5><b>Elige la materia y carrera</b></h5>
                            <select name="" id="" class="form-control">
                                <option value="">Quimica - Industrial</option>
                                <option value="">Sis. Web - Sistemas</option>
                                <option value="">Física - Gestión</option>
                            </select>
                            <h5 class="py-3"><b>Elige el semestre</b></h5>
                            <select name="" id="" class="form-control">
                                <option value="">1 - 2021</option>
                                <option value="">2- 2021</option>
                                <option value="">1 - 2022</option>
                            </select>
                            <h5 class="py-3"><b>Elige el docente</b></h5>
                            <select name="" id="" class="form-control">
                                <option value="">Enrique Calderas</option>
                                <option value="">Roldán Aquino</option>
                                <option value="">Gabriel Domínguez</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <h5><b>Horarios</b></h5>
                            <label for="lunes">Lunes</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="lunes" id="lunes">
                            <label for="martes">Martes</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="martes" id="martes">
                            <label for="miercoles">Miercoles</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="miercoles" id="miercoles">
                            <label for="jueves">Jueves</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="jueves" id="jueves">
                            <label for="viernes">Viernes</label>
                            <input type="text" placeholder="--:--" class="form-control form-control-sm" name="viernes" id="viernes">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-blue-card"><b>Editar</b></button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
            </div>
        </div>
    </div>
</div>
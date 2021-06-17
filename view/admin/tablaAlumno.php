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
                            <div class="input-group">
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
                            <span class="btn btn-blue-card btn-block" data-toggle="modal" data-target="#añadirAlumnoModal"><b>Añadir</b></span>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">N° de Control</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Actualizar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Eduardo</td>
                                        <td>Martinez</td>
                                        <td>Industrial</td>
                                        <td>l162080010</td>
                                        <td>5</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal"><i class="fas fa-edit"></span></td>
                                        <td><span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"><i class="fas fa-trash"></span></a></td>
                                    </tr>
                                    <tr>
                                        <td>Jorge</td>
                                        <td>Villa</td>
                                        <td>Sistemas</td>
                                        <td>l172080018</td>
                                        <td>7</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal"><i class="fas fa-edit"></i></span></td>
                                        <td><span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"><i class="fas fa-trash"></span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center pb-4">
                                <a href="admin" class="btn btn-blue-card text-white"><b>Volver al Panel de Control</b></a>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Añadir-->
<div class="modal fade" id="añadirAlumnoModal" tabindex="-1" aria-labelledby="añadirAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="añadirAlumnoModalLabel"><b>Añadir Alumno</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <b><h5>Nombre:</h5></b>
                            <input type="text" class="form-control" placeholder="Nombre">
                            <b><h5>Apellido Paterno</h5></b>
                            <input type="text" class="form-control" placeholder="Apellido Paterno">
                            <b><h5>Apellido Materno</h5></b>
                            <input type="text" class="form-control" placeholder="Apellido Materno">
                            <b><h5>CURP</h5></b>
                            <input type="text" class="form-control" placeholder="CURP">
                        </div>
                        <div class="col-md-6">
                            <h5>Email</h5></b>
                            <input type="text" class="form-control" placeholder="ejemplo@gmail.com">
                            <b><h5>Telefono</h5></b>
                            <input type="number" class="form-control" placeholder="5555555555">
                            <b><h5>Asignar Carrera</h5></b>
                            <select name="" id="" class="form-control">
                                <option value="">Seleccionar Carrera...</option>
                                <option value="">Ing. Sistemas Computacionales</option>
                                <option value="">Ing. Gestion Empresarial</option>
                                <option value="">Ing. Industrial</option>
                            </select>
                            <b><h5>Fecha de Nacimiento</h5></b>
                            <input type="date" class="form-control">
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
<div class="modal fade" id="editarAlumnoModal" tabindex="-1" aria-labelledby="editarAlumnoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarAlumnoModalLabel"><b>Editar Alumno</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <b><h5>Nombre:</h5></b>
                            <input type="text" class="form-control" placeholder="Nombre">
                            <b><h5>Apellido Paterno</h5></b>
                            <input type="text" class="form-control" placeholder="Apellido Paterno">
                            <b><h5>Apellido Materno</h5></b>
                            <input type="text" class="form-control" placeholder="Apellido Materno">
                            <b><h5>CURP</h5></b>
                            <input type="text" class="form-control" placeholder="CURP">
                        </div>
                        <div class="col-md-6">
                            <h5>Email</h5></b>
                            <input type="text" class="form-control" placeholder="ejemplo@gmail.com">
                            <b><h5>Telefono</h5></b>
                            <input type="number" class="form-control" placeholder="5555555555">
                            <b><h5>Asignar Carrera</h5></b>
                            <select name="" id="" class="form-control">
                                <option value="">Seleccionar Carrera...</option>
                                <option value="">Ing. Sistemas Computacionales</option>
                                <option value="">Ing. Gestion Empresarial</option>
                                <option value="">Ing. Industrial</option>
                            </select>
                            <b><h5>Fecha de Nacimiento</h5></b>
                            <input type="date" class="form-control">
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
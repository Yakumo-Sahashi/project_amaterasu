<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "2" || $_SESSION['user']['admin'] != "1" ){
		echo '<script> window.location="alumno" </script>';
    }
?>
<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col col-12 d-md-none">
            <?php require 'navResponsive.php';?>
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require 'datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias justify-content-around">
                        <div class="col-md-3 mt-3 ">
                            <span class="btn btn-blue btn-block" data-toggle="modal"
                                data-target="#añadirAlumnoModal"><b>Añadir</b></span>
                        </div>
                        <div class="col-md-12">
                            <div class="py-4 text-center">
                                <table class="table table-body table-md border border-secondary table-hover table-responsive-xl" id="tablaAlumnos">
                                    <thead class="table-head">
                                        <tr>
                                            <th>N° Control</th>
                                            <th>Nombre</th>
                                            <th>Ap Paterno</th>
                                            <th>Ap Materno</th>
                                            <th>Carrera</th>
                                            <th>Actualizar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="admin" class="btn btn-blue btn-block">Volver al Panel de Control</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Añadir-->
        <div class="modal fade" id="añadirAlumnoModal" tabindex="-1" aria-labelledby="añadirAlumnoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2"
                            id="añadirAlumnoModalLabel"><b>Añadir Alumno</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>
                                        <h5>Nombre:</h5>
                                    </b>
                                    <input type="text" class="form-control" placeholder="Nombre" value="">
                                    <b>
                                        <h5>Apellido Paterno</h5>
                                    </b>
                                    <input type="text" class="form-control" placeholder="Apellido Paterno" value="">
                                    <b>
                                        <h5>Apellido Materno</h5>
                                    </b>
                                    <input type="text" class="form-control" placeholder="Apellido Materno" value="">
                                    <b>
                                        <h5>CURP</h5>
                                    </b>
                                    <input type="text" class="form-control" placeholder="CURP" value="">
                                </div>
                                <div class="col-md-6">
                                    <h5>Email</h5></b>
                                    <input type="text" class="form-control" placeholder="ejemplo@gmail.com" value="">
                                    <b>
                                        <h5>Telefono</h5>
                                    </b>
                                    <input type="number" class="form-control" placeholder="5555555555" value="">
                                    <b>
                                        <h5>Asignar Carrera</h5>
                                    </b>
                                    <select name="" id="" class="form-control">
                                        <option value="">Seleccionar Carrera...</option>
                                        <option value="">Ing. Sistemas Computacionales</option>
                                        <option value="">Ing. Gestion Empresarial</option>
                                        <option value="">Ing. Industrial</option>
                                    </select>
                                    <b>
                                        <h5>Fecha de Nacimiento</h5>
                                    </b>
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
        <div class="modal fade" id="editarAlumnoModal" tabindex="-1" aria-labelledby="editarAlumnoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2"
                            id="editarAlumnoModalLabel"><b>Editar Alumno</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="edtIdUsuario" id="edtIdUsuario" class="form-control" hidden value="">
                                    <b><h5>Nombre:</h5></b>
                                    <input type="text" name="edtNombre" id="edtNombre" class="form-control" placeholder="Nombre" value="">
                                    
                                    <b><h5>Apellido Paterno</h5></b>
                                    <input type="text" name="edtPaterno" id="edtPaterno" class="form-control" placeholder="Apellido Paterno" value="">
                                    
                                    <b><h5>Apellido Materno</h5></b>
                                    <input type="text" name="edtMaterno" id="edtMaterno" class="form-control" placeholder="Apellido Materno" value="">
                                    
                                    <b><h5>CURP</h5></b>
                                    <input type="text" name="edtCurp" id="edtCurp" class="form-control" placeholder="CURP" value="">
                                </div>
                                <div class="col-md-6">
                                <input type="text" name="edtIdAlumno" id="edtIdAlumno" class="form-control" hidden value="">
                                    <h5>Email</h5></b>
                                    <input type="text" class="form-control" name="edtEmail" id="edtEmail" placeholder="ejemplo@gmail.com" value="">
                                    
                                    <b><h5>Telefono</h5></b>
                                    <input type="number" name="edtTelefono" id="edtTelefono" class="form-control" placeholder="5555555555" value="">
                                    
                                    <b><h5>Asignar Carrera</h5></b>
                                    <select name="edtCarrera" id="edtCarrera" class="form-control">
                                        <option value="">Seleccionar Carrera...</option>
                                        <option value="Sistemas">Ing. Sistemas Computacionales</option>
                                        <option value="Gestion">Ing. Gestion Empresarial</option>
                                        <option value="Industrial">Ing. Industrial</option>
                                    </select>

                                    <b><h5>Fecha de Nacimiento</h5></b>
                                    <input name="edtFecha" id="edtFecha" type="date" class="form-control">
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
<script src="<?=SERVIDOR?>controller/funciones_agregar_alumno.js"></script>
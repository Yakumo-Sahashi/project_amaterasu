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
            <?php require_once 'navResponsive.php';?>
        </div>
        <div class="col d-none d-md-block col-md-3">
            <?php require 'datosUsuario.php';?>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-body">
                    <div class="row card-materias mt-3">
                        <div class="col-md-8 align-self-center text-center">
                            <h2>Lista de docentes</h2>
                        </div>
                        <div class="col-md-4 ">
                            <span class="btn btn-blue btn-block" data-toggle="modal"
                                data-target="#añadirDocenteModal"><b>Añadir</b></span>
                            <a href="admin" class="btn btn-blue btn-block text-white"><b>Volver al Panel de
                                    Control</b></a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <table class="table table-body border border-secondary table-hover table-responsive-xl"
                                    id="tablaDocentes">
                                    <thead class="table-head">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">RFC</th>
                                            <th scope="col">Actualizar</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="text-center pb-4">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Añadir-->
    <div class="modal fade" id="añadirDocenteModal" tabindex="-1" aria-labelledby="añadirDocenteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center border-bottom border-dark pb-2"
                        id="añadirDocenteModalLabel"><b>Añadir Docente</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="frmAgregarDocente">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <b>
                                        <h5>Nombre:</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="nombre" id="nombre" class="form-control"
                                            placeholder="Nombre" value="">
                                    </div>

                                    <b>
                                        <h5>Apellido Paterno</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="paterno" id="paterno" class="form-control"
                                            placeholder="Apellido Paterno" value="">
                                    </div>

                                    <b>
                                        <h5>Apellido Materno</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="materno" id="materno" class="form-control"
                                            placeholder="Apellido Materno" value="">
                                    </div>

                                    <b>
                                        <h5>RFC</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="rfc" id="rfc" class="form-control"
                                            placeholder="RFC" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Email</h5></b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="ejemplo@gmail.com" value="">
                                    </div>

                                    <b>
                                        <h5>Telefono</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" name="telefono" id="telefono" class="form-control"
                                            placeholder="5555555555" value="" maxlength="10"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>

                                    <b>
                                        <h5>Area</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" name="area" id="area"
                                            placeholder="Area asignada" value="">
                                    </div>

                                    <b>
                                        <h5>Fecha de Nacimiento</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input name="fechaNacimiento" id="fechaNacimiento" type="date" min="" max="<?=$fecha;?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-blue-card" id="btnAgregar"><b>Añadir</b></button>
                    <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar-->
    <div class="modal fade" id="editarDocenteModal" tabindex="-1" aria-labelledby="editarDocenteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100 text-center border-bottom border-dark pb-2"
                        id="editarDocenteModalLabel"><b>Editar Docente</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="frmACtualizaDocente">
                            <div class="row justify-content-around">
                                <div class="col-md-6">
                                    <!-- <input type="text" name="edtIdUsuario" id="edtIdUsuario" class="form-control"
                                            hidden value=""> -->
                                    <b>
                                        <h5>Nombre:</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="edtNombre" id="edtNombre" class="form-control"
                                            placeholder="Nombre" value="">
                                    </div>

                                    <b>
                                        <h5>Apellido Paterno</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="edtPaterno" id="edtPaterno" class="form-control"
                                            placeholder="Apellido Paterno" value="">
                                    </div>

                                    <b>
                                        <h5>Apellido Materno</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="edtMaterno" id="edtMaterno" class="form-control"
                                            placeholder="Apellido Materno" value="">
                                    </div>

                                    <b>
                                        <h5>RFC</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" name="edtRfc" id="edtRfc" class="form-control"
                                            placeholder="RFC" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="edtDocente" id="edtDocente"
                                        placeholder="id" value="" hidden>

                                    <h5>Email</h5></b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" name="edtEmail" id="edtEmail"
                                            placeholder="ejemplo@gmail.com" value="">
                                    </div>

                                    <b>
                                        <h5>Telefono</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="number" name="edtTelefono" id="edtTelefono" class="form-control"
                                            placeholder="5555555555" value="" maxlength="10"
                                            oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>

                                    <b>
                                        <h5>Area</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input type="text" class="form-control" name="edtArea" id="edtArea"
                                            placeholder="Area asignada" value="">
                                    </div>

                                    <b>
                                        <h5>Fecha de Nacimiento</h5>
                                    </b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"></span>
                                        </div>
                                        <input name="edtFecha" id="edtFecha" type="date" min="" max="<?=$fecha;?>"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-blue-card" id="btnEditar"><b>Editar</b></button>
                    <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=SERVIDOR?>controller/funciones_agregar_docente.js"></script>
    <script src="<?=SERVIDOR?>controller/funciones_actualizar_docente.js" type="module"></script>
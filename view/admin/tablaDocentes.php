<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "2" || $_SESSION['user']['admin'] != "1" ){
		echo '<script> window.location="alumno" </script>';
    }
    date_default_timezone_set('America/Mexico_City');
	$fecha = date("Y-m-d");
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
                    <div class="row card-materias justify-content-center">
                        <div class="col-md-8 text-center mt-3 align-self-center">
                            <h1>Listado de alumnos</h1>
                        </div>
                        <div class="col-md-4 mt-3 text-center align-self-center">
                            <span class="btn btn-blue btn-block" data-toggle="modal"
                                data-target="#agregarDocenteModal"><b>Añadir</b></span>
                            <a href="admin" class="btn btn-blue btn-block">Volver al Panel de Control</a>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="py-4 text-center">
                                <table
                                    class="table table-body table-md border border-secondary table-hover table-responsive-xl"
                                    id="tablaDocentes">
                                    <thead class="table-head">
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Ap. Paterno</th>
                                            <th scope="col">Ap. Materno</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">RFC</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- <a href="admin" class="btn btn-blue btn-block">Volver al Panel de Control</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Añadir-->
<div class="modal fade" id="agregarDocenteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="exampleModalLabel"><b>Añadir Docente</b></h4>
				<button class="close" data-dismiss="modal" aria-label="Cerrar" >
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">        
                <form id="frmAgregarDocente">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <label for="" class="h5">Nombre</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control"
                                    placeholder="Nombre" value="">
                            </div>

                            <label for="" class="h5">Apellido Paterno</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="paterno" id="paterno" class="form-control"
                                    placeholder="Apellido Paterno" value="">
                            </div>

                            <label for="" class="h5">Apellido Materno</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="materno" id="materno" class="form-control"
                                    placeholder="Apellido Materno" value="">
                            </div>

                            <label for="" class="h5">RFC</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="rfc" id="rfc" class="form-control"
                                    placeholder="RFC" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="h5">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="ejemplo@gmail.com" value="">
                            </div>

                            <label for="" class="h5">Telefono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="number" name="telefono" id="telefono" class="form-control"
                                    placeholder="5555555555" value="" maxlength="10"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <label for="" class="h5">Area</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <select name="area" id="area" class="form-control">
                                    <option value="">Seleccionar Area...</option>
                                    <option value="Sistemas">Ing. Sistemas Computacionales</option>
                                    <option value="Gestion">Ing. Gestion Empresarial</option>
                                    <option value="Industrial">Ing. Industrial</option>
                                </select>
                            </div>

                            <label for="" class="h5">Fecha de Nacimiento</label>
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
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-blue-card" id="btnAgregar"><b>Añadir</b></button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
		    </div>
		</div>
	</div>					
</div>

    

    <!-- Modal Editar-->
<div class="modal fade" id="editarDocenteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="exampleModalLabel"><b>Editar Docente</b></h4>
				<button class="close" data-dismiss="modal" aria-label="Cerrar" >
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">   
                <form id="frmACtualizaDocente">
                    <div class="row justify-content-around">
                        <div class="col-md-6">
                            <label for="" class="h5">Nombre:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="edtNombre" id="edtNombre" class="form-control"
                                    placeholder="Nombre" value="">
                            </div>

                            <label for="" class="h5">Apellido Paterno</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="edtPaterno" id="edtPaterno" class="form-control"
                                    placeholder="Apellido Paterno" value="">
                            </div>

                            <label for="" class="h5">Apellido Materno</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="edtMaterno" id="edtMaterno" class="form-control"
                                    placeholder="Apellido Materno" value="">
                            </div>

                            <label for="" class="h5">RFC</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" name="edtRfc" id="edtRfc" class="form-control"
                                    placeholder="RFC" value="">
                            </div>
                        </div>
                        <div class="col-md-6">                          
                            <input type="text" class="form-control" name="edtDocente" id="edtDocente" placeholder="id" value="" hidden>
                            <label for="" class="h5">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="text" class="form-control" name="edtEmail" id="edtEmail"
                                    placeholder="ejemplo@gmail.com" value="">
                            </div>

                            <label for="" class="h5">Telefono</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input type="number" name="edtTelefono" id="edtTelefono" class="form-control"
                                    placeholder="5555555555" value="" maxlength="10"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <label for="" class="h5">Area</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <select name="edtArea" id="edtArea" class="form-control">
                                    <option value="">Seleccionar Area...</option>
                                    <option value="Sistemas">Ing. Sistemas Computacionales</option>
                                    <option value="Gestion">Ing. Gestion Empresarial</option>
                                    <option value="Industrial">Ing. Industrial</option>
                                </select>
                            </div>

                            <label for="" class="h5">Fecha de Nacimiento</label>
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
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-blue-card" id="btnEditar"><b>Editar</b></button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
		    </div>
		</div>
	</div>					
</div>
    <script src="<?=SERVIDOR?>controller/funciones_agregar_docente.js"></script>
    <script src="<?=SERVIDOR?>controller/funciones_actualizar_docente.js" type="module"></script>
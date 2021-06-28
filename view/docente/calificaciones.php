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
                    <div class="row card-materias mx-1 my-1">
                        <div class="col-md-7 mt-3 px-4 text-center">
                                <h3>Asignacion de calificaciones</h3>
                        </div>
                        <div class="col-md-5 text-center mt-4">
                            <td><span class="btn btn-blue-card btn-sm text-white borde-button"  data-toggle="modal" data-target="#subirArchivosModal">Subir Archivo</span></td>
                        </div>
                        <div class="col-md-12">
                            <div class="py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl table-md">
                                <thead class="table-head">
                                    <tr>
                                        <th scope="col">Materia</th>
                                        <th scope="col">Carrera</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Unidad</th>
                                        <th scope="col">Examen</th>
                                        <th scope="col" colspan="3">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Estructura de datos</td>
                                        <td>Programacion</td>
                                        <td>5</td>
                                        <td>1</td>
                                        <td>ExamenU1.docx</td>
                                        <td>
                                            <span class="btn btn-primary btn-sm borde-button"  data-toggle="modal" data-target="#visualizarArchivoModal">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarInformacionModal">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                                
                                        </td>
                                        <td>
                                            <span class="btn btn-danger btn-sm borde-button">
                                                <i class="fas fa-trash-alt"></i>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center pb-4">
                                <a href="docente" class="btn btn-blue-card"><b>Volver al Panel de Control</b></a>
                            </div>
                        </div>
                    </div>             
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Subir examenes-->
<div class="modal fade" id="subirArchivosModal" tabindex="-1" aria-labelledby="verHorariosModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Añadir Examenes</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="col-md-12">
                <label for=""><b><h5>Materia y carrera</h5></b> </label>
                <select name="" id="" class="form-control">
                    <option value="">Materias</option>
                </select>
                <label for=""><b><h5>Unidad</h5></b> </label>
                <select name="" id="" class="form-control">
                    <option value="">Unidad</option>
                </select>
                <label for=""><b><h5>Eligue el tipo de archivo</h5></b> </label>
                <select name="" id="" class="form-control">
                    <option value="">Archivo</option>
                </select>
                <label for=""><b><h5>eligue el archivo</h5></b> </label>
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

<!--Visualizar Modal-->
<div class="modal fade" id="visualizarArchivoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Vista previa</b></h5>
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
<div class="modal fade" id="editarInformacionModal" tabindex="-1" aria-labelledby="verHorariosModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Editar Informacion</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="col-md-12">
                <b><h5>Materia y carrera</h5></b> 
                <select name="" id="" class="form-control">
                    <option value="">Materias</option>
                </select>
                <b><h5>Unidad</h5></b> 
                <select name="" id="" class="form-control">
                    <option value="">Unidad</option>
                </select>
                <b><h5>Eligue el tipo de archivo</h5></b> 
                <select name="" id="" class="form-control">
                    <option value="">Archivo</option>
                </select>
                <b><h5>eligue el archivo</h5></b> 
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
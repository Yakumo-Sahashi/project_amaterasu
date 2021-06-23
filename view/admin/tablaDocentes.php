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
                            <span class="btn btn-blue-card btn-block" data-toggle="modal" data-target="#añadirModal"><b>Añadir</b></span>
                        </div>
                        <div class="col-md-12">
                            <div class="px-4 py-4 text-center">
                            <table class="table table-body border border-secondary table-hover table-responsive-xl">
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
                                <tbody>
                                    <tr>
                                        <td>Pedro</td>
                                        <td>Jimenez</td>
                                        <td>Programacion</td>
                                        <td>JIP0106B21</td>
                                        <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#actualizarModal">
                                        <i class="fas fa-edit"></i>
                                        </span></td>
                                        <td><span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarMateriaModal">
                                        <i class="fas fa-trash-alt"></i>
                                        </span></td>
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
<div class="modal fade" id="añadirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Añadir Docente</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <form action="">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <label for="">Nombre</label>
                <input type="text" class="form-control">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control">
                <label for="">RFC</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">Correo</label>
                <input type="text" class="form-control">
                <label for="">Telefono</label>
                <input type="text" class="form-control">
                <label for="">Carrera</label>
                <input type="text" class="form-control">
                <label for="">Fecha de nacimiento</label>
                <input type="text" class="form-control">
            </div>
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

<!--Modal actualizar-->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Editar Docente</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <form action="">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <label for="">Nombre</label>
                <input type="text" class="form-control">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control">
                <label for="">RFC</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="">Correo</label>
                <input type="text" class="form-control">
                <label for="">Telefono</label>
                <input type="text" class="form-control">
                <label for="">Carrera</label>
                <input type="text" class="form-control">
                <label for="">Fecha de nacimiento</label>
                <input type="text" class="form-control">
            </div>
        </div>
        
        </form>
      </div>
      <div class="modal-footer  justify-content-center">
            <button type="button" class="btn btn-blue-card">Actualizar</button>
            <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
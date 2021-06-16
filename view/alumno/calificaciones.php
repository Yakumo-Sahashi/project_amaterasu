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
                        <div class="col-md-12 mt-3 px-4 text-center">
                                <h3>Asignacion de calificaciones</h3>
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
                                        <th scope="col" colspan="2">Opciones</th>
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
                                            <i class="fas fa-download"></i>
                                            </span>
                                                
                                        </td>
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
<!--Visualizar Modal-->
<div class="modal fade" id="visualizarArchivoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarMateriaModalLabel"><b>Vista Previa</b></h5>
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
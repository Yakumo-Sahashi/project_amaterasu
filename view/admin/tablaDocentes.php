<?php
	if (!isset($_SESSION['user'])) {
		echo '<script> window.location="login" </script>';
	}elseif($_SESSION['user']['rol'] != "2" || $_SESSION['user']['admin'] != "1" ){
		echo '<script> window.location="alumno" </script>';
    }
    require_once "model/conector.php";
    $conexion = new Conectar;
    $conexion = $conexion->conexion();
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
                            <table class="table table-body scroll-tables border border-secondary table-hover table-responsive-xl">
                                <thead class="table-head ">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">RFC</th>
                                        <th scope="col">Actualizar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <div id="tablasDocentes">
                                    <tbody>
                                        <?php
                                            $sql = "SELECT idDocentes, nombreDocente, apellidoPaternoP, areaProfesor,rfc FROM t_docentes";
                                            $resultado = mysqli_query($conexion,$sql);
                                            while($mostrar = mysqli_fetch_array($resultado)){
                                                if($mostrar['idDocentes'] !=1 && $mostrar['idDocentes'] > 1){
                                                    $idDocentes = $mostrar['idDocentes'];
                                        ?>
                                                <tr>
                                                    <td><?php echo $mostrar['nombreDocente'];?></td>
                                                    <td><?php echo $mostrar['apellidoPaternoP'];?></td>
                                                    <td><?php echo $mostrar['areaProfesor'];?></td>
                                                    <td><?php echo $mostrar['rfc'];?></td>
                                                    <td><span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#actualizarModal" 
                                                            onclick="obtenerDocentes('<?php echo $idDocentes;?>')">
                                                    <i class="fas fa-edit"></i>
                                                    </span></td>
                                                    <td><span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" onclick="eliminarDocente('<?php echo $idDocentes;?>')">
                                                    <i class="fas fa-trash-alt"></i>
                                                    </span></td>
                                                </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </div>
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
        <form action="" id="frmAgregarDocentes" method="POST" onsubmit="return agregarDocentes();">
        <div class="row justify-content-around">
            <div class="col-md-6">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required="">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control" id="ApellidoMaterno" name="apellidoMaterno" required="">
                <label for="">RFC</label>
                <input type="text" class="form-control" id="rfc" name="rfc" required="">
            </div>
            <div class="col-md-6">
                <label for="">Correo</label>
                <input type="gmail" class="form-control" id="correo" name="correo" required="">
                <label for="">Telefono</label>
                <input type="number" class="form-control" id="telefono" name="telefono" required="">
                <label for="">Carrera</label>
                <input type="text" class="form-control" id="carrera" name="carrera" required="">
                <label for="">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required="">
            </div>
        </div>
        
        </form>
        <div class="modal-footer  justify-content-center">
            <button type="button" class="btn btn-blue-card" id="btnAnadirDocente">Añadir</button>
            <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>
            
      </div>
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
        <form action="" method="POST" id="frmActualizarDocente">
        <div class="row justify-content-around">
            <div class="col-md-6">
            <input type="text" id="idDocenteA" name="idDocenteA" hidden="" readonly="readonly">
                <label for="">Nombre</label>
                <input type="text" class="form-control" id="nombreA" name="nombreA" required="">
                <label for="">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidoPaternoA" name="apellidoPaternoA" required="">
                <label for="">Apellido Materno</label>
                <input type="text" class="form-control" id="ApellidoMaternoA" name="apellidoMaternoA" required="">
                <label for="">RFC</label>
                <input type="text" class="form-control" id="rfcA" name="rfcA" required="">
            </div>
            <div class="col-md-6">
                <label for="">Correo</label>
                <input type="gmail" class="form-control" id="correoA" name="correoA" required=""readonly="readonly">
                <label for="">Telefono</label>
                <input type="number" class="form-control" id="telefonoA" name="telefonoA" required="">
                <label for="">Carrera</label>
                <input type="text" class="form-control" id="carreraA" name="carreraA" required="">
                <label for="">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimientoA" name="fechaNacimientoA" required="">
            </div>
        </div>
        
        </form>
      </div>
      <div class="modal-footer  justify-content-center">
            <button type="button" class="btn btn-blue-card" id="btnActualizarDocente">Actualizar</button>
            <button type="button" class="btn btn-red-card" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
<script src="controller/admin_docentes.js"></script>

<script type="text/javascript"> 
    $(document).ready(function(){

        $('#btnAnadirDocente').click(function(){
          agregarDocentes();
        });

        $('#btnActualizarDocente').click(function(){
          actualizarDocentes();
        });
    });

</script>

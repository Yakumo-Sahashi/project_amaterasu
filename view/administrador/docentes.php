<div class="container py-4">
    <div class="row justify-content-around">
        <div class="col-md-3">
            <div class="card shadow card-login">
                <div class="card-body text-center">
                    <i class="fas fa-user fa-9x text-b"></i>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h3>Alumno</h3>
                            <hr>
                            <p class=""><b>Nombre: </b></p>
                            <p class=""><b>apellidos: </b></p>
                            <p class=""><b>Carrera: </b></p>
                            <p class=""><b>Semestre: </b></p>
                            <p class=""><b>No. control: </b></p>
                        </div>
                        <div class="col py-5">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow card-login">
                <div class="card-header text-center" style="background: none;">
                <h1>DOCENTES</h1>
                </div>
                <div class="card-body">
                       <div class="text-center">
                            <form action="">
                                    <div class="row justify-content-around">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn ml-4 mr-4" style="background-color: #1b396a; color: #FFF;">Buscar</button>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn ml-4" style="background-color: #1b396a; color: #FFF;"  data-toggle="modal" data-target="#añadir">añadir</button>
                                        </div>
                                    </div>
                                    
                                    
                                    
                            </form>
                       </div>
                       <div class="text-center mt-4">
                            <table class="table">
                                <thead style="background-color: #10909e; color: #FFF;">
                                    <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">Actualizar</th>
                                    <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="table-primary">
                                </tbody>
                            </table>
                       </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="#" class="btn" style="background-color: #1b396a; color: #FFF;">Volver al panel</a>
            </div>

        </div>
    </div>
</div>

<!--Modal añadir-->
<div class="modal fade" id="añadir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir docentes</h5>
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
            <button type="button" class="btn btn-primary">Añadir</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            
      </div>
    </div>
  </div>
</div>

<!--Modal actualizar-->
<div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Docentes</h5>
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
            <button type="button" class="btn" style="color: #FFF;">Añadir</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
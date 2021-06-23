<div class="card shadow card-login">
    <div class="card-body text-center">
        <i class="fas fa-user fa-9x text-b img-fluid"></i>
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="#" class="text-secondary" data-toggle="modal" data-target="#editarImagenModal"><i class="fas fa-edit"></i>Editar imagen</a>
                <h3>Administrador</h3>
                <hr>
                <p class=""><b>Nombre: </b></p>
                <p class=""><b>Apellidos: </b></p>
                <p class=""><b>Carrera: </b></p>
                <p class=""><b>Email: </b></p>
                <p class=""><b>RFC: </b></p>
            </div>
            <div class="col py-4 mb-4">
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Imagen-->
<div class="modal fade" id="editarImagenModal" tabindex="-1" aria-labelledby="editarImagenModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center border-bottom border-dark pb-2" id="editarImagenModalLabel"><b>Editar imagen</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h5><b>Elige la imagen que quieres usar</b></h5>
                            <p class="mb-1">Solo archivos tipo jpg o png.</p>
                            <p>Tamaño máximo de archivo 2 Mb.</p>
                            <input type="file" class="form-control" accept=".png, .jpg,">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-blue-card"><b>Aceptar</b></button>
                <button type="button" class="btn btn-red-card" data-dismiss="modal"><b>Cancelar</b></button>
            </div>
        </div>
    </div>
</div>

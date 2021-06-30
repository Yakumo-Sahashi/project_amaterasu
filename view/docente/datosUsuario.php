<div class="card shadow card-login">
    <div class="card-body text-center">
        <i class="fas fa-user fa-9x text-b img-fluid"></i>
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="#" class="text-secondary" data-toggle="modal" data-target="#editarImagenModal"><i class="fas fa-edit"></i>Editar imagen</a>
                <h3>Docente</h3>
                <hr>
                <p class=""><b>Nombre: <?=$_SESSION['dataUser']['nombreDocente']?></b></p>
                <p class=""><b>Apellidos: <?=$_SESSION['dataUser']['apellidoPaternoP']?> <?=$_SESSION['dataUser']['apellidoMaternoP']?></b></p>
                <!-- <p class=""><b>Carrera: </b></p> -->
                <p class=""><b>Email: <?=$_SESSION['user']['email']?></b></>
                <p class=""><b>RFC: <?=$_SESSION['dataUser']['rfc']?></b></p>
                <hr>
                <a href="admin" class="btn btn-light btn-block">Panel Admin</a>
            </div>
            <div class="col py-2 mb-1">
            </div>
        </div>
    </div>
</div>
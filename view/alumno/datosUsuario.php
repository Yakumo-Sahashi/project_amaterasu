<div class="card shadow card-login">
    <div class="card-body text-center">
        <i class="fas fa-user fa-9x text-b img-fluid"></i>
        <div class="row mt-4">
            <div class="col-md-12">
                <a href="#" class="text-secondary" data-toggle="modal" data-target="#editarImagenModal"><i class="fas fa-edit"></i>Editar imagen</a>
                <h3>Alumno</h3>
                <hr>
                <p class=""><b>Nombre: <?=$_SESSION['dataUser']['nombreAlumno']?></b></p>
                <p class=""><b>Apellidos: <?=$_SESSION['dataUser']['apellidoPaternoA']?> <?=$_SESSION['dataUser']['apellidoMaternoA']?></b></p>
                <p class=""><b>Carrera: <?=$_SESSION['dataUser']['carrera']?></b></p>
                <p class=""><b>CURP: <?=$_SESSION['dataUser']['curp']?></b></p>
                <p class=""><b>No. control: <?=$_SESSION['dataUser']['n_Control']?></b></p>
            </div>
            <div class="col py-4 mb-4">
            </div>
        </div>
    </div>
</div>
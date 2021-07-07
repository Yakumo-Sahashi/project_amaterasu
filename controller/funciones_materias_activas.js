function usuariosActivos(idMaterias,idSemestre){
    console.log(idMaterias,idSemestre);
    $.ajax({
        type: 'POST',
        data: 'idMaterias= ' + idMaterias + '&idSemestre=' + idSemestre,
        url: 'model/materiasActivas.php',
        success: (r) => {
            tabla.ajax.reload(null,false);            
        }
    });
}

var tabla = $('#tablaMaterias').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    "ajax":'./model/mostrarMateriasActivas.php',
    "columns": [
        {"data": "nombreMateria"},
        {"data": "carrera"},
        {"data": "semestre"},
        {"data": "btncheck"},
        //{"data": "btnEliminar"},
        //{"defaultContent":'<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal"><i class="fas fa-edit"></i></span>'},
        //{"defaultContent":'<span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"><i class="fas fa-trash"></i></span>'}
    ]
  });
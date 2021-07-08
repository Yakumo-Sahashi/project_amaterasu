var tabla = $('#tablaDocentes').DataTable({
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
  "ajax":'./model/mostrarDocentesAdmin.php',
  "columns": [
      {"data": "nombreDocente"},
      {"data": "apellidoPaternoP"},
      {"data": "apellidoMaternoP"},
      {"data": "areaProfesor"},
      {"data": "rfc"},
      {"data": "btnEditar"},
      //{"data": "btnEliminar"},
      //{"defaultContent":'<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal"><i class="fas fa-edit"></i></span>'},
      //{"defaultContent":'<span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"><i class="fas fa-trash"></i></span>'}
  ]
});

function eliminarDocente(idDocente) {

  swal({
    title: "Seguro quieres borrar a este alumno?",
    text: "Una vez que lo elimines, No se podrá recuperar.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      //loader.opening();
      $.ajax({
        type: 'POST',
        data: "idDocente=" + idDocente,
        url: 'model/eliminarDocente.php',
        success: (r) => {
          //loader.ending();
          if (r == "1") {
            tabla.ajax.reload(null,false);
            swal("Perfecto", "El registro de docente ha sido eliminado permanentemente", "success");
          } else {
            tabla.ajax.reload(null,false);
            swal("Upps", "No logramos eliminar el registro del docente "+r, "error");
          }
        }
      });
    }
  });

}

function precargarDocente(idDocente) {
  $.ajax({
    type: 'POST',
    data: "idDocente=" + idDocente,
    url: 'model/precargarDtDocenteAdmin.php',
    success: function (r) {

      //convertimos r a un objeto json valido
      datos_precarga = jQuery.parseJSON(r);
      //console.log(datos_precarga['idAlumno']);
      //$('#edtIdUsuario').val(datos_precarga['idUsuario']);
      $('#edtDocente').val(datos_precarga['idDocentes']);
      $('#edtEmail').val(datos_precarga['email']);
      $('#edtRfc').val(datos_precarga['rfc']);
      $('#edtArea').val(datos_precarga['areaProfesor']);
      $('#edtNombre').val(datos_precarga['nombreDocente']);
      $('#edtPaterno').val(datos_precarga['apellidoPaternoP']);
      $('#edtMaterno').val(datos_precarga['apellidoMaternoP']);
      $('#edtFecha').val(datos_precarga['fechaNacimiento']);
      $('#edtTelefono').val(datos_precarga['telefono']);
    }
  });
}
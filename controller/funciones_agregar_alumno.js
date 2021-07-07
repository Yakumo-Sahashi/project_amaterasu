var tabla = $('#tablaAlumnos').DataTable({
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
  "ajax":'./model/mostrarAlumnosAdmin.php',
  "columns": [
      {"data": "n_Control"},
      {"data": "nombreAlumno"},
      {"data": "apellidoPaternoA"},
      {"data": "apellidoMaternoA"},
      {"data": "carrera"},
      {"data": "btnEditar"},
      //{"data": "btnEliminar"},
      //{"defaultContent":'<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal"><i class="fas fa-edit"></i></span>'},
      //{"defaultContent":'<span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"><i class="fas fa-trash"></i></span>'}
  ]
});

function eliminarAlumno(idAlumno) {

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
        data: "idAlumno=" + idAlumno,
        url: 'model/eliminarAlumnoAdmin.php',
        success: (r) => {
          //loader.ending();
          if (r == "1") {
            tabla.ajax.reload(null,false);
            swal("Perfecto", "El registro de alumno ha sido eliminado permanentemente", "success");
          } else {
            tabla.ajax.reload(null,false);
            swal("Upps", "No logramos eliminar el registro del alumno "+r, "error");
          }
        }
      });
    }
  });

}

function precargarAlumno(idAlumno) {
  $.ajax({
    type: 'POST',
    data: "idAlumno=" + idAlumno,
    url: 'model/precargarDtAlumnoAdmin.php',
    success: function (r) {

      //convertimos r a un objeto json valido
      datos_precarga = jQuery.parseJSON(r);
      //console.log(datos_precarga['idAlumno']);

      //$('#edtIdUsuario').val(datos_precarga['idUsuario']);
      $('#edtAlumno').val(datos_precarga['idAlumno']);
      $('#edtEmail').val(datos_precarga['email']);
      $('#edtControl').val(datos_precarga['n_Control']);
      $('#edtNombre').val(datos_precarga['nombreAlumno']);
      $('#edtPaterno').val(datos_precarga['apellidoPaternoA']);
      $('#edtMaterno').val(datos_precarga['apellidoMaternoA']);
      $('#edtFecha').val(datos_precarga['fechaNacimiento']);
      $('#edtCarrera').val(datos_precarga['carrera']);
      $('#edtCurp').val(datos_precarga['curp']);
      $('#edtTelefono').val(datos_precarga['tel']);
    }
  });
}
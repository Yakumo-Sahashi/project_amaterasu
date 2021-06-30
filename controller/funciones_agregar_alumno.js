$(document).ready(()=> {
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
            {"data": "btnEliminar"},
            //{"defaultContent":'<span class="btn btn-warning btn-sm text-white borde-button"  data-toggle="modal" data-target="#editarAlumnoModal"><i class="fas fa-edit"></i></span>'},
            //{"defaultContent":'<span class="btn btn-danger btn-sm text-white borde-button"  data-toggle="modal" data-target="#eliminarAlumnoModal"><i class="fas fa-trash"></i></span>'}
        ]
    });


    
});

function precargarAlumno(idAlumno){
    $.ajax({
      type: 'POST',
      data:"idAlumno=" + idAlumno,
      url: 'model/precargarDtAlumnoAdmin.php',
      success: function(r){
  
        //convertimos r a un objeto json valido
        datos_precarga = jQuery.parseJSON(r);
  
        $('#edtIdUsuario').val(datos_precarga['idUsuario']);
        $('#edtEmail').val(datos_precarga['email']);
        //$('#img_perfil').val(datos_precarga['n_Control']); 
        $('#edtNombre').val(datos_precarga['nombreAlumno']);  
        $('#edtPaterno').val(datos_precarga['apellidoPaternoA']);
        $('#edtMaterno').val(datos_precarga['apellidoMaternoA']);
        $('#edtFecha').val(datos_precarga['fechaNacimiento']); 
        $('#edtCarrera').val(datos_precarga['carrera']);  
        $('#edtIdAlumno').val(datos_precarga['idAlumno']);   
        $('#edtCurp').val(datos_precarga['curp']);  
        $('#edtTelefono').val(datos_precarga['tel']);       
      }
    });
}
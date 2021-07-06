
precargarMaterias();
  var idTemp = "1";
  function mostrarDatos(tipo,materia,id) {
    //loader.opening();
    idTemp = ""+id;
    $.ajax({
        type: 'post',
        data: 'tipo=' + tipo + '&materia=' + materia,
        url: "model/mostrarArchivosEvaluacionD.php",
        success: (r) => {
          $('#archivos'+id).html(r);
            //loader.ending();
        }
    });
  }

  function cargarArchivo() {
    var Form = new FormData($('#frmArchivo')[0]);
    var materia = $('#materia').val();
    //loader.opening();
    $.ajax({
        url: 'model/cargarEvaluaciones.php',
        type: 'post',
        data: Form,
        processData: false,
        contentType: false,
        success: (r)=> {
            if (r === "2") {
                mostrarDatos('examen',materia,idTemp);
                $('#frmArchivo')[0].reset();
                $('#unidad').prop('disabled', true);
                //loader.ending();
                swal("Perfecto", "Se han subido el archivo con exito!", "success");
            } else {
                //$('#frmArchivo')[0].reset();
                swal("Upps", "Error al intentar subir archivo! \n" + r, "error");
            }
        }
    });
  }
  
  function eliminarArchivo(id_archivo,tipo,materia) {
    //alert(id_archivo);
    swal({
        title: "Seguro quieres borrar este archivo?",
        text: "Una vez que lo elimines, No se podrá recuperar.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            //loader.opening();
            $.ajax({
                type: 'POST',
                data: $('#del_archivo' + tipo +  id_archivo).serialize(),
                url: 'model/eliminarArchivo.php',
                success: (r)=> {
                    //loader.ending();
                    if (r === "1") {
                      mostrarDatos('examen',materia,idTemp);
                      swal("Perfecto", "El archivo ha sido eliminado permanentemente", "success");
                    } else {
                      mostrarDatos('examen',materia,idTemp);
                      swal("Upps", "No logramos eliminar el archivo "+r, "error");
                    }
                } 
            });
        }
    });
} 

  function precargarMaterias() {
    var option = '<option value="">Seleccionar materia</option>';
    $.ajax({
      url: 'model/selectExamenDocente.php',
      success: function (r) {
        datos_precarga = jQuery.parseJSON(r);
        for(var i = 0; i < datos_precarga.length; i++){
          option = option + '<option value="'+datos_precarga[i].unidades+datos_precarga[i].nombreMateria+'">'+datos_precarga[i].nombreMateria + ' - ' + datos_precarga[i].carrera+'</option>';
        }
        $('#materia').html(option);
      }
    });
  }


  $('#materia').change(function(){
    materia = $(this).val();
    materia = materia.substring(0,1);
    if(materia != ""){
      $('#unidad').prop('disabled', false);
      cargarUnidades(materia);
    }else{
      $('#unidad').prop('disabled', true);
      cargarUnidades(materia);
    }
  });

  function cargarUnidades(materia){
    var option = '<option value="">Seleccionar unidad</option>';
    for(var i = 1; i <= materia; i++){
      option = option + '<option value="'+ i +'">Unidad '+ i +'</option>';
    }    
    $('#unidad').html(option);
  }

  function validarCampos(){
    if($('#materia').val() == ""){
      swal("Upps", "Debes selccionar una materia!", "error");
      return false;
    }else if($('#unidad').val() == ""){
      swal("Upps", "Debes selccionar una una unidad!", "error");
      return false;
    }else{
      cargarArchivo();
    }
  }

  $('#btnAgregar').click(()=>{
    validarCampos();    
  });
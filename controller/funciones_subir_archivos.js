import Loader from './funciones_loader.js';
const loader = new Loader();

$(document).ready(() => {
    var vista = '';
    var actual = '';
    var semestre = '';
    var materia ='';
    //cargarMaterias("");
    //materia = $('#materia').val();
    //mostrarDatos("",semestre,materia);

    function mostrarDatos(tipo,semestre,materia) {
        loader.opening();
        if(tipo == 'jpg'){
            vista = 'model/mostrarArchivosJpg.php';
        }else{
            vista = 'model/mostrarArchivosDoc.php';
        }
        $.ajax({
            type: 'post',
            data: 'tipo=' + tipo + '&semestre=' + semestre + '&materia=' + materia,
            url: vista,
            success: (r) => {
                if(tipo == "docx" || tipo == ""){
                    $('#archivosWord').html(r);
                }else if(tipo == "xlsx"){
                    $('#archivosExcel').html(r);
                }else if(tipo == "pdf"){
                    $('#archivosPdf').html(r);
                }else if(tipo == "mp3"){
                    $('#archivosMp3').html(r);
                }else if(tipo == "jpg"){
                    $('#archivosImg').html(r);
                }
                loader.ending();
            }
        });
    }

    function cargarMaterias(semestre) {
        loader.opening();
        $.ajax({
            type: 'post',
            data: 'semestre=' + semestre,
            url: 'model/selectMaterias.php',
            success: (r) => {
                $('#materia').html(r);
                loader.ending();
            }
        });
    }


    function subir() {
        var tipo = $('#tipo').val();
        var Form = new FormData($('#subirArchivo')[0]);
        loader.opening();
        $.ajax({
            url: 'model/cargarArchivos.php',
            type: 'post',
            data: Form,
            processData: false,
            contentType: false,
            success: (r)=> {
                if (r === "1") {
                    $('#subirArchivo')[0].reset();
                    loader.ending();
                    mostrarDatos(tipo,semestre,materia);
                    swal("Perfecto", "Se han subido los archivos con exito!", "success");
                } else {
                    //$('#subirArchivo')[0].reset();
                    loader.ending();
                    mostrarDatos(tipo,semestre,materia);
                    swal("Upps", "Error al intentar subir archivo(s)! \n" + r, "error");
                }
            }
        });
    }
    
    $('#btnSubir').click(() => {
        subir();
    });

    $('#sec1-tab').click(() => {
        actual = "docx";
        mostrarDatos("docx",semestre,materia);
    });
    $('#sec2-tab').click(() => {
        actual = "xlsx";
        mostrarDatos("xlsx",semestre,materia);
    });

    $('#sec3-tab').click(() => {
        actual = "pdf";
        mostrarDatos("pdf",semestre,materia);
    });

    $('#sec4-tab').click(() => {
        actual = "jpg";
        mostrarDatos("jpg",semestre,materia);
    });

    $('#sec5-tab').click(() => {
        actual = "mp3";
        mostrarDatos("mp3",semestre,materia);
    });

    $('#semestre').change(function() {
        semestre = $(this).val();
        $('#btnModal').prop('disabled', true);
        if(!semestre == ""){
            $('#btnZip').prop('disabled', false);
        }else{
            $('#btnZip').prop('disabled', true);
        }
        cargarMaterias(semestre);
        mostrarDatos(actual,semestre,materia);
    });

    $('#materia').change(function(){
        materia = $(this).val();
        $('#btnModal').prop('disabled', false);
        mostrarDatos(actual,semestre,materia);
    });

    $("#btnModal").click(()=>{
        $('#slMateria').val(materia);
    });
});
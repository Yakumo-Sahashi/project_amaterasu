function mostrarDatos(tipo,materia) {
    //loader.opening();
    if(tipo == 'jpg'){
        vista = 'model/mostrarArchivosJpg.php';
    }else{
        vista = 'model/mostrarArchivosDoc.php';
    }
    $.ajax({
        type: 'post',
        data: 'tipo='+tipo + '&materia=' + materia,
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
                        mostrarDatos(tipo,materia);
                        swal("Perfecto", "El archivo ha sido eliminado permanentemente", "success");
                    } else {
                        mostrarDatos(tipo,materia);
                        swal("Upps", "No logramos eliminar el archivo "+r, "error");
                    }
                } 
            });
        }
    });
} 
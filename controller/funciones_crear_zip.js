import Loader from './funciones_loader.js';
const loader = new Loader();

$(document).ready(() => {

    function generarZip() {

        let semestre = $('#semestre').val();
        $.ajax({
            type: 'POST',
            data: 'semestre=' + semestre,
            url: 'files/generarZip.php',
            success: (r) => {
                if (r != "2") {
                    var url = r.split(",");
                    var descargar = "http://localhost/project_amaterasu/" + url[1];
                    setTimeout(() => {
                        loader.ending();
                        window.open(descargar,'_blank');

                        $.ajax({
                            type: 'POST',
                            data: 'archivo_dir=' + "../" + url[1],
                            url: 'model/eliminarArchivo.php',
                            success: (r) => {
                                if (r == "1") {
                                    //alert("eliminado"+r);
                                }
                            }
                        });
                    }, 2000);
                } else {
                    loader.ending();
                    swal('Upss', "No se ha generado el archivo ZIP" + r, 'error');
                    return false;
                }
            }
        });
    }

    $('#btnZip').click(() => {
        loader.opening();
        generarZip();
    });

});
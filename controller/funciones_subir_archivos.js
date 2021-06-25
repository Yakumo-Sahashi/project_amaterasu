import Loader from './funciones_loader.js';
const loader = new Loader();

$(document).ready(()=> {

    /* function mostrarDatos(){
        $.ajax({
            url:'sql/mostrarDatos.php',
            success: function(r){
              $('#archivosAnime').html(r);
            }
          });
    } */

    function subir(){
        var Form = new FormData($('#subirArchivo')[0]);
        loader.opening();
        $.ajax({
            url: 'model/cargarArchivos.php',
            type: 'post',
            data: Form,
            processData: false,
            contentType: false,
            success: function(r){
                if(r==="1"){
                    $('#subirArchivo')[0].reset();
                    loader.ending();
                    //mostrarDatos();
                    swal("Perfecto", "Se han subido los archivos con exito!", "success");
                }else{
                      $('#subirArchivo')[0].reset();
                      loader.ending();
                    //mostrarDatos();
                    swal("Upps", "Error al intentar subir archivo(s)! \n"+r, "error");
                }
            }
        });		
    }
    

    $('#btnSubir').click(()=>{
        subir();
    });
});